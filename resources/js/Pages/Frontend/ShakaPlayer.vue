<script setup>
import { ref, onMounted } from 'vue';
import shaka from 'shaka-player';

// 影片的 URI 路徑
const videoUri = '/videos/ShakaPlayer.mp4';

// 定義 video 元素的 ref
const video = ref(null);
let player;

// 初始化 Shaka Player 的函數
const initShakaPlayer = async () => {
  player = new shaka.Player(video.value);

  // 監聽錯誤事件
  player.addEventListener('error', onError);

  // 嘗試載入影片
  try {
    await player.load(videoUri);
    console.log('Shaka Player 抓取到影片');
  } catch (error) {
    console.error('抓取影片失敗', error);
    onError(error);
  }
};

// 錯誤處理函數
const onError = (error) => {
  console.error('Error code', error.code, 'object', error);
};

// 在元件掛載時初始化播放器
onMounted(() => {
  // 檢查瀏覽器是否支援 Shaka Player
  if (shaka.Player.isBrowserSupported()) {
    initShakaPlayer();
  } else {
    console.error('瀏覽器不支援 Shaka Player');
  }
});

// 跳轉影片時間的函數
const jumpTo = async (seconds) => {
  console.log('目前的 player:', player);
  if (player) {
    if (typeof player.seek === 'function') {
      try {
        await player.seek(seconds);
        console.log(`已跳轉到 ${seconds} 秒`);
      } catch (error) {
        console.error('跳轉失敗', error);
      }
    } else {
      console.error('player.seek 不是一個函數');
    }
  } else {
    console.error('播放器未初始化');
  }
};

// 原生 video 跳轉
const jumpToNative = (seconds) => {
  if (video.value) {
    // 使用 HTML5 video 的 currentTime 屬性進行跳轉
    video.value.currentTime = seconds;
    console.log(`已跳轉到 ${seconds} 秒`);
  } else {
    console.warn('影片元素未初始化');
  }
};

</script>

<template>
  <div>
    <h2>Shaka Player</h2>
    <video ref="video" width="620" poster="//shaka-player-demo.appspot.com/assets/poster.jpg" controls
      controlsList="nodownload" autoplay>
      <track kind="captions" src="/videos/ShakaPlayer.vtt" srclang="cht" label="中文">
    </video>
    <h2>Shaka跳轉</h2>
    <!-- 跳轉按鈕 -->
    <div id='timeline-buttons'>
      <button type='button' class='jump-button' @click='() => jumpTo(20)'>課程前導(0:20)</button>
      <button type='button' class='jump-button' @click='() => jumpTo(129)'>第二堂(2:09)</button>
    </div>
    <hr>
    <h2>原生跳轉</h2>
    <!-- 原生 Video 跳轉按鈕 -->
    <div id='timeline-buttons'>
      <button type='button' class='jump-button' @click='() => jumpToNative(20)'>課程前導(0:20)</button>
      <button type='button' class='jump-button' @click='() => jumpToNative(129)'>第二堂(2:09)</button>
    </div>
  </div>
</template>

<style>
.jump-button {
  cursor: pointer;
  background-color: white;
  border: 0;
  margin-top: 10px;
}

.jump-button:hover {
  color: blue;
}
</style>
