<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
        // explictly defining table name
    protected $table = 'purchase_orders';

    protected $primaryKey = 'purchase_order_id';
    protected $fillable = ['status'];
        
    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }

    public function purchaseOrderItems(){
        return $this->hasMany('App\PurchaseOrderItem', 'purchase_order_id', 'purchase_order_id');
    }

    public function invoice(){
        return $this->hasOne('App\Invoice', 'invoice_id', 'invoice_id');
    }
}
