<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('othernames');
            $table->date('preferred_date');
            $table->string('gender');
            $table->string('appointment_type');
            $table->unsignedInteger('hospital_id');
            $table->string('doctor_type');
            $table->string('status');
            $table->string('phone_number');
            $table->string('email_address')->nullable();
            $table->foreign('hospital_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
}
