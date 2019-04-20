@extends('layouts.master')

@section('content')
<div class="container">
<h1>Customers</h1>
<div class="row justify-content-center">
        <div class="col-md-12">
            <table id="customerTable" class="table table-striped" style="width:100%">
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
                        <th>Create PO</th>
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
                        <th>Create PO</th>
                        <th>Edit</th>
                       
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
<!-- modal -->
<div class="modal fade" id="purchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <new-customer-component></new-customer-component>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footScripts')


<script>

    var customerTable = $('#customerTable').DataTable({
        ajax: {
            url: "js/tempData.json", //change to appropriate data call
            dataSrc: "data"
        },
        columns: [ //change to data model
            {
                'data': 'id',
                "defaultContent": ""
            },
            {
                'data': 'Value1',
                "defaultContent": ""
            },
            {
                'data': 'Value2',
                "defaultContent": ""
            },
            {
                'data': 'Value3',
                "defaultContent": ""
            },
            {
                'data': 'Value4',
                "defaultContent": ""
            },
            {
                'data': 'created_at',
                "defaultContent": ""
            },
            {
                'data': 'updated_at',
                "defaultContent": ""
            },
            {
                'data': 'updated_at',
                "defaultContent": ""
            },
            null
        ],
        "columnDefs": [{
            // The `data` parameter refers to the data for the cell (defined by the
            // `data` option, which defaults to the column being worked with, in
            // this case `data: 0`.
            "render": function (data, type, row) {
                return "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>";
            },
            "targets": 8
        },
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 8 }
    ],
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Create Customer',
                action: function ( e, dt, node, config ) {
                    $("#purchaseOrderModal").modal("show");
                    // reset modal vue data
                    console.log(clicks);
                    app.clicks=1;
                }
            }
        ],
        responsive: true,
        colReorder: true
    });

    //edit the row
    $('#customerTable tbody').on('click', 'i', function () {
        var data = customerTable.row($(this).parents('tr')).data();
        alert('You clicked on id ' + data['id'] + '\'s edit button');
    });

</script>
@endsection
