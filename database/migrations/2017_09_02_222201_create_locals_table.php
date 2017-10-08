<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('local', function (Blueprint $table) {
            $table->increments('idLocal');
            $table->string('cep', 45);
            $table->string('rua', 45);
            $table->string('num', 10);
            $table->string('cidade', 45);
            $table->string('descricao_local', 45);
            $table->float('lat', 10, 6);
            $table->float('lnt', 10, 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('locals');
    }

}
