<?php

namespace Database\Seeders;
use BaoPham\DynamoDb\Facades\DynamoDb;
use Ramsey\Uuid\Uuid;
use App\Models\Book;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'title' => 'The Grapes of Wrath',
                'author_name' => 'John Steinbeck',
                'cover_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1375670575l/18114322.jpg' 
            ],
            [
                'title' => 'Love in the Time of Cholera',
                'author_name' => 'Gabriel Garcia Marquez',
                'cover_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1348243057l/9714.jpg' 
            ],
            [
                'title' => 'The Post-American World',
                'author_name' => 'Fareed Zakaria',
                'cover_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1347716469l/2120783.jpg' 
            ],
            [
                'title' => 'Leonardo da Vinci',
                'author_name' => 'Walter Isaacson',
                'cover_url' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1523543570l/34684622._SY475_.jpg' 
            ],
        ];

        foreach ($records as $record) {
            $record['id'] = Uuid::uuid4()->toString();
            $book = Book::create($record);
            $book->save();
        }
    }
}
