@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Invoices Print View</h1>
  <template>
    <div class="container">
    <p>Invoice Number
    <input type="text" value="123456">
    <br> 
       Created Date  <input type="text" value="MMDDYYYY"><br>
       PO #  <input type="text" value="123456"><br>
       Due Date  <input type="text" value="MMDDYYYY"><br>
       Amount Due  <input type="text" value="$0.00"><br>
    </p>
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
</template>
</div>
@endsection