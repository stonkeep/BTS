<?php

use App\Cargos;
use Illuminate\Database\Seeder;

class CargosTableSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            'Técnico',
            'Vice - Presidente',
            'Vice - Diretor Executivo',
            'Superintendente Regional',
            'Superintendente Executivo',
            'Superintendente',
            'Sócio(a) Diretor(a)',
            'Secretário(a)',
            'Reitor(a)',
            'Pró - Reitor',
            'Presidente',
            'Prefeito(a)',
            'Pesquisador(a)',
            'Gerente',
            'Diretor(a) Administrativo(a)',
            'Diretor(a) Presidente',
            'Diretor(a) Geral',
            'Diretor(a) Executivo(a)',
            'Diretor(a)',
            'Consultor(a)',
            'Chefe de Departamento',
            'Chefe de Divisão',
            'Coordenador(a)',
            'Chefe Geral',
            'Assessor(a)',
            'Assistente Social',
        ];
        foreach ($cargos as $cargo) {
            Cargos::create([
                'descricao' => $cargo,
            ]);
        }
    }
}
