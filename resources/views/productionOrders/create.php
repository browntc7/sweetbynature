@extends('layouts.master')

@section('content')
<div class="container">
<h1>Create Production Order</h1>
<production-order-component></production-order-component>
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
        columns:[ 
                    { 'data': 'id' },
                    { 'data': 'Value1' },
                    { 'data': 'Value2' },
                    { 'data': 'Value3' },
                    { 'data': 'Value4' },
                    { 'data': 'created_at' },
                    { 'data': 'updated_at' }
                ]
    
    });

</script>
@endsection
