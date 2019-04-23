<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input type="text" class="form-control" name="customerName" id="customerName" v-model="fields.customer_name" placeholder="Customer Name" required>
        </div>
        <div class="form-group">
            <label for="customerEmail">Customer Email</label>
            <input type="text"  class="form-control" name="customerEmail" id="customerEmail" v-model="fields.email" placeholder="Customer Email" required>
        </div>
        <div class="form-group">
            <label for="customerPhone">Customer Phone</label>
            <input type="text" class="form-control" name="customerPhone" id="customerPhone" v-model="fields.phone" placeholder="Customer Phone">
        </div>

        <div class="form-group">
            <label for="billingStreet">Street - Billing Address</label>
            <input type="int" class="form-control" max="30" name="billingStreet" id="billingStreet" v-model="fields.billing_address" placeholder="Street">
        </div>
        <div class="form-group">
            <label for="billingCity">City - Billing Address</label>
            <input type="int" class="form-control" name="billingCity" id="billingCity" v-model="fields.billing_city" placeholder="City">
        </div>
        <div class="form-group">
            <label for="billingState">State - Billing Address</label>
            <input type="int" class="form-control" name="billingState" id="billingState" v-model="fields.billing_state" placeholder="State">
        </div>
        <div class="form-group">
            <label for="billingZip">Zip - Billing Address</label>
            <input type="int" pattern="\d{5}" class="form-control" name="billingZip" id="billingZip" v-model="fields.billing_zip" placeholder="Zip">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="copyShipping" id="copyShipping" v-model="fields.copy_shipping">
            <label class="form-check-label" for="sameAddress">Set Shipping As Billing</label>
        </div>
      <div v-if="!fields.copy_shipping">
          <div class="form-group">
              <label for="shippingAddress">Street - Shipping Address</label>
              <input   type="int" class="form-control" id="shippingAddress" placeholder="Shipping Address" v-model="fields.shipping_address">
          </div>
          <div class="form-group">
              <label for="shippingCity">City - Shipping Address</label>
              <input type="int" class="form-control" id="shippingCity" placeholder="City" v-model="fields.shipping_city" >
          </div>
          <div class="form-group">
              <label for="shippingState">State - Shipping Address</label>
              <input type="int" class="form-control" id="shippingState" placeholder="State" v-model="fields.shipping_state" >
          </div>
          <div class="form-group">
              <label for="shippingZip">Zip - Shipping Address</label>
              <input type="int" class="form-control" id="shippingZip" placeholder="Zip" v-model="fields.shipping_zip" >
          </div>
      </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        
    </form>

</template>
<script>
export default {
  //data for the vue instance 
  data() {
    return {
      //set copy_shipping to true so its checked other views need only fields:{}
      fields: {copy_shipping:true},
      errors: {},
    }
  },
  methods: {
    submit() {
      this.errors = {};
      axios.post('/api/addCustomer', this.fields).then(response => {
        //hide the modal on the view
      $("#purchaseOrderModal").modal("hide");
      //reload table data and sort using the table name variable
       customerTable.ajax.reload().order([0,"desc"]);
      }).catch(error => {
        alert("The Transaction Failed on the Server")
      });
    },
  },
}
</script>
