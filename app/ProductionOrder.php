<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrder extends Model
{
    // explictly defining table name
    protected $table = 'production_orders';

    protected $primaryKey = 'production_order_id';


    public function productionOrderItems(){
        return $this->hasMany('App\ProductionOrderItems', 'production_order_id', 'production_order_id');
    }

    public function invoices(){
        return $this->hasMany('App\Invoices', 'invoice_id', 'invoice_id');
    }
}
