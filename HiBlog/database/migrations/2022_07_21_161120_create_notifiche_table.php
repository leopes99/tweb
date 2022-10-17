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
            $table->unsignedBigInteger('id_destinatario')->nullable();
            $table->foreign('id_destinatario')->references('id')->on('users');
            $table->unsignedBigInteger('id_mittente')->nullable();
            $table->foreign('id_mittente')->references('id')->on('users');
            $table->unsignedBigInteger('id_blog')->nullable();
            $table->set('tipologia_notifica', ['CreazionePost','RimozionePost','RimozioneBlog', 'RimozioneAmico']);
            
            
            $table->string('nome_blog')->nullable();
            
            $table->string('contenuto_post')->nullable();
            
            $table->string('motivo_cancellazione')->nullable();;
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
