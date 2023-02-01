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
    computed: {
        user() {
            return this.$store.getters['user/user']
        }
    },
    async created() {
        this.$store.dispatch('user/getUser', this.$route.params.user);
    },
}
</script>

