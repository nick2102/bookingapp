<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('checkIn');
            $table->string('checkOut');
            $table->string('single_price');
            $table->string('days');
            $table->string('room_type');
            $table->string('the_price');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('reservations');
    }
}
