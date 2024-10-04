<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      嬰兒車借用
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場服務>嬰兒車借用</div>
      <mainTitle>
        <template #title>嬰兒車借用及回收流程</template>
      </mainTitle>
      <div class="flex flex-col lg:flex-row justify-between white p-5 rounded-[20px]">
        <div class="flex-1 flex flex-col gap-5 lg:p-5">
          <p class="text-xl lg:text-3xl text-[#471C87]">出境 :</p>
          <ol class="list-decimal text-base lg:text-2xl mb-8 ms-8">
            <li>
              搭機旅客於服務檯嬰兒車借用表中登記「登機證」(含a航空公司、b航班號碼、c搭機時間、d座位號碼等)及聯絡電話；
              服務檯人員於接獲借用資料後，將借用人員資料轉交搭乘之航空公司並告知航站保全，航空公司於借用人員登機前配合
              進行嬰兒車回收。
            </li>
            <li>
              旅客可於管制區外使用，並可直達管制區內，直到登機門前轉交航空公司人員以代還服務檯。
            </li>
          </ol>
        </div>
        <div class="flex-1 m-auto">
          <img src="/image/facility/information.jpg" alt="旅客服務櫃檯" />
        </div>
      </div>
      <div class="flex flex-col lg:flex-row justify-between white p-5 rounded-[20px]">
        <div class="flex-1 flex flex-col gap-5 lg:p-5">
          <p class="text-xl lg:text-3xl text-[#471C87]">入境 :</p>
          <ol class="list-decimal text-base lg:text-2xl mb-8 ms-8">
            <li>
              旅客入境有借用嬰兒車使用需求時，由所搭乘之航空公司向二樓入境之服務中心登記借用。
            </li>
            <li>
              借用嬰兒車之航空公司應將資訊傳送至入境行李提領區之服務人員，由借用之航空公司回收後交還二樓入境之服務中心。
            </li>
          </ol>
        </div>
        <div class="flex-1 m-auto">
          <img src="/image/facility/baby-stroller-entry.png" alt="入境服務中心" />
        </div>
      </div>
      <mainTitle>
        <template #title>嬰兒車使用相關規定</template>
      </mainTitle>
      <div class="flex flex-col flex-1 white gap-5 p-10 px-14 rounded-[20px]">
        <ol class="list-decimal text-sm lg:text-2xl ms-4">
          <li>限1~36個月(體重20公斤以內)之1位嬰、幼兒乘坐。</li>
          <li>
            幼兒坐妥後，請確實繫好安全帶，請勿將物品置於遮陽棚或掛於扶把上，使嬰兒車重心不穩，而發生嬰兒車傾倒之意外事件。
          </li>
          <li>嬰兒車上下樓層，應使用電動昇降梯，勿使用樓梯及電動手扶梯等。</li>
          <li>請務必妥善使用及保管，遺失或毀損，應負責修護或賠償。</li>
          <li>回收單位應確實負責將嬰兒車交還至原借用處所；若有遺失應負責尋回或賠償。</li>
        </ol>
        <p class="text-sm lg:text-2xl">服務電話：04-26155000#4200 (1F-旅客諮詢櫃檯)</p>
        <Link :href="route('')">
          <div class="w-fit flex items-center gap-2 bg-air-purple p-2 text-white text-sm lg:text-2xl">
            <p class="px-4">嬰兒車即時申辦</p>
            <img class="w-6 h-6 m-auto mr-4" src="/icon/write-form.png" alt="" />
          </div>
        </Link>
      </div>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}
</style>
