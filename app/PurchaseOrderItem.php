<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    // explictly defining table name
    protected $table = 'purchase_order_items';
    public $timestamps = false;
}
