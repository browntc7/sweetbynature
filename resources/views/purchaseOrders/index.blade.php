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
                        <th>Purchase Order Number</th>
                        <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Billing Address</th>
                        <th>Status</th>
<<<<<<< HEAD
                          <!--<th>Edit</th>-->
=======
                        <!-- <th>Edit</th> -->
>>>>>>> a4544b8ce9d985f756970ef31dc5d70d9aa77e48
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Purchase Order Number</th>
                        <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Billing Address</th>
                        <th>Status</th>
<<<<<<< HEAD
                        <!--<th>Edit</th>-->
=======
                        <!-- <th>Edit</th> -->
>>>>>>> a4544b8ce9d985f756970ef31dc5d70d9aa77e48
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
//check for url params
var customerName = getURLParameter('custName');
var customerID = getURLParameter('custID');
//show modal if params and fill in input
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
        url: "api/purchaseOrders", //change to appropriate data call
        dataSrc: "data"
    },
    columns: [ //change to data model
        {
            'data': 'created_at',
            "defaultContent": ""
        },
        {
            'data': 'purchase_order_id',
            "defaultContent": ""
        },
        {
            'data': 'customer.customer_id',
            "defaultContent": ""
        },
        {
            'data': 'customer.customer_name',
            "defaultContent": ""
        },
        {
            'data': 'customer.billing_address',
            "defaultContent": ""
        },
        {
            'data': 'status',
            "defaultContent": ""
        }
        // ,
        // null
    ],
    "columnDefs": [
        // {
        //     // The `data` parameter refers to the data for the cell (defined by the
        //     // `data` option, which defaults to the column being worked with, in
        //     // this case `data: 0`.
        //     "render": function (data, type, row) {
        //         return "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>";
        //     },
        //     "targets": 6
        // },
        {
            responsivePriority: 1,
            targets: 0
        },
        {
            responsivePriority: 2,
            targets: 5
        }
    ],
    // dom: 'Bfrtip',
    // buttons: [{
    //     text: 'Create PO',
    //     attr:  {
    //             id: 'purchaseButton'
    //         },
    //     action: function (e, dt, node, config) {
    //         $("#purchaseOrderModal").modal("show");
    //         // reset modal vue data
    //         app.$refs.poRef.resetWindow();
    //     }
    // }],
    responsive: true,
    colReorder: true
});

<<<<<<< HEAD
// //edit the row
=======
//edit the row
>>>>>>> a4544b8ce9d985f756970ef31dc5d70d9aa77e48
// $('#purchaseOrderTable tbody').on('click', 'i.fa.fa-pencil-square-o', function () {
//     var data = purchaseOrderTable.row($(this).parents('tr')).data();
//     $("#purchaseOrderModal").modal("show"); 
//     $("#Date").val(data.created_at);
//     $("#purchaseOrder").val(data.purchase_order_id);
//     $("#customerNumber").val(data.customer_id);
//     $("#customerName").val(data.customer_name);
//     $("#billingAddress").val(data.billing_address);
//     $("#status").val(data.status);
   
// });
</script>
@endsection
