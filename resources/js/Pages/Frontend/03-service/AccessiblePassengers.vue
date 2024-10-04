<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      無障礙服務
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">
        首頁>機場服務>無障礙服務>接受行動不便旅客搭機人數一覽表
      </div>
      <mainTitle>
        <template #title>接受行動不便旅客搭機人數一覽表</template>
      </mainTitle>
      <div class="flex flex-wrap w-full xl:flex-nowrap">
        <Link
          :href="route('service.accessible-transportation')"
          class="w-full xl:rounded-l-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          無障礙交通設施
        </Link>
        <Link
          :href="route('service.accessible-service')"
          class="w-full shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          無障礙服務設施
        </Link>
        <Link
          :href="route('service.accessible-passengers')"
          class="w-full xl:rounded-r-[40px] shadow-xl p-2 lg:p-5 bg-air-purple text-xs md:text-base lg:text-2xl text-[#FFFFFF] text-center"
        >
          接受行動不便旅客搭機人數一覽表
        </Link>
      </div>
      <div class="flex flex-col gap-1 lg:gap-3 p-5 lg:p-10 white rounded-[20px]">
        <p class="text-sm lg:text-2xl text-end">
          註：詳細資料請參考各家航空公司網站或電話洽詢。
        </p>
        <img src="/image/accessible-passengers-form.png" alt="接受行動不便旅客搭機人數一覽表" />
        <ol class="list-decimal px-3 lg:px-5">
          <li class="text-sm lg:text-2xl">
            參照IATA（國際航空運輸協會）規定，對「行動不便旅客」定義為「身體或精神狀況具有障礙或需要醫療協助之乘客
            且於登機、下機、飛行中或地面作業時需要航空公司個別關照或協助者」。其中包含：單腳或雙腳打上石膏之旅客（LEGL
            、LEGR、LEGB）、需要特殊醫療與隔離之旅客（MEDA）、需要使用擔架之旅客（STCR）、需要使用輪椅之旅客（WCHR、
            WCHS、WCHC）、視障之旅客（BLND）、聽障之旅客（DEAF）。
          </li>
          <li class="text-sm lg:text-2xl">
            實務上，行動不便旅客多屬WCHC旅客（Wheel Chair for Cabin Seat完全不能行動之旅客；需要輪椅之輔助始能抵達機邊
            ，並需要藉由他人之協助上下樓梯及至座位上者），故本表乃針對WCHC旅客規定。
          </li>
          <li class="text-sm lg:text-2xl">
            航空公司綜合考量機型、座位數、空服員人數、逃生門數等實際情況不同而有不同之人數限制及處理方式。
          </li>
        </ol>
      </div>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}
</style>
