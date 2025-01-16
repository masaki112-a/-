<?php

namespace Database\Factories;

use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{

    protected $model = Time::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'start_time' => $this->faker->date,
            'end_time' => $this->faker->date,
            'rest_time' => $this->faker->date,
        ];
    }
}
