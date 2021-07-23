<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
          
            $table->decimal('total_profit')->nullable();
            $table->string('tracking_number')->nullable();
            $table->date('sales_date')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('customer_first_name')->nullable();
            $table->string('customer_last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('street_no')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
