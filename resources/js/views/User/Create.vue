<template>
    <form v-if="user" class="w-50 d-flex flex-column pt-4">
        <label class="form-label">
            Name
            <input v-model="user.name" type="text" class="mb-2 form-control">
        </label>

        <label class="form-label">
            Age
            <input v-model="user.age" type="number" class="mb-2 form-control">
        </label>

        <label class="form-label">
            Job
            <input v-model="user.job" type="text" class="mb-2 form-control">
        </label>

        <button :disabled="!isDisabled" @click.prevent="add" type="submit" class="btn btn-primary">Register</button>
    </form>
</template>

<script>

export default {
    name: "Create",
    data: function () {
        return {
            user: {
                name: null,
                age: null,
                job: null
            }
        }
    },
    methods: {
        add() {
            axios.post('/api/users', this.user).then(() => {
                this.$router.push({name: 'user.index'});
            });
        }
    },
    computed:{
        isDisabled(){
            return this.user.name && /^[0-9]{1,2}$/.test(this.user.age) && this.user.job
        }
    },
};
</script>
