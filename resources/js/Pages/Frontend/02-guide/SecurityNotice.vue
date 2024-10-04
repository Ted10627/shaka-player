<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div
    class="banner-guide w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      搭機安全須知
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-8 m-auto py-10">
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機指南</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機安全須知</Link>
      </div>
      <mainTitle>
        <template #title>搭機安全須知</template>
      </mainTitle>
      <div class="flex flex-col white p-5 lg:p-10 rounded-[20px]">
        <p class="text-xl lg:text-2xl font-bold text-air-purple">> 托運行李</p>
        <div class="flex flex-col gap-5 text-sm lg:text-xl py-5">
          <p>
            一般航空公司免費託運行李額度國內線為每人大約為10公斤、國際線每人大約為20公斤。
            另因各家航空公司免費託運行李額度或有不同，詳情請洽欲搭乘之航空公司。
          </p>
          <p>手提行李允許1件不超過7公斤為準，大小以23x35x55公分為原則，以託運為準。</p>
          <p>
            *有關託運行李及手提行李大小及重量之規定因航空公司而異，請事先洽詢各航空公司。
            託運行李如包裝不完整或易破碎易損害等，航空公司有權拒絕載運該行李。
          </p>
        </div>
        <img src="/image/security-notice-form01.png" alt="搭機安全須知-托運行李表格" />
      </div>
      <div class="flex flex-col white p-5 lg:p-10 rounded-[20px]">
        <p class="text-xl lg:text-2xl font-bold text-air-purple">> 禁用電子用品</p>
        <div class="flex flex-col gap-3 text-sm lg:text-xl py-5">
          <p>
            航機起飛後，所有操作，均依靠航電設備儀表航行，任何小小的干擾，都會影響其精確度，造成飛安事故，
            為維護飛航安全，民用航空法第四十三條規定，機上不得使用干擾飛航通訊之電子器材。
          </p>
          <p>
            違反者，依民用航空法第一百零二條規定，處五年以下有期徒刑、拘役或新台幣十五萬元以下罰金。
            因而致人於死者，處無期徒刑、或七年以上有期徒刑。
          </p>
        </div>
        <img src="/image/security-notice-form02.png" alt="搭機安全須知-禁用電子用品表格" />
      </div>
      <div class="flex flex-col white p-5 lg:p-10 rounded-[20px]">
        <p class="text-xl lg:text-2xl font-bold text-air-purple">> 其他安全選項</p>
        <div class="flex flex-col gap-3 text-sm lg:text-xl py-5">
          <p>您進入客艙就坐後，請立即操作安全帶，調整至適當長度並確認無故障。</p>
          <p>
            飛機起飛前空服員會以電視播放或實際操作緊急救生示範，
            請仔細觀看並參考前座椅背袋內之文字資料。
          </p>
        </div>
        <img src="/image/security-notice-form03.png" alt="搭機安全須知-其他安全選項表格" />
      </div>
      <ol class="list-decimal decoration-solid px-5">
        <p class="text-xl lg:text-2xl">附件下載</p>
        <li><Link :href="route('#')" class="text-sm lg:text-xl hover:underline">旅客攜帶打火機限制</Link></li>
        <li><Link :href="route('#')" class="text-sm lg:text-xl hover:underline">隨身行李安檢新措施</Link></li>
        <li><Link :href="route('#')" class="text-sm lg:text-xl hover:underline">鋰電池上機規定</Link></li>
        <li><Link :href="route('#')" class="text-sm lg:text-xl hover:underline">隨身行李安檢新措施問答集(點選開啟相關檔案)</Link></li>
      </ol>
    </div>
  </div>
</template>

<style>
.banner-guide {
  background-image: url(/public/image/banner-guide.png);
}
</style>
