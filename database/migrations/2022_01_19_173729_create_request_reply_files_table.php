<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestReplyFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_reply_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('reply_id');
            $table->string('filename');
            $table->timestamps();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('request_replies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_reply_files');
    }
}
