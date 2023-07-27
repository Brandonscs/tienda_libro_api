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
                'name' => 'Realismo Mágico',
                'description' => 'Un género literario que combina elementos mágicos o fantásticos con una representación detallada y realista del mundo cotidiano.'
            ],
            [
                'name' => 'Ciencia Ficción',
                'description' => 'Narrativas que exploran conceptos científicos y tecnológicos imaginarios o futuristas, así como sus impactos en la sociedad y la humanidad.'
            ],
            [
                'name' => 'Terror',
                'description' => 'Género que busca provocar miedo o suspense en el lector, a menudo mediante elementos sobrenaturales, monstruos o situaciones inquietantes.'
            ],
            [
                'name' => 'Humor',
                'description' => 'Obras que buscan entretener y hacer reír al lector mediante situaciones cómicas, sátira y elementos humorísticos.'
            ],
            [
                'name' => 'Historia',
                'description' => 'Relatos basados en hechos reales y acontecimientos históricos, narrados con un enfoque en la precisión y la veracidad histórica.'
            ],
            [
                'name' => 'Fantasía',
                'description' => 'Género que presenta mundos imaginarios, criaturas mágicas y eventos sobrenaturales, desafiando las leyes de la realidad.'
            ],
            [
                'name' => 'Suspense',
                'description' => 'Narrativas que mantienen al lector en tensión y expectante, con giros inesperados y situaciones emocionantes que mantienen el interés hasta el final.'
            ]                                                                                    
        ];

        DB::table('literary_genres')->insert($literary_genres);
    }
}
