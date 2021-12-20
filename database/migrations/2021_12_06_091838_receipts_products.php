<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReceiptsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('receipts_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('product_id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('receipt');
            $table->foreign('receipt')->references('receipt_id')->on('receipt')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
