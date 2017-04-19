<?php

use App\Regioes;
use App\UFs;
use Illuminate\Database\Seeder;

class UFTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO verificar como recuperar o id como numérico
        $ufs = [
            ['sigla' => 'AC','descricao' => 'Acre','regioes_id' => Regioes::where('descricao', 'Norte')->first()->id],
            ['sigla' => 'AL','descricao' => 'Alagoas','regioes_id' => Regioes::where('descricao', 'Nordeste')->first()->id],
            ['sigla' => 'AM','descricao' => 'Amazonas','regioes_id' => Regioes::where('descricao', 'Norte')->first()->id],
            ['sigla' => 'AP','descricao' => 'Amapá','regioes_id' => Regioes::where('descricao', 'Norte')->first()->id],
            ['sigla' => 'BA','descricao' => 'Bahia','regioes_id' => Regioes::where('descricao', 'Nordeste')->first()->id],
            ['sigla' => 'CE','descricao' => 'Ceará','regioes_id' => Regioes::where('descricao', 'Nordeste')->first()->id],
            ['sigla' => 'DF','descricao' => 'Distrito Federal','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'ES','descricao' => 'Espírito Santo','regioes_id' => Regioes::where('descricao', 'Sudeste')->first()->id],
            ['sigla' => 'GO','descricao' => 'Goiás','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MA','descricao' => 'Maranhão','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MG','descricao' => 'Minas Gerais','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MS','descricao' => 'Mato Grosso do Sul','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MT','descricao' => 'Mato Grosso','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PA','descricao' => 'Pará','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PB','descricao' => 'Paraíba','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PE','descricao' => 'Pernambuco','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PI','descricao' => 'Piauí','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PR','descricao' => 'Paraná','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RJ','descricao' => 'Rio de Janeiro','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RN','descricao' => 'Rio Grande do Norte','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RO','descricao' => 'Rondônia','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RR','descricao' => 'Roraima','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RS','descricao' => 'Rio Grande do Sul','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'SC','descricao' => 'Santa Catarina','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'SE','descricao' => 'Sergipe','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'SP','descricao' => 'São Paulo','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'TO','descricao' => 'Tocantins','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
        ];

        foreach ($ufs as $uf) {
            ufs::create([
                'sigla' => $uf['sigla'],
                'descricao' => $uf['descricao'],
                'regioes_id' => $uf['regioes_id'],
            ]);
        }
    }
}
