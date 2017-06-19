<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('primary_image');
            $table->float('deposit');
            $table->float('amount');
            $table->smallInteger('term')->nullable();
            $table->float('rating')->default(0);
            $table->enum('status', ['enable','disable'])->default('enable');
            $table->unsignedInteger('report_count')->default(0);
            $table->timestamps();

            $table->index(['user_id', 'name']);
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
        Schema::dropIfExists('rentals');
    }
}
