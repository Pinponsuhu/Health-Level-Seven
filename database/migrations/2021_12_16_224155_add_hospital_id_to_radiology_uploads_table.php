<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHospitalIdToRadiologyUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('radiology_uploads', function (Blueprint $table) {
            $table->unsignedInteger('hospital_id');
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
        Schema::table('radiology_uploads', function (Blueprint $table) {
            $table->dropColumn('hospital_id');
        });
    }
}
