<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'descricao' => 'Água e/ou Meio Âmbiente',
        ]);

        Categoria::create([
            'descricao' => 'Agroecologia',
        ]);

        Categoria::create([
            'descricao' => 'Economia Solidária',
        ]);

        Categoria::create([
            'descricao' => 'Educação',
        ]);

        Categoria::create([
            'descricao' => 'Saúde e Bem Estar',
        ]);

        Categoria::create([
            'descricao' => 'Cidades Sustentáveis e/ou Inivação Digital',
        ]);


    }
}
