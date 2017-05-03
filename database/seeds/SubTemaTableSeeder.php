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
            ['descricao' => 'Analfabetismo', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Conscientização ambiental', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Conscientização política', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Cursos preparatórios para o vestibular', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Cursos profissionalizantes', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Defasagem escolar', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Desenvolvimento cognitivo e lingüístico', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Educação no trânsito', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Educação sexual', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Evasão escolar', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Exploração infantil', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Exploração sexual', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Inclusão cultural e artística na grade curricular (teatro, dança, música, entre outras)', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Inclusão digital', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Inclusão social do portador de necessidades especiais', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Inclusão social do portador de necessidades especiais', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Interação escola, família e comunidade', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Melhoria da qualidade de ensino', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Multi-repetência', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Oficinas de arte', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Orientação social', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Promoção da leitura', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Reciclagem de professores', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Resgate/preservação de culturas', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Utilização da mídia no ensino', 'tema_id' => Temas::where('nome','Educação')->first()->id ],
            ['descricao' => 'Acesso e distribuição de energia', 'tema_id' => Temas::where('nome','Energia')->first()->id ],
            ['descricao' => 'Economia de energia', 'tema_id' => Temas::where('nome','Energia')->first()->id ],
            ['descricao' => 'Fontes alternativas', 'tema_id' => Temas::where('nome','Energia')->first()->id ],
            ['descricao' => 'Fontes renováveis', 'tema_id' => Temas::where('nome','Energia')->first()->id ],
            ['descricao' => 'Geração de energia', 'tema_id' => Temas::where('nome','Energia')->first()->id ],
            ['descricao' => 'Desenvolvimento de sistemas construtivos', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Habitações populares', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Prevenção contra deslizamentos', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Utilização de produtos alternativos', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Utilização de produtos recicláveis', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Biodesenvolvimento', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Coleta seletiva', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Controle ambiental', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Despoluição ambiental', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Formação de agentes ambientais', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Preservação dos recursos naturais e ambientais', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Reciclagem', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Recuperação do solo', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Reflorestamento', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Resíduos sólidos', 'tema_id' => Temas::where('nome','Habitação')->first()->id ],
            ['descricao' => 'Gestão de água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Abastecimento de água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Armazenamento de água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Bombeamento de água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Captação de água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Dessalinização', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Distribuição', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Irrigação', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Racionalização do uso da água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Saneamento', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Tratamento e purificação da água', 'tema_id' => Temas::where('nome','Recursos Hídricos')->first()->id ],
            ['descricao' => 'Agronegócio', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Artesanato', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Aumento da renda familiar', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Comercialização de produtos', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Cooperativismo', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Desenvolvimento sustentável', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Geração de trabalho e renda', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Inclusão do deficiente físico no mercado de trabalho', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Microcrédito', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Qualificação ou capacitação profissional', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Reciclagem de lixo', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Turismo', 'tema_id' => Temas::where('nome','Renda')->first()->id ],
            ['descricao' => 'Acuidade visual', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Combate à violência (doméstica, infantil, social etc.)', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Controle de natalidade', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Dependência química', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Desnutrição', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças cardíacas', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças congênitas', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças contagiosas', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças hidrotransmissíveis', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças hospitalares', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças infecciosas', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças oncológicas', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Doenças sexualmente transmissíveis', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Fitoterapia', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Homeopatia', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Medicina alternativa', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Mortalidade infantil', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Mortalidade neonatal', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Recuperação (física ou psicológica) de mulheres violentadas', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Saúde bucal', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Trabalho com gestantes', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
            ['descricao' => 'Zoonoses (doenças transmitidas por animais)', 'tema_id' => Temas::where('nome','Saúde')->first()->id ],
        ];

        foreach ($subTemas as $subTema) {
            SubTemas::create([
                'descricao' => $subTema['descricao'],
                'tema_id' => $subTema['tema_id'],
            ]);
        }
    }
}
