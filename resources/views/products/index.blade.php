@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Products</h1>
  <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
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
@endsection