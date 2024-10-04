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
        <button type="button" class="flex-1 rounded-l-[40px] shadow-xl p-2 lg:p-5 bg-air-purple text-xl lg:text-3xl text-[#FFFFFF]">最新消息</button>
        <Link :href="route('homepage.announcement-information2')" class="flex-1 rounded-r-[40px] shadow-xl p-2 lg:p-5 white text-xl lg:text-3xl text-[#471C87] text-center">
          <button type="button" class="policyAdvocacyButtom">政策宣導</button>
        </Link>
      </div>
      <mainTitle>
        <template #title>最新消息</template>
      </mainTitle>
      <!-- <flightInformation></flightInformation> -->
      <table class="latestNews w-full">
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
              2024-07-22
            </td>
            <td class="newstitle px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=39&article_id=1789" target="_blank">臺中機場配合漢光演習113年7月25日部分航班受影響</a>
            </td>
            <td class="text-center">
              314
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2024-07-15
            </td>
            <td class="newstitle px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=39&article_id=1784" target="_blank">萬安47號演習:113年7月22日13時30分至14時00分</a>
            </td>
            <td class="text-center">
              148
            </td>
          </tr>
          <tr class="h-[80px] shadow-lg">
            <td class="text-center">
              2024-07-03
            </td>
            <td class="newstitle px-8 py-5 font-medium text-2xl text-air-blue">
              <a class="no-underline hover:underline underline-offset-4" href="https://www.tca.gov.tw/cht/index.php?code=list&flag=detail&ids=39&article_id=1775" target="_blank">臺中機場配合漢光演習113年7月25日部分航班受影響</a>
            </td>
            <td class="text-center">
              131
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
