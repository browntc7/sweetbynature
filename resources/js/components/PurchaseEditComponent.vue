<template>
  <form @submit.prevent="submit">
    <div class="form-group row">
      <label for="Date" class="col-sm-offset-2 col-sm-2 col-form-label">Date</label>
      <div class="col\-sm\-6">
        <input type="date" pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$" class="form-control" id="Date" placeholder="MM-DD-YYYY">
      </div>
    </div>
    <div class="form-group row">
      <label for="purchaseOrder" class="col-sm-offset-2 col-sm-2 col-form-label">Purchase Order #</label>
      <div class="col\-sm\-6">
        <input type="int" class="form-control" id="purchaseOrder" placeholder="purchaseOrder" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="customerNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Customer #</label>
      <div class="col\-sm\-6">
        <input type="int" class="form-control" id="customerNumber" placeholder="customerNumber" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="status" class="col-sm-offset-2 col-sm-2 col-form-label">Status</label>
      <div class="col\-sm\-6">
        <input type="text" class="form-control" id="status" placeholder="status">
      </div>
    </div>
    <div class="form-group row">
      <label for="item" class="col-sm-offset-2 col-sm-2 col-form-label">Item</label>
      <div class="col\-sm\-6">
        <input type="text" class="form-control" id="item" placeholder="item">
      </div>
    </div>
    <div class="form-group row">
      <label for="Qty" class="col-sm-offset-2 col-sm-2 col-form-label">Qty</label>
      <div class="col\-sm\-6">
        <input type="int" class="form-control" id="Qty" placeholder="Qty" required>
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
