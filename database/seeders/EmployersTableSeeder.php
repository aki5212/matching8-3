<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployerDetail;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ファクトリによって5件の求人情報を作成
        //Employer::factory(5)->create();
        // ファクトリによって5件の求人詳細情報を作成
        // 合わせて著者情報も5件作成される
        EmployerDetail::factory(5)->create();
    }
}
