<script setup>
import 'animate.css';
import { ref } from 'vue';
import mainTitle from '@/Components/HomeView/MainTitle.vue';

const imageVisible = ref(false);
const currentImage = ref('/image/floor-plan-1f.png');
const selectedFloor = ref('1F');

function showImage() {
  imageVisible.value = true;
}
function hideImage() {
  imageVisible.value = false;
}
function changeImage(imagePath, floor) {
  currentImage.value = imagePath;
  selectedFloor.value = floor;
}
</script>

<template>
  <div class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      機場導覽圖
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場服務>機場導覽圖</div>
      <mainTitle>
        <template #title>機場導覽圖</template>
      </mainTitle>
      <div class="flex w-full">
        <button @click="changeImage('/image/floor-plan-1f.png', '1F')" type="button"
          :class="['flex-1 rounded-l-[40px] shadow-xl p-2 lg:p-5 text-xs md:text-base lg:text-2xl text-center',
                   selectedFloor === '1F' ? 'bg-air-purple text-white' : 'white text-[#471C87] hover:bg-[#471C87] hover:text-white']">
          1F
        </button>
        <button @click="changeImage('/image/floor-plan-2f.png', '2F')" type="button"
          :class="['flex-1 shadow-xl p-2 lg:p-5 text-xs md:text-base lg:text-2xl text-center',
                   selectedFloor === '2F' ? 'bg-air-purple text-white' : 'white text-[#471C87] hover:bg-[#471C87] hover:text-white']">
          2F
        </button>
        <button @click="changeImage('/image/floor-plan-3f.png', '3F')" type="button"
          :class="['flex-1 shadow-xl p-2 lg:p-5 text-xs md:text-base lg:text-2xl text-center',
                   selectedFloor === '3F' ? 'bg-air-purple text-white' : 'white text-[#471C87] hover:bg-[#471C87] hover:text-white']">
          3F
        </button>
        <button @click="changeImage('/image/floor-plan-4f.png', '4F')" type="button"
          :class="['flex-1 shadow-xl p-2 lg:p-5 text-xs md:text-base lg:text-2xl text-center',
                   selectedFloor === '4F' ? 'bg-air-purple text-white' : 'white text-[#471C87] hover:bg-[#471C87] hover:text-white']">
          4F
        </button>
        <button @click="changeImage('/image/floor-plan-b1.png', 'B1')" type="button"
          :class="['flex-1 rounded-r-[40px] shadow-xl p-2 lg:p-5 text-xs md:text-base lg:text-2xl text-center',
                   selectedFloor === 'B1' ? 'bg-air-purple text-white' : 'white text-[#471C87] hover:bg-[#471C87] hover:text-white']">
          B1
        </button>
      </div>
      <img class="airportmap" :src="currentImage" alt="airportmap" @click="showImage" @keydown.enter="showImage">
    </div>
  </div>
  <div v-if="imageVisible" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" @click="hideImage" @keydown.enter="hideImage">
    <img :src="currentImage" alt="導覽圖" class="fadeInUp w-[100%] lg:w-[80%] mx-10" @click.stop>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}
.fadeInUp {
  animation: fadeInUp;
  animation-duration: 1s;
}
</style>
