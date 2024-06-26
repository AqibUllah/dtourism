<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourGuidesTable extends Migration
{
    public function up()
    {
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('age');
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('house_no')->nullable();
            $table->string('gender');
            $table->string('nationality');
            $table->longText('image')->nullable();
            $table->string('language');
            $table->string('specialization');
            $table->string('price_per_3_hours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_guides');
    }
}
