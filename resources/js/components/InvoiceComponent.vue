<template>
    <form>
        <div class="row">
            <div class="col-lg-6">
                <h1>Invoice</h1>
                <b>
                    <p>Sweet By Nature<br>Some Address Ln<br>South Africa<br>3429348<br></p>
                </b>
                <button class="btn btn-primary no-print" type="submit">Open</button>
                <button class="btn btn-warning no-print" type="submit">Pending</button>
                <button class="btn btn-success no-print" type="submit">Closed</button>
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
                        <input type="text" 
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
                        <input type="text" 
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
                    v-model="fields.purchase_order.customer.billing_address" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="shippingAddress" placeholder="Shipping Street"
                    v-model="fields.purchase_order.customer.shipping_address" disabled>
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
                    purchase_order: {
                        customer: {}
                    }
                },
                errors: {}
            };
        },
        methods: {
            getInvoice(invoiceID) {
                this.errors = {};
                axios
                    .get("../api/invoices/" + invoiceID)
                    .then(response => {
                        //hide the modal on the view
                        this.fields = response.data.data;
                        // var parseTime = ;
                        this.fields.created_at = this.formatDate(response.data.data.created_at);
                        this.fields.due_date = this.addDays(this.formatDate(response.data.data.created_at),30);
                        this.fields.ammount_due = "$" + this.getTotal(response.data.data.purchase_order.purchase_order_items);
                    })
                    .catch(error => {
                        alert("The Transaction Failed on the Server");
                    });
            },
            // Given a string in m/d/y format, return a Date
            parseMDY(s) {
                var b = s.split(/\D/);
                return new Date(b[2], b[0] - 1, b[1]);
            },

            // Given a Date, return a string in m/d/y format
            formatMDY(d) {
                function z(n) {
                    return (n < 10 ? '0' : '') + n
                }
                if (isNaN(+d)) return d.toString();
                return z(d.getMonth() + 1) + '/' + z(d.getDate()) + '/' + d.getFullYear();
            },

            // Given a string in m/d/y format, return a string in the same format with n days added
            addDays(s, days) {
                var d = this.parseMDY(s);
                d.setDate(d.getDate() + Number(days));
                return this.formatMDY(d);
            },
            formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [month, day,year].join('/');
            },
            getTotal: function(purchaseOrderItems){
                var total = 0;
                    purchaseOrderItems.forEach(element => {
                        
                        total += (element.qty * parseFloat(element.inventory.product.unit_cost));
            
                    });
        
                    return total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            }
        }
    };

</script>
