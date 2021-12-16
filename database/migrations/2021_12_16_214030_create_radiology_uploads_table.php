<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiologyUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radiology_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('PID')->nullable();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email_address')->nullable();
            $table->string('test_type');
            $table->string('gender');
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
        Schema::dropIfExists('radiology_uploads');
    }
}
