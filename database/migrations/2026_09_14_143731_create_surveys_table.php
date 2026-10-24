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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->foreignId('room_id')->nullable()->constrained('rooms')->nullOnDelete();
            $table->string('room_type_interest')->nullable();
            $table->date('survey_date');
            $table->string('survey_time')->default('10:00 WIB');
            $table->string('duration_plan')->default('1 Bulan');
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, completed, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
