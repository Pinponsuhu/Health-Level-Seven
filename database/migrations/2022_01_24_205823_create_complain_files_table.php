<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('complain_id');
            $table->string('complain_title');
            $table->string('filename');
            $table->timestamps();
            $table->foreign('complain_id')->references('id')->on('complains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complain_files');
    }
}
