<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kategori_nama = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = Str::slug($kategori_nama, '-');
        return [
            'name' => $kategori_nama,
            'slug' => $slug
        ];
    }
}
