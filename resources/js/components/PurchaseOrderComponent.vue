<template>
  <form>
  <div class="form-group">
    <label for="customerName">Customer Name</label>
    <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
  </div>
  <div class="form-group">
    <label for="customerNum">Customer #</label>
    <input type="int" class="form-control" id="customerNum" placeholder="Customer #">
  </div>
  <div v-for="item in clicks">
    <div class="form-group">
      <label for="item">Item</label>
      <input type="int" class="form-control" id="item" placeholder="Item">
    </div>
    <div class="form-group">
      <label for="inputQty">Qty</label>
      <input type="int" class="form-control" id="inputQty" placeholder="Qty">
    </div>
 </div>
  <i @click="addToLoop(1)" class="fa fa-plus-square-o addIcon" aria-hidden="true"></i>

  <!-- <div class="form-group">
    <label for="outputQty">Output Qty</label>
    <input type="int" class="form-control" id="outputQty" placeholder="outputQty">
  </div> -->
     <!-- <button class="btn btn-secondary" type="reset">Cancel</button>
     <button class="btn btn-primary" type="submit">Submit</button> -->
</form>

</template>


<script>
    export default {
        data: function(){
            return {clicks: 1}
        },
        methods: {
            addToLoop: function (number) {
                this.clicks += number
            }
        }
    }

</script>