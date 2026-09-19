<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'created_by' => User::factory(),
            'gallary_id' => 1,
            'category_icon' => 1,
            'category_slug' => str_replace(' ', '-', $this->faker->name()),
        ];
    }
}
