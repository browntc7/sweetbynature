<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ApiController extends Controller
{
   
    //get some test thingys
    public function getThings(){
        $things = App\Test::all();
        $things = array('data' => $things);
        return $things;
    }

    //get some test thingys
    public function getCustomers(){
        $things = App\Customer::all('customer_id', 'customer_name', 'billing_address', 'shipping_address', 'email', 'phone');
        $things = array('data' => $things);
        return $things;
    }

    //get some test thingys
    public function addCustomer(){
        //Code to add customer
    }
}
