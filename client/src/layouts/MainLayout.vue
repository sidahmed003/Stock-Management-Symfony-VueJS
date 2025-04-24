<!-- src/layouts/MainLayout.vue -->
<template>
    <div>
      <NavBar />
      <router-view /> <!-- Ceci est l'équivalent de <Outlet /> -->
    </div>
  </template>
  
  <script>
  import NavBar from '../components/NavBar.vue';
  
  export default {
    components: { NavBar }
  }
  </script>
  