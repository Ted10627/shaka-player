<script setup>
import mainTitle from '@/Components/HomeView/MainTitle.vue';
</script>

<template>
  <img class="max-w-full w-auto m-auto" src="/image/banner-google-map.png" alt="國際線搭機流程" />
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>機場交通>停車資訊</div>
      <mainTitle>
        <template #title>停車資訊</template>
      </mainTitle>
      <div class="flex flex-col white p-5 lg:p-10 rounded-[20px]">
        <p class="text-xl lg:text-3xl font-bold text-[#471C87]">停車場位置圖</p>
        <div class="flex flex-col gap-5 text-sm lg:text-2xl py-5">
          <p>國內航廈北側停車場入口緊鄰中航路1段。</p>
          <p>B1停車場位於臺中航空站國際航廈地下一樓，停車場入口於國際航廈最南側。</p>
        </div>
        <img src="/image/parking-lot-1.png" alt="機場交通-停車場位置圖" />
        <p class="text-xl lg:text-3xl font-bold text-[#471C87]">停車服務</p>
        <div class="flex flex-col gap-5 text-sm lg:text-2xl py-5">
          <p>
            <b>汽車：</b
            >國際航廈地下1樓停車場178個停車位(含4個無障礙停車格)、國內航廈北側停車場96格停車位(含2個無障礙停車格)，停車30分鐘內免費，費率每小時40元，國際航廈地下停車場每日最高300元，國內航廈北側停車場每日最高200元。
          </p>
          <p>電動充電樁：國際航廈地下1樓停車場設置1座快充及2座慢充。</p>
          <p>
            <b>機車：</b
            >國際航廈地下1樓停車場103個停車位(含3個無障礙停車格)、國內航廈北側停車場31格停車位(含2個無障礙停車格)，停車30分鐘內免費，費率按每日每次計收30元。
            營業時間：24小時。
          </p>
          <p>大客車(含公車)停車區：6個。</p>
          <p>1~3號月台供公共運輸公車專用，4~6號月台為提供所有大客車上下客使用且限停15分鐘。</p>
          <b>無障礙停車優惠</b>
          <p>
            停車優惠：身心障礙者自行駕駛之車輛（應具備本人之駕照、行照及身心障礙手冊【姓名皆須相符】），經審核無誤者，停車當日免費。
          </p>
          <b>陪同人員優惠措施</b>
          <p class="mb-8">
            停車優惠：停車費三十分鐘內免費。身心障礙者或必要陪同載送殘障旅客停車當日免費
            （第二天則收費）。 備註：須持身心障礙手冊。
          </p>
          <p class="text-xl lg:text-3xl font-bold text-[#471C87]">停車場實景</p>
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 snap-center mb-5 m-auto">
            <div>
              <img class="w-[550px] lg:w-auto mb-5" src="/image/parking-lot-2.png" alt="國內航廈北側停車場" />
              <p class="text-center">國內航廈北側停車場</p>
            </div>
            <div>
              <img class="w-[550px] lg:w-auto mb-5" src="/image/parking-lot-3.png" alt="B1停車場（含無障礙停車格）" />
              <p class="text-center">B1停車場（含無障礙停車格）</p>
            </div>
          </div>
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 snap-center m-auto">
            <img class="w-[550px] lg:w-auto" src="/image/parking-lot-4.png" alt="B1樓大客車（含公車）停車區-1" />
            <img class="w-[550px] lg:w-auto" src="/image/parking-lot-5.png" alt="B1樓大客車（含公車）停車區-2" />
            <img class="w-[550px] lg:w-auto" src="/image/parking-lot-6.png" alt="B1樓大客車（含公車）停車區-3" />
          </div>
          <p class="text-center lg:text-center">B1樓大客車（含公車）停車區</p>
        </div>
      </div>
      <div class="w-full text-sm lg:text-2xl">文章最後更新日期：2024-08-03</div>
    </div>
  </div>
</template>

<style></style>
