<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatestaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_STAFF', function (Blueprint $table) {
            $table->id('Staff_ID')->unique();
            $table->string('Staff_Name');
            $table->string('Staff_Position');
            $table->string('Staff_EmailAdd');
            $table->timestamp('emailverified_at')->nullable();
            $table->string('Staff_ContactNo');
            $table->string('Staff_Password');
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->date('Staff_Birthday');
            $table->string('DP')->nullable();;
            $table->string('PicID')->nullable();;
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
        Schema::dropIfExists('TB_STAFF');
    }
}
