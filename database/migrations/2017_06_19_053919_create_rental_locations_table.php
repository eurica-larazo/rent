<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rental_id');
            $table->unsignedInteger('user_rental_location_id');
            $table->timestamps();

            $table->index(['rental_id', 'user_rental_location_id']);
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->foreign('user_rental_location_id')->references('id')->on('user_rental_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_locations');
    }
}
