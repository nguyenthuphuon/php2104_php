<?php

use Brick\Math\BigInteger;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('rate')->nullable();
            $table->float('price', 8, 2)->change()->nullable();
            $table->date('start_sale_date')->nullable();
            $table->bigInteger('user_id')->change()->nullable();
            $table->integer('status')->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_products');
    }
}