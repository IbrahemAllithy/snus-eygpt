<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\CategoryDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'category_name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'category_id' => Category::factory(),
            'language_id' => 1,
        ];
    }
}
