<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transporter_id')->constrained('transporters');
            $table->string('company_name');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('vehicle_type');
            $table->integer('capacity');
            $table->decimal('price_per_km', 8, 2);
            $table->longText('picture')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
