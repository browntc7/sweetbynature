<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
        // explictly defining table name
        protected $table = 'purchase_orders';
}
