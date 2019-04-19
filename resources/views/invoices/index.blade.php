@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Invoices View</h1>
  <template>
    <div class="container">
     <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>        
                        <th>Invoice Number</th>
                        <th>PO#</th>
                        <th>Status</th>      
                        <th>Edit</th>                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>    
                        <th>Invoice Number</th>
                        <th>PO#</th>
                        <th>Status</th>   
                        <th>Edit</th>           
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</template>
</div>
@endsection