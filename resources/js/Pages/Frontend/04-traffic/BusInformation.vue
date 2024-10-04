<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <div class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">公車資訊</div>
  </div>
  <div class="px-5 w-full">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場交通>公車資訊</div>
      <mainTitle>
        <template #title>公車位置圖</template>
      </mainTitle>
      <div class="w-full flex flex-col gap-5 lg:gap-12">
        <img src="/public/image/bus-information.png" alt="公車位置圖" />
        <div class="flex items-center flex-wrap">
          <p class="text-2xl">即時公車動態資訊參考網頁</p>
          <img class="mr-5" width="20" src="/public/icon/black-park-right.png" alt="icon" />
          <a href="https://citybus.taichung.gov.tw/" target="_blank">
            <img class="w-[160px] lg:w-[280px]" src="/public/image/TaichungBus.png" alt="image">
          </a>
        </div>
        <mainTitle>
          <template #title>往臺中火車站</template>
        </mainTitle>
        <div class="flex w-full flex-wrap justify-start gap-x-6 gap-y-8 lg:gap-y-7">
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">500</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>臺中車站</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">500延3</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>三田國小</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>臺中車站</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">500延區2</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>三田國小</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>臺中車站</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">500延區3</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>三田國小</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>臺中車站</p>
            </div>
          </div>
        </div>
        <mainTitle>
          <template #title>往高鐵</template>
        </mainTitle>
        <div class="flex w-full flex-wrap justify-start gap-x-6 gap-y-8 lg:gap-y-7">
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">156</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>高鐵臺中站</p>
            </div>
          </div>
        </div>
        <mainTitle>
          <template #title>往梧棲、大雅</template>
        </mainTitle>
        <div class="flex w-full flex-wrap justify-start gap-x-6 gap-y-8 lg:gap-y-7">
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">123</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中慈濟醫院</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>梧棲觀光漁港</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">中鹿客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">128</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>大雅</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>清水</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">128區</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>大雅</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>梧棲</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">239</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>梧棲</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
        </div>
        <mainTitle>
          <template #title>往豐原</template>
        </mainTitle>
        <div class="flex w-full flex-wrap justify-start gap-x-6 gap-y-8 lg:gap-y-7">
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">182</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>清水</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">183</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中港郵局</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">185</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>清水</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">186</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中港郵局</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">237</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>大肚車站</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">237區</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>麗水</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">238</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中港郵局</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>豐原轉運中心</p>
            </div>
          </div>
        </div>
        <mainTitle>
          <template #title>其他</template>
        </mainTitle>
        <div class="flex w-full flex-wrap justify-start gap-x-6 gap-y-8 lg:gap-y-7">
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">69</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>龍潭里</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">91延</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>中興里停車場</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">97</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>國立苑裡高中</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[125px] mx-[128px] p-1 lg:mt-[34px] mt-2 text-sm">中臺灣客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">162</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>嘉陽高中</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>靜宜大學</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">豐原客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">302</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>新光里(新福路)</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[125px] mx-[128px] p-1 lg:mt-[34px] mt-2 text-sm">中臺灣客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">302延</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>嘉陽高中</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>新光里(新福路)</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">357</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>中臺新村</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">臺中客運</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">500延區1</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>三田國小</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>大雅</p>
            </div>
          </div>
          <div class="bus-card text-center shadow-lg rounded-3xl lg:h-[247px] h-[120px] bg-white">
            <p class="lg:text-2xl border-b-2 border-black lg:mx-[138px] mx-[135px] p-1 lg:mt-[34px] mt-2 text-sm">睿奕交通</p>
            <p class="busnumber lg:mt-[13px] mt-1 lg:text-4xl text-2xl font-bold">679</p>
            <div class="flex items-center lg:text-2xl justify-center gap-2 lg:mt-6 mt-1 lg:p-5 p-[8px] rounded-b-3xl text-sm bg-[#F8F8FF]">
              <p>臺中國際機場</p>
              <img class="" width="25" height="10" src="/public/icon/double-arrows.png" alt="icon">
              <p>新政大安港路口</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.banner-service{
  background-image: url(/public/image/banner-service.png);
}
.busnumber{
    color: #471c87;
}
</style>
