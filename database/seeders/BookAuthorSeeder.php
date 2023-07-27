<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books_authors = [
            [
                'author_id' => 1,
                'book_id' => 1,
            ],
            [
                'author_id' => 2,
                'book_id' => 2,
            ],
            [
                'author_id' => 3,
                'book_id' => 3,
            ],
            [
                'author_id' => 4,
                'book_id' => 4,
            ],
            [
                'author_id' => 5,
                'book_id' => 5,
            ],
            [
                'author_id' => 1,
                'book_id' => 6,
            ],
            [
                'author_id' => 2,
                'book_id' => 7,
            ],
            [
                'author_id' => 3,
                'book_id' => 8,
            ],
            [
                'author_id' => 4,
                'book_id' => 9,
            ],
            [
                'author_id' => 5,
                'book_id' => 10,
            ],
            [
                'author_id' => 1,
                'book_id' => 11,
            ],
            [
                'author_id' => 2,
                'book_id' => 12,
            ],
            [
                'author_id' => 3,
                'book_id' => 13,
            ],
            [
                'author_id' => 4,
                'book_id' => 14,
            ],
            [
                'author_id' => 5,
                'book_id' => 15,
            ],
            [
                'author_id' => 1,
                'book_id' => 16,
            ],
            [
                'author_id' => 2,
                'book_id' => 17,
            ],
            [
                'author_id' => 3,
                'book_id' => 18,
            ],
            [
                'author_id' => 4,
                'book_id' => 19,
            ],
            [
                'author_id' => 5,
                'book_id' => 20,
            ],
            [
                'author_id' => 1,
                'book_id' => 21,
            ],
            [
                'author_id' => 2,
                'book_id' => 22,
            ],
            [
                'author_id' => 3,
                'book_id' => 23,
            ],
            [
                'author_id' => 4,
                'book_id' => 24,
            ],
            [
                'author_id' => 5,
                'book_id' => 25,
            ],
            [
                'author_id' => 1,
                'book_id' => 26,
            ],
            [
                'author_id' => 2,
                'book_id' => 27,
            ],
            [
                'author_id' => 3,
                'book_id' => 28,
            ],
            [
                'author_id' => 4,
                'book_id' => 29,
            ],
            [
                'author_id' => 5,
                'book_id' => 30,
            ],
            [
                'author_id' => 1,
                'book_id' => 31,
            ],
            [
                'author_id' => 2,
                'book_id' => 32,
            ]
        ];

        DB::table('books_authors')->insert($books_authors);
    }
}
