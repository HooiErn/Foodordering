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
            $table->id();
            $table->string('orderID');
            $table->string('status');
            $table->double('amount',8,2);
            $table->string('addon')->nullable();
            $table->string('waiter')->nullable();
            $table->integer('is_paid');
            $table->integer('payment_method')->default(1);
            $table->date('created_at');
            $table->date('updated_at');
        
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