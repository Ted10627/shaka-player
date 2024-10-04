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
      <div class="w-full text-sm lg:text-2xl">首頁>機場服務>無障礙服務>無障礙交通設施</div>
      <mainTitle>
        <template #title>無障礙交通設施</template>
      </mainTitle>
      <div class="flex flex-wrap w-full xl:flex-nowrap">
        <Link
          :href="route('service.accessible-transportation')"
          class="w-full xl:rounded-l-[40px] shadow-xl p-2 lg:p-5 bg-air-purple text-xs md:text-base lg:text-2xl text-[#FFFFFF] text-center"
        >
          無障礙交通設施
        </Link>
        <Link
          :href="route('service.accessible-service')"
          class="w-full shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
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
      <div class="w-full flex flex-col lg:flex-row gap-5 lg:gap-10 p-10 white rounded-[20px]">
        <div class="">
          <p class="text-xl lg:text-3xl text-[#471C87]">無障礙停車位</p>
          <p class="text-sm lg:text-2xl">B1停車場 靠出口處計有4個汽車停車位及3個機車停車位。</p>
        </div>
        <div class="m-auto">
          <img class="w-full" src="/image/accessible-transportation01.png" alt="無障礙停車位" />
        </div>
      </div>
      <div class="w-full flex flex-col lg:flex-row gap-5 lg:gap-10 p-10 white rounded-[20px]">
        <div>
          <p class="text-xl lg:text-3xl text-[#471C87]">無障礙及復康巴士接送臨時停車位</p>
          <p class="text-sm lg:text-2xl">位於國際航廈1樓入口處，計有2個臨停車位。</p>
          <p class="text-sm lg:text-2xl">位於國際航廈B1入口處，計有2個臨停車位。</p>
        </div>
        <div class="m-auto">
          <img class="w-full" src="/image/accessible-transportation02.png" alt="無障礙及復康巴士接送臨時停車位" />
        </div>
      </div>
      <div class="w-full flex flex-col gap-5 lg:gap-10 p-10 white rounded-[20px]">
        <div>
          <p class="text-xl lg:text-3xl">無障礙停車優惠</p>
          <p class="text-sm lg:text-2xl">
            停車優惠：身心障礙者自行駕駛之車輛（應具備本人之駕照、行照及身心障礙手冊【姓名皆須相符】），經審核無誤者，停車當日免費。
          </p>
        </div>
        <div>
          <p class="text-xl lg:text-3xl">陪同人員優惠措施</p>
          <p class="text-sm lg:text-2xl">
            停車優惠:停車費三十分鐘內免費。身心障礙者或必要陪同載送殘障旅客停車當日免費（第二天則收費）。
            備註：須持身心障礙手冊。
          </p>
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
