<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seeker;


class EmployerSeekerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seekers = Seeker::all();
        $employers = Employer::all();

        foreach ($seekers as $seeker) {
            $employerIds = $employers
                ->random(2)     // 2件求職をランダムに抽出
                ->pluck('id')   // 求職モデルからIDのみを抽出する
                ->all();

            // 求人にランダムに抜き出した2件の求職のID配列を関連づける
            $seeker->employers()->attach($employerIds);
        }
    }
}
