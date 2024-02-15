<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_ORDERS', function (Blueprint $table) {
            $table->id("Order_ID");//cart id
            $table->integer("Customer_ID");
            $table->String("Customer_Type")->default("Member");
            $table->integer("Menu_ID");
            $table->integer("Quantity");
            $table->String("Specification")->nullable();
            $table->String("Claim_Type");
            $table->decimal("Orders_Price");
            $table->String("Order_Status");
            $table->date("Delivery_Datetime")->nullable();
            $table->decimal("Delivery_Price")->nullable();
            $table->String("Receiver_Name");
            $table->String("Rec_ContactNo");
            $table->String("Rec_Address")->nullable();
            $table->String("Delivery_Status")->nullable();
            $table->String("Deliverer_ID")->nullable();
            $table->String("Time_Departed")->nullable();
            $table->String("Time_Received")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
