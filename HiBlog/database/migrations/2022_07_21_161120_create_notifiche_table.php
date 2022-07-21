<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifiche', function (Blueprint $table) {
          $table->bigIncrements('NotificaId');
            $table->unsignedBigInteger('id_destinatario');
            $table->foreign('id_destinatario')->references('id')->on('users');
            $table->set('tipologia-notifica', ['RichiestaAmicizia','RimozioneAmicizia','CreazionePost','RimozionePost','RimozioneBlog']);
            
            $table->unsignedBigInteger('id_amicizia')->nullable();
            $table->unsignedBigInteger('id_blog')->nullable();
            $table->unsignedBigInteger('id_post')->nullable();
            $table->foreign('id_amicizia')->references('AmiciziaId')->on('amicizie');
            $table->foreign('id_post')->references('PostId')->on('post');
            $table->foreign('id_blog')->references('BlogId')->on('blog');
            
            $table->string('motivo_cancellazione');
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
        Schema::dropIfExists('notifiche');
    }
}
