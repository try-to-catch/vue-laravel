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

        <button :disabled="!isDisabled" @click.prevent="update" type="submit" class="btn btn-primary">Update</button>
    </form>
</template>

<script>

export default {
    name: "Edit",
    data() {
        return {
            user: null
        }
    },
    methods: {
        get() {
            axios.get(`/api/users/${this.$route.params.user}`).then((res) => {
                console.log(res)
                this.user = res.data.data;
            })
        },
        update() {
            const id = this.$route.params.user;
            axios.put(`/api/users/${id}`, this.user).then(() => {
                this.$router.push({name: 'user.show', params: {user: id}});
            });
        }
    },
    computed:{
      isDisabled(){
          return this.user.name && /^[0-9]{1,3}/.test(this.user.age) && this.user.job
      }
    },

    created() {
        this.get()
    }
};
</script>
