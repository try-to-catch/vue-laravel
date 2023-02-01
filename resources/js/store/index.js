import { createStore } from 'vuex'
import user from './modules/user'

const store = {
    modules: {
        user
    },
    strict: process.env.NODE_ENV !== 'production'
}
export default createStore(store);
