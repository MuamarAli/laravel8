<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'summary' => $this->faker->paragraphs,
            'content' => $this->faker->paragraphs,
            'status' => $this->faker->boolean,
            'image' => $this->faker->image(),
            'slug' => $this->faker->title,
            'author_id' => function() {
                return User::factory()->create()->id;
            },
            'tag_id' => function() {
                return Tag::factory()->create()->id;
            }
        ];
    }
}
