<template>
    <tr>
        <th scope="row">{{ person.id }}</th>
        <td><input v-model="person.name" type="text" class="form-control"></td>
        <td><input v-model="person.age" type="number" class="form-control"></td>
        <td><input v-model="person.job" type="text" class="form-control"></td>
        <td>
            <button @click.prevent="update(person)" type="submit" class="btn btn-primary bg-primary">Update</button>
        </td>
        <td></td>
    </tr>
</template>

<script>
export default {
    name: "ShowComponent",
    props: {
        person: {
            type: Object,
            required: true
        }
    },
    emits: {
        update: null
    },
    methods: {
        update() {
            this.$emit('update', this.person)
        }
    }
}
</script>

<style scoped>

</style>
