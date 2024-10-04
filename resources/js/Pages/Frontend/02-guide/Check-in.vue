<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div
    class="banner-guide w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      報到及通關
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-8 m-auto py-10">
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機指南</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">報到及通關</Link>
      </div>
      <mainTitle>
        <template #title>報到及通關</template>
      </mainTitle>
      <div>
        <p class="text-sm lg:text-xl">
          航空公司於班機起飛前60分鐘（國際線則為起飛前2至3小時）開始辦理報到手續。<br />
          旅客最遲應該在起飛前的30分鐘（國際線為起飛前60分鐘，各航空公司規定不同，請詳洽各航空公司規定）辦妥手續，否則機位將由候補者遞補。
        </p>
      </div>
      <div>
        <img class="w-full m-auto" src="/image/check-in.jpg" alt="旅客機場報到及通關流程說明圖" />
      </div>
      <mainTitle>
        <template #title>搭機報到文件</template>
      </mainTitle>
      <div class="flex flex-col md:flex-row white my-5 p-5 rounded-[20px]">
        <div class="order-2 md:order-1 m-auto">
          <img src="/image/passport.png" alt="護照示意圖" />
        </div>
        <div class="order-1 md:order-2 flex-1 flex flex-col justify-center gap-10 p-5 lg:p-10">
          <div>
            <p class="text-xl lg:text-2xl text-air-purple">國內線</p>
            <p class="text-sm lg:text-xl">
              旅客攜帶由政府機關核發且具有照片之身分證明文件如身分證、健保卡、護照。
              未滿14歲之旅客，未持有政府機關核發貼有照片之身分證明文件者，得以戶口名簿
              或健保卡或兒童手冊等能證明身分之文件替代之。
            </p>
          </div>
          <div>
            <p class="text-xl lg:text-2xl text-air-purple">國際線</p>
            <p class="text-sm lg:text-xl">
              旅客須攜帶有效之旅行證件，如護照、簽證、檢疫文件等（視目的地不同，詳細情形請洽航空公司或旅行社），
              方便航空公司櫃檯人員於辦理報到手續時核對，登機時供查驗員查看。
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.banner-guide {
  background-image: url(/public/image/banner-guide.png);
}
</style>
