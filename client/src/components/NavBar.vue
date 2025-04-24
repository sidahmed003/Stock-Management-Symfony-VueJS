<template>
    <nav class="navbar">
      <div class="nav-links">
        <router-link to="/" class="nav-link">Home</router-link>
        <router-link to="/about" class="nav-link">Stock</router-link>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'Navbar'
  }
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap');
  
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  .navbar {
    background-color: #add8e6; /* Bleu clair */
    padding: 1rem 2rem;
    display: flex;
    border-radius: 12px;
    font-family: 'Poppins', sans-serif;
    position: sticky;
    top: 0;
    z-index: 1000;
    width: 100%;
  }
  
  .nav-links {
    margin-left: auto;
    display: flex;
    gap: 2rem;
  }
  
  .nav-link {
    color: #228B22; /* Vert pistache */
    text-decoration: none;
    font-weight: 800; /* Encore plus bold */
    font-size: 1.3rem;
    padding: 0.5rem 1rem;
    border-radius: 0;
    transition: all 0.3s ease;
  }
  
  .nav-link:hover {
    background-color: #7CFC00; /* Vert pistache clair au hover */
    color: #001f3f; /* Texte bleu marine */
    border-radius: 10px;
  }
  </style>
  