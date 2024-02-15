<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_PROMO', function (Blueprint $table) {
            $table->id("Promo_ID");
            $table->String("Promo_Code");
            $table->String("Promo_Name");
            $table->String("Promo_Desc")->nullable();
            $table->String("Promo_Type");
            $table->decimal("Promo_value");
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
        Schema::dropIfExists('promo');
    }
}
