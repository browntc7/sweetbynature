<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrder extends Model
{
    // explictly defining table name
    protected $table = 'production_orders';

    protected $primaryKey = 'production_order_id';


    public function productionOrderItems(){
        return $this->hasMany('App\ProductionOrderItem', 'production_order_id', 'production_order_id');
    }

    public function invoice(){
        return $this->belongsTo('App\Invoice', 'invoice_id', 'invoice_id');
    }
}
