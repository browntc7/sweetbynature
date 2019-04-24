<template>
 <form> 	
  <div class="form-group row">
    <label for="itemNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Item #</label>
    <div class="col\-sm\-6">
      <input type="int" class="form-control" id="itemNumber" placeholder="Item #" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="itemDescription" class="col-sm-offset-2 col-sm-2 col-form-label">Item Description</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="itemDescription" placeholder="Item Description" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="location" class="col-sm-offset-2 col-sm-2 col-form-label">Location</label>
    <div class="col\-sm\-6">
      <input type="text" class="form-control" id="location" placeholder="Location" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="qty" class="col-sm-offset-2 col-sm-2 col-form-label">Qty</label>
    <div class="col\-sm\-6">
      <input type="int" max="4" class="form-control" id="qty" placeholder="Qty" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="unitCost" class="col-sm-offset-2 col-sm-2 col-form-label">Unit Cost</label>
    <div class="col\-sm\-6">
      <input type="int" class="form-control" id="unitCost" placeholder="Unit Cost" required>
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
      fields: { copy_shipping: true },
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
