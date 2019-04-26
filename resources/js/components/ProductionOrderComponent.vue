<template>
  <form @submit.prevent>
    
  
      <div class="form-group">
           <label for="status">Status</label>
            <select name="status" class="form-control" id="status" v-model="fields.status">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
                <option value="Pending">Pending</option>
            </select>
      </div>
      <div class="form-group">
          <label for="outputQty">Output Qty</label>
          <input type="int" class="form-control" id="outputQty" v-model="fields.output_quantity"
              placeholder="Output Qty">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" v-on:click="editPurchaseOrder()">Submit</button>
      </div>

  </form>

</template>


<script>
    export default {
        data: function(){
            return {
          //set copy_shipping to true so its checked other views need only fields:{}
          fields: {
            production_order_items:{ 

            }
          },
          errors: {},
         
        }
        },
        methods: {
            showPOEditModal: function (data) {
            // this.fields.status = data.status;
            // this.fields.purchase_order_id = data.purchase_order_id;
            // this.showSubmit = false;
            this.fields = data;
            $("#productionOrderModal").modal("show");
        },
        editPurchaseOrder: function () {
            this.errors = {};
            axios.put('/api/productionOrders/' + this.fields.production_order_id + '/edit/', this.fields).then(response => {
                //hide the modal on the view
                $("#productionOrderModal").modal("hide");
                // clearform
                this.fields = {};
                //reload table data and sort using the table name variable
                productionOrdersTable.ajax.reload(null, false);
            }).catch(error => {
                alert("The Transaction Failed on the Server")
            });
        },
        }
    }

</script>
