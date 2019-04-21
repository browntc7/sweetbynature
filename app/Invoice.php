<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // explictly defining table name
    protected $table = 'invoices';

    protected $primaryKey = 'invoice_id';

    public function productionOrder(){
        return $this->hasOne('App\ProductionOrder', 'invoice_id', 'invoice_id');
    }

    public function purchaseOrder(){
        return $this->hasOne('App\PurchaseOrder', 'purchase_order_id', 'purchase_order_id');
    }
}
