<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'title' => $this->faker->realText(30),
            'first_comment' => $this->faker->realText(300),
            'category_name' => $this->faker->randomElement(['生活', '趣味', 'ネット', '政治', 'スポーツ', '仕事', '教育', 'その他']),
            'created_at' => $this->faker->dateTimeBetween("-1 month" , now()),
        ];
    }
}
