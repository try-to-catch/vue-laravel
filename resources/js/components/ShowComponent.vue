<template>
    <tr>
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td>
            <button @click.prevent="setLine" type="button" class="btn btn-success bg-success">Edit</button>
        </td>
        <td>
            <a @click.prevent="remove" type="button" class="btn btn-danger bg-danger">Delete</a>
        </td>
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
        setLine: null,
        remove: null,
    },
    methods: {
        setLine() {
            this.$emit('setLine');
        },
        remove() {
            this.$emit('remove');
        }
    }
}
</script>

<style scoped>

</style>
