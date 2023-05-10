import axios from 'axios'
import router from '@/router'

export default {
    namespaced: true,
    state:{
        list:[]
    },
    getters:{
        list(state){
            return state.list
        }
    },
    mutations:{
        SET_ITEM (state, value) {
            state.list.push(value)
        }
    },
    actions:{
        send({commit},item){
            return axios.post('/api/feedback',item).then(()=>{
                commit('SET_ITEM',item)
            }).catch(({response:{data}})=>{

            })
        },
    }
}
