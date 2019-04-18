@extends('layouts.master')

@section('content')
<div class="container">
<h1>Production Orders</h1>
<form> 	
  <div class="form-group row">
    <label for="productionOrder" class="col-sm-2 col-form-label">Production Order</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="productionOrder" placeholder="productionOrder">
    </div>
  </div>
  <div class="form-group row">
    <label for="customerNumber" class="col-sm-2 col-form-label">Customer Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="customerNumber" placeholder="customerNumber">
    </div>
  </div>
  <div class="form-group row">
    <label for="lotNumID" class="col-sm-2 col-form-label">Lot Number ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lotNumID" placeholder="lotNumID">
    </div>
  </div>
  <div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="status" placeholder="status">
    </div>
  </div>
  <div class="form-group row">
    <label for="item" class="col-sm-2 col-form-label">Item</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="item" placeholder="item">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputQty" class="col-sm-2 col-form-label">Input Qty</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputQty" placeholder="inputQty">
    </div>
  </div>
  <div class="form-group row">
    <label for="outputQty" class="col-sm-2 col-form-label">Output Qty</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="outputQty" placeholder="outputQty">
    </div>
  </div>
</form>
     <button type="reset">Cancel</button>
     <button type="submit">Submit</button>
</div>
@endsection

@section('footScripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script>
    
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
