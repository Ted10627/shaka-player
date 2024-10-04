<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <div class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">計程車服務</div>
  </div>
  <div class="max-w-[1260px] w-full px-5">
    <div class="w-full flex flex-col gap-5 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場交通>計程車服務</div>
      <mainTitle>
        <template #title>計程車呼叫站</template>
      </mainTitle>
      <div>
        <img src="/public/image/taximap.png" alt="計程車呼叫站">
      </div>
    </div>
  </div>
</template>

<style>
.banner-service{
  background-image: url(/public/image/banner-google-map.png);
}
</style>
