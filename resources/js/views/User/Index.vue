<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Job</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users" :key="user.id">
            <td>
                <router-link :to="{name: 'user.show', params: { user: user.id}}">
                    {{ user.name }}
                </router-link>
            </td>
            <td>{{ user.age }}</td>
            <td>{{ user.job }}</td>
            <td>
                <router-link :to="{name: 'user.edit', params: { user: user.id}}">
                    <a class="btn btn-primary">Edit</a>
                </router-link>
            </td>
            <td>
                <a @click.prevent="remove(user.id)" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            users: []
        }
    },
    methods: {
        get() {
            axios.get('/api/users').then((res) => {
                this.users = res.data;
            });
        },
        remove(id) {
            axios.delete(`/api/users/${id}`).then(() => {
                this.get();
            });
        }
    },
    created() {
        this.get();
    }
}

</script>

<style scoped>

</style>
