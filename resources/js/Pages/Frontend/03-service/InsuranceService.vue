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
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施 > 保險服務</div>
      <mainTitle>
        <template #title>保險服務</template>
      </mainTitle>
      <section
        class="flex flex-col lg:flex-row gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2">
          <div class="flex flex-col items-baseline">
            <p
              class="w-fit pb-3 border-b-2 text-air-purple text-base lg:text-2xl font-bold me-4
              border-[#471c87]"
            >
              服務項目
            </p>
            <p class="text-base lg:text-2xl pt-2">辦理旅遊平安保險及人身保險業務</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">09:00 ～ 17:00</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">國際線一樓出境大廳</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/phone-solid.svg" alt="" />
            <p class="text-base lg:text-2xl">04-26155127</p>
          </div>
        </div>
        <img
          class="w-full lg:w-1/2"
          src="/image/facility/Insurance.jpg"
          alt="保險服務櫃檯"
        />
      </section>
      <section class="w-full flex flex-col gap-5">
        <div class="flex items-center justify-center">
          <p class="text-black mr-[10px]">保險服務櫃檯</p>
          <img class="w-[30px] h-[30px]" src="/icon/park-down.png" alt="" />
        </div>
        <img @click.prevent="showImage" @keydown.enter="showImage" src="/image/insurance-service-map.png" alt="service-map" />
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
    <img src="/image/insurance-service-map.png" alt="保險服務櫃檯位置圖" class="w-[100%] lg:w-[80%] fadeInUp" @click.stop />
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
