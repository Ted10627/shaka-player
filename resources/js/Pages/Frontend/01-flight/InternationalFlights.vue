<script setup>
import flightInformation from '@/Components/01-Flight/FlightInformation.vue';
</script>

<template>
  <img src="/image/flight-international.png" alt="" />
  <div class="w-full max-w-[1260px] py-[50px]">
    <div class="w-full text-sm lg:text-2xl">首頁>航班資訊>國際即時航班資訊</div>
    <div class="flex w-full justify-center md:text-2xl md:text-[#471C87]">
      <div class="flex-col my-[28px]">
        <span class="flex">
          *由於班機可能受到天候或臨時航班調度影響，因此班機實際飛航狀況仍將以各航空公司公告為主。
        </span>
        <span class="flex">*預定時間為參考時間，請以實際時間為主。</span>
      </div>
    </div>
    <div class="flex w-full justify-center">
      <flightInformation category-name="international"></flightInformation>
    </div>
  </div>
</template>
