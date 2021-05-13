<template>
    <div class="non-working">
        <TodoList id="7"/>
    </div>
</template>

<script>
    // @ is an alias to /src
    import TodoList from '@/components/TodoList.vue'

    export default {
        name: 'home',
        components: {
            TodoList
        }
    }
</script>
