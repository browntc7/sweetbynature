@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Invoice Edit</h1>
  <b><p>Sweet By Nature<br>Some Address Ln<br>South Africa<br>3429348<br></p><b>
  <button class="btn btn-primary"type="submit">Release To Production</button><br><br>
  <form> 	
  <div class="form-group row">
    <label for="invoiceNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Invoice Number</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="invoiceNumber" placeholder="123456">
    </div>
  </div>
  <div class="form-group row">
    <label for="createDate" class="col-sm-offset-2 col-sm-2 col-form-label">Date Created</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="createDate" placeholder="MMDDYYYY">
    </div>
  </div>
  <div class="form-group row">
    <label for="productionOrderNum" class="col-sm-offset-2 col-sm-2 col-form-label">Purchase Order #</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="productionOrderNum" placeholder="123456">
    </div>
  </div>
  <div class="form-group row">
    <label for="dueDate" class="col-sm-offset-2 col-sm-2 col-form-label">Due Date</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="dueDate" placeholder="MMDDYYYY">
    </div>
  </div>
  <div class="form-group row">
    <label for="amountDue" class="col-sm-offset-2 col-sm-2 col-form-label">Amount Due $</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="amountDue" placeholder="0.00">
    </div>
  </div>
  <p>BILL TO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**************&nbsp;&nbsp;&nbsp;&nbsp;SHIP TO: <p>
  <!--Customer Name -->
  <div class="form-group row">
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
    </div>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
    </div>
  </div> 
  <!--Address-->
  <div class="form-group row">
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="billingAddress" placeholder="Billing Street">
    </div>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="shippingAddress" placeholder="Shipping Street">
    </div>
  </div> 
  <!--City-->
  <div class="form-group row">
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="city" placeholder="City">
    </div>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="city" placeholder="City">
    </div>
  </div>  
  <!--State-->
  <div class="form-group row">
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="state" placeholder="State">
    </div>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="state" placeholder="State">
    </div>
  </div> 
   <!--Zip Code-->
   <div class="form-group row">
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="zip" placeholder="Zip Code">
    </div>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="zip" placeholder="Zip Code">
    </div>
  </div> 
<!--
    <div class="container">
    <p>Sweet By Nature<br>Some Address Ln<br>South Africa<br>3429348<br></p>
    </div>
    <button class="btn btn-primary"type="submit">Release To Production</button><br>
    <div class="container">
    <p><br>Invoice Number
    <input type="text" value="123456">
    <br> 
       Created Date  <input type="text" value="MMDDYYYY"><br>
       PO #  <input type="text" value="123456"><br>
       Due Date  <input type="text" value="MMDDYYYY"><br>
       Amount Due  <input type="text" value="$0.00"><br>
    </p>
    </div>
    <div class="container">
    <p><b>BILL TO: </b><b>&emsp;SHIP TO: </b><br>
    <input type="text" value="Customer Name">
    <input type="text" value="Customer Name"><br>
    <input type="text" value="Billing Address">
    <input type="text" value="Shipping Address"><br>
    <input type="text" value="City">
    <input type="text" value="City"><br>
    <input type="text" value="State">
    <input type="text" value="State"><br>
    <input type="text" value="Zip Code">
    <input type="text" value="Zip Code"><br>
    </p>
    </div>-->
    <div class="container">
     <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>  
                        <th>Amount</th>                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>  
                        <th>Amount</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
@endsection