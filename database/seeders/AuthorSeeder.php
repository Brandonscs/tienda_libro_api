<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Carl Sagan',
                'nationality' => 'Estadounidense',
                'biography' => 'Fue un astrónomo, astrofísico, cosmólogo, astrobiólogo, escritor y principalmente un reconocido divulgador científico estadounidense. Inicialmente fue profesor asociado de la Universidad de Harvard y posteriormente profesor principal de la Universidad de Cornell.'
            ],
            [
                'name' => 'Jorge Bucay',
                'nationality' => 'Argentino',
                'biography' => 'Jorge Bucay es un médico, psicodramaturgo, terapeuta gestáltico y escritor argentino. Nació en el barrio porteño de Floresta.'
            ],
            [
                'name' => 'Robert Fisher',
                'nationality' => 'Estadounidense',
                'biography' => 'Robert Fisher, conocido en el medio del espectáculo como Bob Fisher, fue un autor estadounidense de origen judío, autor de guiones de comedia en el cine, de obras de teatro, musicales y de libros de motivación y autoayuda.'
            ],
            [
                'name' => 'Joanne Kathleen Rowling',
                'nationality' => 'Britanica',
                'biography' => 'Joanne Rowling, quien escribe bajo los seudónimos de J. K. Rowlingy Robert Galbraith, es una escritora, productora de cine y guionista británica, conocida por ser la autora de la serie de libros Harry Potter, que han superado los quinientos millones de ejemplares vendidos.​'
            ],
            [
                'name' => 'Ana Frank',
                'nationality' => 'Alemana',
                'biography' => 'Annelies Marie Frank, conocida en español como Ana Frank, fue una niña alemana de ascendencia judía, mundialmente conocida gracias al Diario de Ana Frank, la edición de su diario íntimo en donde dejó constancia de los casi dos años y medio que pasó ocultándose de los nazis en Ámsterdam, con su familia y cuatro personas más, durante la Segunda Guerra Mundial.'
            ],
        ];

        DB::table('authors')->insert($authors);
    }
}
