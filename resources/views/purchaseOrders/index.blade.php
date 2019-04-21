@extends('layouts.master')


@section('content')
<div class="container">
<h1>Purchase Orders</h1>
<div class="row justify-content-center">
        <div class="col-md-12">
            <table id="purchaseOrderTable" class="table table-striped" style="width:100%">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <purchase-order-component ref="poRef"></purchase-order-component>
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
//function to get URL parameters
function getURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}

var customerName = getURLParameter('custName');
var customerID = getURLParameter('custID');

if(customerName && customerID){
$("#purchaseOrderModal").modal("show");
$("#customerName").val(decodeURIComponent(customerName));
$("#customerNum").val(decodeURIComponent(customerID));
}

//load info message html
$('#infoMessage').load('info/purchaseOrder.html');

// create purchase order table
var purchaseOrderTable = $('#purchaseOrderTable').DataTable({
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
        {
            responsivePriority: 1,
            targets: 0
        },
        {
            responsivePriority: 2,
            targets: 8
        }
    ],
    dom: 'Bfrtip',
    buttons: [{
        text: 'Create PO',
        attr:  {
                id: 'purchaseButton'
            },
        action: function (e, dt, node, config) {
            $("#purchaseOrderModal").modal("show");
            // reset modal vue data
            app.$refs.poRef.resetWindow();
        }
    }],
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
