@extends('layouts.master')

@section('content')
<div class="container">
<h1>Products Print</h1>
<template>
    <div class="container">
    <p>
       Item #<input type="text" value="123456"><br> <br>
       Description  <input type="text" value="extract"><br><br>
       Location <input type="text" value="B5"><br><br>
       Qty <input type="text" value="999"><br><br>
       Unit Cost <input type="text" value="$9.99"><br><br>       
    </p>
    </div>    
</template>
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
