<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('kost_name')->default('Kost Eksklusif Senopati Residence');
            $table->string('tagline')->default('Hunian Kost Modern, Nyaman, & Strategis di Pusat Kota');
            $table->string('phone_wa')->default('6281234567890');
            $table->string('email')->nullable()->default('info@kostsenopati.com');
            $table->text('address')->default('Jl. Senopati Raya No. 45, Kebayoran Baru, Jakarta Selatan');
            $table->string('city')->default('Jakarta Selatan');
            $table->text('map_embed_url')->nullable();
            $table->text('rules')->nullable(); // JSON
            $table->text('strategic_locations')->nullable(); // JSON
            $table->text('pricing_extra')->nullable(); // JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
