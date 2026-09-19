<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Gallary;
use App\Models\Admin\GallaryDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class GallaryDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GallaryDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $width = 640;
        $height = 480;

        return [
            'gallary_id' => Gallary::factory(),
            'gallary_type' => 'large',
            'height' => $width,
            'width' => $height,
            'path' => 'https://source.unsplash.com/random/'.$width.'*'.$height,
        ];
    }
}
