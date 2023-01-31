<template>
    <div class="posts">
        <router-link class="post" v-bind:to="'/post/' + post.id" v-for="post of posts" :key="post.id">
            <h2 class="title">{{ post.title }}</h2>
            <span class="author"><b>{{ post.author }}</b> | {{ post.date }}</span>
            <p class="text">{{ post.text }}</p>
        </router-link>
    </div>
</template>

<script>
export default {
    setup() {
        return {
        }
    },
    data () {
        return {
            posts : []
        }
    },
    mounted () {
        axios.get('/api/post/all/')
        .then(response => {
            console.log(response)
            this.posts = response.data})
    }
}
</script>

<style scoped>
    .posts {
        display: flex;
        box-sizing: border-box;
        flex-direction: column;
        padding: 0 20%;
        gap: 1rem;
    }

    .post {
        display: grid;
        box-sizing: border-box;
        padding: .5rem 1.6rem 1rem;
        cursor: pointer;
        border: 1px solid #4db6ac;
        border-radius: 20px;
        transition: .2s;
        color: unset;
        text-decoration: underline;
    }
    
    .title {
        color: #004d40;
        line-height: 1;
    }
    .author {
        font-size: .8rem;
        line-height: .4;
    }
    .text {
        line-height: 1.4;
    }
    .post:hover {
        border: 1px solid #fff;
        background-color: #4db6ac;
        color: #004d40;
    }
</style>
