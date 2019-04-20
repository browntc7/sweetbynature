<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // explictly defining table name
    protected $table = 'customers';
}
