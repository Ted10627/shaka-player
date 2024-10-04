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
        首頁 > 機場服務 > 旅客申訴 > 作業規定
      </div>

      <div class="flex flex-wrap w-full sm:flex-nowrap">
        <Link
          :href="route('service.passenger-complaints')"
          class="w-full sm:rounded-l-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-[#471C87] text-center hover:bg-[#471C87] hover:text-[#FFFFFF]"
        >
          申請流程
        </Link>
        <Link
          :href="route('service.complaint-regulations')"
          class="w-full shadow-xl p-2 lg:p-5 bg-air-purple text-xs md:text-base lg:text-2xl text-[#FFFFFF] text-center"
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
        <template #title>作業規定</template>
      </mainTitle>
      <div class="flex flex-col gap-1 lg:gap-3 p-5 lg:p-10 white rounded-[20px]">
        <p class="text-sm lg:text-2xl mt-5 mb-[4rem]">
          一、臺中航空站（以下簡稱本站）為有效處理人民陳情案件，特訂定本作業規定。
          <br>二、本作業規定所稱人民陳情案件，係指人民對於行政興革之建議、行政法令之查詢、行政違失之舉發或行政權益之維護，以書面或言詞向本站提出之具體陳情。
          <br>三、本站處理人民陳情案件，應切實遵照「行政程序法」及「行政院暨所屬各機關處理人民陳情案件要點」規定，本合法、合理、迅速、確實辦結原則審慎處理。
          <br>四、 人民經不同管道陳情之案件，應依下列方式分辦：
          <br>（一） 人民以書面方式送達之陳情書（包括電子郵件及傳真；主任信箱另依其規定辦理），總收文以陳情類別登入公文資訊系 統後，分由各承辦人員處理。
          <br>（二） 人民以電話陳情者，本站接聽人應儘速將電話轉接承辦人或作成紀錄，承辦人員應將陳情事項之處理情形陳核後結案； 陳情事項非屬本站主管業務者，應委婉告知陳情人，並告知確實主管機關電話或其他聯繫方式。
          <br>（三） 民眾親至本站陳情者，另依「本站陳情請願疏處小組作業程序」辦理。
          <br>五、 人民陳情案件有下列情形之一者，得不予處理：
          <br>（一） 無具體內容或未具真實姓名或住址者。
          <br>（二） 同一事由，經予適當處理，並已明確答覆後，而仍一再陳情者。
          <br>（三） 經查證所留姓名、住址、聯絡電話或電子郵件位址屬偽冒、匿名虛報或不實者。
          <br>（四） 非陳情事項之主管機關，接獲陳情人以同一事由已分向各主管機關陳情者。
          <br>六、遇有非屬收受單位權責者，則逕移該管單位處理；遇涉及二以上單位時，收受單位主動協調有關單位處理。
          <br>七、本站處理人民陳情案件應視業務性質分別訂定處理期限，各種處理期限不得超過七天；其未能在規定期限內辦結者，應依分層負責簽請核准延長，並將延長理由以書面告知陳情人。
          <br>八、各單位處理人民陳情案件，應以「案」為單元建立檔案，並於年度結束後將該年度處理陳情案件數量、涉及問題性質、類別及處理結果等，加以檢討分析，以供未來航站改進參採。
          <br>九、本作業規定簽奉主任核定後實施，修訂時亦同。
        </p>
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
