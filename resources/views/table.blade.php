@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footScripts')
<script>
    
    $('#myTable').DataTable({
        ajax: {
        url: 'api/raw/json',
        dataSrc : 'data',
        },
       
        columns: [
            { 'data': 'id' },
            { 'data': 'Value1' },
            { 'data': 'Value1' },
            { 'data': 'Value1' },
            { 'data': 'Value1' },
            { 'data': 'created_at' },
            { 'data': 'updated_at' }
        ]
    
    });

</script>
@endsection
