<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('mode' , ['cod' , 'card' , 'paypal']);
            $table->enum('status' , ['pending' , 'approved' , 'declined' ,'refunded']);
            $table->unsignedBigInteger('order_id')
            ->constraint('orders')
            ->nullable()
            ->onDelete('cascade');

            $table->unsignedBigInteger('user_id')
            ->constraint('users')
            ->nullable()
            ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
