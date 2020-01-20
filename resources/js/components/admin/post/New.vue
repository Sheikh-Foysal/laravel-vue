<template>
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Add Post</h3>
                    <div class="card-tools">
                        <router-link to="/category-list" class="btn btn-success">Back</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form @submit.prevent="addCategory()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Add title" id="titleId" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" placeholder="Add description" id="descriptionId" v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                            <has-error :form="form" field="description"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="Category">Category</label>
                            <select class="form-control" name="category_id" :class="{ 'is-invalid': form.errors.has('category_id') }">
                                <option seleted disabled>Select one..</option>
                                <option :value="category.id" v-for="category in getallCategory">{{ category.cat_name }}</option>
                            </select>
                            <has-error :form="form" field="category_id"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Save</button>
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
    name: 'New',
    data(){
        return {
            form:new Form({
                title:'',
                description:'',
                category_id:'',
                photo:'' 
            })
        }
    },
    mounted(){
        this.$store.dispatch("allCategory")
    },
    computed:{
        getallCategory(){
            return this.$store.getters.getCategory
        }
    },
    methods: {
       
    },
}
</script>

<style scoped>

</style>