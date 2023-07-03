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
            $table->unsignedBigInteger('case_id');
            $table->foreign('case_id')->references('id')->on('medical_cases')->onDelete('cascade');
            $table->double('price');
            $table->string('weight');            
            $table->string('img');
            $table->string('color');
            $table->string('type');
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
