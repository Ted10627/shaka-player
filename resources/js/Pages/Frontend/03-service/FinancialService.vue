<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import 'animate.css';
import { ref } from 'vue';

const imageVisible = ref(false);

// function showImage() {
//   imageVisible.value = true
// }
function hideImage() {
  imageVisible.value = false;
}
</script>

<template>
  <div class="w-full px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施 > 金融服務</div>
      <mainTitle>
        <template #title>金融服務</template>
      </mainTitle>
      <section
        class="flex flex-col lg:flex-row gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2 lg:gap-5">
          <div class="flex flex-col items-baseline">
            <p
              class="w-fit pb-3 border-b-2 text-air-purple text-sm lg:text-2xl font-bold me-4 border-[#471c87]"
            >
              服務項目
            </p>
            <p class="text-base lg:text-2xl pt-2">外幣兌換及金融服務</p>
          </div>

          <ol class="flex flex-col gap-2 text-base lg:text-2xl">
            <li class="flex items-center">
              <img class="w-6 h-6 me-3" src="/icon/foot-map-pin.png" alt="" />
              <p class="font-medium text-2xl text-air-blue">國際線一樓出境大廳</p>&nbsp;
              <p>06:00~23:00</p>
            </li>
            <li class="flex items-center">
              <img class="w-6 h-6 me-3" src="/icon/foot-map-pin.png" alt="" />
              <p class="font-medium text-2xl text-air-blue">入境行李提領區</p>&nbsp;
              <p>09:00~17:00(配合入境班次調整服務時間)</p>
            </li>
            <li class="flex items-center">
              <img class="w-6 h-6 me-3" src="/icon/foot-map-pin.png" alt="" />
              <p class="font-medium text-2xl text-air-blue">國內線大廳</p>&nbsp;
              <p>09:00~17:00</p>
            </li>
          </ol>

          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/phone-solid.svg" alt="" />
            <p class=" text-base lg:text-2xl">04-26155127</p>
          </div>
        </div>
      </section>
      <section>
        <div>
          <p class="text-base lg:text-2xl font-bold">注意事項</p>
          <ol class="list-decimal ps-4 text-sm lg:text-2xl">
            <li>
              依財政部主管機關法規規定，旅客攜帶現金入出境限額分別為新臺幣10萬元、人民幣2萬元、等值美金1萬元之其餘外幣。
            </li>
            <li>可換幣別請洽櫃檯。</li>
            <li>兌換舊港幣需酌收服務費，詳請洽櫃檯。</li>
          </ol>
        </div>
      </section>
      <mainTitle>
        <template #title>臺灣銀行ATM現金提領服務</template>
      </mainTitle>
      <section>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
          <div class="flex flex-col items-center lg:gap-4 p-5 white rounded-[10px]">
            <p class="text-base lg:text-2xl">國際線一樓出境大廳</p>
            <button type="button">位置圖</button>
            <img class="mt-2" src="/image/facility/ATM.Departure.jpg" alt="國際線一樓出境大廳ATM" />
          </div>
          <div class="flex flex-col items-center lg:gap-4 p-5 white rounded-[20px]">
            <p class="text-base lg:text-2xl">國際線一樓入境行李提領區</p>
            <button type="button">位置圖</button>
            <img
              class="mt-2"
              src="/image/facility/ATM.luggage.jpg"
              alt="國際線一樓入境行李提領區ATM"
            />
          </div>
          <div class="flex flex-col items-center lg:gap-4 p-5 white rounded-[20px]">
            <p class="text-base lg:text-2xl">國內線一樓大廳</p>
            <button type="button">位置圖</button>
            <img class="mt-2" src="/image/facility/ATM.1F.jpg" alt="國內線一樓大廳ATM" />
          </div>
        </div>
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
