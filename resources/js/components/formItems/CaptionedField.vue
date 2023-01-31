<template>
    <label class="form-label">
        {{ caption }}
        <input @change="change" :type="type" :value="value" class="mb-2 form-control">
    </label>
</template>

<script>
export default {
    name: "CaptionedField",
    props: {
        caption: {
            type: String,
            required: true
        },
        type: {
            type: String,
            required: true
        },
        value: null,
    },
    emits: {
        change: null
    },
    methods: {
        change(e) {
            const value = e.target.value;

            this.$emit('change', value);
        }
    }
}
</script>

<style scoped>

</style>
