<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // explictly defining table name
    protected $table = 'invoices';
}
