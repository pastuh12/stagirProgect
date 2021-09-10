<?php


namespace Database\Factories;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class NewsFactory extends Factory
{

    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(random_int(2, 5)),
            'author_id' => 1,
            'image' => 'storage/news/images/vehicles-cars-nissan-31038.jpg',
            'text' => $this->faker->realText(random_int(1000, 5000)),
            'is_published' => 1,
            'created_at' => Carbon::now('Europe/Moscow'),
            'updated_at' => Carbon::now('Europe/Moscow'),
        ];
    }

}
