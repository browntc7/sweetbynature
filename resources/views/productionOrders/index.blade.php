@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Production Orders</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="productionOrdersTable" class="table table-striped" style="width:100%">
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

<div class="modal" id="productionOrderModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Production Order Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <production-order-component ref="productionComponent"></production-order-component>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footScripts')

<script>

    //load info message html
$('#infoMessage').load('info/productionOrder.html');

    var productionOrdersTable = $('#productionOrdersTable').DataTable({
        ajax: {
            url: "api/productionOrders", //change to appropriate data call
            dataSrc: "data"
        },
        columns: [ //change to data model
            {
                'data': 'created_at',
                "defaultContent": ""
            },
            {
                'data': 'production_order_id',
                "defaultContent": ""
            },
            {
                'data': 'Value2',
                "defaultContent": ""
            },
            {
                'data': 'production_order_id',
                "defaultContent": ""
            },
            {
                'data': 'status',
                "defaultContent": ""
            },
            {
                'data': 'production_order_items.inventory_id',
                "defaultContent": ""
            },
            {
                'data': 'production_order_items.input_quantity',
                "defaultContent": ""
            },
            {
                'data': 'output_quantity',
                "defaultContent": ""
            }
            ,
            null
        ],
        "columnDefs": [
            {
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
        // dom: 'Bfrtip',
        // buttons: [
        //     {
        //         text: 'Create PO',
        //         action: function ( e, dt, node, config ) {
        //             $("#purchaseOrderModal").modal("show");
        //             // reset modal vue data
        //             console.log(clicks);
        //             app.clicks=1;
        //         }
        //     }
        // ],
        responsive: true,
        colReorder: true
    });

    // edit the row
    $('#productionOrdersTable tbody').on('click', 'i', function () {
        var data = productionOrdersTable.row($(this).parents('tr')).data();
        app.$refs.productionComponent.showPOEditModal(data);

        
    });

</script>
@endsection
