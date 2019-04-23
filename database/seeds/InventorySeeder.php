<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        //factory(App\Inventory::class, 3)->create();
        //$this->command->info('test');
        $inventory = App\Inventory::all()->pluck('product_id')->toArray();
        $products = App\Product::all()->pluck('product_id')->toArray();
        DB::table('inventory')->insert([
            'product_id' => $faker->randomElement(array_diff($products, $inventory)),
            'quantity' => $faker->numberBetween($min = 10, $max = 400),
        ]);

        $inventory = App\Inventory::all()->pluck('product_id')->toArray();
        $products = App\Product::all()->pluck('product_id')->toArray();
        DB::table('inventory')->insert([
            'product_id' => $faker->randomElement(array_diff($products, $inventory)),
            'quantity' => $faker->numberBetween($min = 10, $max = 400),
        ]);

        $inventory = App\Inventory::all()->pluck('product_id')->toArray();
        $products = App\Product::all()->pluck('product_id')->toArray();
        DB::table('inventory')->insert([
            'product_id' => $faker->randomElement(array_diff($products, $inventory)),
            'quantity' => $faker->numberBetween($min = 10, $max = 400),
        ]);
    }
}
