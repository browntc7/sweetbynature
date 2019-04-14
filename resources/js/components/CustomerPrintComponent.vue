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
    <label for="billing">Billing Address</label>
    <input type="string" class="form-control" id="billing" placeholder="billing">
  </div>
  <div class="form-group">
    <label for="shipping">Shipping Address</label>
    <input type="int" class="form-control" id="shipping" placeholder="shipping">
  </div>
   <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="int" class="form-control" id="phone" placeholder="phone">
  </div>
   <div class="form-group">
    <label for="email">Email Address</label>
    <input type="int" class="form-control" id="email" placeholder="email">
  </div>
     <button type="reset">Cancel</button> // hide on print
     <button type="submit">Submit</button> // hide on print
</form>

</template>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
