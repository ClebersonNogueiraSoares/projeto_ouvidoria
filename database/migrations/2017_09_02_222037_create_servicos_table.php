<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('idServico');
            $table->string('descricao', 255);
            $table->integer('idSecretaria')->unsigned();
            $table->foreign('idSecretaria')->references('idSecretaria')->on('secretarias');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('servicos');
    }

}
