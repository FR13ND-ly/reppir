<template>
    <div class="posts">
        <router-link to="/post/2" v-for="post of posts" :key="post">
        <div class="post" >
            <h2>Title</h2>
            <span>Author | 24.02.2004</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti atque reprehenderit illo praesentium temporibus eos quod reiciendis autem corporis officia unde quasi quas quae at molestiae nisi necessitatibus repellat aspernatur perspiciatis dignissimos vero totam aut, earum libero. Numquam quis eum, dignissimos ipsam molestiae eius modi. Amet, totam perspiciatis, quibusdam culpa sequi provident asperiores magnam ipsa repellendus laborum minus nisi esse. Sit accusamus cumque veniam obcaecati quidem odit id. Quam, incidunt!</p>
        </div>
        </router-link>
    </div>
</template>

<script>
export default {
    setup() {

        return {
            posts : [1, 2, 3, 4]
        }
    }
}
</script>


<style scoped>
    .posts {
        display: flex;
        flex-direction: column;
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
    .post:hover {
        border: 1px solid #fff;
        border-radius: 30px;
        background-color:#26a69a;
        color: #fff;
    }
</style>
