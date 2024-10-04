<script setup>
import scheduledInformation from '@/Components/01-Flight/ScheduledInformation.vue';
</script>

<template>
  <img src="/image/Scheduled-international.png" alt="" />
  <div class="w-full max-w-[1260px] py-[50px]">
    <div class="mb-5 w-full text-sm lg:text-2xl">首頁>航班資訊>國際定期航班</div>
    <div class="flex w-full justify-center">
      <scheduledInformation category-name="domestic"></scheduledInformation>
    </div>
    <div class="flex w-full justify-center md:text-2xl md:text-[#471C87]">
      <div class="flex-col w-full my-[28px]">
        <span class="flex">
          *由於班機可能受到天候或臨時航班調度影響，因此班機實際飛航狀況仍將以各航空公司公告為主。
        </span>
        <span class="flex">*預定時間為參考時間，請以實際時間為主。</span>
      </div>
    </div>
  </div>
</template>
