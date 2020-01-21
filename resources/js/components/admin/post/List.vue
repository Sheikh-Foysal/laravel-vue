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
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post,index) in getallPost" :key="post.id">
                            <td>{{ index+1 }}</td>

                            <td>
                                <div v-if="post.user">{{ post.user.name }}</div>
                                <div v-else=""></div>
                            </td>
                            <td>
                                <span class="badge badge-primary" v-for="category in post.category" :key="category.id">
                                    {{ category.cat_name }}
                                </span>
                            </td>
                            <td>{{ post.title | sortlength(20,"...") }}</td>
                            <td>{{ post.description | sortlength(40,"...")}}</td>
                            <td><img class="img_width"  :src="postImg(post.photo)" alt=""></td>
                            <!-- <td><img class="img_width" src="" alt=""></td> -->
                            <td>{{ post.created_at | timeformat }}</td>
                            <td>
                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                <a href="" @click.prevent="deletePost(post.id)" class="btn btn-danger btn-sm">Trash</a>
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
    mounted(){
        this.$store.dispatch('allPost')
    },
    computed:{
        getallPost(){
            console.log(this.$store.getters.getPost);
            return this.$store.getters.getPost
        }
    },
    methods:{
        postImg(img){
            return 'uploadimage/'+img;
        },
        deletePost(id){
            axios.get('/delete_post/'+id)
                this.$store.dispatch('allPost')
                .then((response)=>{
                        toast.fire({
                            icon: 'success',
                            title: 'Post deleted successfully ;)'
                        })
                    })
                    .catch(()=>{

                    })
        }
    }
}
</script>

<style scoped>
img.img_width {
    width: 80px;
    height: 40px;
    object-fit: contain;
}
</style>