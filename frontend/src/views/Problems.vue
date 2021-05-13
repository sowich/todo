<template>
  <div class="about">
    <TodoList id="6"/>
  </div>
</template>

<script>
  // @ is an alias to /src
  import TodoList from '@/components/TodoList.vue'

  export default {
    name: 'problems',
    components: {
      TodoList
    }
  }
</script>
