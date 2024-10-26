<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seeker;
use App\Models\Category;

class SeekersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // ファクトリで生成されるタイトルを上書きする
            Category::factory()->create(['title' => '廊下掃除']),
            Category::factory()->create(['title' => '台所掃除']),
            Category::factory()->create(['title' => 'トイレ掃除']),
        ];

        foreach ($categories as $category) {
            // カテゴリ1件につき、2件の仕事を登録する
            // ファクトリで生成されるカテゴリIDを上書きする
            Seeker::factory(2)
                ->create(['category_id' => $category->id]);
        }
    }
}
