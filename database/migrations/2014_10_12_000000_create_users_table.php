<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->string('sexo', 10);
            $table->string('tel_fixo', 15);
            $table->string('tel_cel', 15);
            $table->string('cep', 15);
            $table->string('rua', 45);
            $table->string('numero', 10);
            $table->string('bairro', 45);
            $table->string('cidade', 45);
            $table->string('email')->unique();
            $table->string('email_token')->nullable();
            $table->string('password', 60);
            $table->integer('idTipo_usuario')->default(1)->unsigned();
            $table->foreign('idTipo_usuario')->references('idTipo_usuarios')->on('tipo__usuarios');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
