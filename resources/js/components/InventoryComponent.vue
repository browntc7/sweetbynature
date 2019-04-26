<template>
 <form @submit.prevent> 	
  <div v-if="showSubmit">
    <div class="form-group row">
      <label for="itemNumber" class="col-sm-offset-2 col-sm-2 col-form-label">Item #</label>
      <div class="col-sm-6">
        <input type="int" class="form-control" id="itemNumber" placeholder="Item #" v-model="fields.inventory_id" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="itemDescription" class="col-sm-offset-2 col-sm-2 col-form-label">Item Description</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="itemDescription" placeholder="Item Description" v-model="fields.product.item_description" required>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="location" class="col-sm-offset-2 col-sm-2 col-form-label">Location</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="location" placeholder="Location" v-model="fields.product.location" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="qty" class="col-sm-offset-2 col-sm-2 col-form-label">Qty</label>
    <div class="col-sm-6">
      <input type="int" max="4" class="form-control" id="qty" placeholder="Qty" v-model="fields.quantity" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="unitCost" class="col-sm-offset-2 col-sm-2 col-form-label">Unit Cost</label>
    <div class="col-sm-6">
      <input type="int" class="form-control" id="unitCost" placeholder="Unit Cost" v-model="fields.product.unit_cost" required>
    </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" v-if="showSubmit" v-on:click="submit()">Submit</button>
      <button type="submit" class="btn btn-primary" v-if="!showSubmit" v-on:click="submit()">Update</button>
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
                product: {
                }
            },
            errors: {},
            showSubmit:true,
        };
    },
    methods: {
        submit() {
            this.errors = {};
            axios.put("/api/inventory/" + this.fields.inventory_id + "/edit", this.fields)
                .then(response => {
                    //hide the modal on the view
                    $("#inventoryModal").modal("hide");
                    //reload table data and sort using the table name variable
                    inventoryTable.ajax.reload( null, false );
                })
                .catch(error => {
                    alert("The Transaction Failed on the Server");
                });
        },
        showSubmitButton: function () {
                // clear fields
                this.fields = {};
                this.fields.product = {};
                //show submit button
                this.showSubmit = true;
            },
    showEditButton: function (data) {
                // clear fields
                 this.fields = data;
                // hide submit button
                this.showSubmit = false;
            },
        
    }
};
</script>
