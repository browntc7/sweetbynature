<template>
  <form>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="text" class="form-control" id="date" placeholder="date">
  </div>
  <div class="form-group">
    <label for="productionOrderNum">Production Order Number</label>
    <input type="string" class="form-control" id="productionOrderNum" placeholder="productionOrderNum">
  </div>
  <div class="form-group">
    <label for="customerNum">Customer Number</label>
    <input type="int" class="form-control" id="customerNum" placeholder="customerNum">
  </div>
  <div class="form-group">
    <label for="lotNumID">Lot Number ID</label>
    <input type="int" class="form-control" id="lotNumID" placeholder="lotNumID">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input type="int" class="form-control" id="status" placeholder="status">
  </div>
  <div class="form-group">
    <label for="item">Item</label>
    <input type="int" class="form-control" id="item" placeholder="item">
  </div>
  <div class="form-group">
    <label for="inputQty">Input Qty</label>
    <input type="int" class="form-control" id="inputQty" placeholder="inputQty">
  </div>
  <div class="form-group">
    <label for="outputQty">Output Qty</label>
    <input type="int" class="form-control" id="outputQty" placeholder="outputQty">
  </div>
     <button type="reset">Cancel</button>
     <button type="submit">Submit</button>
</form>

</template>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
