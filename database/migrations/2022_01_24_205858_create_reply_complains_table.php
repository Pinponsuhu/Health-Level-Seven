<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_complains', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('message');
            $table->unsignedInteger('complain_id');
            $table->string('from');
            $table->string('to');
            $table->string('is_read');
            $table->string('status');
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
        Schema::dropIfExists('reply_complains');
    }
}
