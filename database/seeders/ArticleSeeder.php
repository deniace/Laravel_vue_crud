<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert dump
        Article::create([
            "title" => "Mencari Cinta Sejati",
            "content" => "Buku tentang mencari cinta sejati",
        ]);
        Article::create([
            "title" => "Wiro Sableng",
            "content" => "novel wiro sableng",
        ]);
    }
}
