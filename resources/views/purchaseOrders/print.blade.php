@extends('layouts.master')

@section('content')
<div class="container">
<h1>Purchase Order Edit</h1>
<form> 	
  <div class="form-group row">
    <label for="Date" class="col-sm-offset-2 col-sm-2 col-form-label">Date</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="Date" placeholder="Date">
    </div>
  </div>
  <div class="form-group row">
    <label for="purchaseOrder" class="col-sm-offset-2 col-sm-2 col-form-label">Purchase Order #</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="purchaseOrder" placeholder="purchaseOrder">
    </div>
  </div>
  <div class="form-group row">
    <label for="customerNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Customer #</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="customerNumber" placeholder="customerNumber">
    </div>
  </div>
  <div class="form-group row">
    <label for="status" class="col-sm-offset-2 col-sm-2 col-form-label">Status</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="status" placeholder="status">
    </div>
  </div>
  <div class="form-group row">
    <label for="item" class="col-sm-offset-2 col-sm-2 col-form-label">Item</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="item" placeholder="item">
    </div>
  </div>
  <div class="form-group row">
    <label for="Qty" class="col-sm-offset-2 col-sm-2 col-form-label">Qty</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="Qty" placeholder="Qty">
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
     //popover 
     $(document).ready(function(){
        $('[data-toggle="help"]').popover();
    });

</script>
@endsection
