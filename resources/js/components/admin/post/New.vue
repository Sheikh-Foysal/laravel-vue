<template>
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Add Post</h3>
                    <div class="card-tools">
                        <router-link to="/post-list" class="btn btn-success">Back</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form @submit.prevent="addnewPost()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Add title" id="titleId" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <!-- <textarea type="text" class="form-control" placeholder="Add description" id="descriptionId" v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea> -->
                                    <markdown-editor :options="options" v-model="form.description" name="description" ></markdown-editor>
                            <has-error :form="form" field="description"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="Category">Category</label>
                            <select class="form-control" name="category_id" :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id">
                                <option seleted disabled>Select one..</option>
                                <option :value="category.id" v-for="category in getallCategory" :key="category.id">{{ category.cat_name }}</option>
                            </select>
                            <has-error :form="form" field="category_id"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" @change="changePhoto($event)" class="form-control" name="photo"  :class="{ 'is-invalid': form.errors.has('photo') }"/>
                            <has-error :form="form" field="photo"></has-error>
                                <img :src="form.photo" alt="" class="img_width"/>
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
            }),
            options: {}
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
       changePhoto(event){
           let file = event.target.files[0];
           if(file.size > 1000000){
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Max uploaded size 1 MB',
                })
           }else{
               let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                    // console.log(event.target.result)
                };
                reader.readAsDataURL(file);
           }
       },
       addnewPost(){
           this.form.post('savepost')
            .then(()=>{
                        this.$router.push('/post-list')
                        toast.fire({
                        icon: 'success',
                        title: 'Post added successfully :)'
                        })
            })
            .catch(()=>{

            })
       }
    },
}
</script>

<style scoped>
img.img_width {
    width: 100px;
    height: 100px;
    object-fit: contain;
    border: 1px solid #eee;
    padding: 10px;
    margin: 30px 0;
}
</style>