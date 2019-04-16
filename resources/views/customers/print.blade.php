@extends('layouts.master')

@section('content')
<div class="container">
<h1>Customers Print</h1>
<div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                        <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Billing Address</th>
                        <th>Shipping Address</th>
                        <th>Phone Number</th>
                        <th>E-mail Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Billing Address</th>
                        <th>Shipping Address</th>
                        <th>Phone Number</th>
                        <th>E-mail Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<customer-print-component></customer-print-component>
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
