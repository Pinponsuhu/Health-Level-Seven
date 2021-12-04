<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('passport');
            $table->string('surname');
            $table->string('othernames');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('phone_number')->unique();
            $table->string('email_address')->unique()->nullable();
            $table->string('state_of_origin');
            $table->string('occupation');
            $table->string('resident_address');
            $table->string('next_of_kin');
            $table->string('next_of_kin_number1');
            $table->string('next_of_kin_number2')->nullable();
            $table->string('PID')->unique();
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
        Schema::dropIfExists('patients');
    }
}
