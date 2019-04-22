<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // explictly defining table name
    protected $table = 'customers';

    protected $primaryKey = 'customer_id';

    protected $fillable = ['customer_name', 'billing_address', 'billing_city', 'billing_state', 'billing_zip', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip', 'email', 'phone'];

    public function purchaseOrder(){
        return $this->hasMany('App\PurchaseOrder', 'customer_id', 'customer_id'); ##override the foriegn_key name
    }
}
