@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Inventory</h1>
  <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="inventoryTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Item Number</th>
                        <th>Item Description</th>
                        <th>Location</th>
                        <th>Qty</th>
                        <th>Unit Cost</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Item Number</th>
                        <th>Item Description</th>
                        <th>Location</th>
                        <th>Qty</th>
                        <th>Unit Cost</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Create New Lot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <inventory-component ref="inventoryComponent"></inventory-component>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footScripts')


<script>

    //load info message html
$('#infoMessage').load('info/inventory.html');

    var inventoryTable = $('#inventoryTable').DataTable({
        ajax: {
            url: "api/inventory", //change to appropriate data call
            dataSrc: "data"
        },
        columns: [ //change to data model
            {
                'data': 'inventory_id',
                "defaultContent": ""
            },
            {
                'data': 'product.item_description',
                "defaultContent": ""
            },
            {
                'data': 'product.location',
                "defaultContent": ""
            },
            {
                'data': 'quantity',
                "defaultContent": ""
            },
            {
                'data': 'product.unit_cost',
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
        // dom: 'Bfrtip',
        // buttons: [
        //     {
        //         text: 'Create Lot',
        //         action: function ( e, dt, node, config ) {
        //             app.$refs.inventoryComponent.showSubmitButton();
        //             $("#inventoryModal").modal("show");
        //             $("#modalTitle").html("Create Inventory");
        //         }
        //     }
        // ],
        responsive: true,
        colReorder: true
    });

    //edit the row
    $('#inventoryTable tbody').on('click', 'i', function () {
        var data = inventoryTable.row($(this).parents('tr')).data();
        app.$refs.inventoryComponent.showEditButton(data);
        $("#modalTitle").html("Edit Inventory");
        $("#inventoryModal").modal("show"); 
    });

</script>
@endsection