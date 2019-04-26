<template>
    <form @submit.prevent>
        <div v-if="showSubmit">
            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name"
                    v-model="fields.customer_name">
            </div>
            <div class="form-group">
                <label for="customerNum">Customer #</label>
                <input type="int" class="form-control" id="customerNum" placeholder="Customer #"
                    v-model="fields.customer_number">
            </div>
            <!-- <div v-for="item in clicks"> -->
                <div class="form-group">
                    <label for="item">Item</label>
                    <select name="products" class="form-control" id="products" v-model="fields.product_id[0]">
                        <option value="1">Seedling</option>
                        <option value="2">Extract</option>
                        <option value="3">Raw Honeybush</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputQty">Qty</label>
                    <input type="int" class="form-control" id="inputQty" placeholder="Qty"
                        v-model="fields.input_quantity[0]">
                </div>
                <div class="form-group">
                    <label for="item">Item</label>
                    <select name="products" class="form-control" id="products" v-model="fields.product_id[1]">
                        <option value="1">Seedling</option>
                        <option value="2">Extract</option>
                        <option value="3">Raw Honeybush</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputQty">Qty</label>
                    <input type="int" class="form-control" id="inputQty" placeholder="Qty"
                        v-model="fields.input_quantity[1]">
                </div>
                <div class="form-group">
                    <label for="item">Item</label>
                    <select name="products" class="form-control" id="products" v-model="fields.product_id[2]">
                        <option value="1">Seedling</option>
                        <option value="2">Extract</option>
                        <option value="3">Raw Honeybush</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputQty">Qty</label>
                    <input type="int" class="form-control" id="inputQty" placeholder="Qty"
                        v-model="fields.input_quantity[2]">
                </div>
            <!-- </div> -->
            <!-- <i @click="addToLoop(1)" class="fa fa-plus-square-o addIcon" aria-hidden="true" v-model="fields.item"></i> -->


        </div>
        <div class="form-group" v-if="!showSubmit">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" v-model="fields.status">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
                <option value="Pending">Pending</option>
            </select>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" v-if="showSubmit" v-on:click="submitPurchaseOrder()"
                class="btn btn-primary">Submit</button>
            <button type="submit" v-if="!showSubmit" v-on:click="editPurchaseOrder()"
                class="btn btn-primary">Update</button>
        </div>
    </form>

</template>


<script>
//function to set click count for vue component
function initialClick() {
    return {
        clicks: 1
    }
}
export default {
    data: function () {

        return {
            //set copy_shipping to true so its checked other views need only fields:{}
            clicks: 1,
            fields: {
                copy_shipping: true,
                product_id:[],
                input_quantity:[]
            },
            errors: {},
            showSubmit: {},
        }
    },
    methods: {
        addToLoop: function (number) {
            this.clicks += number
        },
        showPOEditModal: function (data) {
            this.fields.status = data.status;
            this.fields.purchase_order_id = data.purchase_order_id;
            this.showSubmit = false;
            $("#purchaseOrderModal").modal("show");
            $("#purchaseOrderTitle").html("Edit Purchase Order - " + data.purchase_order_id );
        },
        showPOSubmitModal: function (customerName, customerID) {
            this.fields.customer_name = customerName;
            this.fields.customer_number = customerID;
            this.showSubmit = true;
            $("#purchaseOrderModal").modal("show");
            $("#purchaseOrderTitle").html("Create Purchase Order");

        },
        resetWindow: function () {
            Object.assign(this.$data, initialClick());
        },
        submitPurchaseOrder: function () {
            this.errors = {};
            axios.post('/api/addPurchaseOrder', this.fields).then(response => {
                //hide the modal on the view
                $("#purchaseOrderModal").modal("hide");
                // clear form
                this.fields = {};
                //reload table data and sort using the table name variable
                purchaseOrderTable.ajax.reload().order([0, "desc"]);
            }).catch(error => {
                alert("The Transaction Failed on the Server")
            });
        },
        editPurchaseOrder: function () {
            this.errors = {};
            axios.put('/api/purchaseOrders/' + this.fields.purchase_order_id + '/edit/', this.fields).then(response => {
                //hide the modal on the view
                $("#purchaseOrderModal").modal("hide");
                // clearform
                this.fields = {};
                //reload table data and sort using the table name variable
                purchaseOrderTable.ajax.reload(null, false);
            }).catch(error => {
                alert("The Transaction Failed on the Server")
            });
        },
    }
}

</script>

