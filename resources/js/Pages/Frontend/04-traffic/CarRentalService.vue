<script setup>
</script>

<template>
  <div class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <div class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">租車服務</div>
  </div>
  <div class="max-w-[1260px] w-full px-5">
    <div class="w-full flex flex-col gap-5 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場交通>租車服務</div>
      <section class="w-full h-[700px] lg:h-auto flex flex-col lg:flex-row gap-[50px] white rounded-[20px] p-10">
        <div class="basis-1/2 flex flex-col">
          <div>
            <div class="flex">
              <p class="pb-3 border-b-2 text-air-purple font-bold mb-[30px] border-[#471c87]">服務項目</p>
              <div class="flex-initial"></div>
            </div>
            <p class="text-black mb-8">
              1. 空車及代僱駕駛之租賃服務<br>
              2. 寄物櫃操作，兌換零錢<br>
              3. 行李束袋服務<br>
            </p>
          </div>
          <div>
            <div class="flex items-center">
              <img class="w-6 h-6 mr-5" src="/icon/ion.timeclock.png" alt="">
              <p class="text-black">08:30~19:00</p>
            </div>
            <div class="flex items-center">
              <img class="w-6 h-6 mr-5" src="/public/icon/foot-telephone.png" alt="">
              <p class="text-black">04-26155233</p>
            </div>
            <div class="flex items-center">
              <img class="w-6 h-6 mr-5" src="/icon/foot-map-pin.png" alt="">
              <!-- 點擊彈出導覽圖 -->
              <p class="text-air-purple">國際線一樓入境大廳</p>
            </div>
          </div>
        </div>
        <div class="basis-1/2 bg-cover bg-center bg-[url(/public/image/carrent.png)]">
        </div>
      </section>
      <section>
        <div>
          <p class="text-2xl ml-1">線上訂車&nbsp;<a target="_blank" href="https://www.car-plus.com.tw/">https://www.car-plus.com.tw/</a></p>
        </div>
        <div>
          <p class="text-2xl ml-1">注意事項：國外人士無法使用線上訂車服務，請洽櫃檯人員。</p>
        </div>
      </section>
      <section class="w-full h-[530px] flex flex-col gap-5">
        <!-- <div class="w-auto h-full bg-cover bg-no-repeat" style="background-image: url(/image/information.map.png)"></div> -->
        <img src="/public/image/car-rent-map.png" alt="租車地點">
      </section>
    </div>
  </div>
</template>

<style>
.banner-service{
  background-image: url(/public/image/banner-google-map.png);
}
</style>
