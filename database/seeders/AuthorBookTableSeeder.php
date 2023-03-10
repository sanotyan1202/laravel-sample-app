<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;


class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();
        $authors = Author::all();

        foreach ($books as $book) {
            $atuhorIds = $authors
                ->random(2)     // 2件著者をランダムに抽出
                ->pluck('id')   // 著者モデルからIDのみを抽出する
                ->all();  

            // 書籍にランダムに抜き出した2件の著者のID配列を関連づける
            $book->authors()->attach($atuhorIds);
        }
    }
}
