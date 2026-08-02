<script setup>
</script>

<template>
  <div class="main">
    <router-view />
  </div>
</template>

<style>
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
  background: #0A0A0A;
}

#app {
  height: 100%;
}
</style>

<style scoped>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.main {
  width: 100%;
  max-width: 420px;
  min-height: 100vh;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  position: relative;
  background: #0A0A0A;
  font-family: 'Helvetica Neue', Arial, sans-serif;
}
</style>
