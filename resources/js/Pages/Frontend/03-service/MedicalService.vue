<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import 'animate.css';
import { ref } from 'vue';

const imageVisible = ref(false);

function showImage() {
  imageVisible.value = true;
}
function hideImage() {
  imageVisible.value = false;
}
</script>

<template>
  <div class="w-full px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施 > 護理服務</div>
      <mainTitle>
        <template #title>護理服務</template>
      </mainTitle>
      <section
        class="flex flex-col lg:flex-row gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2">
          <p
            class="w-fit pb-3 border-b-2 text-air-purple text-base lg:text-2xl font-bold border-[#471c87]"
          >
            服務項目
          </p>
          <ol class="list-decimal text-base lg:text-2xl mb-8 ms-8">
            <li>緊急救護</li>
            <li>簡易身理檢查（如：體溫、呼吸、脈搏、血壓）</li>
            <li>一般外科護理（如：簡易傷口護理）</li>
            <li>衛教諮詢</li>
            <li>本站為AED安心場所，設置全自動體外電擊去顫器（AED）三部，掌握搶救生命的黃金五分鐘。若有旅客有需求時，可逕洽護理站提供服務</li>
          </ol>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">05:30 ～ 23:30</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">航廈一樓便利商店對面</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/phone-solid.svg" alt="" />
            <p class="text-base lg:text-2xl">04-26244199</p>
          </div>
        </div>
        <img class="w-full lg:w-1/2" src="/image/medical-service-1.jpg" alt="護理服務" />
      </section>
      <section class="w-full flex flex-col gap-5">
        <div class="flex items-center justify-center">
          <p class="text-base lg:text-2xl mr-[10px]">護理服務位置圖</p>
        </div>
        <img @click.prevent="showImage" @keydown.enter="showImage" src="/image/medical-service-2.png" alt="護理服務位置圖" />
      </section>
    </div>
  </div>
  <!-- 點擊彈出導覽圖 -->
  <div
    v-if="imageVisible"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
    @click="hideImage"
    @keydown.enter="hideImage"
  >
    <img src="/image/medical-service-2.png" alt="護理服務位置圖" class="w-[100%] lg:w-[80%] fadeInUp" @click.stop />
  </div>
</template>

<style>
option {
  background-color: #ffffff;
  color: black;
}
.facility-select li {
  font-size: 24px;
  font-weight: 500;
  color: black;
  padding: 20px 40px;
}
.facility-select li:hover {
  color: #471c87;
  background-color: #ffffff;
}
.fadeInUp {
  animation: fadeInUp;
  animation-duration: 1s;
}
</style>
