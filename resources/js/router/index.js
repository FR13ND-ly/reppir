import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/post/new',
    name: 'create post',
    component: () => import('../components/Edit.vue')
  },
  {
    path: '/post/:id',
    name: 'view post',
    component: () => import('../components/Post.vue')
  },
  
]

const router = createRouter({
    history: createWebHistory(),
    routes
  })

export default router
