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

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <production-order-component></production-order-component>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
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

<script>

    var productionOrdersTable = $('#productionOrdersTable').DataTable({
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

    //edit the row
    $('#productionOrdersTable tbody').on('click', 'i', function () {
        var data = productionOrdersTable.row($(this).parents('tr')).data();
        alert('You clicked on id ' + data['id'] + '\'s edit button');
    });
    //popover 
    $(document).ready(function(){
        $('[data-toggle="help"]').popover();
    });
</script>
@endsection
