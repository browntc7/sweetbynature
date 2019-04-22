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

    //get customers
    public function getCustomers(){
        $things = App\Customer::all('customer_id', 'customer_name', 'billing_address', 'shipping_address', 'email', 'phone');

        // #tyler learning stuff

        // $things = App\Customer::with(['purchaseOrder' => function($query){
        //     $query->select('customer_id', 'purchase_order_id', 'status');
        // }])->select('customer_id', 'customer_name', 'billing_address', 'shipping_address', 'email', 'phone')->get();


        $things = array('data' => $things);
        return $things;
    }

    public function getPurchaseOrders(){
        $things = App\PurchaseOrder::with([
        'customer' => function($query){
            $query->select('customer_id', 'customer_name', 'billing_address');
        } //, 
        // 'purchaseOrderItems' => function($query){
        //     $query->select('purchase_order_id', 'inventory_id', 'qty');
        // },
        // 'purchaseOrderItems.inventory',
        // 'purchaseOrderItems.inventory.product'
        ])
        ->select('purchase_order_id', 'customer_id','status','created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getInvoices(){
        #$things = App\Customer::all('customer_id', 'customer_name', 'billing_address', 'shipping_address', 'email', 'phone');
        $things = App\Invoice::with(['purchaseOrder' => function($query){
            $query->select('purchase_order_id', 'customer_id');
        }, 'purchaseOrder.customer' => function($query){
            $query->select('customer_id', 'customer_name');
        }])->select('invoice_id', 'purchase_order_id', 'status', 'created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getProductionOrders(){
        #$things = App\Customer::all('customer_id', 'customer_name', 'billing_address', 'shipping_address', 'email', 'phone');
        $things = App\ProductionOrder::with(['invoice' => function($query){
            $query->select('invoice_id', 'purchase_order_id');
        }, 'invoice.purchaseOrder' => function($query){
            $query->select('purchase_order_id', 'customer_id');
        }, 'invoice.purchaseOrder.customer' => function($query){
            $query->select('customer_id', 'customer_name');
        }])->
        select('production_order_id', 'invoice_id', 'status', 'quantity', 'created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getProducts(){
        $things = App\Product::all();
        $things = array('data' => $things);
        return $things;
    }

    public function addCustomer(Request $request){
        //set request data to customer
        $customer = $request->all();

        //if good send 201 update if bad send 400
        try{
            if ($customer['copy_shipping']){ //copy shipping address into billing address.
                $customer['shipping_address'] = $customer['billing_address'];
                $customer['shipping_city'] = $customer['billing_city'];
                $customer['shipping_state'] = $customer['billing_state'];
                $customer['shipping_zip'] = $customer['billing_zip'];
                unset($customer['copy_shipping']);
                } 
            //submit customer
            $res = App\Customer::create($customer);
            //return good response
            return response()->json($res, 201);

        }catch(\Exception $e){
            // send 400 / abort(code,string)
            return abort(400);
        }
    }

    public function customerName(Request $request){


    }
}
