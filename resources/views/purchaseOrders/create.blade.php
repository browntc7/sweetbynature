@extends('layouts.master')

@section('content')
<div class="container">
  <h1>Create Purchase Order</h1>


  <purchase-order-component></purchase-order-component>
  
</div>
<footer class="footer">
      <div class="container">
        <span class="text-muted" style="float:right;">      
        <a href="#" data-toggle="help" title="Need Help?" data-content=""> 
        <i class="fa fa-question-circle" style="font-size:24px;color:red;" aria-hidden="true"></i></a>
       </span>
      </div>
    </footer>
@endsection

<!--javascript
 //popover 
    $(document).ready(function(){
        $('[data-toggle="help"]').popover();
    });
-->