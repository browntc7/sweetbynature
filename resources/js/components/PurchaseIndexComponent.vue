<template>
   <div class="container">
     <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Value 1</th>
                        <th>Value 2</th>
                        <th>Value 3</th>
                        <th>Value 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
