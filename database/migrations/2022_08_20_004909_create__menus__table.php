<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_MENU', function (Blueprint $table) {
            $table->id("Menu_ID");
            $table->String("Menu_Name");
            $table->decimal("Menu_Price");
            $table->String("Menu_Desc");
            $table->String("Menu_Type");
            $table->String("Menu_Category");
            $table->String("Menu_status");
            $table->String("Menu_pic");
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
        Schema::dropIfExists('MENU');
    }
}
