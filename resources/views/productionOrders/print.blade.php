@extends('layouts.master')

@section('content')
<div class="container">
<h1>Production Order Edit</h1>
<form> 	
  <div class="form-group row">
    <label for="productionOrder" class="col-sm-offset-2 col-sm-2 col-form-label">Production Order</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="productionOrder" placeholder="Production Order">
    </div>
  </div>
  <div class="form-group row">
    <label for="customerNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Customer Number</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="customerNumber" placeholder="Customer Number">
    </div>
  </div>
  <div class="form-group row">
    <label for="lotNumID" class="col-sm-offset-2 col-sm-2 col-form-label">Lot Number ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="lotNumID" placeholder="Lot # ID">
    </div>
  </div>
  <div class="form-group row">
    <label for="status" class="col-sm-offset-2 col-sm-2 col-form-label">Status</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="status" placeholder="Status">
    </div>
  </div>
  <div class="form-group row">
    <label for="item" class="col-sm-offset-2 col-sm-2 col-form-label">Item</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="item" placeholder="Item">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputQty" class="col-sm-offset-2 col-sm-2 col-form-label">Input Qty</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputQty" placeholder="Input Qty">
    </div>
  </div>
  <div class="form-group row">
    <label for="outputQty" class="col-sm-offset-2 col-sm-2 col-form-label">Output Qty</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="outputQty" placeholder="Output Qty">
    </div>
  </div>
</form>
     <button class="btn btn-primary" type="reset">Cancel</button>
     <button class="btn btn-primary"type="submit">Submit</button>
</div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted" style="float:right;">      
        <a href="#" data-toggle="help" title="Need Help?" data-content=""> 
        <i class="fa fa-question-circle" style="font-size:24px;color:red;" aria-hidden="true"></i></a>
       </span>
      </div>
    </footer>
@endsection

@section('footScripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script>

$('#infoMessage').load('info/productionOrderPrint.html');
    
    $('#myTable').DataTable({
        ajax: {
        url:"api/raw/json",//change to appropriate data call
        dataSrc:"data"
    },
        columns:[ //change to data model
                    { 'data': 'key' },
                    { 'data': 'registerName' },
                    { 'data': 'Value2' },
                    { 'data': 'Value3' },
                    { 'data': 'Value4' },
                    { 'data': 'created_at' },
                    { 'data': 'updated_at' }
                ]
    
    });
    
</script>
@endsection
