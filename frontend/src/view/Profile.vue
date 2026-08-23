<script setup>
import { useAuthStore } from "@/store/telegramAuth.js"
import { useRoomStore } from "@/store/room.js"
import { onMounted, ref } from "vue"
import Add from "@/view/rooms/Add.vue"

const authStore = useAuthStore()
const roomStore = useRoomStore()

const isOpenModal = ref(false)

onMounted(async () => {
  await roomStore.getRooms()
})
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
        <span class="stat-value">{{ roomStore.rooms.length }}</span>
        <span class="stat-label">комнаты</span>
      </div>
    </div>

    <div class="rooms-section">
      <h2 class="section-title">мои комнаты</h2>

      <div class="rooms-list">
       <template v-if="roomStore.hasRooms">
         <div class="room-card" v-for="room in roomStore.rooms" :key="room.id">
           <div class="room-thumb">
             <img src="https://placehold.co/56x56" alt="room" />
           </div>
           <div class="room-info">
             <span class="room-name">{{ room.movie_title }}</span>
             <span class="room-meta">{{ room.users?.length ?? 0 }}  участника</span>
           </div>
           <span class="room-arrow">›</span>
         </div>
       </template>

        <div class="rooms-empty" v-else>
          <div class="empty-icon">🎬</div>
          <p class="empty-title">пока нет комнат</p>
          <p class="empty-subtitle">создай комнату и позови друзей смотреть кино вместе</p>
          <button @click="isOpenModal = true" class="empty-btn">создать комнату</button>
        </div>
      </div>

    </div>

    <nav class="pill-nav">
      <span class="pill-item">главная</span>
      <span class="pill-item">комнаты</span>
      <span class="pill-item">друзья</span>
      <span class="pill-item active">профиль</span>
    </nav>
  </div>

  <Add v-if="isOpenModal" @close="isOpenModal = false" />

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

.rooms-section {
  padding: 0 clamp(16px, 5vw, 24px) 120px;
  flex: 1;
}

.section-title {
  color: #EDE3CE;
  opacity: 0.4;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: lowercase;
  margin: 0 0 12px;
}

.rooms-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.room-card {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px;
  background: rgba(242, 235, 221, 0.05);
  border: 1px solid rgba(242, 235, 221, 0.1);
  border-radius: 16px;
  cursor: pointer;
}

.room-thumb {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  overflow: hidden;
  flex-shrink: 0;
  background: rgba(242, 235, 221, 0.08);
}

.room-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.room-info {
  display: flex;
  flex-direction: column;
  gap: 2px;
  flex: 1;
  min-width: 0;
}

.room-name {
  color: #EDE3CE;
  font-size: 15px;
  font-weight: 600;
  text-transform: lowercase;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.room-meta {
  color: #EDE3CE;
  opacity: 0.4;
  font-size: 12px;
}

.room-arrow {
  color: #EDE3CE;
  opacity: 0.3;
  font-size: 20px;
  flex-shrink: 0;
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

.rooms-empty {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 32px 16px;
  background: rgba(242, 235, 221, 0.03);
  border: 1px dashed rgba(242, 235, 221, 0.12);
  border-radius: 16px;
}

.empty-icon {
  font-size: 32px;
  margin-bottom: 12px;
  opacity: 0.5;
}

.empty-title {
  color: #EDE3CE;
  font-size: 15px;
  font-weight: 700;
  text-transform: lowercase;
  margin: 0 0 4px;
}

.empty-subtitle {
  color: #EDE3CE;
  opacity: 0.4;
  font-size: 13px;
  line-height: 1.4;
  margin: 0 0 20px;
  max-width: 260px;
}

.empty-btn {
  background: #EDE3CE;
  color: #0A0A0A;
  border: none;
  border-radius: 999px;
  padding: 12px 24px;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.02em;
  text-transform: lowercase;
  cursor: pointer;
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