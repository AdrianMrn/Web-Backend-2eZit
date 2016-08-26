<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Votes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upordown'); //0 = downvote, 1 = upvote
            $table->integer('FK_thread_id')->unsigned();
            $table->foreign('FK_thread_id')->references('id')->on('threads');
            $table->integer('FK_user_id')->unsigned();
            $table->foreign('FK_user_id')->references('id')->on('users');
            $table->rememberToken();
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
        Schema::drop('votes');
    }
}
