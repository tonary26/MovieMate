<script setup>
import { useAuthStore } from "@/store/telegramAuth.js"

const authStore = useAuthStore()
</script>

<template>
  <div class="screen">
    <div class="profile-header">
      <img class="avatar" :src="authStore.user.avatar" alt="avatar" />
      <h1>{{ authStore.user.name }}</h1>
      <p class="username">@{{ authStore.user.username }}</p>
    </div>

    <div class="stats-row">
      <div class="stat">
        <span class="stat-value">24</span>
        <span class="stat-label">фильма</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat">
        <span class="stat-value">6</span>
        <span class="stat-label">комнаты</span>
      </div>
    </div>

    <nav class="pill-nav">
      <span class="pill-item">главная</span>
      <span class="pill-item">комнаты</span>
      <span class="pill-item">друзья</span>
      <span class="pill-item active">профиль</span>
    </nav>
  </div>
</template>

<style scoped>
.screen {
  width: 100%;
  max-width: 420px;
  height: 100vh;
  height: 100dvh;
  margin: 0 auto;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  position: relative;
  background: #0A0A0A;
  font-family: 'Helvetica Neue', Arial, sans-serif;
}

.eyebrow span {
  font-family: 'Courier New', monospace;
  font-size: 11px;
  letter-spacing: 0.15em;
  color: #EDE3CE;
  opacity: 0.4;
}

.profile-header {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 32px clamp(16px, 5vw, 24px) 24px;
}

.avatar {
  width: 84px;
  height: 84px;
  border-radius: 50%;
  object-fit: cover;
  border: 1px solid rgba(237, 227, 206, 0.15);
  margin-bottom: 16px;
}

.profile-header h1 {
  color: #EDE3CE;
  font-weight: 900;
  font-size: 32px;
  line-height: 1;
  letter-spacing: -0.01em;
  text-transform: lowercase;
  margin: 0 0 6px;
}

.username {
  color: #EDE3CE;
  opacity: 0.4;
  font-size: 14px;
  margin: 0;
}

.stats-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: clamp(20px, 6vw, 32px);
  padding: 0 clamp(16px, 5vw, 24px) 28px;
}

.stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 4px;
}

.stat-value {
  color: #EDE3CE;
  font-weight: 800;
  font-size: 22px;
  line-height: 1;
}

.stat-label {
  color: #EDE3CE;
  opacity: 0.4;
  font-size: 12px;
}

.stat-divider {
  width: 1px;
  height: 32px;
  background: rgba(237, 227, 206, 0.12);
}

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
  color: #EDE3CE;
  opacity: 0.4;
  cursor: pointer;
}

.pill-item.active {
  background: #EDE3CE;
  color: #0A0A0A;
  opacity: 1;
  font-weight: 700;
}

@media (max-height: 640px) {
  .profile-header {
    padding-top: 20px;
    padding-bottom: 16px;
  }

  .avatar {
    width: 64px;
    height: 64px;
    margin-bottom: 12px;
  }

  .profile-header h1 {
    font-size: 26px;
  }

  .stats-row {
    padding-bottom: 16px;
  }
}

@media (max-width: 340px) {
  .pill-item {
    font-size: 10px;
    padding: 9px 2px;
  }

  .stats-row {
    gap: 16px;
  }
}
</style>