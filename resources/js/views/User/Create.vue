<template>
    <form class="w-50 d-flex flex-column pt-4">
        <captioned-field v-for="(field,id) in fields"
                         @change="change(id, $event)"
                         :key="field.label"
                         :caption="field.label"
                         :value="field.value"
                         :type="field.type"
        />

        <button @click.prevent="add" type="submit" class="btn btn-primary">Register</button>
    </form>
</template>

<script>
import CaptionedField from "./../../components/formItems/CaptionedField.vue";
import router from "./../../router";

export default {
    name: "Create",
    components: {
        CaptionedField
    },
    data: function () {
        return {
            fields: [
                {
                    label: 'Name',
                    value: null,
                    type: 'text'
                },
                {
                    label: 'Age',
                    value: null,
                    type: 'Number'
                },
                {
                    label: 'Job',
                    value: null,
                    type: 'text'
                }
            ]
        }
    },
    methods: {
        change(id, value) {
            this.fields[id].value = value;
        },
        add() {
            axios.post('/api/users', this.preparedData).then((res) => {
                router.push({name: 'user.index'});
            });
        }
    },
    computed: {
        preparedData() {
            return {
                name: this.fields['0'].value,
                age: this.fields['1'].value,
                job: this.fields['2'].value,
            };
        }
    }
};
</script>

<style scoped>

</style>
