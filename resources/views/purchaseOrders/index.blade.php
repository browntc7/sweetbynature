@extends('layouts.master')


@section('content')
<div class="container">
<h1>Purchase Orders</h1>
<div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Production Order Number</th>
                        <th>Customer Number</th>
                        <th>Lot Number ID</th>
                        <th>Status</th>
                        <th>Item</th>
                        <th>Input Qty</th>
                        <th>Output Qty</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Production Order Number</th>
                        <th>Customer Number</th>
                        <th>Lot Number ID</th>
                        <th>Status</th>
                        <th>Item</th>
                        <th>Input Qty</th>
                        <th>Output Qty</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="purchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <purchase-order-component></purchase-order-component>
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

    var purchaseOrderTable = $('#purchaseOrderTable').DataTable({
        ajax: {
            url: "api/raw/json", //change to appropriate data call
            dataSrc: "data"
        },
        columns: [ //change to data model
            {
                'data': 'id'
            },
            {
                'data': 'Value1'
            },
            {
                'data': 'Value2'
            },
            {
                'data': 'Value3'
            },
            {
                'data': 'Value4'
            },
            {
                'data': 'created_at'
            },
            {
                'data': 'updated_at'
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
            "targets": 7
        },
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 7 }
    ],
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Create PO',
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
    $('#purchaseOrderTable tbody').on('click', 'i', function () {
        var data = purchaseOrderTable.row($(this).parents('tr')).data();
        alert('You clicked on id ' + data['id'] + '\'s edit button');
    });

</script>
@endsection
