import { createStore } from 'vuex'
import feedback from '@/store/feedback'

const store = createStore({
    modules:{
        feedback
    }
})
export default store
