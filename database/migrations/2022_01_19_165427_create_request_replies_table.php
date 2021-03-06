<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->longText('message');
            $table->string('from');
            $table->string('to');
            $table->string('status');
            $table->integer('is_read');
            $table->integer('hospital_id');
            $table->timestamps();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_replies');
    }
}
