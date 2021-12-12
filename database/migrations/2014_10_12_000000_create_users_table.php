<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name')->unique();
            $table->string('head_of_hospital');
            $table->string('email_address')->unique();
            $table->string('phone_number');
            $table->string('hospital_address');
            $table->string('hospital_admin');
            $table->string('hospital_logo');
            $table->string('password');
            $table->string('HID')->unique();
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
        Schema::dropIfExists('users');
    }
}
