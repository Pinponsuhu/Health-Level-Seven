<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyComplainFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_complain_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('complain_id');
            $table->unsignedInteger('reply_id');
            $table->timestamps();
            $table->foreign('reply_id')->references('id')->on('reply_complains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_complain_files');
    }
}
