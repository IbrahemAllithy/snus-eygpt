<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'created_by' => User::factory(),
            'gallary_id' => 1,
            'name' => $this->faker->company(),
            'brand_slug' => str_replace(' ', '-', $this->faker->company()),
            'status' => 'active',
        ];
    }
}
