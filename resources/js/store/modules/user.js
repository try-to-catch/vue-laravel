import router from "../../router";

export default {
    namespaced: true,

    state: {
        user: {
            id: null,
            name: null,
            age: null,
            job: null,
        },
        users: null
    },

    getters: {
        user: (state) => state.user,
        users: (state) => state.users,
        isValidated: () => true
    },

    mutations: {
        setUser(state, value) {
            state.user = value;
        },
        setUsers(state, value) {
            state.users = value;
        },
    },

    actions: {
        getUser({commit}, id) {
            commit('setUser', null);
            axios.get(`/api/users/${id}`)
                .then((res) => {
                    commit('setUser', res.data.data);
                });
        },
        getUsers({commit}) {
            commit('setUsers', null);
            axios.get('/api/users')
                .then((res) => {
                    commit('setUsers', res.data.data);
                });
        },
        deleteUser({dispatch}, id) {
            axios.delete(`/api/users/${id}`).then(() => {
                dispatch('getUsers', id);
            });

        },
        add({},user) {
            axios.post('/api/users', user).then(() => {
                router.push({name: 'user.index'});
            });
        },
        updateUser({}, user){
            axios.put(`/api/users/${user.id}`, user).then(() => {
                router.push({name: 'user.show', params: {user: user.id}});
            });
        }
    }
}
