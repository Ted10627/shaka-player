<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      旅客申訴
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">
        首頁 > 機場服務 > 旅客申訴 > 申訴流程
      </div>

      <div class="flex flex-wrap w-full sm:flex-nowrap">
        <Link
          :href="route('service.passenger-complaints')"
          class="w-full sm:rounded-l-[40px] shadow-xl p-2 lg:p-5 bg-air-purple text-xs md:text-base lg:text-2xl text-[#FFFFFF] text-center"
        >
          申請流程
        </Link>
        <Link
          :href="route('service.complaint-regulations')"
          class="w-full shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          作業規定
        </Link>
        <Link
          :href="route('')"
          class="w-full shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          主任信箱
        </Link>
        <Link
          :href="route('')"
          class="w-full shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          與民有約
        </Link>
        <Link
          :href="route('')"
          class="w-full sm:rounded-r-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          旅客建議回覆
        </Link>
      </div>
      <mainTitle>
        <template #title>申請流程</template>
      </mainTitle>
      <div class="flex flex-col gap-1 lg:gap-3 p-5 lg:p-10 white rounded-[20px]">
        <ol class="list-decimal px-3 lg:px-5">
          <li class="text-sm lg:text-2xl">
            旅客申訴管道：本站旅客或一般民眾對於本站所提供之各項服務或措施有任何意見者，可透過下列各項管道向本站提出建言
            <ul class="list-disc">
              <li>電子郵件</li>
              <li>航站主任信箱</li>
              <li>以書面意見投遞到本站意見箱</li>
              <li>直接向本站服務臺人員反映</li>
            </ul>
          </li>
          <li class="text-sm lg:text-2xl">
            本站收件後,依照申訴內容分類並交辦相關業務承辦人
          </li>
          <li class="text-sm lg:text-2xl">
            案件由承辦人擬辦後將辦理情形函覆申訴人
          </li>
          <li class="text-sm lg:text-2xl">
            持續追蹤改善
          </li>
          <li class="text-sm lg:text-2xl">
            辦理案件統計分析
          </li>
          <li class="text-sm lg:text-2xl">
            申訴時務必留下聯絡方式，以便本站函覆
          </li>
          <li class="text-sm lg:text-2xl">
            申訴案件辦理流程於申訴流程說明中以圖表示
          </li>
        </ol>
        <p class="text-sm lg:text-2xl mt-5 mb-[4rem]">下圖為民眾申訴的流程說明圖，藍色線條的箭頭代表流程的走向，民眾的申訴方式可分為電子郵件信箱、服務臺、局長服務信箱和自行投書四種。航空站會將從這些管道收集到的投訴內容做分類和收辦，依照投訴性質決定由哪個單位處理。通常區分為航站設施維護管理、聯外交通管理、航空公司服務和其他類四種，在收辦分類後會將案件綜合擬辦並將辦理情形函覆給投訴旅客，並針對未完成改善的案件繼續進行追蹤，最後將已完成辦理的案件做統計分析，作為未來改善方向的參考。</p>
        <img src="/image/passenger-complaints.png" alt="接受行動不便旅客搭機人數一覽表" />
      </div>
      <div class="w-full text-sm lg:text-2xl">文章最後更新日期：2023-03-28</div>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}
</style>
