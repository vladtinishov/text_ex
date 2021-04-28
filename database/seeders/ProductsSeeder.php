<?php

namespace Database\Seeders;
// use Database\Factories\ProductsFactory;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     *
     *  Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Products::factory(20)->create();
    }
}
