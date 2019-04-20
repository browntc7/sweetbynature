<template>
  <form>
  <div class="form-group">
    <label for="customerName">Customer Name</label>
    <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="int" class="form-control" id="address" placeholder="Address">
  </div>
  <div class="form-group">
    <label for="Phone #">Phone #</label>
    <input type="string" class="form-control" id="Phone #" placeholder="Phone #">
  </div>
  <div class="form-group">
    <label for="Shipping Address">Shipping Address</label>
    <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
  </div>
   <div class="form-group">
    <label for="sameAddress">Set Shipping As Billing</label>
    <input type="int" class="form-control" id="sameAddress" placeholder="Set Shipping As Billing">
  </div>
      <button class="btn btn-primary" type="reset">Cancel</button>
      <button class="btn btn-primary" type="submit">Submit</button>
</form>

</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
