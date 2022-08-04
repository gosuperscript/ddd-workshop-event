<?php

namespace Database\Factories;

use Domains\Event\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domains\Event\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
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
