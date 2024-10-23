<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kana',
        'tel',
        'email',
        'postcode',
        'address',
        'birthday',
        'gender',
        'memo'
    ];

    public function scopeSearchStudents($query, $input = null)
    // クエリスコープ（ローカルスコープ）でのお約束
    // 関数の頭にはscopeと付ける
    // 第一引数には$queryと入れる
    //コントローラーからscopeSearchStudentsを使う
    {
        if(!empty($input)){
            if(Student::where('kana', 'like', $input . '%' )
            ->orWhere('tel', 'like', $input . '%')->exists())
            {
                return $query->where('kana', 'like', $input . '%' )
                ->orWhere('tel', 'like', $input . '%');
            }
        }
    }

    // 条件: カナ または 電話番号 前方一致
    // 検索フォームを追加
    // 条件
    // ・入力されている場合
    // 検索ヒットした場合->結果を表示
    // 検索ヒットしない場合->全件表示
    // ・入力されていない場合->全件表示
}
