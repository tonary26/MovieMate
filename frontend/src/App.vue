<script setup>
import { useAuthStore } from "@/store/telegramAuth.js"
import { onMounted } from "vue"
import NavMenu from "@/components/NavMenu.vue"

const authStore = useAuthStore()

onMounted(async () => {
  await authStore.authenticate()
})
</script>

<template>
  <div class="main">
    <template v-if="authStore.isAuthenticated">
      <router-view />
    </template>

    <template v-else>
      <div class="screen">
        <div class="eyebrow">
          <span>MOVIEMATE</span>
        </div>
        <div class="hero">
          <div class="error-code">401</div>
          <h1>нужен<br />доступ</h1>
          <p>похоже, ты ещё не авторизован - открой приложение через Telegram, чтобы я мог тебя узнать</p>
        </div>
        <div class="cta">
          <button class="btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0A0A0A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
              <path d="M3 3v5h5"/>
            </svg>
            ПОПРОБОВАТЬ СНОВА
          </button>
          <button class="btn-secondary">написать в поддержку(@tonaryy)</button>
        </div>
      </div>
    </template>
    <NavMenu />
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

.eyebrow {
  padding: clamp(20px, 6vh, 32px) clamp(16px, 5vw, 24px) 0;
  padding-top: max(clamp(20px, 6vh, 32px), env(safe-area-inset-top));
}

.eyebrow span {
  font-family: 'Courier New', monospace;
  font-size: 11px;
  letter-spacing: 0.15em;
  color: #EDE3CE;
  opacity: 0.4;
}

.hero {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 clamp(16px, 5vw, 24px);
  min-height: 0;
}

.error-code {
  font-family: 'Courier New', monospace;
  font-size: clamp(12px, 3.2vw, 13px);
  letter-spacing: 0.15em;
  color: #EDE3CE;
  opacity: 0.35;
  margin-bottom: 12px;
}

.hero h1 {
  color: #EDE3CE;
  font-weight: 900;
  font-size: clamp(40px, 15vw, 76px);
  line-height: 0.85;
  letter-spacing: -0.02em;
  text-transform: lowercase;
  margin: 0 0 16px;
}

.hero p {
  color: #EDE3CE;
  opacity: 0.5;
  font-weight: 400;
  font-size: clamp(13px, 3.6vw, 15px);
  max-width: 30ch;
  line-height: 1.5;
  margin: 0;
}

.cta {
  padding: 0 clamp(16px, 5vw, 24px);
  padding-bottom: calc(96px + env(safe-area-inset-bottom));
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.btn-primary {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  border-radius: 999px;
  margin-top: 30px;
  padding: 16px;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 0.03em;
  background: #EDE3CE;
  color: #0A0A0A;
  border: none;
  cursor: pointer;
}

.btn-primary svg {
  flex-shrink: 0;
}

.btn-secondary {
  width: 100%;
  text-align: center;
  padding: 12px;
  font-size: 14px;
  color: #EDE3CE;
  opacity: 0.5;
  background: none;
  border: none;
  cursor: pointer;
}

@media (max-height: 640px) {
  .hero h1 {
    font-size: clamp(34px, 13vw, 56px);
    margin-bottom: 10px;
  }

  .cta {
    padding-bottom: calc(88px + env(safe-area-inset-bottom));
    gap: 8px;
  }

  .btn-primary,
  .btn-secondary {
    padding: 12px;
  }
}
</style>
