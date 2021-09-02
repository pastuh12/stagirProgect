<?php


namespace Database\Factories;

use App\Models\News;
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
            'title' => $this->faker->name(),
            'author_id' => 1,
            'image' => 'storage/news/images/a5549186c8adf3d0992908193cda9498.jpg',
            'text' => $this->faker->text(), // password
            'is_published'=> 1,
        ];
    }

}
