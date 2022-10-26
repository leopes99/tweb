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
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->set('genere', ['Maschio','Femmina'])->nullable();
            $table->set('visibile', ['si','no'])->nullable();
            $table->string('telefono');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username',20);           
            $table->string('email');
            $table->string('password');
            $table->string('role',10);
            $table->bigInteger('RichiesteRicevute')->default(0);
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
        Schema::dropIfExists('users');
    }
}
