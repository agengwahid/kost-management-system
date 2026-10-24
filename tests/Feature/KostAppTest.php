<?php

namespace Tests\Feature;

use App\Models\Room;
use App\Models\Survey;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KostAppTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }
    public function test_homepage_loads_and_displays_rooms_and_facilities(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Kost Eksklusif Senopati Residence');
        $response->assertSee('Kamar Deluxe Queen Suite');
        $response->assertSee('Kalkulator Estimasi Biaya Sewa');
        $response->assertSee('Jadwalkan Kunjungan Survey Anda');
    }

    public function test_room_detail_api_returns_correct_json(): void
    {
        $room = Room::first();
        $this->assertNotNull($room);

        $response = $this->get(route('room.detail', $room));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'room' => ['id', 'name', 'price_monthly', 'size', 'bed_type'],
            'formatted_monthly',
            'formatted_yearly',
        ]);
    }

    public function test_guest_can_submit_survey_request(): void
    {
        $room = Room::first();
        $response = $this->post(route('survey.store'), [
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
            'room_id' => $room ? $room->id : null,
            'survey_date' => now()->addDays(2)->format('Y-m-d'),
            'survey_time' => '14:00 - 17:00 WIB',
            'duration_plan' => '3 Bulan',
            'notes' => 'Tolong info slot parkir motor.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('surveys', [
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
        ]);
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post(route('login.post'), [
            'email' => 'admin@kost.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_authenticated_admin_can_view_rooms_and_surveys(): void
    {
        $user = User::where('email', 'admin@kost.com')->first();
        $this->assertNotNull($user);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Ringkasan Dashboard');

        $roomResponse = $this->actingAs($user)->get(route('admin.rooms.index'));
        $roomResponse->assertStatus(200);
        $roomResponse->assertSee('Daftar Tipe Kamar');

        $surveyResponse = $this->actingAs($user)->get(route('admin.surveys.index'));
        $surveyResponse->assertStatus(200);
        $surveyResponse->assertSee('Permintaan Survey Calon Penghuni');
    }

    public function test_admin_can_toggle_room_availability(): void
    {
        $user = User::where('email', 'admin@kost.com')->first();
        $room = Room::first();

        $initialStatus = $room->is_available;
        $response = $this->actingAs($user)->patch(route('admin.rooms.toggle', $room));
        $response->assertSessionHas('success');

        $room->refresh();
        $this->assertNotEquals($initialStatus, $room->is_available);
    }

    public function test_admin_can_view_and_upload_to_gallery(): void
    {
        $user = User::where('email', 'admin@kost.com')->first();

        $viewResponse = $this->actingAs($user)->get(route('admin.gallery.index'));
        $viewResponse->assertStatus(200);
        $viewResponse->assertSee('Koleksi Foto');

        $file = \Illuminate\Http\UploadedFile::fake()->image('kost_baru.jpg', 600, 400);

        $uploadResponse = $this->actingAs($user)->post(route('admin.gallery.store'), [
            'title' => 'Rooftop Gazebo Sore',
            'category' => 'Fasilitas',
            'image' => $file,
        ]);

        $uploadResponse->assertSessionHas('success');
        $this->assertDatabaseHas('galleries', [
            'title' => 'Rooftop Gazebo Sore',
            'category' => 'Fasilitas',
        ]);
    }

    public function test_admin_can_create_room_with_uploaded_image(): void
    {
        $user = User::where('email', 'admin@kost.com')->first();
        $file = \Illuminate\Http\UploadedFile::fake()->image('kamar_vip.jpg', 800, 600);

        $response = $this->actingAs($user)->post(route('admin.rooms.store'), [
            'name' => 'Kamar VIP Penthouse',
            'type' => 'Deluxe',
            'gender_type' => 'Campur',
            'price_monthly' => 3200000,
            'price_yearly' => 35000000,
            'size' => '5 x 5 m',
            'bed_type' => 'King Bed (180x200)',
            'bathroom_type' => 'Kamar Mandi Dalam + Bathtub',
            'electricity' => 'Token Mandiri',
            'total_units' => 2,
            'available_units' => 1,
            'image_file' => $file,
            'facilities' => "AC 1.5 PK\nSmart TV 43 Inch\nBathtub & Water Heater",
            'description' => 'Kamar termewah dengan pemandangan kota dan fasilitas terbaik.',
        ]);

        $response->assertRedirect(route('admin.rooms.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('rooms', [
            'name' => 'Kamar VIP Penthouse',
            'price_monthly' => 3200000,
        ]);
    }
}
