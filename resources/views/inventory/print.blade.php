@extends('layouts.master')

@section('content')
<div class="container">
<h1>Inventory Edit</h1>
<form> 	
  <div class="form-group row">
    <label for="itemNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Item #</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="itemNumber" placeholder="Item #">
    </div>
  </div>
  <div class="form-group row">
    <label for="itemDescription" class="col-sm-offset-2 col-sm-2 col-form-label">Item Description</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="itemDescription" placeholder="Item Description">
    </div>
  </div>
  <div class="form-group row">
    <label for="location" class="col-sm-offset-2 col-sm-2 col-form-label">Location</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="location" placeholder="Location">
    </div>
  </div>
  <div class="form-group row">
    <label for="qty" class="col-sm-offset-2 col-sm-2 col-form-label">Qty</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="qty" placeholder="Qty">
    </div>
  </div>
  <div class="form-group row">
    <label for="unitCost" class="col-sm-offset-2 col-sm-2 col-form-label">Unit Cost</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="unitCost" placeholder="Unit Cost">
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
