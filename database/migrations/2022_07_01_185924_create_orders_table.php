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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('request_id')->nullable();
            $table->string('weight');
            $table->string('roasting');
            $table->string('grind');
            $table->integer('quantity');
            $table->timestamps();
            
            $table->foreign('request_id')->references('id')->on('requestorders');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
            
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
