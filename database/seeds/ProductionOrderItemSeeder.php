<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProductionOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //factory(App\ProductionOrderItem::class, 50)->create();

        //create a unique production order for each invoice 
        $productId = DB::table('products')->where('item_description', '=', 'Raw Honeybush')->first();
        $inventoryId = DB::table('inventory')->where('product_id', '=',  $productId->product_id)->first();
        $invoices = App\Invoice::all()->pluck('invoice_id')->toArray();
        $usedInvoices = [];

        foreach ($invoices as $invoice) {
            $id = DB::table('production_orders')->insertGetId(['invoice_id' => $faker->randomElement(array_diff($invoices, $usedInvoices)),
            'status' => $faker->randomElement(['Open', 'Closed', 'Pending']),
            'output_quantity' => $faker->numberBetween($min = 10, $max = 50),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()]); #output quantity
   
            DB::table('production_order_items')->insert([
                'production_order_id' => $id,
                'inventory_id' => $inventoryId->inventory_id,
                'input_quantity' => $faker->numberBetween($min = 10, $max = 400)
            ]);

            array_push($usedInvoices, $invoice);
        }

    }
}
