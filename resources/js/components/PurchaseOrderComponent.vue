<template>
  <form>
  <div class="form-group">
    <label for="customerName">Customer Name</label>
    <input type="text" class="form-control" id="customerName" placeholder="Customer Name" v-model="fields.customer_name">
  </div>
  <div class="form-group">
    <label for="customerNum">Customer #</label>
    <input type="int" class="form-control" id="customerNum" placeholder="Customer #" v-model="fields.customer_number">
  </div>
  <div v-for="item in clicks">
    <div class="form-group">
      <label for="item">Item</label>
      <select name="products" id="products" v-model="fields.product_ud">
        <option value="1">Seedling</option>
        <option value="2">Extract</option>
        <option value="3">Raw Honeybush</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputQty">Qty</label>
      <input type="int" class="form-control" id="inputQty" placeholder="Qty" v-model="fields.input_quantity">
    </div>
 </div>
  <i @click="addToLoop(1)" class="fa fa-plus-square-o addIcon" aria-hidden="true" v-model="fields.item"></i>

  <!-- <div class="form-group">
    <label for="outputQty">Output Qty</label>
    <input type="int" class="form-control" id="outputQty" placeholder="outputQty">
  </div> -->
     <!-- <button class="btn btn-secondary" type="reset">Cancel</button>
     <button class="btn btn-primary" type="submit">Submit</button> -->
</form>

</template>


<script>
//function to set click count for vue component
function initialClick() {
    return {
        clicks:1
    }
}
    export default {
        data: function () {
            
            return{
             //set copy_shipping to true so its checked other views need only fields:{}
                clicks:1,
                fields: {copy_shipping:true},
                errors: {},
                showSubmit: {},
            }
        },
        methods: {
            addToLoop: function (number) {
                this.clicks += number
            },
            resetWindow: function () {
                Object.assign(this.$data, initialClick());
            }
        }
    }

</script>