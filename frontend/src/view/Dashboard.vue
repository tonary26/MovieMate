<template>
  <div class="screen">

    <div class="eyebrow">
      <span>MOVIEMATE</span>
    </div>

    <div class="hero">
      <h1>смотрим<br />вместе</h1>
      <p>собери комнату, включи фильм и переживай каждую сцену с друзьями - даже если они за тысячу километров</p>
    </div>

    <div class="cta">
      <button class="btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="#0A0A0A"><path d="M8 5v14l11-7z"/></svg>
        НАЧАТЬ СМОТРЕТЬ
      </button>
      <button class="btn-secondary">у меня уже есть комната</button>
    </div>

    <nav class="pill-nav">
      <span class="pill-item active">главная</span>
      <span class="pill-item">комнаты</span>
      <span class="pill-item">друзья</span>
      <span class="pill-item">профиль</span>
    </nav>

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

.btn-secondary {
  width: 100%;
  text-align: center;
  padding: 12px;
  font-size: 14px;
  color: #F2EBDD;
  opacity: 0.5;
  background: none;
  border: none;
  cursor: pointer;
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
  color: #F2EBDD;
  opacity: 0.4;
  cursor: pointer;
}

.pill-item.active {
  background: #F2EBDD;
  color: #0A0A0A;
  opacity: 1;
  font-weight: 700;
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

/* Очень узкие экраны */
@media (max-width: 340px) {
  .pill-item {
    font-size: 10px;
    padding: 9px 2px;
  }
}
</style>