<?php

use App\Instituicao;
use App\Tecnologia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TecnologiaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Instituicao::class)->create();
        $tecnologia = factory(Tecnologia::class)->create();
        $tecnologia->publicos()->attach(1);
        $tecnologia->publicos()->attach(2);

        $tecnologia->subtemas()->attach(1);
        $tecnologia->subtemas()->attach(2);
        $tecnologia->subtemas()->attach(8);
        $tecnologia->subtemas()->attach(10);

        //Cria responsaveis
        $responsaveis = [];
        $responsaveis[] = [
            [
                'nome'     => 'João Carlos',
                'telefone' => '3131313131',
                'email'    => 'joao@algumlugar.com.br',
            ],
            [
                'nome'     => 'Eduardo',
                'telefone' => '999999',
                'email'    => 'Eduardo@algumlugar.com.br',
            ]
        ];
        foreach ($responsaveis[0] as $responsavel) {
            $tecnologia->responsaveis()->create($responsavel);//TODO tratamento de erro
        }


        //cria locais
        $locais = [
            [
                'ativo'           => true,
                'uf'              => 'DF',
                'cidade'          => 'Brasília',
                'bairro'          => 'Asa Norte',
                'dataImplantacao' => Carbon::today()->format('Y-m-d'),
            ],
            [
                'ativo'           => true,
                'uf'              => 'GO',
                'cidade'          => 'Taguatinga',
                'bairro'          => 'Asa Norte',
                'dataImplantacao' => Carbon::today()->format('Y-m-d'),
            ],
        ];

        foreach ($locais as $local) {
            $tecnologia->locais()->create($local);
        }

        $instituicoesParceiras = [
            [
                'nome'          => 'Universidade Federal',
                'atuacao'       => ' A parceria acontece desde 2004, com o Centro de Estudos em Segurança Pública e Direitos Humanos. Esta entidade, por meio de seu responsável, Prof. Dr. Pedro Rodolfo Bodê de Moraes apoia os trabalhos de intervenção realizados. Além de compartilhar conhecimentos, é por intermédio desta parceria que os cursos ofertados aos educadores de suas escolas parceiras são chancelados como cursos de extensão da UFPR e seus participantes são devidamente certificados.',
                'tecnologia_id' => 1,
            ],
            [
                'nome'          => 'Universidade Estadual',
                'atuacao'       => ' A parceria acontece desde 2004, com o Centro de Estudos em Segurança Pública e Direitos Humanos. Esta entidade, por meio de seu responsável, Prof. Dr. Pedro Rodolfo Bodê de Moraes apoia os trabalhos de intervenção realizados. Além de compartilhar conhecimentos, é por intermédio desta parceria que os cursos ofertados aos educadores de suas escolas parceiras são chancelados como cursos de extensão da UFPR e seus participantes são devidamente certificados.',
                'tecnologia_id' => 1,
            ]
        ];

        foreach ($instituicoesParceiras as $instituicao) {
            $tecnologia->instituicoesParceiras()->create($instituicao);
        }
        
        $enderecosEletronicos = [
            [
                'tecnologia_id' => 1,
                'link'          => 'www.google.com.br',
            ],
            [
                'tecnologia_id' => 1,
                'link'          => 'www.fbb.com.br',
            ],
        ];

        foreach ($enderecosEletronicos as $enderecosEletronico) {
            $tecnologia->enderecosEletronico()->create($enderecosEletronico);
        }
        
        
    }
}
