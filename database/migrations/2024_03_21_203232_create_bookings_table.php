<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->morphs('booked_entity'); 
            $table->dateTime('booking_date');
            $table->integer('duration_days')->nullable();
            $table->timestamps();

          
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            
            // Add more columns as needed for specific booking details
            // For example, if a booking includes special requests or notes, you can add a 'notes' column.
            // $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
