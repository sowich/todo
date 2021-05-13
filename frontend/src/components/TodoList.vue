<template>
    <div class="todo-list">
        <textarea name="" id="" cols="150" rows="40" v-model="note"></textarea>
    </div>
</template>

<script>

    import _ from 'lodash'

    export default {
        name: 'TodoList',
        data() {
            return {
                notes: this.$store.state.notes
            }
        },
        props: {
            id: String,
        },
        mounted() {
            this.getNotes();
        },
        methods: {
            getNotes() {
                this.$store.dispatch('notes', this.id);
            }
        },
        computed: {
            note: {
                get: function () {
                    return this.$store.state.notes.TEXT;
                },
                set: _.debounce(function (newValue) {
                    let payload = {ID: this.id, TEXT: newValue};
                    this.$store.dispatch('note', payload);
                }, 1000)
            }
        }
    }
</script>

<style scoped>
    textarea {
        padding: 15px
    }
</style>