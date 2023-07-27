<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookLiteraryGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books_literary_genres = [
            [
                'literary_genre_id' => 1,
                'book_id' => 1
            ],
            [
                'literary_genre_id' => 2,
                'book_id' => 2
            ],
            [
                'literary_genre_id' => 3,
                'book_id' => 3
            ],
            [
                'literary_genre_id' => 4,
                'book_id' => 4
            ],
            [
                'literary_genre_id' => 5,
                'book_id' => 5
            ],
            [
                'literary_genre_id' => 6,
                'book_id' => 6
            ],
            [
                'literary_genre_id' => 7,
                'book_id' => 7
            ],
            [
                'literary_genre_id' => 1,
                'book_id' => 8
            ],
            [
                'literary_genre_id' => 2,
                'book_id' => 9
            ],
            [
                'literary_genre_id' => 3,
                'book_id' => 10
            ],
            [
                'literary_genre_id' => 4,
                'book_id' => 11
            ],
            [
                'literary_genre_id' => 5,
                'book_id' => 12
            ],
            [
                'literary_genre_id' => 6,
                'book_id' => 13
            ],
            [
                'literary_genre_id' => 7,
                'book_id' => 14
            ],
            [
                'literary_genre_id' => 1,
                'book_id' => 15
            ],
            [
                'literary_genre_id' => 2,
                'book_id' => 16
            ],
            [
                'literary_genre_id' => 3,
                'book_id' => 17
            ],
            [
                'literary_genre_id' => 4,
                'book_id' => 18
            ],
            [
                'literary_genre_id' => 5,
                'book_id' => 19
            ],
            [
                'literary_genre_id' => 6,
                'book_id' => 20
            ],
            [
                'literary_genre_id' => 7,
                'book_id' => 21
            ],
            [
                'literary_genre_id' => 1,
                'book_id' => 22
            ],
            [
                'literary_genre_id' => 2,
                'book_id' => 23
            ],
            [
                'literary_genre_id' => 3,
                'book_id' => 24
            ],
            [
                'literary_genre_id' => 4,
                'book_id' => 25
            ],
            [
                'literary_genre_id' => 5,
                'book_id' => 26
            ],
            [
                'literary_genre_id' => 6,
                'book_id' => 27
            ],
            [
                'literary_genre_id' => 7,
                'book_id' => 28,
            ],
            [
                'literary_genre_id' => 1,
                'book_id' => 29
            ],
            [
                'literary_genre_id' => 2,
                'book_id' => 30
            ],
            [
                'literary_genre_id' => 3,
                'book_id' => 31
            ],
            [
                'literary_genre_id' => 4,
                'book_id' => 32
            ]
        ];

        DB::table('books_literary_genres')->insert($books_literary_genres);
    }
}
