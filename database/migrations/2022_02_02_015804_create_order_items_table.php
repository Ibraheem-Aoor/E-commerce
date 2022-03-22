<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            

            $table->bigInteger('order_id')
            ->constraint('orders')
            ->unsigned()
            ->nullable()
            ->onDelete('cascade');


            $table->unsignedBigInteger('product_id')
            ->constraint('products')
            ->nullable()
            ->onDelete('cascade');

            $table->decimal('price');

            $table->boolean('isRated')
            ->default(false);

            $table->decimal('quantity');
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
        Schema::dropIfExists('order_items');
    }
}
