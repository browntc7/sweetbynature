<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionOrder extends Model
{
    // explictly defining table name
    protected $table = 'production_orders';
}
