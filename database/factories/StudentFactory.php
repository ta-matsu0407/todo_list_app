<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tel = str_replace('-', '', $this->faker->phoneNumber);
        $address = mb_substr($this->faker->address, 9);
        // 電話番号-> ハイフンを削除,stringのreplace,置換
        // 住所-> 郵便番号と半角スペースをカット,マルチバイトのsubstring,文字列の一部を得る

        return [
            'name' => $this->faker->name,
            'kana' => $this->faker->kanaName,
            'tel' => $tel,
            'email' => $this->faker->email,
            'postcode' => $this->faker->postcode,
            'address' => $address,
            'birthday' => $this->faker->dateTime,
            'gender' => $this->faker->numberBetween(0, 2),
            'memo' => $this->faker->realText(50),
        ];
    }
}
