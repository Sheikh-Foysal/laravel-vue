<template>
    <div class="content">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Post List</h3>
                    <div class="card-tools">
                        <router-link to="/add-post" class="btn btn-success">Add Post</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
    // $("#example1").DataTable();

export default {
    name: 'List',
    mounted(){

    },
    computed:{

    },
    methods:{
        
    }
}
</script>

<style scoped>

</style>