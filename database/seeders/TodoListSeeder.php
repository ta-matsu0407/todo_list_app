<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//FacadesのDBクエリビルダを使用

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->insert(
            //insertメソッドを使い、データベースにデータを追加
            [
                [
                    'name' => 'test1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'test2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'test3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ],
        );
    }
}
