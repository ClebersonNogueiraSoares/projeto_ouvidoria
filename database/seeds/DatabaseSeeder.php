<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
      //  $this->call(UsuarioTableSeeder::class);
        $this->call(TipoRequisicaoTableSeeder::class);
        //$this->call(LocalTableSeeder::class);
        $this->call(SecretariaTableSeeder::class);
        $this->call(ServicoTableSeeder::class);
        //$this->call(Solicitacao_ServicoTableSeeder::class);
    }

}

class TipoUsuarioTableSeeder extends Seeder {

    public function run() {

        Tipo_Usuario::create(['descricao' => 'Cidadao', 'nivel_usuario' => '1']);
        Tipo_Usuario::create(['descricao' => 'Gestor', 'nivel_usuario' => '2']);
        Tipo_Usuario::create(['descricao' => 'Ouvidor', 'nivel_usuario' => '3']);
        Tipo_Usuario::create(['descricao' => 'Prefeito', 'nivel_usuario' => '4']);
        Tipo_Usuario::create(['descricao' => 'Administrador', 'nivel_usuario' => '5']);
        Tipo_Usuario::create(['descricao' => 'Anônimo', 'nivel_usuario' => '6']);
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
        Local::create(['cep' => '18275490', 'rua' => 'Jorge Sallum', 'num' => '421', 'cidade' => 'Tatui', 'lat' => '5665', 'lnt' => '545','descricao_local'=>'em frente a linha do trem']);
    }

}

class SecretariaTableSeeder extends Seeder {

    public function run() {
        Secretaria::create(['descricao' => 'Educacao']);
        Secretaria::create(['descricao' => 'Fiscalização']);
        Secretaria::create(['descricao' => 'Meio ambiente']);
        Secretaria::create(['descricao' => 'Obras']);
        Secretaria::create(['descricao' => 'Saúde']);
        Secretaria::create(['descricao' => 'Segurança']);
        Secretaria::create(['descricao' => 'Trânsito e vias']);
    }

}

class ServicoTableSeeder extends Seeder {

    public function run() {
        Servico::create(['descricao' => 'Falta de vaga', 'idSecretaria' => '1']);
        Servico::create(['descricao' => 'Merenda', 'idSecretaria' => '1']);
        Servico::create(['descricao' => 'Professores', 'idSecretaria' => '1']);
        Servico::create(['descricao' => 'Transporte escolar', 'idSecretaria' => '1']);
        Servico::create(['descricao' => 'Transferëncia', 'idSecretaria' => '1']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '1']);
        Servico::create(['descricao' => 'Condições sanitárias irregulares', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Estabelecimento com acessibilidade irregular', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Estabelecimento sem alvará', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Estabelecimento sem nota fiscal', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Ocupação irregular de área pública', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Construção irregular', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '2']);
        Servico::create(['descricao' => 'Aterro sanitário irregular', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Caça predatória', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Desmatamento irregular', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Maus tratos a animais', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Poda ou retirada de árvores', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Despejo de esgoto ou lixo no rio', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '3']);
        Servico::create(['descricao' => 'Buraco na via pública', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Manutenção de praças', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Demora na execução de obra pública', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Bueiro/Boca de lobo/Galerias', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Ponto de alagamento', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Vala aberta', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Poda de árvores', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Coleta de lixo', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Coleta seletiva', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Entulho em via pública', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Limpeza em terreno baldio', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Limpeza Urbana', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Mato alto', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Pontes', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '4']);
        Servico::create(['descricao' => 'Demora em marcar consulta ou atendimento', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Falta de materiais em posto de saúde', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Falta de medicação', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Foco da dengue', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Infestação, proliferação de animais ou pragas', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Médicos', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Posto de saúde', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Transporte para tratamento', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Vacinas', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '5']);
        Servico::create(['descricao' => 'Baderna ou pertubação da ordem pública', 'idSecretaria' => '6']);
        Servico::create(['descricao' => 'Ponto de assalto/Roubo', 'idSecretaria' => '6']);
        Servico::create(['descricao' => 'Ponto de prostituição', 'idSecretaria' => '6']);
        Servico::create(['descricao' => 'Ponto de tráfico de drogas', 'idSecretaria' => '6']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '6']);
        Servico::create(['descricao' => 'Rampa de acessibilidade', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Bloqueio na via', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Faixa de pedestre', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Lombadas', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Placas de sinalização', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Mudanças no trânsito', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Redutor de velocidade', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Semáforo', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Falta de sinalização na via ou sinalização precária', 'idSecretaria' => '7']);
        Servico::create(['descricao' => 'Outros', 'idSecretaria' => '7']);
    }
}    
class Solicitacao_ServicoTableSeeder extends Seeder {

    public function run() {
        Solicitacao_Servico::create(['protocolo' => '4564/17', 'anexos' => 'C:\Program', 'status_servicos' => '1', 'observacao' => 'Buraco perigoso, com riscos de acidente', 'idServico' => '1', 'idTipo_requisicao' => '1', 'idUsuario' => '1', 'idCidadao' => '1', 'idLocal' => '1']);
    }

}
