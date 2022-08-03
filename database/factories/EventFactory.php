<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organization_id' => $this->faker->uuid,
            'name' => $this->faker->randomElement(['Laracon', 'EventSourcing Live', 'DDD Europe', 'Insurance con', 'Laravel Europe', 'PHP UK', 'Dutch PHP con', 'Dutch anthem con']),
            'location' => $this->faker->city .', '. $this->faker->country,
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'published_at' => null,
            'capacity' => $this->faker->numberBetween(10, 1000),
        ];
    }
}
