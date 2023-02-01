<template>
    <form v-if="newUser" class="w-50 d-flex flex-column pt-4">
        <label class="form-label">
            Name
            <input v-model="newUser.name" type="text" class="mb-2 form-control">
        </label>

        <label class="form-label">
            Age
            <input v-model="newUser.age" type="number" class="mb-2 form-control">
        </label>

        <label class="form-label">
            Job
            <input v-model="newUser.job" type="text" class="mb-2 form-control">
        </label>

        <button :disabled="!isDisabled" @click.prevent="update(newUser)" type="submit" class="btn btn-primary">Update
        </button>
    </form>
</template>

<script>

import {mapActions, mapGetters} from "vuex";

export default {
    name: "Edit",
    data() {
        return {
            newUser: null
        }
    },
    methods: {
        ...mapActions({
            getUser: 'user/getUser',
            update: 'user/updateUser',
        }),
    },
    computed: {
        ...mapGetters({
            user: 'user/user',
        }),
        isDisabled() {
            return this.newUser.name && /^[0-9]{1,3}/.test(this.newUser.age) && this.newUser.job
        }
    },
    watch: {
        user() {
            if (this.user)
                this.newUser = {...this.user};
        },
    },

    created() {
        this.getUser(this.$route.params.user);
    }
};
</script>
