<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => random_int(1, 50),
            'entity_class' => array_rand([News::class => 0, Gallery::class => 0]),
            'author_id' => '1',
            'text' => $this->faker->realText(random_int(20, 500)),
            'is_published' => true,
        ];
    }
}
