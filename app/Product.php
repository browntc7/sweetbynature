<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // explictly defining table name
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    public function inventory(){
        return $this->hasOne('App\Inventory', 'product_id', 'product_id');
    }
}
