<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('rental_transaction_id');
            $table->enum('type', ['renter', 'rentor'])->default('renter');
            $table->integer('points')->default(1);
            $table->timestamps();

            $table->index(['user_id', 'rental_transaction_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('rental_transaction_id')->references('id')->on('rental_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_points');
    }
}
