<script setup>
import { useRoomStore } from "@/store/room.js"
import { reactive, ref } from "vue"

const roomStore = useRoomStore()

const emit = defineEmits(['close'])

const formData = reactive({
  movie_title: ''
})

const addRoom = async function () {
  await roomStore.addRoom(formData)
}
</script>

<template>
  <div class="overlay">
    <div class="sheet">

      <h1>создать<br />комнату</h1>
      <p class="hint">укажи фильм, который будете смотреть - можно оставить пустым и добавить позже</p>

      <div class="field">
        <label>название фильма</label>
        <input v-model="formData.movie_title" type="text" placeholder="например, дюна" />
      </div>

      <button @click="addRoom" class="btn-primary">создать комнату</button>
      <button @click="emit('close')" class="btn-secondary">отмена</button>
    </div>
  </div>
</template>

<style scoped>
.overlay {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: flex-end;
  justify-content: center;
  z-index: 100;
}

.sheet {
  width: 100%;
  max-width: 420px;
  background: #0A0A0A;
  border: 1px solid rgba(237, 227, 206, 0.12);
  border-bottom: none;
  border-radius: 24px 24px 0 0;
  padding: 12px clamp(16px, 5vw, 24px) calc(24px + env(safe-area-inset-bottom));
  font-family: 'Helvetica Neue', Arial, sans-serif;
}

h1 {
  color: #EDE3CE;
  font-weight: 900;
  font-size: clamp(32px, 10vw, 44px);
  line-height: 0.9;
  letter-spacing: -0.01em;
  text-transform: lowercase;
  margin: 0 0 12px;
}

.hint {
  color: #EDE3CE;
  opacity: 0.45;
  font-size: 13px;
  line-height: 1.5;
  margin: 0 0 24px;
  max-width: 34ch;
}

.field {
  margin-bottom: 20px;
}

.field label {
  display: block;
  color: #EDE3CE;
  opacity: 0.4;
  font-size: 11px;
  letter-spacing: 0.08em;
  text-transform: lowercase;
  margin-bottom: 8px;
}

.field input {
  width: 100%;
  background: rgba(242, 235, 221, 0.05);
  border: 1px solid rgba(242, 235, 221, 0.15);
  border-radius: 14px;
  padding: 14px 16px;
  color: #EDE3CE;
  font-size: 15px;
  font-family: inherit;
  outline: none;
}

.field input::placeholder {
  color: #EDE3CE;
  opacity: 0.3;
}

.field input:focus {
  border-color: rgba(242, 235, 221, 0.4);
}

.btn-primary {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 999px;
  padding: 16px;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 0.03em;
  background: #EDE3CE;
  color: #0A0A0A;
  border: none;
  cursor: pointer;
  margin-bottom: 8px;
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
</style>