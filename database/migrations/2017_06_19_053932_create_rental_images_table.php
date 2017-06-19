<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rental_id');
            $table->string('image');
            $table->enum('type', ['small','thumb','primary','gallery'])->default('gallery');
            $table->timestamps();

            $table->index(['rental_id', 'type']);
            $table->foreign('rental_id')->references('id')->on('rentals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_images');
    }
}
