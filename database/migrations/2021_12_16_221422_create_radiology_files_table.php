<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiologyFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radiology_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('upload_id');
            $table->string('file_path');
            $table->timestamps();
            $table->foreign('upload_id')->references('id')->on('radiology_uploads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radiology_files');
    }
}
