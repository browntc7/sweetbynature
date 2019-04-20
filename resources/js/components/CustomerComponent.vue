<template>
    <form>
        <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input type="text" class="form-control" id="customerName" placeholder="Customer Name">
        </div>

        <div class="form-group">
            <label for="address">Street - Billing Address</label>
            <input type="int" class="form-control" id="address" placeholder="Street">
        </div>
        <div class="form-group">
            <label for="address">City - Billing Address</label>
            <input type="int" class="form-control" id="address" placeholder="City">
        </div>
        <div class="form-group">
            <label for="address">Zip - Billing Address</label>
            <input type="int" class="form-control" id="address" placeholder="Zip">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="sameAddress">
            <label class="form-check-label" for="sameAddress">Set Shipping As Billing</label>
        </div>
        <div class="form-group">
            <label for="Shipping Address">Street - Shipping Address</label>
            <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
        </div>
        <div class="form-group">
            <label for="Shipping Address">Street - Shipping Address</label>
            <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
        </div>
        <div class="form-group">
            <label for="Shipping Address">Street - Shipping Address</label>
            <input type="int" class="form-control" id="Shipping Address" placeholder="Shipping Address">
        </div>
        <div class="form-group">
            <label for="Phone #">Phone #</label>
            <input type="string" class="form-control" id="Phone #" placeholder="Phone #">
        </div>
        
        
    </form>

</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
