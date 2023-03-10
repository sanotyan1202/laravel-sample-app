<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // ファクトリで生成されるタイトルを上書きする
            Category::factory()->create(['title' => 'programming']),
            Category::factory()->create(['title' => 'design']),
            Category::factory()->create(['title' => 'management']),
        ];

        foreach ($categories as $category) {
            // カテゴリ1件につき、2件の書籍を登録する
            // ファクトリで生成されるカテゴリIDを上書きする
            Book::factory(2)
                ->create(['category_id' => $category->id]);
        }
    }
}
