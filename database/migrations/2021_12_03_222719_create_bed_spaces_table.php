<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('othernames');
            $table->string('status');
            $table->string('gender');
            $table->string('phone_number')->nullable();
            $table->string('checked_in_date');
            $table->string('hospital_id');
            $table->string('checked_in_time');
            $table->string('bed_number');
            $table->string('ward');
            $table->string('next_of_kin');
            $table->string('next_of_kin_number')->nullable();
            $table->string('doctor_name');
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
        Schema::dropIfExists('bed_spaces');
    }
}
