<?php

use App\Temas;
use Illuminate\Database\Seeder;

class TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temas = [
        'Alimentação	',
        'Educação',
        'Energia',
        'Habitação',
        'Meio ambiente',
        'Recursos Hídricos',
        'Renda',
        'Saúde',
        ];

        foreach ($temas as $tema) {
            Temas::create([
                'nome' => $tema
            ]);
        }
    }
}
