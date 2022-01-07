<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('department');
            $table->string('staff_id');
            $table->string('gender');
            $table->string('state_of_origin');
            $table->string('passport');
            $table->string('phone_number');
            $table->string('email_address');
            $table->unsignedInteger('hospital_id');
            $table->string('house_address');
            $table->string('next_of_kin');
            $table->string('next_of_kin_number');
            $table->date('date_of_birth');
            $table->timestamps();
            $table->foreign('hospital_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
