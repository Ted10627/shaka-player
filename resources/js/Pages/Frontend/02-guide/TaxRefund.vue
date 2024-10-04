<script setup>
import 'animate.css';
import { ref } from 'vue';
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import { Link } from '@inertiajs/vue3';

const imageVisible = ref(false);

function showImage() {
  imageVisible.value = true;
}
function hideImage() {
  imageVisible.value = false;
}
</script>

<template>
  <div
    class="banner-guide w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      外國旅客購物退稅須知
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-8 m-auto py-10">
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機指南</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">外國旅客購物退稅須知</Link>
      </div>
      <mainTitle>
        <template #title>外國旅客購物退稅須知</template>
      </mainTitle>
      <div class="flex flex-col gap-5 lg:gap-10 white p-5 lg:p-10 rounded-[20px]">
        <img src="/image/tax-refund.png" alt="退稅服務櫃台" />
        <div>
          <p class="text-xl lg:text-2xl font-bold text-air-purple">> 申請購物退稅條件</p>
          <ol class="list-decimal px-3 lg:px-5 text-sm lg:text-xl">
            <li>持有「非中華民國國籍之護照、無戶籍之中華民國護照及入出境證」者。</li>
            <li>
              至台灣向經核准貼有核准銷售特定貨物退稅標誌(TRS)之商店，當日同一家購買可退稅貨品達新臺幣2000元以上，並在30天內將隨行貨物攜帶出境者。
            </li>
          </ol>
        </div>
        <div class="flex flex-col gap-3">
          <p class="text-xl lg:text-2xl font-bold text-air-purple">> 申請退稅地點</p>
          <div class="flex items-center">
            <img class="w-7 h-7 mr-2" src="/icon/foot-map-pin.png" alt="地圖icon" />
            <Link @click.prevent="showImage" :href="route('')" class="text-sm lg:text-xl text-air-purple hover:text-[#f59801]"
            >國際航廈1樓之海關「外籍旅客退稅服務台」</Link
            >
          </div>
          <div class="flex items-center">
            <img class="w-8 h-8 mr-2" src="/icon/purple-phone.png" alt="電話icon" />
            <p class="text-sm lg:text-xl">(04) 26155019 / (04) 26155022</p>
          </div>
        </div>
        <div>
          <p class="text-xl lg:text-2xl font-bold text-air-purple">> 申請退稅程序</p>
          <ol class="list-decimal px-3 lg:px-5 text-sm lg:text-xl">
            <li>
              出示退稅明細申請表、護照、攜帶出境之退稅範圍內貨物及統一發票收執聯正本，供海關人員查核。
            </li>
            <li>海關審核後，核發「外籍旅客購買特定貨物退稅明細核定單」。</li>
            <li>
              持憑海關核發之「外籍旅客購買特定貨物退稅明細核定單」，向設置於出境機場或港口之指定銀行申領退稅款。
            </li>
          </ol>
          <p class="text-sm lg:text-xl pt-5">
            外籍旅客購物退稅資訊請詳「外籍旅客e化退稅服務網」。
          </p>
        </div>
      </div>
    </div>
  </div>
  <div
    v-if="imageVisible"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
    @click="hideImage"
    @keydown.enter="hideImage"
  >
    <img
      src="/image/tax-refund-map.png"
      alt="申請退稅地點位置圖"
      class="fadeInUp max-w-full max-h-full"
      @click.stop
    />
  </div>
</template>

<style>
.banner-guide {
  background-image: url(/public/image/banner-guide.png);
}
.fadeInUp {
  animation: fadeInUp;
  animation-duration: 1s;
}
</style>
