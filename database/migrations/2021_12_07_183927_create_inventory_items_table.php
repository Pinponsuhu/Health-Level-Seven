<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('quantity');
            $table->string('shelf_no');
            $table->string('item_id')->unique();
            $table->string('item_category');
            $table->string('date_brought_in');
            $table->string('delivered_by');
            $table->string('deliverer_number');
            $table->string('serial_number');
            $table->timestamps();
        });

        Schema::create('assigns', function (Blueprint $table) {
            $table->id();
            $table-> unsignedInteger('itemr_id');
            $table-> string('assigned_to');
            $table-> string('number_of_item');
            $table-> string('issued_by');
            $table-> string('issue_to');
            $table->foreign('itemr_id')
                  ->references('id')
                  ->on('inventory_items')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('inventory_items');
    }
}
