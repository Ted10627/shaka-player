<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      無障礙服務
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場服務>無障礙服務>無障礙服務設施</div>
      <mainTitle>
        <template #title>無障礙服務設施</template>
      </mainTitle>
      <div class="flex flex-wrap w-full xl:flex-nowrap">
        <Link
          :href="route('service.accessible-transportation')"
          class="w-full xl:rounded-l-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          無障礙交通設施
        </Link>
        <Link
          :href="route('service.accessible-service')"
          class="w-full shadow-xl p-2 lg:p-5 bg-air-purple text-xs md:text-base lg:text-2xl text-[#FFFFFF] text-center"
        >
          無障礙服務設施
        </Link>
        <Link
          :href="route('service.accessible-passengers')"
          class="w-full xl:rounded-r-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          接受行動不便旅客搭機人數一覽表
        </Link>
      </div>
      <div class="w-full flex flex-col gap-5 lg:gap-10 p-5 lg:p-10 white rounded-[20px]">
        <div class="">
          <p class="text-sm lg:text-2xl">
            我們的航廈設施已全面採無障礙設計，然而我們更重視的是如何站在使用者的角度，提供真正全方位、完善又符合需求的服務。
            為打造友善安全的無障礙空間，我們分就硬體及軟體二方面進行全面檢視及改善。硬體設施部分，採無障礙空間設計，增設各項無障礙設備，並不定期邀請身心障礙團體協助檢視各項設施妥適性；軟體服務部分，設置愛心服務電話及緊急服務鈴，並增設「無障礙專線電話
            (04-26244100) 」，提供民眾無障礙一條龍服務，讓愛與服務無限延伸！
          </p>
        </div>
        <div class="grid grid-col-1 md:grid-cols-2 gap-10">
          <div class="flex flex-col items-center lg:gap-2">
            <p class="text-sm lg:text-2xl font-bold text-air-purple">航空站專人服務</p>
            <p class="text-sm lg:text-2xl">航空站設有無障礙服務櫃檯且置有專人服務</p>
            <img class="w-full" src="/image/accessible-service01.png" alt="航空站專人服務" />
          </div>
          <div class="flex flex-col items-center lg:gap-2">
            <p class="text-sm lg:text-2xl font-bold text-air-purple">輪椅</p>
            <p class="text-sm lg:text-2xl">可向服務臺或航空公司借用</p>
            <img class="w-full" src="/image/accessible-service02.png" alt="輪椅" />
          </div>
          <div class="flex flex-col items-center lg:gap-2">
            <p class="text-sm lg:text-2xl font-bold text-air-purple">專用公用電話</p>
            <p class="text-sm lg:text-2xl">國內航廈大廳2具 、國際航廈4具</p>
            <img class="w-full" src="/image/accessible-service03.png" alt="專用公用電話" />
          </div>
          <div class="flex flex-col items-center lg:gap-2">
            <p class="text-sm lg:text-2xl font-bold text-air-purple">無障礙及親子廁所</p>
            <p class="text-sm lg:text-2xl">國內航廈及國際航廈共計11間</p>
            <img class="w-full" src="/image/accessible-service04.png" alt="無障礙及親子廁所" />
          </div>
          <div class="flex flex-col items-center lg:gap-2">
            <p class="text-sm lg:text-2xl font-bold text-air-purple">無障礙電梯</p>
            <p class="text-sm lg:text-2xl">國內航廈2部、國際航廈7部</p>
            <img class="w-full" src="/image/accessible-service05.png" alt="無障礙電梯" />
          </div>
          <div class="flex flex-col items-center lg:gap-2">
            <p class="text-sm lg:text-2xl font-bold text-air-purple">哺集乳室</p>
            <p class="text-sm lg:text-2xl">到站區、航廈大廳、內候機室，共6間</p>
            <img class="w-full" src="/image/accessible-service06.png" alt="哺集乳室" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}
</style>
