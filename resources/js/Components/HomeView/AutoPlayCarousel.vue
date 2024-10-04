<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const items = ref([
  { src: './image/banner-1.png', alt: '...' },
  { src: './image/banner-2.png', alt: '...' },
  { src: './image/banner-3.png', alt: '...' },
]);

const currentIndex = ref(0);
let intervalId = null;

const showNextImage = () => {
  currentIndex.value = (currentIndex.value + 1) % items.value.length;
};

onMounted(() => {
  intervalId = setInterval(showNextImage, 5000);
});

onUnmounted(() => {
  clearInterval(intervalId);
});
</script>

<template>
  <div
    class="relative z-0 w-full max-w-[1720px] rounded-tl-[50px] rounded-bl-[12px] md:rounded-bl-[0px] md:rounded-tl-[100px] lg:rounded-tl-[200px] overflow-hidden"
  >
    <!-- 解決輪播沒有長寬可以撐開區域，下方圖片負責空間 -->
    <div class="w-full">
      <img src="/image/banner-1.png" alt="" class="opacity-100" />
    </div>
    <div
      v-for="(item, index) in items"
      :key="index"
      :class="[
        'absolute top-0 left-0 transition-opacity duration-1000 ease-in-out w-full',
        {
          'opacity-100': currentIndex === index,
          'opacity-0': currentIndex !== index,
        },
      ]"
    >
      <img :src="item.src" class="block object-cover" :alt="item.alt" />
    </div>
  </div>
</template>

<style scoped>
.absolute {
    transition: opacity 3s ease-in-out;
}
.opacity-100 {
    opacity: 1 !important;
}
.opacity-0 {
    opacity: 0 !important;
}
</style>
