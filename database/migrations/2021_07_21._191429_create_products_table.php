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
            
            $table->string('product_name')->nullable();
            $table->decimal('weightage')->nullable();
            $table->longText('remark')->nullable();
            $table->decimal('agent_price')->nullable();
            $table->decimal('selling_price')->nullable();
            $table->integer('agent_quantity')->nullable();
            $table->integer('agent_quantity_type')->nullable();
            $table->integer('selling_quantity')->nullable();
            $table->integer('selling_quantity_type')->nullable();
            $table->string('product_image')->nullable();
            $table->tinyInteger('type_of_stock')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
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
