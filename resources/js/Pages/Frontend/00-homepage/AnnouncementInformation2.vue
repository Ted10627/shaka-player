<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
// import flightInformation from '@/components/HomeView/FlightInformation.vue'
</script>

<template>
  <div class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <div class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">公告資訊</div>
  </div>
  <div class="max-w-[1260px] w-full px-5">
    <div class="w-full flex flex-col gap-5 m-auto py-7">
      <div class="w-full text-sm lg:text-2xl">首頁>公告資訊</div>
    </div>
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto pb-10">
      <div class="flex w-full">
        <Link :href="route('homepage.announcement-information1')" class="flex-1 rounded-l-[40px] shadow-xl p-2 lg:p-5 white  text-xl lg:text-3xl text-[#471C87] text-center">
          <button type="button" class="policyAdvocacyButtom">最新消息</button>
        </Link>
        <button type="button" class="flex-1 rounded-r-[40px] shadow-xl p-2 lg:p-5 bg-air-purple text-xl lg:text-3xl text-[#FFFFFF]">政策宣導</button>

      </div>
      <mainTitle>
        <template #title>政策宣導</template>
      </mainTitle>
      <!-- <flightInformation></flightInformation> -->
      <table class="policyAdvocacy w-full">
        <thead class="w-full">
          <colgroup>
            <col class="w-[20%]">
            <col class="w-[60%]">
            <col class="w-[20%]">
          </colgroup>
          <tr class="air-dark-blue h-[80px]">
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">發布日期</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">標題</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center text-white">點擊率</div>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white text-2xl">
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2024-09-18
            </td>
            <td class="px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=386&article_id=1639" target="_blank">臺中航空站能源政策宣示</a>
            </td>
            <td class="text-center">
              1179
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2024-05-15
            </td>
            <td class="px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=386&article_id=1748">與民同行</a>
            </td>
            <td class="text-center">
              68
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2024-05-07
            </td>
            <td class="px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=386&article_id=1742" target="_blank">全新TAIWAN觀光品牌3.0版動畫短片</a>
            </td>
            <td class="text-center">
              86
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2024-01-03
            </td>
            <td class="px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=386&article_id=1679" target="_blank">交通大建設</a>
            </td>
            <td class="text-center">
              677
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2023-09-05
            </td>
            <td class="px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=386&article_id=1637" target="_blank">112年交通安全月宣導短片</a>
            </td>
            <td class="text-center">
              752
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2023-08-08
            </td>
            <td class="px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=386&article_id=860" target="_blank">為維護機場地面作業安全，禁止在機場航廈內管制區、停機坪使用手機遊戲Pokemon GO （神奇寶貝），敬請見諒，謝謝您的合作。</a>
            </td>
            <td class="text-center">
              12068
            </td>
          </tr>
        </tbody>
      </table>
      <div class="w-full flex justify-center">
        <span class="font-medium text-2xl text-air-blue mr-3">上一頁</span>
        <span class="text-2xl text-white bg-zinc-400 px-2 rounded mr-3">1</span>
        <span class="font-medium text-2xl text-air-blue mr-8">下一頁</span>
        <span class="text-2xl">第1/1頁</span>
      </div>
    </div>
  </div>
</template>

<style>
.banner-service{
  background-image: url(/public/image/banner-flight.png);
}
.air-dark-blue{
  background-color: #343557;
}
</style>
