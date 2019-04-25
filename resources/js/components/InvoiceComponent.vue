<template>
    <form>
        <div class="row">
            <div class="col-lg-6">
                <h1>Invoice</h1>
                <b>
                    <p>Sweet By Nature<br>Some Address Ln<br>South Africa<br>3429348<br></p>
                </b>
                <button class="btn btn-primary" type="submit">Close Invoice</button>
            </div>

            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="invoiceNumber" class="col-sm-4 col-form-label">Invoice Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="invoiceNumber" placeholder="123456"
                            v-model="fields.invoice_id" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="createDate" class="col-sm-4 col-form-label">Date Created</label>
                    <div class="col-sm-8">
                        <input type="date" pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$"
                            class="form-control" id="createDate" placeholder="MM-DD-YYYY" v-model="fields.created_at"
                            disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productionOrderNum" class="col-sm-4 col-form-label">Purchase Order
                        #</label>
                    <div class="col-sm-8">
                        <input type="int" class="form-control" id="productionOrderNum" placeholder="123456"
                            v-model="fields.purchase_order_id" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dueDate" class="col-sm-4 col-form-label">Due Date</label>
                    <div class="col-sm-8">
                        <input type="date" pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$"
                            class="form-control" id="dueDate" placeholder="MM-DD-YYYY" v-model="fields.due_date"
                            disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amountDue" class="col-sm-4 col-form-label">Amount Due $</label>
                    <div class="col-sm-8">
                        <input type="int" class="form-control" id="amountDue" placeholder="0.00"
                            v-model="fields.ammount_due" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contentPadding">

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
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name"
                    v-model="fields.purchase_order.customer.customer_name" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name"
                    v-model="fields.purchase_order.customer.customer_name" disabled>
            </div>
        </div>
        <!--Address-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="billingAddress" placeholder="Billing Street"
                    v-model="fields.purchase_order.customer.billing_street" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="shippingAddress" placeholder="Shipping Street"
                    v-model="fields.purchase_order.customer.shipping_street" disabled>
            </div>
        </div>
        <!--City-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="city" placeholder="City"
                    v-model="fields.purchase_order.customer.billing_city" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="city" placeholder="City"
                    v-model="fields.purchase_order.customer.shipping_city" disabled>
            </div>
        </div>
        <!--State-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="state" placeholder="State"
                    v-model="fields.purchase_order.customer.billing_state" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="state" placeholder="State"
                    v-model="fields.purchase_order.customer.shipping_state" disabled>
            </div>
        </div>
        <!--Zip Code-->
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="zip" placeholder="Zip Code"
                    v-model="fields.purchase_order.customer.billing_state" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="zip" placeholder="Zip Code"
                    v-model="fields.purchase_order.customer.shipping_state" disabled>
            </div>
        </div>
    </form>
</template>
<script>
    export default {
        //data for the vue instance
        data() {
            return {
                //set copy_shipping to true so its checked other views need only fields:{}
                fields: {
                   purchase_order:{
                       customer:{}
                   }
                },
                errors: {}
            };
        },
        methods: {
            submit() {
                this.errors = {};
                axios
                    .post("/api/addCustomer", this.fields)
                    .then(response => {
                        //hide the modal on the view
                        $("#purchaseOrderModal").modal("hide");
                        //reload table data and sort using the table name variable
                        customerTable.ajax.reload().order([0, "desc"]);
                    })
                    .catch(error => {
                        alert("The Transaction Failed on the Server");
                    });
            }
        }
    };

</script>
