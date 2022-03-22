<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

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
            $table->string('name');
            $table->string('color');
            $table->string('weight');
            $table->string('dimensions');
            $table->string('slug')->unique()->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('regular_price');
            $table->decimal('sale_price');
            $table->string('SKU');
            $table->enum('stock_status' , ['instock' , 'outofstock']);
            $table->boolean('featured')->default(false);
            $table->bigInteger('rate')->default(1);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->bigInteger('sub_category_id')
            ->Constraint('sub_categories')
            ->unsigned()
            ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
