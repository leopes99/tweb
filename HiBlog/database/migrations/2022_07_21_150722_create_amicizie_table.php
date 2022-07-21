<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmicizieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amicizie', function (Blueprint $table) {
            $table->bigIncrements('AmiciziaId');
            $table->unsignedBigInteger('id_richiedente_amicizia');
            $table->unsignedBigInteger('id_ricevente_amicizia');
            $table->foreign('id_richiedente_amicizia')->references('id')->on('users');
            $table->foreign('id_ricevente_amicizia')->references('id')->on('users');
            $table->boolean('accettata')->nullable();
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
        Schema::dropIfExists('amicizie');
    }
}
