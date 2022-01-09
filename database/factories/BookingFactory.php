<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'date_booking' => '01/20/2022',
            'start_time' => 'test',
            'parking_duration'  => 'test',
            'parking_slot' => $this->faker->regexify('[A-C]{1}[1-9]{1}')
        ];
    }

    public function parkingA()
    {
        return $this->state(function (array $attributes) {
            return [
                'parking_slot' => $this->faker->regexify('[A]{1}[1-9]{1}')
            ];
        });
    }
}
