<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LiteraryGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $literary_genres = [
            [
                'name' => 'Novela',
                'description' => 'Una obra de ficción narrativa de extensión variable, generalmente en prosa, que presenta una trama y desarrollo de personajes complejo.'
            ],
            [
                'name' => 'Poesía',
                'description' => 'Expresión artística que utiliza recursos estilísticos y métricos para transmitir emociones, pensamientos o ideas en forma de versos.'
            ],
            [
                'name' => 'Drama',
                'description' => 'Una obra teatral que representa conflictos y emociones de personajes a través de diálogos y acciones.'
            ],
            [
                'name' => 'Ciencia ficción',
                'description' => 'Narrativa especulativa que se basa en conceptos científicos reales o imaginarios, explorando mundos y situaciones futuristas o alternativas.'
            ],
            [
                'name' => 'Misterio',
                'description' => 'Historias intrigantes en las que un evento o crimen debe ser resuelto por el protagonista o protagonistas.'
            ],
            [
                'name' => 'Fantasía',
                'description' => 'Ambientada en un mundo imaginario con elementos sobrenaturales, criaturas mágicas y aventuras épicas.'
            ],
            [
                'name' => 'Ensayo',
                'description' => 'Un escrito que presenta la opinión o punto de vista del autor sobre un tema específico, argumentando sus ideas con razonamientos y evidencias.'
            ]
        ];

        DB::table('literary_genres')->insert($literary_genres);
    }
}
