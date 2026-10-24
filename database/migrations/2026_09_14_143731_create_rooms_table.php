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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('Standard'); // Deluxe, Superior, Standard
            $table->string('gender_type')->default('Campur'); // Campur, Putra, Putri
            $table->unsignedInteger('price_monthly');
            $table->unsignedInteger('price_yearly')->nullable();
            $table->string('size')->default('3 x 4 m');
            $table->string('bed_type')->default('Single Bed');
            $table->string('bathroom_type')->default('Kamar Mandi Dalam');
            $table->string('electricity')->default('Token Mandiri');
            $table->unsignedSmallInteger('total_units')->default(4);
            $table->unsignedSmallInteger('available_units')->default(1);
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('thumbnail')->default('/images/kost/deluxe.jpg');
            $table->text('gallery')->nullable(); // JSON array of images
            $table->text('facilities')->nullable(); // JSON array of facility names
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
