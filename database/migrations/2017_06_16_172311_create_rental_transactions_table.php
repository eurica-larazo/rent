<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rental_id');
            $table->unsignedInteger('rentor_id');
            $table->unsignedInteger('renter_id');
            $table->float('deposit');
            $table->float('amount');
            $table->timestamp('rented_date')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->text('agreement_location');
            $table->timestamps();

            $table->index(['rental_id', 'rentor_id', 'renter_id']);
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->foreign('rentor_id')->references('id')->on('users');
            $table->foreign('renter_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_transactions');
    }
}
