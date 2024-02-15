<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetbRoomsntablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbroomsntables', function (Blueprint $table) {
            $table->id("RT_ID");
            $table->String("RT_Type");
            $table->String("Avail_Status");
            $table->integer("RT_Capacity");
            $table->decimal("RT_Price");
            $table->String("RT_Desc");
            $table->String("RT_pic");
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
        Schema::dropIfExists('roomsntables');
    }
}
