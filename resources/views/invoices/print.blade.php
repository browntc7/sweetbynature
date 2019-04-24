@extends('layouts.master')

@section('content')
<div class="container">
    <form>
        <div class="row">
            <div class="col-lg-6">
                <h1>Invoice Edit</h1>
                <b>
                    <p>Sweet By Nature<br>Some Address Ln<br>South Africa<br>3429348<br></p>
                </b>
                <button class="btn btn-primary" type="submit">Release To Production</button>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="invoiceNumber" class="col-sm-6 col-form-label">Invoice Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="invoiceNumber" placeholder="123456">
                    </div>
                </div>
                <div class="form-group">
                    <label for="createDate" class="col-sm-6 col-form-label">Date Created</label>
                    <div class="col-sm-6">
                        <input type="date" pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$"
                            class="form-control" id="createDate" placeholder="MM-DD-YYYY">
                    </div>
                </div>
                <div class="form-group">
                    <label for="productionOrderNum" class="col-sm-6 col-form-label">Purchase Order
                        #</label>
                    <div class="col-sm-6">
                        <input type="int" class="form-control" id="productionOrderNum" placeholder="123456">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dueDate" class="col-sm-6 col-form-label">Due Date</label>
                    <div class="col-sm-6">
                        <input type="date" pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$"
                            class="form-control" id="dueDate" placeholder="MM-DD-YYYY">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amountDue" class="col-sm-6 col-form-label">Amount Due $</label>
                    <div class="col-sm-6">
                        <input type="int" class="form-control" id="amountDue" placeholder="0.00">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6">
                <p>BILL TO: </p>
            </div>
            <div class="col-lg-6">
                <p>SHIP TO: </p>
            </div>

        </div>
        <!--Customer Name -->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
            </div>
        </div>
        <!--Address-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="billingAddress" placeholder="Billing Street">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="shippingAddress" placeholder="Shipping Street">
            </div>
        </div>
        <!--City-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="city" placeholder="City">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="city" placeholder="City">
            </div>
        </div>
        <!--State-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="state" placeholder="State">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="state" placeholder="State">
            </div>
        </div>
        <!--Zip Code-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="zip" placeholder="Zip Code">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="zip" placeholder="Zip Code">
            </div>
        </div>

        <!--invoice table-->
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
    </form>
</div>

@endsection
@section('footScripts')


<script>
    //load info message html
    $('#infoMessage').load('{{asset('info/invoicePrint.html')}}');

</script>
@endsection
