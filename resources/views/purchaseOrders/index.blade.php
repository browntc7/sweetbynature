@extends('layouts.master')

@section('content')
<div class="container">
<h1>Purchase Orders</h1>
<<<<<<< HEAD
<purchase-index-component></purchase-index-component>
=======
<div class="row justify-content-center">
        <div class="col-md-12">
            <table id="purchaseOrderTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
>>>>>>> 10832de71c4b8440b0f4dd68299bfa9f8c373046
</div>
@endsection

@section('footScripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script>
    
    var purchaseOrderTable = $('#purchaseOrderTable').DataTable({
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
                    { 'data': 'updated_at' },
                    null
                ],
                "columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>";
                },
                "targets": 7
            }
        ]

    
    });

    //edit the row
    $('#purchaseOrderTable tbody').on('click', 'i', function () {
        var data = purchaseOrderTable.row( $(this).parents('tr') ).data();
        alert( 'You clicked on id '+data['id']+'\'s edit button' );
    } );

</script>
@endsection
