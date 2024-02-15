<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_payment', function (Blueprint $table) {
            $table->id("Payment_ID");//cart id
            $table->integer("Customer_ID");
           // $table->date("Payment_Date");
            $table->String("MOP");
            $table->integer("Order_ID");
            $table->integer("Menu_ID");
            $table->integer("Reservation_ID")->nullable();
            $table->decimal("Total_Payment")->nullable();
            $table->String("Payment_Status")->nullable();
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
        Schema::dropIfExists('payment');
    }
}
