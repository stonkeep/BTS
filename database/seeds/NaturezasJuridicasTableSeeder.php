<?php

use App\NaturezasJuridicas;
use Illuminate\Database\Seeder;

class NaturezasJuridicasTableSeeder extends Seeder
{

    // se der erro nos seed tentar o commando
    // composer dump-autoload

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $naturezas = [
            'Empresário (Individual)',
            'Sociedade Anônima Aberta',
            'Fundação Privada Sem Fins Lucrativos',
            'Autarquia Estadual',
            'Autarquia Federal',
            'Fundação Federal',
            'Instituição Privada com Finalidade Lucrativa',
            'Serviço Social Autônomo',
            'Partido Político',
            'Órgão Público do Poder Legislativo Municipal',
            'Órgão Público do Poder Legislativo Federal',
            'Órgão Público do Poder Legislativo Estadual ou do Distrito Federal',
            'Órgão Público do Poder Judiciário Federal',
            'Órgão Público do Poder Judiciário Estadual',
            'Órgão Público do Poder Executivo Municipal',
            'Órgão Público do Poder Executivo Federal',
            'Órgão Público do Poder Executivo Estadual ou do Distrito Federal',
            'Órgão Público Autônomo Municipal',
            'Órgão Público Autônomo Estadual ou do Distrito Federal',
            'Órgão Público Autônomo da União',
            'Organização Social',
            'Organização Não-Governamental - ONG',
            'Organização da Sociedade Civil de Interesse Público - OSCIP',
            'Instituto de Tecnologia',
            'Instituto de Pesquisa',
            'Instituição Religiosa',
            'Instituição de Saúde',
            'Instituição de Ensino',
            'Grupo de Sociedades',
            'Fundação',
            'Estabelecimento, no Brasil, de Sociedade Estrangeira',
            'Estabelecimento, no Brasil, de Fundação ou Associação Estrangeiras',
            'Entidade Sindical',
            'Empresa Pública',
            'Cooperativa',
            'Consórcio de Sociedades',
            'Condomínio Edilício',
            'Autarquia',
            'Associação',
        ];
        foreach ($naturezas as $natureza) {
            NaturezasJuridicas::create([
                'descricao' => $natureza,
            ]);
        }
    }
}
