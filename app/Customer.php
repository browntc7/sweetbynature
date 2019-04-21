<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // explictly defining table name
    protected $table = 'customers';

    protected $primaryKey = 'customer_id';

    public function purchaseOrder(){
        return $this->hasMany('App\PurchaseOrder', 'customer_id', 'customer_id'); ##override the foriegn_key name
    }
}
