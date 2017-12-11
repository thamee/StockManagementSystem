<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockreturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockreturn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_no');
            $table->string('stock_name');
            $table->string('sup_id');
            $table->string('sup_name');
            $table->string('received_date');
            $table->string('return_date');
            $table->decimal('stock_amount');
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
        Schema::dropIfExists('stockreturn');
    }
}
