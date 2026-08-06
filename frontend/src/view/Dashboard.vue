<template>
  <div class="screen">
    <div class="hero">
      <h1>смотрим<br />вместе</h1>
      <p>собери комнату, включи фильм и переживай каждую сцену с друзьями - даже если они за тысячу километров</p>
    </div>

    <div class="cta">
      <button class="btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="#0A0A0A"><path d="M8 5v14l11-7z"/></svg>
        НАЧАТЬ СМОТРЕТЬ
      </button>
    </div>

  </div>
</template>

<style scoped>
* {
  box-sizing: border-box;
}

.screen {
  width: 100%;
  max-width: 420px;
  height: 100vh;
  height: 100dvh;
  margin: 0 auto;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  position: relative;
  background: #0A0A0A;
  font-family: 'Helvetica Neue', Arial, sans-serif;
}

.hero {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 clamp(16px, 5vw, 24px);
  min-height: 0;
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
  color: #F2EBDD;
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
  padding: 16px;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 0.03em;
  background: #F2EBDD;
  color: #0A0A0A;
  border: none;
  cursor: pointer;
}

.btn-primary svg {
  flex-shrink: 0;
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

  .btn-primary {
    padding: 12px;
  }
}
</style>