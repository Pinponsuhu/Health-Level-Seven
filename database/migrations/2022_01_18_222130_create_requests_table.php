<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('title');
            $table->longText('content');
            $table->string('status');
            $table->string('to');
            $table->string('from');
            $table->unsignedInteger('hospital_id');
            $table->string('is_read');
            $table->timestamps();
            $table->foreign('hospital_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('request_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('requests_id');
            $table->mediumText('request_title');
            $table->string('filename');
            $table->timestamps();
            $table->foreign('requests_id')->references('id')->on('requests')->onDelete('cascade');
        });
    }

    /**i
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
