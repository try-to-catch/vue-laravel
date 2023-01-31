<template>
    <div v-if="user">
        <div>name: {{ user.name }}</div>
        <div>age: {{ user.age }}</div>
        <div>job: {{ user.job }}</div>
        <router-link :to="{name: 'user.edit', params: { user: user.id}}" class="btn btn-primary">
            Edit
        </router-link>
    </div>
</template>

<script>
export default {
    name: "Show",
    data() {
        return {
            user: null
        };
    },
    methods: {
        get() {
            axios.get(`/api/users/${this.$route.params.user}`).then((res) => {
                this.user = res.data.data;
            })
        }
    },
    created() {
        this.get();
    }
}
</script>

