<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetbInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_inventory', function (Blueprint $table) {
            $table->id("Inventory_ID");
            $table->String("Item_Name");
            $table->String("Item_Type");
            $table->date("Expiration Date");
            $table->integer("Qty");
            $table->decimal("Price_perunit");
            $table->decimal("Total_Cost");
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
        Schema::dropIfExists('inventory');
    }
}
