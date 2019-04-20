@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Invoices</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="invoicesTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice Number</th>
                        <th>PO#</th>
                        <th>Status</th>
                        <th>View/Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Invoice Number</th>
                        <th>PO#</th>
                        <th>Status</th>
                        <th>View/Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted" style="float:right;">      
        <a href="#" data-toggle="help" title="Need Help?" data-content="Use the 'Search' Bar to search the customer database.
        Click 'View/Edit' to change an invoice."> 
        <i class="fa fa-question-circle" style="font-size:24px;color:red;" aria-hidden="true"></i></a>
       </span>
      </div>
    </footer>
@endsection

@section('footScripts')


<script>

    var invoicesTable = $('#invoicesTable').DataTable({
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
            null
        ],
        "columnDefs": [{
            // The `data` parameter refers to the data for the cell (defined by the
            // `data` option, which defaults to the column being worked with, in
            // this case `data: 0`.
            "render": function (data, type, row) {
                return "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>";
            },
            "targets": 4
        },
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 4 }
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
    $('#invoicesTable tbody').on('click', 'i', function () {
        var data = invoicesTable.row($(this).parents('tr')).data();
        alert('You clicked on id ' + data['id'] + '\'s edit button');
    });

     //popover 
     $(document).ready(function(){
        $('[data-toggle="help"]').popover();
    });

</script>
@endsection