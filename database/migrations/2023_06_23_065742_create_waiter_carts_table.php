<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaiterCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiter_carts', function (Blueprint $table) {
            $table->id();
            $table->string('food_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('table_id');
            $table->json('addon')->nullable();
            $table->string('orderID')->nullable();
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
        Schema::dropIfExists('waiter_carts');
    }
}
