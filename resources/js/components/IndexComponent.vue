<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <template v-for="person in people" :key="person.id">
                <edit-component v-if="lineOnEdit === person.id"
                                @update="update"
                                :person="person"/>
                <show-component v-else @setLine="setEditLine(person.id)" @remove="remove(person.id)" :person="person"/>
            </template>

        </table>
    </div>
</template>

<script>
import axios from "axios";
import ShowComponent from "./ShowComponent.vue";
import EditComponent from "./EditComponent.vue";

export default {
    name: "IndexComponent",
    FORM_FIELDS: [
        {name: 'id', type: null, value: ''}
    ],
    components: {
        ShowComponent,
        EditComponent,
    },
    data() {
        return {
            people: [{id: null, name: null, age: null, job: null}],
            lineOnEdit: null
        }
    },
    methods: {
        getPeople() {
            axios.get('/api/people')
                .then((res) => {
                    this.people = res.data;
                });
        },
        setEditLine(id) {
            if (this.lineOnEdit == null) {
                this.lineOnEdit = id;
            }
        },
        update(person) {
            this.lineOnEdit = null;

            const personMap = new Map(Object.entries(person));
            personMap.delete('id');

            const preparedPerson = Object.fromEntries(personMap.entries());

            axios.patch(`/api/people/${person.id}`, preparedPerson).then(() => {
                this.getPeople();
            })

        },
        remove(id) {
            axios.delete(`/api/people/${id}`).then((res) => {
                console.log(res)
                this.getPeople();
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
