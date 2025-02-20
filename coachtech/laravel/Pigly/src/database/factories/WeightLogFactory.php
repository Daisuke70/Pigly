<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;
use App\Models\User;
use Carbon\Carbon;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'date' => $this->faker->dateTimeBetween('2025-01-15', '2025-02-16')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 65, 70),
            'calories' => $this->faker->numberBetween(2000, 2500),
            'exercise_time' => Carbon::createFromTime(0, $this->faker->numberBetween(60, 90), 0)->format('H:i:s'),
            'exercise_content' => $this->faker->randomElement(['筋力トレーニング', 'スプリント', 'フットサル']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
