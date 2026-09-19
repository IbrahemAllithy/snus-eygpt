<?php

namespace Database\Factories\Admin;

use App\Models\Admin\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'created_by' => User::factory(),
            'gallary_id' => 1,
            'status' => 'active',
            'blog_category_slug' => str_replace(' ', '-', $this->faker->name()),
        ];
    }
}
