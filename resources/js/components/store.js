import { reactive } from 'vue'

export const store = reactive({
    user: {
        username : 'John Doe',
        id : '0',
        token : ''
    }
})