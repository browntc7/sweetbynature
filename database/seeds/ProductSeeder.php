<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Product::class, 50)->create();
        DB::table('products')->insert([
            'item_description' => 'Seedling',
            'location' => 'Farm',
            'quantity' => '0',
            'unit_cost' => '19.00',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('products')->insert([
            'item_description' => 'Extract',
            'location' => 'Storeroom',
            'quantity' => '0',
            'unit_cost' => '29.00',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('products')->insert([
            'item_description' => 'Raw Honeybush',
            'location' => 'Production',
            'quantity' => '0',
            'unit_cost' => '9.00',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
