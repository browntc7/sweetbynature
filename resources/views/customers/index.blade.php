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
                        <th>Phone</th>
                        <th>E-mail</th>
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
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Create PO</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- customer modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Create New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <customer-component ref="customer"></customer-component>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footScripts')


<script>
    //load info message html
    $('#infoMessage').load('info/customer.html');

//create customer table
var customerTable = $('#customerTable').DataTable({
    ajax: {
        url: "api/customers", //change to appropriate data call
        dataSrc: "data"
    },
    columns: [ //change to data model
        {
            'data': 'customer_id',
            "defaultContent": ""
        },
        {
            'data': 'customer_name',
            "defaultContent": ""
        },
        {
            'data': 'billing_address',
            "defaultContent": ""
        },
        {
            'data': 'shipping_address',
            "defaultContent": ""
        },
        {
            'data': 'phone',
            "defaultContent": ""
        },
        {
            'data': 'email',
            "defaultContent": ""
        },
        null,
        null
    ],
    "columnDefs": [{
            // The `data` parameter refers to the data for the cell (defined by the
            // `data` option, which defaults to the column being worked with, in
            // this case `data: 0`.
            "render": function (data, type, row) {
                return "<i class=\"fa fa-file-text\" aria-hidden=\"true\"></i>";
            },
            "targets": 6
        },
        {
            // The `data` parameter refers to the data for the cell (defined by the
            // `data` option, which defaults to the column being worked with, in
            // this case `data: 0`.
            "render": function (data, type, row) {
                return "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>";
            },
            "targets": 7
        },
        {
            responsivePriority: 1,
            targets: 0
        },
        {
            responsivePriority: 2,
            targets: 7
        }
    ],
    dom: 'Bfrtip',
    buttons: [{
        text: 'Create Customer',
        action: function (e, dt, node, config) {
            //reset the form
            app.$refs.customer.showSubmitButton();
            //show the modal
            $("#customerModal").modal("show");
            $("#modalTitle").html("Create Customer");
        }
    }],
    responsive: true,
    colReorder: true
});

//edit the row
$('#customerTable tbody').on('click', 'i.fa.fa-pencil-square-o', function () {
    //get table row data
    var data = customerTable.row($(this).parents('tr')).data();
    //show modal and set data to form
    app.$refs.customer.showEditButton(data);
    $("#modalTitle").html("Edit Customer");
    $("#customerModal").modal("show"); 
  
});
//link to purchase order
$('#customerTable tbody').on('click', 'i.fa.fa-file-text', function () {
    var data = customerTable.row($(this).parents('tr')).data();
    window.location = "/purchaseOrders?custID=" + data.customer_id + "&custName=" + data.customer_name;
});


</script>
@endsection
