<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('hospital_id');
            $table->string('radiology_permission')->nullable();
            $table->string('bed_permission')->nullable();
            $table->string('appointment_permission')->nullable();
            $table->string('patient_permission')->nullable();
            $table->string('inventory_permission')->nullable();
            $table->timestamps();
            $table->foreign('hospital_id')->references('HID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
