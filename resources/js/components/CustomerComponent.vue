<template>
    <form @submit.prevent>
        <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input type="text" class="form-control" max=30 name="customerName" id="customerName"
                v-model="fields.customer_name" placeholder="Customer Name" required>
            <div class="invalid-feedback">
                Please provide a customer name.
            </div>
        </div>
        <div class="form-group">
            <label for="customerEmail">Customer Email</label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                name="customerEmail" id="customerEmail" v-model="fields.email" placeholder="Customer Email" required>
            <div class="invalid-feedback">
                Please provide a valid email.
            </div>
        </div>
        <div class="form-group">
            <label for="customerPhone">Customer Phone</label>
            <input type="phone" class="form-control" name="customerPhone" id="customerPhone"
                v-model="fields.phone" placeholder="Customer Phone" required>
            <div class="invalid-feedback">
                Please provide a valid phone number.
            </div>
        </div>
        <div class="form-group">
            <label for="billingStreet">Street - Billing Address</label>
            <input type="text" class="form-control" max="30" name="billingStreet" id="billingStreet"
                v-model="fields.billing_address" placeholder="Street" required>
            <div class="invalid-feedback">
                Please provide a valid billing street.
            </div>
        </div>
        <div class="form-group">
            <label for="billingCity">City - Billing Address</label>
            <input type="text" class="form-control" name="billingCity" id="billingCity" v-model="fields.billing_city"
                placeholder="City" required>
            <div class="invalid-feedback">
                Please provide a valid billing city.
            </div>
        </div>
        <div class="form-group">
            <label for="billingState">State - Billing Address</label>
            <input type="text" class="form-control" max="2" name="billingState" id="billingState"
                v-model="fields.billing_state" placeholder="State" required>
            <div class="invalid-feedback">
                Please provide a valid billing state.
            </div>
        </div>
        <div class="form-group">
            <label for="billingZip">Zip - Billing Address</label>
            <input type="int" pattern="\d{5}" class="form-control" name="billingZip" id="billingZip" placeholder="Zip"
                required>
            <div class="invalid-feedback">
                Please provide a valid billing zip code.
            </div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="copyShipping" id="copyShipping"
                v-model="fields.copy_shipping">
            <label class="form-check-label" for="sameAddress">Set Shipping As Billing</label>
        </div>
        <div v-if="!fields.copy_shipping">
            <div class="form-group">
                <label for="shippingAddress">Street - Shipping Address</label>
                <input type="int" class="form-control" id="shippingAddress" placeholder="Shipping Address"
                    v-model="fields.shipping_address">
            </div>
            <div class="form-group">
                <label for="shippingCity">City - Shipping Address</label>
                <input type="int" class="form-control" id="shippingCity" placeholder="City"
                    v-model="fields.shipping_city">
            </div>
            <div class="form-group">
                <label for="shippingState">State - Shipping Address</label>
                <input type="int" class="form-control" id="shippingState" placeholder="State"
                    v-model="fields.shipping_state">
            </div>
            <div class="form-group">
                <label for="shippingZip">Zip - Shipping Address</label>
                <input type="int" class="form-control" id="shippingZip" placeholder="Zip" v-model="fields.shipping_zip">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" v-if="showSubmit" v-on:click="submitCustomer()"
                class="btn btn-primary">Submit</button>
            <button type="submit" v-if="!showSubmit" v-on:click="editCustomer()" class="btn btn-primary">Update</button>
        </div>

    </form>

</template>
   //ref for validation   
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/mvc/3.0/jquery.validate.unobtrusive.min.js"></script>
<script>
export default {
  //data for the vue instance 
  data() {
    return {
      //set copy_shipping to true so its checked other views need only fields:{}
      fields: {copy_shipping:true},
      errors: {},
      showSubmit: {},
    }
  },
  methods: {
     checkForm: function (e) {
      if (this.fields = data) {
        return true;
      }

      this.errors = [];

      if (!this.customer_name) {
        this.errors.push('Customer Name Required.');
      }
      // if (!this.age) {
      //   this.errors.push('Age required.');
      // }

      e.preventDefault();
    },
  
    showSubmitButton: function () {
                // clear fields
                this.fields = {};
                //set shipping bool to true
                // this.fields.copy_shipping = true;
                //show submit button
                this.showSubmit = true;
            },
    showEditButton: function (data) {
                // clear fields
                 this.fields = data;
                // hide submit button
                this.showSubmit = false;
            },
    submitCustomer: function() {
      this.errors = {};
      axios.post('/api/addCustomer', this.fields).then(response => {
        //hide the modal on the view
      $("#customerModal").modal("hide");
      // clear form
      this.fields = {};
      //reload table data and sort using the table name variable
       customerTable.ajax.reload().order([0,"desc"]);
      }).catch(error => {
        alert("The Transaction Failed on the Server")
      });
    }, 
    editCustomer: function() {
      this.errors = {};
      axios.put('/api/customer/' + this.fields.customer_id + '/edit/', this.fields).then(response => {
        //hide the modal on the view
      $("#customerModal").modal("hide");
      // clearform
       this.fields = {};
      //reload table data and sort using the table name variable
       customerTable.ajax.reload( null, false );
      }).catch(error => {
        alert("The Transaction Failed on the Server")
      });
    }, 
  //     //prevent form submission if validation fails
  //   documentReady: function(){
  //     $("#form").submit(function (e) {
  //       alert("Unable To Submit - Correct Missing Fields");
  //       e.preventDefault();
  //  });
    
  // });
}
}
</script>
