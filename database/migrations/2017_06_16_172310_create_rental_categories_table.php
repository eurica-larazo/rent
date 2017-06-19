<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rental_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('category_sub_id');
            $table->timestamps();

            $table->index(['rental_id', 'category_id', 'category_sub_id']);
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('category_sub_id')->references('id')->on('category_subs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_categories');
    }
}
