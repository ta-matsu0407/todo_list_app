<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatetodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // trueに変えないと保存できない
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'memo' => 'nullable|string',
            'due_date' => 'required|date_format:Y-m-d', // YYYY-MM-DD形式であることを確認
            'status' => 'required|integer',
        ];
    }
}
