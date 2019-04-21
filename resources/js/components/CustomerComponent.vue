<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input type="text" class="form-control" name="customerName" id="customerName" v-model="fields.customerName" placeholder="Customer Name">
        </div>

        <div class="form-group">
            <label for="shippingStreet">Street - Billing Address</label>
            <input type="int" class="form-control" name="shippingStreet" id="shippingStreet" v-model="fields.shippingStreet" placeholder="Street">
        </div>
        <div class="form-group">
            <label for="shippingCity">City - Billing Address</label>
            <input type="int" class="form-control" name="shippingCity" id="shippingCity" v-model="fields.shippingCity" placeholder="City">
        </div>
        <div class="form-group">
            <label for="shippingZip">Zip - Billing Address</label>
            <input type="int" class="form-control" name="shippingZip" id="shippingZip" v-model="fields.shippingZip" placeholder="Zip">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="copyShipping" id="copyShipping" v-model="fields.copyShipping" checked>
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
