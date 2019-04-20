@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Invoice</h1>
    <div class="container">
    <p>Sweet By Nature<br>Some Address Ln<br>South Africa<br>3429348<br></p>
    </div>
    <button class="btn btn-primary"type="submit">Release To Production</button><br>
    <div class="container">
    <p><br>Invoice Number
    <input type="text" value="123456">
    <br> 
       Created Date  <input type="text" value="MMDDYYYY"><br>
       PO #  <input type="text" value="123456"><br>
       Due Date  <input type="text" value="MMDDYYYY"><br>
       Amount Due  <input type="text" value="$0.00"><br>
    </p>
    </div>
    <div class="container">
    <p><b>BILL TO: </b><b>&emsp;SHIP TO: </b><br>
    <input type="text" value="Customer Name">
    <input type="text" value="Customer Name"><br>
    <input type="text" value="Billing Address">
    <input type="text" value="Shipping Address"><br>
    <input type="text" value="City">
    <input type="text" value="City"><br>
    <input type="text" value="State">
    <input type="text" value="State"><br>
    <input type="text" value="Zip Code">
    <input type="text" value="Zip Code"><br>
    </p>
    </div>
    <div class="container">
     <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
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
</div>
@endsection