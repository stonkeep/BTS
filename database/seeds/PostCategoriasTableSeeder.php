<?php

use App\PostCategoria;
use Illuminate\Database\Seeder;

class PostCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategoria::create([
            'descricao' => 'Notícias'
        ]);
        PostCategoria::create([
            'descricao' => 'Paginas Internas'
        ]);

    }
}
