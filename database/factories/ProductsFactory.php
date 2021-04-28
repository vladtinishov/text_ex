<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'articul' => Str::random(10),
            'category' => 'разное',
            'weight' => rand(1, 50),
            'price' => rand(1, 50),
            'status' => 'ok',
        ];
    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
