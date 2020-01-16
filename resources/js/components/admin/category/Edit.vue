

<template>
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Edit Category {{ this.$route.params.categoryid }}</h3>
                    <div class="card-tools">
                        <router-link to="/category-list" class="btn btn-success">Back</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form @submit.prevent="addCategory()">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Update Category Name" id="categoryId" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                            <has-error :form="form" field="cat_name"></has-error>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</template>

<script>
export default {
    name: 'Edit',
    mounted(){
        axios.get(`/editcategory/${this.$route.params.categoryid}`)
            .then((response)=>{
                this.form.fill(response.data.category)
            })
    },
    data(){
        return {
            form: new Form({
                cat_name: '',
            })
        }
    },
    methods:{
        addCategory(){
            this.form.post('/add-category')
                .then((response)=>{
                    // console.log(response.data)
                    this.$router.push('/category-list')
                    
                        toast.fire({
                        icon: 'success',
                        title: 'Category added successfully :)'
                        })
                })
                 .catch( ()=>{
                     console.log('failed')
                 })

        }
    }
}
</script>

<style scoped>

</style>