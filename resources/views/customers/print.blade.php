@extends('layouts.master')

@section('content')
<div class="container">
<h1>Customers Edit</h1>
<div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                        <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Billing Address</th>
                        <th>Shipping Address</th>
                        <th>Phone Number</th>
                        <th>E-mail Address</th>
                        <!-- <th>Created At</th>
                        <th>Updated At</th> -->
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Billing Address</th>
                        <th>Shipping Address</th>
                        <th>Phone Number</th>
                        <th>E-mail Address</th>
                        <!-- <th>Created At</th>
                        <th>Updated At</th> -->
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div> 
</div> 
    <footer class="footer">
      <div class="container">
        <span class="text-muted" style="float:right;">      
        <a href="#" data-toggle="help" title="Need Help?" data-content="Use the 'Search' Bar to search the customer database. 
                Click 'Edit' to change a customer record."> 
        <i class="fa fa-question-circle" style="font-size:24px;color:red;" aria-hidden="true"></i></a>
       </span>
      </div>
    </footer>


@endsection

@section('footScripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script>
    
    $('#myTable').DataTable({
        ajax: {
        url:"api/raw/json",//change to appropriate data call
        dataSrc:"data"
    },
        columns:[ //change to data model
                    { 'data': 'key' },
                    { 'data': 'registerName' },
                    { 'data': 'Value2' },
                    { 'data': 'Value3' },
                    { 'data': 'Value4' }
                ]
    
    });

     /* popover 
     $(document).ready(function(){
        $('[data-toggle="help"]').popover();
    }); */
</script>
@endsection
