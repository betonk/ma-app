<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_nama = $this->faker->unique()->words($nb = 6, $asText = true);
        $slug = Str::slug($product_nama, '-');
        return [
            //
            'name' => $product_nama,
            'slug' => $slug,
            'anime' => $this->faker->text(40),
            'kode' => 'PO'.$this->faker->unique()->numberBetween(100,500),
            'desc' => $this->faker->text(100),
            'regular_price' => $this->faker->numberBetween(10,500),
            'quantity' => $this->faker->numberBetween(10,20),
            'stock_status' => 'visible',
            'gambar' => 'Product-'.$this->faker->numberBetween(1,16),
            'kategori_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
