<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Provider;
use App\Price;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $parent_product = Product::create([
                'name' => $faker->name,
                'type' => 'variant',
                'visibility' => 'visible'
            ]);
            $parent_provider = Provider::create([
                'name' => $faker->name,
            ]);
            $parent_provider->products()->save($parent_product);


            $child_product = Product::create([
                'name' => $faker->name,
                'type' => 'simple',
                'visibility' => 'not_visible_individual',
                'variation_name' => $faker->name
            ]);
            $child_provider = Provider::create([
                'name' => $faker->name,
            ]);
            $child_price = Price::create([
                'price' => $faker->randomDigit(),
            ]);
            $child_provider->products()->save($child_product);
            $child_product->price()->save($child_price);

            $parent_product->children()->save($child_product);
        }
        for ($i = 0; $i < 10; $i++) {
            $product = Product::create([
                'name' => $faker->name,
                'type' => 'simple',
                'visibility' => 'visible'
            ]);
            $provider = Provider::create([
                'name' => $faker->name,
            ]);
            $price = Price::create([
                'price' => $faker->randomDigit(),
            ]);
            $provider->products()->save($product);
            $product->price()->save($price);

            $price->save();
        }
    }
}
