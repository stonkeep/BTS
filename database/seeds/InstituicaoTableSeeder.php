<?php

use App\Instituicao;
use Illuminate\Database\Seeder;

class InstituicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instituicao::create([
            'CNPJ' => 16286169000190,
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 1,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargo_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ]);
    }
}
