@extends('layouts.master')

@section('content')
<div class="container">
    <invoice-component ref="invoiceComponent"></invoice-component>

    <!--invoice table-->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="invoiceTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </tfoot>
            </table>
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
    var invoiceID = getURLParameter('invoiceID');
    invoiceID = decodeURIComponent(invoiceID);
    //load data for invoice
    app.$refs.invoiceComponent.getInvoice(invoiceID);
    //load info message html
    $('#infoMessage').load('{{asset('info/invoicePrint.html')}}');

    //create customer table
    var invoiceTable = $('#invoiceTable').DataTable({
        ajax: {
            url: "{{url('api/invoices/')}}/" + invoiceID, //change to appropriate data call
            dataSrc: "data.purchase_order.purchase_order_items"
        },
        columns: [ //change to data model
            {
                'data': 'inventory.product.item_description',
                "defaultContent": ""
            },
            {
                'data': 'inventory.quantity',
                "defaultContent": ""
            },
            {
                'data': 'inventory.product.unit_cost',
                "defaultContent": ""
            },
            null
        ],
        "columnDefs": [{
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function (data, type, row) {
                    return "$" + (row.inventory.quantity * row.inventory.product.unit_cost).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                },
                "targets": 3
            },
            // {
            //     // The `data` parameter refers to the data for the cell (defined by the
            //     // `data` option, which defaults to the column being worked with, in
            //     // this case `data: 0`.
            //     "render": function (data, type, row) {
            //         return "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>";
            //     },
            //     "targets": 7
            // },
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: 3
            }
        ],
         dom: 't',
        // buttons: [{
        //     text: 'Create Customer',
        //     action: function (e, dt, node, config) {
        //         //reset the form
        //         app.$refs.customer.showSubmitButton();
        //         //show the modal
        //         $("#customerModal").modal("show");
        //         $("#modalTitle").html("Create Customer");
        //     }
        // }],
        responsive: true,
        colReorder: true
    });

</script>
@endsection
