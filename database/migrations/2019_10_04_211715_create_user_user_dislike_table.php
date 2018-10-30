<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserDislikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dislikes', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('dislikes_user_id');
            $table->dateTime('disliked_on')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('dislikes_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->primary(['user_id', 'dislikes_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dislikes', function (Blueprint $table) {
            //
        });
    }
}
