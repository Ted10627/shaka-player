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
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施 > 旅客諮詢櫃檯</div>
      <mainTitle>
        <template #title>旅客諮詢櫃檯</template>
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
            <li>航班諮詢服務</li>
            <li>各項設施指引諮詢</li>
            <li>代寄卡片、明信片</li>
            <li>接受旅客建議服務</li>
            <li>提供貼心物品</li>
          </ol>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">06:00~23:00(因應航班調整服務時間)</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">航廈一樓</p>
          </div>
        </div>
        <img class="w-full lg:w-1/2" src="/image/facility/information.jpg" alt="旅客服務櫃檯" />
      </section>
      <section class="w-full flex flex-col gap-5">
        <div class="flex items-center justify-center">
          <p class="text-base lg:text-2xl mr-[10px]">旅客諮詢櫃檯位置圖</p>
          <img class="w-[30px] h-[30px]" src="/icon/park-down.png" alt="" />
        </div>
        <img @click.prevent="showImage" @keydown.enter="showImage" src="/image/information.map.png" alt="information-map" />
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
    <img src="/image/information.map.png" alt="旅客服務櫃台位置圖" class="w-[100%] lg:w-[80%] fadeInUp" @click.stop />
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
