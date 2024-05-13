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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category');
            $table->string('city');
            $table->string('street');
            $table->string('hotelNo');
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->integer('total_rooms');
            $table->integer('available_rooms');
            $table->integer('room_type');
            $table->decimal('cost_per_day', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
