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
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Cats</th>
                        <th>Updated At</th>
                        <th>Pizza</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
