export default {
    state: {
        category:[],
        post:[]
    },
    getters: {
        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
        }
    },
    actions: {
        allCategory(context){
            axios.get('/category')
                .then((response) => {
                    // console.log(response.data.categories)
                    context.commit('categories',response.data.categories)
                })
        },
        allPost(context){
            axios.get('/posts')
                .then((response) => {
                    // console.log(response.data.categories)
                    context.commit('posts',response.data.posts)
                })
        },
    },
    mutations:{
        categories(state,data){
            return state.category = data
        },
        posts(state,data){
            return state.post = data
        }
    }
}