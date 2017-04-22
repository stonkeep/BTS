<?php

use App\SubTemas;
use App\Temas;
use Illuminate\Database\Seeder;

class SubTemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subTemas = [
            ['descricao' => 'Alimentação Escolar', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
            ['descricao' => 'Higienização dos Alimentos', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
            ['descricao' => 'Produção de Alimentos', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
            ['descricao' => 'Produção organica', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
            ['descricao' => 'Reaproveitamento Alimentar', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
            ['descricao' => 'Redução de uso de agrotóxicos', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
            ['descricao' => 'Segurança Alimentar', 'tema_id' => Temas::where('nome','Alimentação')->first()->id ],
        ];

        foreach ($subTemas as $subTema) {
            SubTemas::create([
                'descricao' => $subTema['descricao'],
                'tema_id' => $subTema['tema_id'],
            ]);
        }
    }
}
