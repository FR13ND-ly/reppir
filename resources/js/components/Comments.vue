<template>
    <form @submit.prevent="onSubmit()" class="add-comment">
        <input class="input" v-model="state.commentText" placeholder="Comment...">
        <button class="send-comment">Send</button>
    </form>
    <section class="comments">
        <article class="comment" v-for="comment of state.comments" :key="comment.id">
            <span class="author">{{ comment.author }}</span>
            <span class="date"> {{ comment.date }}</span>
            <p class="text">{{ comment.text }}</p>
            <hr>
        </article>
    </section>
</template>

<script>
import { reactive } from '@vue/reactivity'
import { useRoute } from "vue-router";

export default {
    setup() {
    },
    data() {
        const route = useRoute();
        let state = reactive({
            comments : [],
            commentText : ""
        })
        let onSubmit = () => {
            let comment = {
                userToken : localStorage.getItem('token'),
                postId : route.params.id,
                text : state.commentText
            }
            axios.post(`/api/comment/new/`, comment).then(response => {
                state.comments.unshift(response.data)
            })
            state.commentText = ""
        }
        return {
            state,
            onSubmit
        }
    },
    mounted () {
        axios.get(`/api/comment/${this.$route.params.id}/`)
        .then(response => {
            this.state.comments = response.data
        })
    }
}
</script>

<style scoped>
    .add-comment {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
    }
    .send-comment {
        margin-top: .5rem;
    }

    .comments {
        margin-top: 2rem;
        display: flex;
        gap: .5rem;
        flex-direction: column;
    }

    .author {
        font-weight: bold;
        color: #004d40;
    }

    .text {
        line-height: 1.6;
        margin-top: .5rem;
    }

    .date {
        font-size: .8rem;
        float: right;
    }
</style>