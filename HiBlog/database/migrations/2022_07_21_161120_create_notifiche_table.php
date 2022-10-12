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
            $table->set('tipologia_notifica', ['CreazionePost','RimozionePost','RimozioneBlog']);
            
            
            $table->string('nome_blog')->nullable();
            
            $table->string('contenuto_post')->nullable();
            
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
