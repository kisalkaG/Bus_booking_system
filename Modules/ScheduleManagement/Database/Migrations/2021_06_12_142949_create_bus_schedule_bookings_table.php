<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusScheduleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedule_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_seat_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bus_schedule_id');
            $table->integer('seat_number');
            $table->string('price');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('bus_seat_id')->references('id')->on('bus_seats');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bus_schedule_id')->references('id')->on('bus_schedules');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_schedule_bookings');
    }
}
