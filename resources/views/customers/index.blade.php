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
                        <th>Phone Number</th>
                        <th>E-mail Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
@endsection

@section('footScripts')

<script>
  


</script>
@endsection
