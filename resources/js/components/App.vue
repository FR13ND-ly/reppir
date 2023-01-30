<template>
    <header>
        <router-link to="/"><span class="title">Reppir</span></router-link>
        <router-link to="/post/new"><button class="button">Create Post</button></router-link>
    </header>
    <main>
        <router-view/>
    </main>
</template>


<script>
export default {
    setup() {

    }
}
</script>

<style scoped>
    header {
        display: flex;
        box-sizing: border-box;
        width: 100%;
        padding: 1rem;
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