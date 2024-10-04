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
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施 > 行李打包服務</div>
      <mainTitle>
        <template #title>行李打包服務</template>
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
            <li>行李束袋服務</li>
            <li>宅配服務</li>
          </ol>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">08:30 ~ 19:00</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">國際線一樓入境大廳</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/phone-solid.svg" alt="" />
            <p class="text-base lg:text-2xl">04-26155233</p>
          </div>
        </div>
        <img class="w-full lg:w-1/2" src="/image/baggage-packing-1.jpg" alt="行李打包服務櫃檯" />
      </section>
      <section>
        <div class="text-base lg:text-2xl p-2">
          <div class="flex gap-2">
            <p>行李束袋服務收費標準：</p>
            <p>每件NT50元（依據現場實際收費為主）</p>
          </div>
          <p>宅配服務收費標準：宅配服務由黑貓宅急便合作提供，收費標準請參考該公司網站。</p>
          <a class="border-b-2 border-black hover:text-[#f59801] hover:border-[#f59801]" href="https://www.t-cat.com.tw/">(https://www.t-cat.com.tw/)</a>
        </div>
      </section>
      <section class="w-full flex flex-col gap-5">
        <div class="flex items-center justify-center">
          <p class="text-base lg:text-2xl mr-[10px]">行李打包服務櫃檯位置圖</p>
        </div>
        <img @click.prevent="showImage" @keydown.enter="showImage" src="/image/baggage-packing-2.png" alt="行李打包服務櫃檯位置圖" />
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
    <img src="/image/baggage-packing-2.png" alt="行李打包服務櫃檯位置圖" class="w-[80%] fadeInUp" @click.stop />
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
