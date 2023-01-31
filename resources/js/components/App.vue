<template>
    <header>
        <router-link to="/"><span class="title">Reppir</span></router-link>
        <section class="section">
            <div class="user">
                <div @input.prevent="event => onChangeUsername(event)" class="username"  contenteditable>{{ store.user.username }}</div>
                <span>#{{ store.user.id }}</span>
            </div>
            <router-link to="/post/new"><button>Create Post</button></router-link>
        </section>
    </header>
    <main>
        <router-view/>
    </main>
</template>


<script>
import { store } from './store.js'

export default {
    setup() {
        let onChangeUsername = (event) => {
            axios.put(`/api/user/change-name/`, {
                userToken : store.user.token,
                username : event.target.innerText
            })
        }
        let generateToken = () => {
            return Math.floor((1 + Math.random()) * 0x100000000000)
                .toString(16)
                .substring(1);
        }
        if (!localStorage.getItem('token')) {
            localStorage.setItem('token', generateToken())
        }
        return {
            onChangeUsername
        }
        
    },
    methods: {
        getUser() {
            const token = localStorage.getItem('token')
            axios.get(`/api/user/${token}/`)
                .then((response)=>this.store.user = response.data)
        }
    },
    data() {
        return {
            store
        }
    },
    created() {
        this.getUser()
    }
}
</script>

<style scoped>
    .username {
        font-weight: bold;
    }
    .user {
        display: flex;
        flex-direction: column;
        text-align: center;
        color: #00695c;
    }
    .section {
        display: flex;
        gap: 1rem;
        align-items: center;
    }
    header {
        display: flex;
        box-sizing: border-box;
        width: 100%;
        padding: 1rem;
        align-items: center;
        justify-content: space-between;
        background-color: #80cbc4;
    }
    .title {
        font-size: 1.6rem;
        font-weight: bold;
        color: #00695c;
        cursor: pointer;
        text-decoration: none;
        outline: none;
    }
    .title:hover {
        color: #004d40;
    }
    main {
        display: flex;
        padding: 1rem;
    }
</style>