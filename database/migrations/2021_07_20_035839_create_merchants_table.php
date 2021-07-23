<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('add_on')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('state')->nullable();
            $table->string('street_no')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website_url')->nullable();
            $table->string('remark')->nullable();
            $table->decimal('shipping_rate')->nullable();
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
        Schema::dropIfExists('merchants');
    }
}
