<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rental_id');
            $table->unsignedInteger('user_id');
            $table->float('rate')->default(0);
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->index(['rental_id', 'user_id']);
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_ratings');
    }
}
