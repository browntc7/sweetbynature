<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrderItem extends Model
{
    // explictly defining table name
    protected $table = 'production_order_items';
    public $timestamps = false;
}
