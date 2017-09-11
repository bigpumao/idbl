<?php

use Illuminate\Database\Seeder;
use App\Model\Categoria\Categoria;
class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(
            [
                'categoria' =>  'Artigos',
            ]
        );
        Categoria::create(
            [
                'categoria' =>  'Vídeos',
            ]
        );
        Categoria::create(
            [
                'categoria' =>  'Eventos',
            ]
        );
        Categoria::create(
            [
                'categoria' =>  'Sound Cloud',
            ]
        );
        Categoria::create(
            [
                'categoria' =>  'Albuns',
            ]
        );
    }
}
