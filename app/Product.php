<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // explictly defining table name
    protected $table = 'products';
}
