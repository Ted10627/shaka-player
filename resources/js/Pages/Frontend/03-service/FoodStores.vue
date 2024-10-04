<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div class="w-full px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-10 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施 > 購物及餐廳</div>
      <mainTitle>
        <template #title>購物及餐廳</template>
      </mainTitle>
      <section
        class="flex flex-col lg:flex-row lg:gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2 lg:gap-4">
          <p class="text-xl lg:text-3xl font-bold">全家便利商店</p>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">國際線一樓中央處</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">06:00 ~ 19:00(視航班調整)</p>
          </div>
          <p
            class="w-fit pb-3 border-b-2 text-air-purple text-base lg:text-2xl font-bold border-[#471c87]"
          >
            服務項目
          </p>
          <p class="text-base lg:text-2xl mb-8">
            提供代收包裹業務、交通票卡及電子錢包儲值付款服務、咖啡、飲品、餐點、冰品等便利商品銷售服務。
          </p>
        </div>
        <img class="w-full lg:max-w-[500px]" src="/image/facility/Family.jpg" alt="全家便利商店" />
      </section>
      <section
        class="flex flex-col lg:flex-row lg:gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2 lg:gap-4">
          <p class="text-xl lg:text-3xl font-bold">萊爾富便利商店</p>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">國內線離站安檢門旁</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">05:00 ~ 21:00</p>
          </div>
          <p
            class="w-fit pb-3 border-b-2 text-air-purple text-base lg:text-2xl font-bold border-[#471c87]"
          >
            服務項目
          </p>
          <p class="text-base lg:text-2xl mb-8">
            提供代收、電子錢包儲值付款服務、咖啡、飲品、餐點、冰品等便利商品銷售服務。
          </p>
        </div>
        <img
          class="w-full lg:max-w-[500px]"
          src="/image/facility/hilife.png"
          alt="萊爾富便利商店"
        />
      </section>
      <section
        class="flex flex-col lg:flex-row lg:gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2 lg:gap-4">
          <p class="text-xl lg:text-3xl font-bold">hómee KITCHEN</p>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">國際線一樓入境大廳</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">09:30 ~ 20:30(最後點餐20:00)</p>
          </div>
          <p
            class="w-fit pb-3 border-b-2 text-air-purple text-base lg:text-2xl font-bold border-[#471c87]"
          >
            服務項目
          </p>
          <p class="text-base lg:text-2xl mb-8">
            提供中、西式簡餐料理、道地中部小吃，中華特色料理，也提供咖啡茶飲與氣泡礦泉水等飲料，
            最重要的是在價格上力趨平實，提供與市區同等價格的餐飲服務，提供旅客更多元化的餐飲新選擇。
          </p>
        </div>
        <img
          class="w-full lg:max-w-[500px]"
          src="/image/facility/homeeKITCHEN.jpg"
          alt="hómee KITCHEN"
        />
      </section>
      <section
        class="flex flex-col lg:flex-row lg:gap-[50px] justify-between white rounded-[20px] p-5 lg:p-10"
      >
        <div class="flex flex-col gap-2 lg:gap-4">
          <p class="text-xl lg:text-3xl font-bold">馬祖新村</p>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="" />
            <p class="text-base lg:text-2xl">國際線一樓入境大廳</p>
          </div>
          <div class="flex items-center">
            <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="" />
            <p class="text-base lg:text-2xl">10:00 ~ 19:00</p>
          </div>
          <p
            class="w-fit pb-3 border-b-2 text-air-purple text-base lg:text-2xl font-bold border-[#471c87]"
          >
            服務項目
          </p>
          <p class="text-base lg:text-2xl mb-8">車輪餅、手搖飲料</p>
        </div>
        <img
          class="w-full lg:max-w-[500px]"
          src="/image/facility/mazu.jpg"
          alt="hómee KITCHEN"
        />
      </section>
    </div>
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
</style>
