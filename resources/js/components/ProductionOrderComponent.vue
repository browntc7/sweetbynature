<template>
  <form>
  <!-- <div class="form-group">
    <label for="date">Date</label>
    <input type="text" class="form-control" id="date" placeholder="date">
  </div> -->
  <!-- <div class="form-group">
    <label for="productionOrderNum">Production Order Number</label>
    <input type="string" class="form-control" id="productionOrderNum" placeholder="productionOrderNum">
  </div> -->
  <div class="form-group">
    <label for="customerNum">Customer Number</label>
    <input type="int" class="form-control" id="customerNum" placeholder="customerNum">
  </div>
  <!-- <div class="form-group">
    <label for="lotNumID">Lot Number ID</label>
    <input type="int" class="form-control" id="lotNumID" placeholder="lotNumID">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input type="int" class="form-control" id="status" placeholder="status">
  </div> -->
 <div v-for="item in clicks">
    <div class="form-group">
      <label for="item">Item</label>
      <input type="int" class="form-control" id="item" placeholder="item">
    </div>
    <div class="form-group">
      <label for="inputQty">Qty</label>
      <input type="int" class="form-control" id="inputQty" placeholder="inputQty">
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
