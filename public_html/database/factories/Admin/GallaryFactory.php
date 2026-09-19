<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Gallary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GallaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallary::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'extension' => 'jpg',
        ];
    }
}
