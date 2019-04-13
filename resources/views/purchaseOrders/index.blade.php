@extends('layouts.master')

@section('content')
<div class="container">
<h1>Purchase Orders</h1>
<purchase-index-component></purchase-index-component>
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
