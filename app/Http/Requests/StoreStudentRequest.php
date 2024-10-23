<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'kana' => ['required', 'regex:/^[ァ-ヾ]+$/u','max:50'], // 正規表現
            'tel' => ['nullable','max:20'],
            'email' => ['nullable','email', 'max:255'],
            'postcode' => ['required', 'max:7'],
            'address' => ['required', 'max:100'],
            'birthday' => ['nullable','date'],
            'gender' => ['required'],
            'memo' => ['nullable','max:1000'],
        ];
    }
}
