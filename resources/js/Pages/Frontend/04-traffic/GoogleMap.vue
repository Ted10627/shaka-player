<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <img
    class="max-w-full w-auto m-auto"
    src="/image/banner-google-map.png"
    alt="機場 Google Map"
  />
  <div class="max-w-[1260px] w-full px-5">
    <div class="w-full flex flex-col gap-5 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場交通>Google Map</div>
      <mainTitle>
        <template #title>機場 Google Map</template>
      </mainTitle>
      <div class="map-container">
        <iframe title="google-map" class="m-auto w-full h-[650px] border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27465.461284817713!2d120.59585806027798!3d24.265181570268187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346911535f840371%3A0x586410335e8a5024!2sTaichung%20International%20Airport!5e0!3m2!1sen!2stw!4v1723446096535!5m2!1sen!2stw" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!-- width="1260" height="650" -->
      </div>
      <div class="w-full text-sm lg:text-2xl">文章最後更新日期：2024-08-03</div>
    </div>
  </div>
</template>

<style></style>

