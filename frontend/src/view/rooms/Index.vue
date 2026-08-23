<script setup>
import { onMounted, ref } from "vue"
import { useRoomStore } from "@/store/room.js"
import Add from "@/view/rooms/Add.vue"

const roomStore = useRoomStore()

const isOpenModal = ref(false)

onMounted(async () => {
  await roomStore.getRooms()
})
</script>

<template>
  <div class="screen">

    <div class="page-header">
      <h1>комнаты</h1>
      <button @click="isOpenModal = true" class="btn-create">+ создать</button>
    </div>

    <div class="rooms-section">
      <template v-if="roomStore.hasRooms">
        <div class="room-card" v-for="room in roomStore.rooms" :key="room.id">
          <div class="room-thumb">
            <img src="https://placehold.co/56x56" alt="room" />
          </div>
          <div class="room-info">
            <span class="room-name">{{ room.movie_title || 'без названия' }}</span>
            <span class="room-meta">{{ room.members?.length || 0 }} участника</span>
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

  <Add v-if="isOpenModal" @close="isOpenModal = false" />

</template>

<style scoped>
.page-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px clamp(16px, 5vw, 24px) 24px;
}

.page-header h1 {
  color: #EDE3CE;
  font-weight: 900;
  font-size: clamp(32px, 10vw, 44px);
  line-height: 1;
  letter-spacing: -0.01em;
  text-transform: lowercase;
  margin: 0;
}

.btn-create {
  background: #EDE3CE;
  color: #0A0A0A;
  border: none;
  border-radius: 999px;
  padding: 10px 18px;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.02em;
  text-transform: lowercase;
  cursor: pointer;
  flex-shrink: 0;
}

.rooms-section {
  padding: 0 clamp(16px, 5vw, 24px) calc(100px + env(safe-area-inset-bottom));
  flex: 1;
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

.rooms-empty {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 48px 16px;
  margin-top: 20px;
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
</style>