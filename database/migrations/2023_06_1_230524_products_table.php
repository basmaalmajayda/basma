<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->double('price');
            $table->string('weight')->nullable();            
            $table->string('img');
            $table->string('color_id')->nullable();
            $table->unsignedBigInteger('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->integer('quantity');
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
