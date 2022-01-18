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
            $table->id();
            $table->mediumText('title');
            $table->longText('content');
            $table->string('status');
            $table->string('to');
            $table->string('from');
            $table->string('hospital_id');
            $table->string('is_read');
            $table->timestamps();
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
