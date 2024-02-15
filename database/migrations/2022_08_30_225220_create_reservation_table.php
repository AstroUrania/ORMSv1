<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reservation', function (Blueprint $table) {
            $table->id('Reservation_ID');
            $table->integer('Customer_ID');
            $table->datetime('Reservation_Datetime');
            $table->datetime('End_Datetime');
            $table->integer('RT_ID');
            $table->decimal('Reservation_Price');
            $table->string('Reservation_Status');
            $table->integer('Companion_No');
            $table->rememberToken();
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
        Schema::dropIfExists('reservation');
    }
}
