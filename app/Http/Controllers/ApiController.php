<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

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
        $things = App\Customer::all('customer_id', 'customer_name', 'billing_address', 'billing_city', 'billing_state', 'billing_zip', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip', 'email', 'phone');
        $things = array('data' => $things);
        return $things;
    }

    public function getPurchaseOrders(){
        $things = App\PurchaseOrder::with(['customer' => function($query){
            $query->select('customer_id', 'customer_name', 'billing_address');
        },
        'purchaseOrderItems'])
        ->select('purchase_order_id', 'customer_id','status','created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function getPurchaseOrderDetail($id){
        $things = App\PurchaseOrder::with(['purchaseOrderItems'])->find($id);
        $things = array('data' => $things);
        return $things;
    }

    public function addPurchaseOrder(Request $request){
        $purchaseOrder = $request->all();
        $purchaseOrderItems = $purchaseOrder['purchase_order_items'];

        $newPurchaseOrder = ['status' => 'Open', 'customer_id' => $purchaseOrder['customer_id'], 'updated_at' => \Carbon\Carbon::now(), 'created_at' => \Carbon\Carbon::now()];

        $response = DB::table('purchase_orders')->insertGetId($newPurchaseOrder);

        foreach($purchaseOrderItems as $item){
            ##App\PurchaseOrderItem::create
            DB::table('purchase_order_items')->insert(['purchase_order_id' => $response, 
            'inventory_id' => $item['inventory_id'],
            'qty' => $item['qty'] ]);
        }

        return $response;
    }


    public function editPurchaseOrder($id, Request $request){
        $purchase = $request->except('purchase_order_id');
        $purchaseOrder = App\PurchaseOrder::with('purchaseOrderItems')->find($id);

        $response = $purchaseOrder->fill($purchase);
        if($purchase['status'] == 'Closed'){ //status closed decrement inventory
            foreach ($purchaseOrder->purchaseOrderItems as $item) {
                $inventory = App\Inventory::find($item['inventory_id']);
                $inventory->quantity -= $item['qty'];
                $inventory->save();
            }
        } 
        //$purchaseOrder->status = $purchase['status'];
        $purchaseOrder->save();
        
        //return updated production order
        //$response = $productionOrder = App\ProductionOrder::with('productionOrderItems')->find($id);
        return response()->json($response, 201);
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
        ->select('production_order_id', 'status', 'created_at', 'output_quantity')->get();
        $things = array('data' => $things);
        return $things;
    }

    // public function updateProductionOrder($id, Request $request){
    //     $things = App\ProductionOrder::with(['productionOrderItems' => function($query){
    //         $query->select('production_order_id', 'inventory_id', 'input_quantity');
    //     }])
    //     ->select('production_order_id', 'status', 'created_at')->get();
    //     $things = array('data' => $things);
    //     return $things;
    // }

    public function getProductionOrderDetail($id){
        $things = App\ProductionOrder::with(['productionOrderItems'])->find($id);
        $things = array('data' => $things);
        return $things;
    }

    public function addProductionOrder(Request $request){
        $productionOrder = $request->all();
        $productionOrderItems = $purchaseOrder['production_order_items'];

        $newProductionOrder = ['status' => 'Open', 'output_quantity' => $productionOrder['output_quantity'], 'customer_id' => $productionOrder['customer_id'], 'updated_at' => \Carbon\Carbon::now(), 'created_at' => \Carbon\Carbon::now()];

        $response = DB::table('production_orders')->insertGetId($newProductionOrder);

        foreach($productionOrderItems as $item){
            ##App\PurchaseOrderItem::create
            DB::table('productionOrderItems')->insert(['production_order_id' => $response, 
            'inventory_id' => $item['inventory_id'],
            'input_quantity' => '0' ]);
        }

        return $response;
    }

    public function editProductionOrder($id, Request $request){
        $production = $request->except('production_order_id');
        $productionOrder = App\ProductionOrder::with('productionOrderItems')->find($id);

        $response = $productionOrder->fill($production);

        if($production['status'] == 'Closed'){ 

            //status closed increment extract inventory level
            $productIdExtract = DB::table('products')->where('item_description', '=', 'Extract')->first();
            $extract = App\Inventory::findOrFail($productIdExtract->product_id);
            $extract->quantity += $production['output_quantity'];
            $extract->save();

            //status closed decrement honeybush inventory level
            $productIdHoneybush = DB::table('products')->where('item_description', '=', 'Raw Honeybush')->first();
            $honeybush = App\Inventory::findOrFail($productIdHoneybush->product_id);
            $honeybush->quantity -= $productionOrder->productionOrderItems['input_quantity'];
            $honeybush->save();
            }

        

        $productionOrder->status = $production['status'];
        $productionOrder->output_quantity = $production['output_quantity'];
        $productionOrder->save();
        
        return response(201);
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

    public function editInventory($id, Request $request){
        $inventory = $request->all();

        $inventoryRecord = App\Inventory::findOrFail($id);
        $productId = DB::table('products')->where('product_id', '=', $inventoryRecord->product_id)->first();
        $productRecord = App\Product::findOrFail($productId->product_id);
   
        $inventoryRecord->quantity = $inventory['quantity'];
        $inventoryRecord->save();
        
        $productRecord->unit_cost = $inventory['unit_cost'];
        $productRecord->location = $inventory['location'];
        $productRecord->save();

        $response = App\Inventory::with('product')->findOrFail($id);
        return response()->json($response, 201);
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

    public function getInvoices(){

        $things = App\Invoice::with(['purchaseOrder' => function($query){
            $query->select('purchase_order_id', 'customer_id');
        }, 'purchaseOrder.customer' => function($query){
            $query->select('customer_id', 'customer_name');
        }])->select('invoice_id', 'purchase_order_id', 'status', 'created_at')->get();
        $things = array('data' => $things);
        return $things;
    }

    public function test(){
        //$purchaseOrderWithItems = App\PurchaseOrder::with('purchaseOrderItems')->where('purchase_order_id', '=', 8)->first();
        //$testrt = App\PurchaseOrder::with('purchaseOrderItems')->where('purchase_order_id', '=', 30)->get()->first();
        $productIdHoneybush = DB::table('products')->where('item_description', '=', 'Raw Honeybush')->first()->product_id;
        $inventoryIdHoneybush = DB::table('inventory')->where('product_id', '=', $productIdHoneybush)->first()->inventory_id;
        return $inventoryIdHoneybush;
    }

    public function editInvoice($id, Request $request){
        $invoice = $request->all();
        $productionQty = 0;
        $invoiceRecord = App\Invoice::findOrFail($id);
        $invoiceRecord->status = $invoice['status'];
        $invoiceRecord->save();

        if($invoice['status'] == 'Closed'){

            $productIdHoneybush = DB::table('products')->where('item_description', '=', 'Raw Honeybush')->first()->product_id;
            $inventoryIdHoneybush = DB::table('inventory')->where('product_id', '=', $productIdHoneybush)->first()->inventory_id;
            $purchaseOrderWithItems = App\PurchaseOrder::with('purchaseOrderItems')->where('purchase_order_id', '=', $invoiceRecord->purchase_order_id)->get()->first();

            foreach($purchaseOrderWithItems->purchaseOrderItems as $item){
                if($item->inventory_id == $inventoryIdHoneybush){
                    $productionQty += $item->quantity;  

                    $productionOrderToAdd = ['invoice_id' => $id, 'status' => 'Open', 'output_quantity' => '0', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()];
                    $productionOrderId = DB::table('production_orders')->insertGetId($productionOrderToAdd);
        
                    $itemsToAdd = ['production_order_id' => $productionOrderId, 'inventory_id' => $productIdHoneybush, 'input_quantity' => $productionQty];
                    DB::table('production_order_items')->insert($itemsToAdd);
                }
            }
        }
        $response = App\ProductionOrder::with('productionOrderItems')->find($productionOrderId);
        return response()->json($response, 201);

    }

    public function getInvoiceDetail($id){
        $things = App\Invoice::with(['purchaseOrder', 'purchaseOrder.purchaseOrderItems', 'purchaseOrder.customer', 'purchaseOrder.purchaseOrderItems.inventory.product'])->find($id);
        $things = array('data' => $things);
        return $things;
    }

    public function editCustomer(Request $request, $id){

        //this will not check for blank string and could be overwritten if passed a blank string
        //$data = Input::all();
        $customer = App\Customer::findOrFail($id);

        $input = $request->all();
        // try {
            if (isset($input['copy_shipping'])){ //copy shipping address into billing address.
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
