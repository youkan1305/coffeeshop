<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('request_id');
            $table->string('weight');
            $table->string('roasting');
            $table->string('grind');
            $table->string('quantity');
            $table->timestamps();
            
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('item_id')->references('id')->on('items');
            
            $table->unique(['request_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
