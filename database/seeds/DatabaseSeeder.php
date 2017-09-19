<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Cidadao;
use App\Tipo_Usuario;
use App\User;
use App\Tipo_Requisicao;
use App\Local;
use App\Secretaria;
use App\Servico;
use App\Solicitacao_Servico;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(TipoUsuarioTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(TipoRequisicaoTableSeeder::class);
        $this->call(LocalTableSeeder::class);
        $this->call(SecretariaTableSeeder::class);
        $this->call(ServicoTableSeeder::class);
        $this->call(Solicitacao_ServicoTableSeeder::class);
    }

}

class TipoUsuarioTableSeeder extends Seeder {

    public function run() {

        Tipo_Usuario::create(['descricao' => 'Cidadao', 'nivel_usuario' => '1']);
        Tipo_Usuario::create(['descricao' => 'Gestor', 'nivel_usuario' => '2']);
        Tipo_Usuario::create(['descricao' => 'Ouvidor', 'nivel_usuario' => '3']);
        Tipo_Usuario::create(['descricao' => 'Prefeito', 'nivel_usuario' => '4']);
        Tipo_Usuario::create(['descricao' => 'Administrador', 'nivel_usuario' => '5']);
    }

}

class UsuarioTableSeeder extends Seeder {

    public function run() {
        $u = '123456';
        $u = md5($u);

        User::create(['nome' => 'Eduardo', 'sexo' => 'Masculino', 'tel_fixo' => '(15)99865-3333', 'tel_cel' => '(15)998754789', 'cep' => '654231789', 'rua' => 'onze de agosto', 'numero' => '555', 'bairro' => 'Centro', 'cidade' => 'Tatui', 'email' => 'edua@hotmail.com', 'password' => "{$u}", 'idCidadao' => '1', 'idTipo_usuario' => '1']);
    }

}

class TipoRequisicaoTableSeeder extends Seeder {

    public function run() {
        Tipo_Requisicao::create(['descricao' => 'Serviço']);
        Tipo_Requisicao::create(['descricao' => 'Denúncia']);
    }

}

class LocalTableSeeder extends Seeder {

    public function run() {
        Local::create(['cep' => '18275490', 'rua' => 'Jorge Sallum', 'num' => '421', 'cidade' => 'Tatui', 'lat' => '5665', 'lnt' => '545']);
    }

}

class SecretariaTableSeeder extends Seeder {

    public function run() {
        Secretaria::create(['descricao' => 'Educacao']);
        Secretaria::create(['descricao' => 'Esporte']);
        Secretaria::create(['descricao' => 'Fazenda']);
        Secretaria::create(['descricao' => 'Obras']);
        Secretaria::create(['descricao' => 'Saúde']);
    }

}

class ServicoTableSeeder extends Seeder {

    public function run() {
        Servico::create(['descricao' => 'Buraco na via publica', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Buraco na via publica', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Limpeza Urbana', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Poda de árvores', 'idSecretaria' => '4']);
    }

}

class Solicitacao_ServicoTableSeeder extends Seeder {

    public function run() {
        Solicitacao_Servico::create(['protocolo' => '4564/17', 'anexos' => 'C:\Program', 'status_servicos' => '1', 'observacao' => 'Buraco perigoso, com riscos de acidente', 'idServico' => '1', 'idTipo_requisicao' => '1', 'idUsuario' => '1', 'idCidadao' => '1', 'idLocal' => '1']);
    }

}


