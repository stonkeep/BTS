<?php

use App\PublicosAlvo;
use Illuminate\Database\Seeder;

class PublicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicos = [
            'Afrodescendentes',
            'Povos Tradicionais',
            'Outro (Especificar no campo Solução Adotada)',
            'Mulheres',
            'Criadores bovinos',
            'População em situação de rua',
            'Enfermos',
            'Jovens',
            'Surdos',
            'Agricultores Familiares',
            'Professores do Ensino Médio',
            'Professores do Ensino Superior',
            'Profissionais de Saúde',
            'Trabalhadores Autônomos',
            'Trabalhadores Rurais',
            'População Ribeirinha',
            'População Carcerária',
            'Turistas',
            'Seringueiros',
            'Recém-nascidos',
            'Quilombolas',
            'Profissionais do Sexo',
            'Professores do ensino fundamental',
            'Professores do ensino básico',
            'Produtores rurais - Pequenos',
            'Produtores rurais - Médios',
            'Produtores rurais - Grandes',
            'Povos indígenas',
            'Portadores de deficiência',
            'População em geral',
            'Pescadores',
            'Organização não Governamental',
            'Operários da Construção civil',
            'Médicos',
            'Lideranças Comunitárias',
            'Jornalistas',
            'Idosos',
            'Gestores Públicos',
            'Gestantes',
            'Famílias de baixa renda',
            'Empreendedores',
            'Diretor de escola',
            'Desempregados',
            'Crianças',
            'Catadores de material reciclável',
            'Caminhoneiros',
            'Avicultores',
            'Assentados rurais',
            'Artesãos',
            'Analfabetos',
            'Alunos do ensino superior',
            'Alunos do ensino médio',
            'Alunos do ensino fundamental',
            'Alunos do ensino básico',
            'Agricultores',
            'Adulto',
            'Adolescentes'
        ];

        foreach ($publicos as $publico) {
            PublicosAlvo::create([
                'descricao' => $publico,
            ]);
        }
    }
}
