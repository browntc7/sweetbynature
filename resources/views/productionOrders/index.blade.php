@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Production Orders</h1>
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
@endsection

@section('footScripts')

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script>
    $('#myTable').DataTable({
        ajax: {
            url: "api/raw/json", //change to appropriate data call
            dataSrc: "data"
        },
        columns: [{
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
            }
        ]

    });

</script>
@endsection
