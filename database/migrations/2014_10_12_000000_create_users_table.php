<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->dateTime('birthdate');
            $table->string('social_id');
            $table->string('token');
            $table->string('profile_pic')->default('profile/default.png');
            $table->unsignedInteger('referred_by')->nullable();
            $table->unsignedInteger('referral_count')->default(0);
            $table->unsignedInteger('points')->default(0);
            $table->unsignedInteger('notification_count')->default(0);
            $table->float('rate');
            $table->unsignedInteger('rental_count')->default(0);
            $table->unsignedInteger('rented_count')->default(0);
            $table->unsignedInteger('following_count')->default(0);
            $table->unsignedInteger('follower_count')->default(0);
            $table->unsignedInteger('report_count')->default(0);
            $table->unsignedInteger('reported_count')->default(0);
            $table->enum('status', ['active','disabled','banned'])->default('active');
            $table->timestamps();

            $table->index(['email', 'firstname', 'lastname']);
            $table->foreign('referred_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
