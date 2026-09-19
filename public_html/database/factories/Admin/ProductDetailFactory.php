<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Product;
use App\Models\Admin\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'title' => $this->faker->name(),
            'desc' => $this->faker->name(),
            'language_id' => 1,
        ];
    }
}
