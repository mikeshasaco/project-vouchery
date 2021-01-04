<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('desc');
            $table->string('image');
            $table->decimal('currentprice')->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('producttype_id')->unsigned();
            $table->decimal('newprice')->unsigned()->nullable();
            $table->string('couponcode')->nullable();
            $table->boolean('advertboolean')->default(false);
            $table->integer('clicks')->unsigned()->default(false);
            $table->datetime('expired_date');
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
