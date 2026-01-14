<template>
  <div>
    <h1>Hello Laravel + Vue 👋</h1>
    <DataForm />
  </div>
</template>

<script>
import DataForm from './components/DataForm.vue';

export default {
  name: 'App',
  components: {
    DataForm
  }
}
</script>