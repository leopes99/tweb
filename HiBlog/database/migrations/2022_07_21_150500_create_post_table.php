<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('PostId');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('id_blog');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_blog')->references('BlogId')->on('blog');
            $table->string('contenuto_post',1000);
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
        Schema::dropIfExists('post');
    }
}
