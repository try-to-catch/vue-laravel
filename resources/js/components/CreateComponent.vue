<template>
    <div class="container">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input v-model="name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input v-model.number.trim="age" type="text" class="form-control" id="age">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Job</label>
                <input v-model="job" type="text" class="form-control" id="job">
            </div>
            <button @click.prevent="add" class="btn btn-primary">Submit</button>
        </form>
    </div>

</template>

<script>

export default {
    name: "CreatePerson",
    data() {
        return {
            name: null,
            age: null,
            job: null,

        }
    },
    methods: {
        add() {
            axios.post('/api/people', {
                name: this.name,
                age: parseInt(this.age),
                job: this.job,
            });

            this.age = this.job = this.name = null;
        }
    }
}
</script>

<style scoped>

</style>
