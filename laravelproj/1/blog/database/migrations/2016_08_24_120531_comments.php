<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('FK_user_id')->unsigned();
            $table->foreign('FK_user_id')->references('id')->on('users');
            $table->integer('FK_thread_id')->unsigned();
            $table->foreign('FK_thread_id')->references('id')->on('threads');
            $table->integer('deleted'); //0 = not deleted (initial), 1 = deleted
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
        Schema::drop('comments');
    }
}
