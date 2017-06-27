<?php

use App\Instituicao;
use App\Tecnologia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TecnologiaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= env('QTD_TEC_DESENV'); $i++) {
//        factory(Instituicao::class)->create();
            $tecnologia = factory(Tecnologia::class)->create();
            $tecnologia->instituicao_id = rand(1, 10);
            $tecnologia->numeroInscricao = $tecnologia->numeroInscricao . $tecnologia->id;
            $tecnologia->publicos()->attach(rand(1, 5));
            $tecnologia->publicos()->attach(rand(1, 5));

            $tecnologia->subtemas()->attach(rand(1, 5));
            $tecnologia->subtemas()->attach(rand(1, 5));
            $tecnologia->subtemas()->attach(rand(8, 32));
            $tecnologia->subtemas()->attach(rand(8, 32));

            //Cria responsaveis
            $responsaveis = [];
            $responsaveis[] = [
                [
                    'nome'     => $faker->name,
                    'telefone' => $faker->randomNumber(9),
                    'email'    => $faker->email,
                ],
                [
                    'nome'     => $faker->name,
                    'telefone' => $faker->randomNumber(9),
                    'email'    => $faker->email,
                ]
            ];
            foreach ($responsaveis[0] as $responsavel) {
                $tecnologia->responsaveis()->create($responsavel);//TODO tratamento de erro
            }

            //cria locais
            $locais = [
                [
                    'ativo'           => $faker->boolean,
                    'uf'              => 'GO',
                    'cidade'          => $faker->city,
                    'bairro'          => $faker->streetName,
                    'dataImplantacao' => Carbon::today()->format('Y-m-d'),
                ],
                [
                    'ativo'           => $faker->boolean,
                    'uf'              => 'DF',
                    'cidade'          => $faker->city,
                    'bairro'          => $faker->streetName,
                    'dataImplantacao' => Carbon::today()->format('Y-m-d'),
                ],
            ];

            foreach ($locais as $local) {
                $tecnologia->locais()->create($local);
            }

            $instituicoesParceiras = [
                [
                    'nome'          => $faker->company,
                    'atuacao'       => $faker->text,
                    'tecnologia_id' => $tecnologia->id,
                ],
                [
                    'nome'          => $faker->company,
                    'atuacao'       => $faker->text,
                    'tecnologia_id' => $tecnologia->id,
                ]
            ];

            foreach ($instituicoesParceiras as $instituicao) {
                $tecnologia->instituicoesParceiras()->create($instituicao);
            }

            $enderecosEletronicos = [
                [
                    'tecnologia_id' => $tecnologia->id,
                    'link'          => $faker->url,
                ],
                [
                    'tecnologia_id' => $tecnologia->id,
                    'link'          => $faker->url,
                ],
            ];

            foreach ($enderecosEletronicos as $enderecosEletronico) {
                $tecnologia->enderecosEletronico()->create($enderecosEletronico);
            }

        }
    }
}
