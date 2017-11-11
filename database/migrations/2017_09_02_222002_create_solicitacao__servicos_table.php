<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaoServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao__servicos', function (Blueprint $table) {
            $table->increments('idSolicitacao_Servicos');
            $table->string('protocolo',45);
            $table->string('anexos',255);
            $table->integer('status_servicos');
            $table->string('observacao',255);
            $table->timestamps('data_final');
            $table->integer('idServico')->unsigned();
            $table->integer('idTipo_requisicao')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idCidadao')->unsigned();
            $table->integer('idLocal')->unsigned();
            $table->foreign('idServico')->references('idServico')->on('servicos');
            $table->foreign('idTipo_Requisicao')->references('idTipo_requisicao')->on('tipo__requisicao');
            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->foreign('idCidadao')->references('idCidadao')->on('cidadaos');
            $table->foreign('idLocal')->references('idLocal')->on('local');
            
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
        Schema::dropIfExists('solicitacao__servicos');
    }
}
