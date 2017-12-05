<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_in', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no');
            $table->string('sup_id');
            $table->string('order_date');
            $table->string('stock_no');
            $table->string('stock_name');
            $table->string('stock_unit');
            $table->string('stock_amount');
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
        Schema::dropIfExists('stock_in');
    }
}
