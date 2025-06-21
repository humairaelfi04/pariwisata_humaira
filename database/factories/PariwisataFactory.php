<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pariwisata>
 */
class PariwisataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 6));
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->paragraph(rand(4, 8)),
            'category_id' => Category::inRandomOrder()->first()->id ?? null,
            'location' => fake()->city() . ', ' . fake()->state(),
            'facilities' => implode(', ', fake()->words(rand(3, 6))),
            'image' => 'https://picsum.photos/seed/' . Str::random(10) . '/480/640',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
