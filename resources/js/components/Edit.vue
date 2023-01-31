<template>
    <form class="editor" @submit.prevent="onPublish()">
        <input v-model="state.article.title" placeholder="Title" class="input"/>
        <input v-model="state.article.imageUrl" placeholder="Link to Image" class="input"/>
        <textarea v-model="state.article.text" class="text-editor input"  placeholder="Text"></textarea>
        <button>Publish</button>
    </form>
</template>

<script>
import { reactive } from 'vue';
import { store } from './store.js'

export default {
    setup() {
       
        let state = reactive({
            article : {
                title : '',
                imageUrl : '',
                text : ''
            }
        })

        let onPublish = () => {
            axios.post("/api/post/new/", {
                userToken: store.user.token,
                title: state.article.title,
                imageUrl: state.article.imageUrl,
                text: state.article.text,
            })
            console.log(state.article)
        }

        return {
            state,
            onPublish
        }
    },
    data() {
        return {
            store
        }
    }
}
</script>

<style scoped>
    .editor {
        display: flex;
        box-sizing: border-box;
        flex-direction: column;
        width: 100%;
        padding: 0 25%;
        gap: 1rem;
    }

    .text-editor {
        height: 20rem;
        resize: none;
    }
</style>