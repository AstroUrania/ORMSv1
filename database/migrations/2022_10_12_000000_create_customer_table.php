<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_CUSTOMERS', function (Blueprint $table) {
            $table->id('Customer_ID');
            $table->string('Customer_Name');
            $table->string('Cust_pass');
            $table->date('Cust_RegisDate');
            $table->string('Cust_EmailAdd')->unique();
            $table->string('Cust_ContactNo');
            $table->string('Cust_Address');
            $table->date('Cust_Birthday');
            $table->string('DP');
            $table->string('PicID');
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
        Schema::dropIfExists('CUSTOMERS');
    }
}
