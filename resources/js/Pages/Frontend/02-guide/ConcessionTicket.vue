<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div
    class="banner-guide w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      票價優惠說明
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-8 m-auto py-10">
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機指南</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">票價優惠說明</Link>
      </div>
      <mainTitle>
        <template #title>票價優惠說明</template>
      </mainTitle>
      <div class="flex flex-col gap-5 p-5 lg:p-10 white rounded-[20px]">
        <p class="text-sm lg:text-xl">
          兒童實際優惠情形仍以航空公司認定為主（因依民航局規定只有保障老人與身心障礙者有優惠）。
        </p>
        <img src="/image/concession-ticket-form01.png" alt="票價優惠說明表格" />
      </div>

      <div class="flex flex-col gap-5 p-5 lg:p-10 white rounded-[20px]">
        <p class="text-xl lg:text-3xl font-bold text-[#471C87]">> 離島居民補貼額度如下：</p>
        <img src="/image/concession-ticket-form02.png" alt="票價優惠說明-離島居民補貼額度表格" />
      </div>
    </div>
  </div>
</template>

<style>
.banner-guide {
  background-image: url(/public/image/banner-guide.png);
}
</style>
