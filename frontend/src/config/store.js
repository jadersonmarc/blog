
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        isMenuVisible: false,    
    },
    mutations: {
        setUser(state, ) {
            if(state.isMenuVisible != false) {       
                state.isMenuVisible = true
            } else {
                state.isMenuVisible = false
            }
        }
    }
})