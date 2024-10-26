<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 登録するレコードの準備
        $categories = [
            [ 'title' => '廊下掃除' ],
            [ 'title' => '台所掃除' ],
            [ 'title' => 'トイレ掃除' ],
        ];

        // 登録処理
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
