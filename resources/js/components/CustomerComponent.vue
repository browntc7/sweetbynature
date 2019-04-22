<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input type="text" class="form-control" name="customerName" id="customerName" v-model="fields.customer_name" placeholder="Customer Name">
        </div>
        <div class="form-group">
            <label for="customerEmail">Customer Email</label>
            <input type="text" class="form-control" name="customerEmail" id="customerEmail" v-model="fields.email" placeholder="Customer Email">
        </div>
        <div class="form-group">
            <label for="customerPhone">Customer Phone</label>
            <input type="text" class="form-control" name="customerPhone" id="customerPhone" v-model="fields.phone" placeholder="Customer Phone">
        </div>

        <div class="form-group">
            <label for="billingStreet">Street - Billing Address</label>
            <input type="int" class="form-control" name="billingStreet" id="billingStreet" v-model="fields.billing_street" placeholder="Street">
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
            <input type="int" class="form-control" name="billingZip" id="billingZip" v-model="fields.billing_zip" placeholder="Zip">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="copyShipping" id="copyShipping" v-model="fields.copy_shipping" checked>
            <label class="form-check-label" for="sameAddress">Set Shipping As Billing</label>
        </div>
        <!-- <div class="form-group">
            <label for="Shipping Address">Street - Shipping Address</label>
            <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
        </div>
        <div class="form-group">
            <label for="Shipping Address">Street - Shipping Address</label>
            <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
        </div>
        <div class="form-group">
            <label for="Shipping Address">Street - Shipping Address</label>
            <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
        </div>
        <div class="form-group">
            <label for="Phone #">Phone #</label>
            <input type="string" class="form-control" id="Phone #" placeholder="Phone #">
        </div> -->
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        
    </form>

</template>
<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
    }
  },
  methods: {
    submit() {
      this.errors = {};
      axios.post('/api/addCustomer', this.fields).then(response => {
        alert('Message sent!');
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
  },
}
</script>
