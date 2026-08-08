<script setup>
</script>

<template>
  <nav class="pill-nav">
    <router-link :to="{ name: 'dashboard' }" class="pill-item" exact-active-class="active">главная</router-link>
    <router-link :to="{ name: 'rooms.index' }" class="pill-item" exact-active-class="active">комнаты</router-link>
    <router-link :to="{ name: 'user.profile' }" class="pill-item" exact-active-class="active">профиль</router-link>
  </nav>
</template>

<style scoped>
.pill-nav {
  position: fixed;
  bottom: calc(20px + env(safe-area-inset-bottom));
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  align-items: center;
  gap: 4px;
  background: rgba(242, 235, 221, 0.08);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid rgba(242, 235, 221, 0.12);
  border-radius: 999px;
  padding: 6px;
  width: calc(100% - 32px);
  max-width: 372px;
  box-sizing: border-box;
}

.pill-item {
  flex: 1;
  text-align: center;
  padding: 10px 4px;
  border-radius: 999px;
  font-size: clamp(10px, 3vw, 12px);
  white-space: nowrap;
  letter-spacing: 0.02em;
  color: #F2EBDD;
  opacity: 0.4;
  cursor: pointer;
  text-decoration: none;
}

.pill-item.active {
  background: #F2EBDD;
  color: #0A0A0A;
  opacity: 1;
  font-weight: 700;
}

@media (max-width: 340px) {
  .pill-item {
    font-size: 10px;
    padding: 9px 2px;
  }
}
</style>