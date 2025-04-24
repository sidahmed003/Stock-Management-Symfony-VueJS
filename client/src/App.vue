<template>
  <div id="app">
    <main class="main-content">
      <router-view />
    </main>
  </div>
</template>

<script>
export default {
  name: 'App',
}
</script>

<style scoped>

.main-content {
  padding: 2rem;
}
</style>
