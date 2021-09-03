<?php

namespace Database\Factories;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'author_id' => 1,
            'image' => 'storage/news/images/a5549186c8adf3d0992908193cda9498.jpg',
            'category_id' => random_int(0, 8),
            'rating' => random_int(0, 50) * 0.1,
            'is_published' => 1,
            'created_at' => Carbon::now('Europe/Moscow'),
            'updated_at' => Carbon::now('Europe/Moscow'),
        ];
    }
}
