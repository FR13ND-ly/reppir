<template>
    <article class="post">
        <h2 class="title">{{ state.post.title }}</h2>
        <span class="author"><b>{{ state.post.author }}</b> | {{ state.post.date }}</span>
        <img class="image" v-bind:src="state.post.imageUrl">
        <p class="text">{{ state.post.text }}</p>
        <button @click="onLike()" class="like">{{ state.post.likes }} likes</button>
        <Comments/>
    </article>
    
</template>

<script>
import { store } from './store'
import Comments from './Comments.vue';
import { useRoute } from 'vue-router';
import { reactive } from 'vue';

export default {
    setup() {
        
    },
    components : {
        Comments
    },
    data () {
        let state = reactive({
            post : {}
        })
        const route = useRoute();
        let onLike = () => {
            let like = {
                userToken : localStorage.getItem('token'),
                postId : route.params.id,
            }
            axios.post(`/api/like/`, like).then((response) => {
                console.log(response.data)
                state.post.likes = response.data
            })
        }
        return {
            onLike,
            store,
            state
        }
    },
    mounted () {
        axios.get(`/api/post/${this.$route.params.id}/`)
            .then(response => this.state.post = response.data)
    }
}
</script>
<style scoped>
    .post {
        display: flex;
        box-sizing: border-box;
        flex-direction: column;
        width: 100%;
        padding: 0 25%;
    }

    .title {
        font-size: 4rem;
        line-height: 1.2;
        margin: 1rem 0;
        color: #004d40;
    }
    .text {
        line-height: 1.6;
    }

    .image {
        margin-top: 1rem;
    }

    .like {
        background-color: #ffebee;
        color: #f44336;
    }

    .like:hover {
        background-color: #ffcdd2;
        color: #b71c1c;
    }
</style>