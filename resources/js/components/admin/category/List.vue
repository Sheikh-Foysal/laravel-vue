<template>
    <div class="content">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Category List</h3>
                    <div class="card-tools">
                        <router-link to="/add-category" class="btn btn-success">Add Category</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(category,index) in getallCategory" :key="category.id">
                            <td>{{ index+1 }}</td>
                            <td>{{ category.cat_name }}</td>
                            <td>{{ category.created_at | timeformat }}</td>
                            <td>
                                <router-link :to="`/edit-category/${category.id}`" class="btn btn-success btn-sm">Edit</router-link>
                                <a href="" class="btn btn-danger btn-sm" @click.prevent = "deleteCategory(category.id)">Trash</a>
                            </td>
                        </tr>
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
    mounted() {
         this.$store.dispatch("allCategory")
    },
    computed: {
        getallCategory(){
            // return this.$store.getters.getCategory
            return this.$store.getters.getCategory
        }
    },
    methods: {
        deleteCategory(id){
            axios.get('/category/'+id)
                    this.$store.dispatch("allCategory")
                    .then((response)=>{
                        toast.fire({
                            icon: 'success',
                            title: 'Category deleted successfully ;)'
                        })
                    })
                    .catch(()=>{

                    })
        }
    },
}
</script>

<style scoped>

</style>