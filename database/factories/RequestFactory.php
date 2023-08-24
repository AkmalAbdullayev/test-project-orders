<?php

namespace Database\Factories;

use App\Enums\RequestEnum;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->email,
            'status' => $this->faker->randomElement(RequestEnum::class),
            'message' => $this->faker->text,
            'comment' => $this->faker->text,
        ];
    }
}
