<template>
  <form>
        <div class="form-group row">
            <label for="invoiceNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Invoice Number</label>
            <div class="col\-sm\-6">
                <input type="text" class="form-control" id="invoiceNumber" placeholder="123456">
            </div>
        </div>
        <div class="form-group row">
            <label for="createDate" class="col-sm-offset-2 col-sm-2 col-form-label">Date Created</label>
            <div class="col\-sm\-6">
                <input type="date"  pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$" class="form-control" id="createDate" placeholder="MM-DD-YYYY">
            </div>
        </div>
        <div class="form-group row">
            <label for="productionOrderNum" class="col-sm-offset-2 col-sm-2 col-form-label">Purchase Order
                #</label>
            <div class="col\-sm\-6">
                <input type="int" class="form-control" id="productionOrderNum" placeholder="123456">
            </div>
        </div>
        <div class="form-group row">
            <label for="dueDate" class="col-sm-offset-2 col-sm-2 col-form-label">Due Date</label>
            <div class="col\-sm\-6">
                <input type="date" pattern="^(0[1-9]|1[012])[- \.](0[1-9]|[12][0-9]|3[01])[- \.](19|20)\d\d$" class="form-control" id="dueDate" placeholder="MM-DD-YYYY">
            </div>
        </div>
        <div class="form-group row">
            <label for="amountDue" class="col-sm-offset-2 col-sm-2 col-form-label">Amount Due $</label>
            <div class="col\-sm\-6">
                <input type="int" class="form-control" id="amountDue" placeholder="0.00">
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
