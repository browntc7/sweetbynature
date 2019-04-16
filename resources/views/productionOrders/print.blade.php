@extends('layouts.master')

@section('content')
<div class="container">
<h1>Production Orders Print</h1>
<template>
    <div class="container">
    <p>
       Production Order<input type="text" value="123456"><br> <br>
       Customer Number  <input type="text" value="123456"><br><br>
       Lot Number ID  <input type="text" value="123456"><br><br>
       Status  <input type="text" value="Open/Closed"><br><br>
       Item <input type="text" value="321"><br><br>
       Input Qty <input type="text" value="100"><br><br>
       Output Qty <input type="text" value="250"><br><br>
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
