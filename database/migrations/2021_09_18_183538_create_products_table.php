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
            $table->integer('type');
            $table->string('name');
            $table->string('url')->unique();
            $table->mediumText('images');
            $table->mediumText('category')->nullable();
            $table->mediumText('tag')->nullable();
            $table->mediumText('shortdesc');
            $table->mediumText('longdesc');
            $table->string('price');
            $table->string('sale')->nullable();
            $table->string('rating')->nullable();
            $table->integer('status');
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
