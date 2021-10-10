<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('booking_id');
            $table->string('room_name');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('amount_date');
            $table->integer('amount');
            $table->decimal('unit_price','9','2');
            $table->decimal('unit_price_vi',);
            $table->decimal('price','9','2');
            $table->decimal('price_vi','10','0');
            $table->timestamps();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_details');
    }
}
