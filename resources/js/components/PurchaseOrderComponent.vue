<template>
  <form>
  <div class="form-group">
    <label for="customerName">Customer Name</label>
    <input type="text" class="form-control" id="customerName" placeholder="customerName">
  </div>
  <div class="form-group">
    <label for="customerNum">Customer #</label>
    <input type="int" class="form-control" id="customerNum" placeholder="customerNum">
  </div>
  <div class="form-group">
    <label for="item">Item</label>
    <input type="string" class="form-control" id="item" placeholder="item">
  </div>
  <div class="form-group">
    <label for="quantity">QTY</label>
    <input type="int" class="form-control" id="quantity" placeholder="quantity">
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
