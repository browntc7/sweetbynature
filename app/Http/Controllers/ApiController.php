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
        $things = array('data' => $things);
        return $things;
    }

    public function getPurchaseOrders(){
        $things = App\PurchaseOrder::with([
        'customer' => function($query){
            $query->select('customer_id', 'customer_name', 'billing_address');
        }])
        ->select('purchase_order_id', 'customer_id','status','created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getInvoices(){

        $things = App\Invoice::with(['purchaseOrder' => function($query){
            $query->select('purchase_order_id', 'customer_id');
        }, 'purchaseOrder.customer' => function($query){
            $query->select('customer_id', 'customer_name');
        }])->select('invoice_id', 'purchase_order_id', 'status', 'created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    // public function getProductionOrders(){
    //     $things = App\ProductionOrder::with(['invoice' => function($query){
    //         $query->select('invoice_id', 'purchase_order_id');
    //     }, 'invoice.purchaseOrder' => function($query){
    //         $query->select('purchase_order_id', 'customer_id');
    //     }, 'invoice.purchaseOrder.customer' => function($query){
    //         $query->select('customer_id', 'customer_name');
    //     }, 'productionOrderItems' => function($query){
    //         $query->select('production_order_id', 'inventory_id', 'input_quantity');
    //     }])
    //     ->select('production_order_id', 'invoice_id', 'status', 'quantity', 'created_at')->get();
    //     $things = array('data' => $things);
    //     return $things;
    // }

    public function getProductionOrders(){
        $things = App\ProductionOrder::with(['productionOrderItems' => function($query){
            $query->select('production_order_id', 'inventory_id', 'input_quantity');
        }])
        ->select('production_order_id', 'status', 'created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function updateProductionOrder($id, Request $request){
        $things = App\ProductionOrder::with(['productionOrderItems' => function($query){
            $query->select('production_order_id', 'inventory_id', 'input_quantity');
        }])
        ->select('production_order_id', 'status', 'created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getInventory(){
        $things = App\Inventory::with(['product'])->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getInventoryDetail($id){
        $things = App\Inventory::with(['product'])->find($id);
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

    public function getInvoiceDetail($id){
        $things = App\Invoice::with(['purchaseOrder', 'purchaseOrder.purchaseOrderItems', 'purchaseOrder.customer', 'purchaseOrder.purchaseOrderItems.inventory.product'])->find($id);
        $things = array('data' => $things);
        return $things;
    }

    public function editCustomer($id, Request $request){

        //this will not check for blank string and could be overwritten if passed a blank string
        //$data = Input::all();
        $customer = App\Customer::findOrFail($id);

        $input = $request->all();
        // try {
            if ($input['copy_shipping']){ //copy shipping address into billing address.
            $customer['shipping_address'] = $input['billing_address'];
            $customer['shipping_city'] = $input['billing_city'];
            $customer['shipping_state'] = $input['billing_state'];
            $customer['shipping_zip'] = $input['billing_zip'];
            unset($input['copy_shipping']);
            } 

            
            $customer->fill($input);
            $customer->save();

            return response()->json($input, 201);

        // }catch(\Exception $e){
        //     return abort(400);

        // }
    
    }
}
