<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('color');
            $table->text('size')->nullable();
            $table->text('material')->nullable();
            $table->integer('price');
            $table->integer('compare_price')->nullable();
            $table->string('sku')->nullable();
            $table->text('barcode')->nullable();
            $table->string('qty')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->string('category');
            $table->string('sub_category');
            $table->string('brand')->nullable();
            $table->text('featured_product')->default('0')->nullable();
            
            $table->string('meta_title');
            $table->string('meta_key')->nullable();
            $table->text('meta_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
