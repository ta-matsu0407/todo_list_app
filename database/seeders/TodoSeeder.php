<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
            'title' => '漢字の学習',
            'memo' => '10ページ〜20ページ目を覚える',
            'status' => 1,
            'due_date' => '2024/10/20',
            ],
            [
            'title' => '英単語の学習',
            'memo' => '10単語を覚える',
            'status' => 2,
            'due_date' => '2024/10/22',
            ],
            [
            'title' => '数学の学習',
            'memo' => '30ページ〜50ページ目を解く',
            'status' => 1,
            'due_date' => '2024/10/20',
            ],
        ]);
    }
}
