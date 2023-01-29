<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="person in people" :key="person.id">
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.age }}</td>
                <td>{{ person.job }}</td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
export default {
    name: "PostComponent",
    data() {
        return {
            people: [{id: null, name: null, age: null, job: null}]
        }
    },
    methods: {
        getPeople() {
            axios.get('/people')
                .then((res) => {
                    this.people = res.data;
                })
                .catch((error) => {
                    //
                })
        }
    },
    created() {
        this.getPeople();
    }
}
</script>

<style scoped>

</style>
