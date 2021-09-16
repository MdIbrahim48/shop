<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unique();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('price');
            $table->string('offer_price')->nullable();
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->longText('short_description');
            $table->string('tag');
            $table->string('thumbnail');
            $table->string('featured_image')->nullable();
            $table->integer('quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('waist')->nullable();
            $table->string('length')->nullable();
            $table->string('chest')->nullable();
            $table->string('fabric')->nullable();
            $table->boolean('abalivality')->default(0)->comment('1=Stock,0=Instock');
            $table->string('video_link')->nullable();
            $table->string('camera')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('processor')->nullable();
            $table->string('warranty')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('ram_size')->nullable();
            $table->string('storage')->nullable();
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
        Schema::dropIfExists('products');
    }
}
