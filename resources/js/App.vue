<template>
    <div>
        <router-link :to="{name: 'user.index'}">Index</router-link>
        <router-link :to="{name: 'user.create'}">Create</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App.vue"
}
</script>

<style scoped>

</style>
