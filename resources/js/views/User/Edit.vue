<template>
    <form class="w-50 d-flex flex-column pt-4">
        <label class="form-label">
            Name
            <input v-model="name" type="text" class="mb-2 form-control">
        </label>

        <label class="form-label">
            Age
            <input v-model="age" type="number" class="mb-2 form-control">
        </label>

        <label class="form-label">
            Job
            <input v-model="job" type="text" class="mb-2 form-control">
        </label>

        <button @click.prevent="update" type="submit" class="btn btn-primary">Update</button>
    </form>
</template>

<script>
import router from "./../../router";

export default {
    name: "Edit",
    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },
    methods: {
        get() {
            axios.get(`/api/users/${this.$route.params.user}`).then((res) => {
                const data = res.data;

                this.name = data.name;
                this.age = data.age;
                this.job = data.job;
            })
        },
        update() {
            const id = this.$route.params.user;
            axios.put(`/api/users/${id}`, this.preparedData).then((res) => {
                router.push({name: 'user.show', params: {user: id}});
            });
        }
    },
    computed: {
        preparedData() {
            return {
                name: this.name,
                age: this.age,
                job: this.job,
            };
        }
    },
    created() {
        this.get()
    }
};
</script>

<style scoped>

</style>
