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
            $table->string('sku');
            $table->unsignedBigInteger('product_category');
            $table->text('product_name');
            $table->text('product_detail');
            $table->unsignedBigInteger('product_brand');
            $table->integer('product_price');
            $table->string('fileimages')->nullable();
            $table->string('status');
            $table->enum('deleted', ['true', 'false'])->default('false');
            $table->timestamps();
            $table->string('slug');
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
