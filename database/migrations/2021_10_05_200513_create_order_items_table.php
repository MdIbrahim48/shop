<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('price')->nullable();
            // $table->integer('product_by_shopid')->nullable();
            $table->bigInteger('quantity')->nullable();
            // $table->boolean('payment_status')->default(0);
            // $table->string('shop_for')->default('fast_deals');  //fast_deals or merchant
            // $table->boolean('status')->default(0); // 1 = processing, 2=cancel, 3 = complete,
            // $table->boolean('notification')->default(0);
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
        Schema::dropIfExists('order_items');
    }
}
