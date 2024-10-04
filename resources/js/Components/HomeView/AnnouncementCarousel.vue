<script setup>
import {
  ref,
  reactive,
  defineProps,
  watch,
  defineExpose,
  onMounted,
  onUnmounted,
} from 'vue';

const props = defineProps({
  carouselName: {
    type: String,
    default: 'default',
  },
});

const carousel = reactive({
  carousel1: {
    num: 2,
    distance: 50,
    top: 41,
  },
  lg1: {
    num: 3,
    distance: 50,
    top: 41,
  },
  sm1: {
    num: 3,
    distance: 95,
    top: 41,
  },
  carousel2: {
    num: 4,
    distance: 33,
    top: 33,
  },
  lg2: {
    num: 6,
    distance: 80,
    top: 33,
  },
  sm2: {
    num: 6,
    distance: 80,
    top: 33,
  },
  default: {
    num: 1,
    distance: 100,
    top: 0,
  },
});

const currentIndex = ref(0);
let inCarousel = carousel[props.carouselName];

const isDragging = ref(false);
const startX = ref(0);
const currentX = ref(0);

watch(
  () => props.carouselName,
  (newVal) => {
    inCarousel = carousel[newVal];
    currentIndex.value = 0;
  },
);

const prev = () => {
  if (currentIndex.value > 0) {
    currentIndex.value--;
  }
};

const next = () => {
  if (currentIndex.value < inCarousel.num - 1) {
    currentIndex.value++;
  }
};
// 電腦滑鼠滑動監聽事件設定(他有必要存在?我不知道)
const onMouseDown = (event) => {
  isDragging.value = true;
  startX.value = event.clientX;
  currentX.value = startX.value;
};

const onMouseMove = (event) => {
  if (isDragging.value) {
    currentX.value = event.clientX;
  }
};

const onMouseUp = () => {
  if (isDragging.value) {
    const movedDistance = startX.value - currentX.value;
    if (Math.abs(movedDistance) > 50) {
      // 可以根據需要調整這個閾值
      if (movedDistance > 0) {
        next();
      } else {
        prev();
      }
    }
    isDragging.value = false;
  }
};
// 手機滑動監聽事件設定
const onTouchStart = (event) => {
  isDragging.value = true;
  startX.value = event.touches[0].clientX;
  currentX.value = startX.value;
};

const onTouchMove = (event) => {
  if (isDragging.value) {
    currentX.value = event.touches[0].clientX;
  }
};

const onTouchEnd = () => {
  if (isDragging.value) {
    const movedDistance = startX.value - currentX.value;
    if (Math.abs(movedDistance) > 50) {
      if (movedDistance > 0) {
        next();
      } else {
        prev();
      }
    }
    isDragging.value = false;
  }
};
// DOM監聽，主要為初始化的動作
onMounted(() => {
  window.addEventListener('mousemove', onMouseMove);
  window.addEventListener('mouseup', onMouseUp);
  window.addEventListener('touchmove', onTouchMove);
  window.addEventListener('touchend', onTouchEnd);
});

onUnmounted(() => {
  window.removeEventListener('mousemove', onMouseMove);
  window.removeEventListener('mouseup', onMouseUp);
  window.removeEventListener('touchmove', onTouchMove);
  window.removeEventListener('touchend', onTouchEnd);
});

defineExpose({ prev, next });
const hoverL = ref(false);
const hoverR = ref(false);
</script>

<template>
  <div
    class="relative w-full h-full"
    @mousedown="onMouseDown"
    @touchstart="onTouchStart"
  >
    <div class="w-full h-full overflow-hidden">
      <div
        class="flex h-full transition-transform duration-700 ease-in-out"
        :style="{
          transform: `translateX(-${
            currentIndex * inCarousel.distance
          }%)`,
        }"
      >
        <slot></slot>
      </div>
    </div>
    <div class="hidden lg:block">
      <button
        type="button"
        @mouseover="hoverL = true"
        @mouseleave="hoverL = false"
        @focus="hoverL = true"
        @blur="hoverL = false"
        tabindex="0"
        @click="prev"
        class="hover:bg-white"
        :class="`flex z-10 justify-center items-center w-[84px] h-[84px] absolute rounded-full left-[-42px] bg-[rgba(255,255,255,0.5)] shadow-[0px_0px_6px_rgba(0,0,0,0.25)] ${
          currentIndex > 0 ? 'block' : 'hidden'
        }`"
        :style="{ top: `${inCarousel.top}%` }"
      >
        <img
          class="w-[28px] h-[28px]"
          :src="
            hoverL
              ? '/icon/hover-guide-left-arrow.png'
              : '/icon/guide-left-arrow.png'
          "
          alt="左按鈕"
        />
      </button>
      <button
        type="button"
        @mouseover="hoverR = true"
        @mouseleave="hoverR = false"
        @focus="hoverR = true"
        @blur="hoverR = false"
        tabindex="0"
        @click="next"
        class="hover:bg-white"
        :class="`flex z-10 justify-center items-center w-[84px] h-[84px] absolute rounded-full right-[-42px] bg-[rgba(255,255,255,0.5)] shadow-[0px_0px_6px_rgba(0,0,0,0.25)] ${
          currentIndex < inCarousel.num - 1 ? 'block' : 'hidden'
        }`"
        :style="{ top: `${inCarousel.top}%` }"
      >
        <img
          class="w-[28px] h-[28px]"
          :src="
            hoverR
              ? '/icon/hover-guide-right-arrow.png'
              : '/icon/guide-right-arrow.png'
          "
          alt="右按鈕"
        />
      </button>
    </div>
  </div>
  <!-- 手機板按鈕 -->
  <div class="flex w-full mb-[20px] ml-[15px] justify-center lg:hidden">
    <button
      type="button"
      @mouseover="hoverL = true"
      @mouseleave="hoverL = false"
      @focus="hoverL = true"
      @blur="hoverL = false"
      tabindex="0"
      @click="prev"
      class="mr-[10px] flex z-10 justify-center items-center w-[32px] h-[32px] rounded-full bg-[rgba(255,255,255,0.5)] shadow-[0px_0px_6px_rgba(0,0,0,0.25)]"
      :style="{ top: `${inCarousel.top}%` }"
    >
      <img
        class="w-[8px] h-[8px]"
        :src="
          hoverL
            ? '/icon/hover-guide-left-arrow.png'
            : '/icon/guide-left-arrow.png'
        "
        alt="左按鈕"
      />
    </button>
    <button
      type="button"
      @mouseover="hoverR = true"
      @mouseleave="hoverR = false"
      @focus="hoverR = true"
      @blur="hoverR = false"
      tabindex="0"
      @click="next"
      class="flex z-10 justify-center items-center w-[32px] h-[32px] rounded-full bg-[rgba(255,255,255,0.5)] shadow-[0px_0px_6px_rgba(0,0,0,0.25)]"
      :style="{ top: `${inCarousel.top}%` }"
    >
      <img
        class="w-[8px] h-[8px]"
        :src="
          hoverR
            ? '/icon/hover-guide-right-arrow.png'
            : '/icon/guide-right-arrow.png'
        "
        alt="右按鈕"
      />
    </button>
  </div>
</template>
