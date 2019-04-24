<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #$this->call(UsersTableSeeder::class);
        #$this->call(TestTableSeeder::class);

        $this->call(CustomerSeeder::class);
        $this->call(PurchaseOrderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(InventorySeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(PurchaseOrderItemsSeeder::class);
        //$this->call(ProductionOrderSeeder::class);
        $this->call(ProductionOrderItemSeeder::class); //seeds both production_order and production_order_items
        $this->call(UsersTableSeeder::class);

        
        
        
        

    }
}
