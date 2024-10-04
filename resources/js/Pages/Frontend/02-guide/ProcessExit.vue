<script setup>
import { ref } from 'vue';
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import { Link } from '@inertiajs/vue3';

const currentTab = ref('exit'); // 'exit'是出境, 'entry'是入境

function switchTab(tab) {
  currentTab.value = tab;
}
</script>

<template>
  <div
    class="banner-guide w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      國際線搭機流程
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] m-auto py-10">
      <!-- 麵包屑 -->
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機指南</Link>
        <span> > </span>
        <span v-if="currentTab === 'exit'">國際線搭機流程(出境)</span>
        <span v-else>國際線搭機流程(入境)</span>
      </div>

      <!-- 出境/入境按鈕 -->
      <div class="flex my-5 lg:my-10">
        <button type="button" @click="switchTab('exit')" :class="['flex-1 rounded-l-[40px] shadow-xl p-2 lg:p-5 text-xl lg:text-3xl text-center',
                                                                  currentTab === 'exit' ? 'bg-air-purple text-white' : 'white text-air-purple']">
          出境
        </button>
        <button type="button" @click="switchTab('entry')" :class="['flex-1 rounded-r-[40px] shadow-xl p-2 lg:p-5 text-xl lg:text-3xl text-center',
                                                                   currentTab === 'entry' ? 'bg-air-purple text-white' : 'white text-air-purple']">
          入境
        </button>
      </div>

      <!-- 出境流程 -->
      <div v-if="currentTab === 'exit'">
        <mainTitle>
          <template #title>國際線出境流程</template>
        </mainTitle>
        <div class="flex flex-col lg:flex-row white rounded-[20px] my-5 lg:my-10">
          <div class="order-2 lg:order-1 flex-1 m-auto">
            <img src="/image/process-exit.jpg" alt="搭機流程說明圖(出境)" />
          </div>
          <div class="order-1 lg:order-2 flex-1 flex flex-col justify-center p-10 gap-10">
            <div>
              <p class="text-xl lg:text-2xl text-air-purple">注意事項 :</p>
              <p class="text-sm lg:text-xl">
                請注意旅客應於航班起飛前2-3個小時，向所搭乘之航空公司報到櫃台辦理完成報到手續；
                最遲完成報到時間請以旅客所搭乘航空公司規定為準。
              </p>
            </div>
            <div>
              <p class="text-xl lg:text-2xl text-air-purple">出境必備證件 :</p>
              <p class="text-sm lg:text-xl">
                1.本國籍旅客:護照、登機證。<br />
                2.外籍旅客：護照、登機證。
              </p>
            </div>
            <div>
              <Link :href="route('#')" class="text-base lg:text-2xl text-air-purple hover:text-[#f59801]">國際線出境虛擬導覽></Link>
            </div>
          </div>
        </div>
      </div>

      <!-- 入境流程 -->
      <div v-if="currentTab === 'entry'">
        <mainTitle>
          <template #title>國際線入境流程</template>
        </mainTitle>
        <div class="w-full flex flex-col lg:flex-row white rounded-[20px] my-5 lg:my-10">
          <div class="order-2 lg:order-1 flex-1 m-auto">
            <img src="/image/process-entry.jpg" alt="搭機流程說明圖(入境)" />
          </div>
          <div class="order-1 lg:order-2 flex-1 flex flex-col justify-center p-10 gap-10">
            <div>
              <p class="text-xl lg:text-2xl text-air-purple">出境必備證件 :</p>
              <p class="text-sm lg:text-xl">
                1.護照。 2.入境旅客申報單。3.外籍旅客：簽證、機票、入境登記表。
              </p>
            </div>
            <div>
              <Link :href="route('#')" class="text-base lg:text-2xl text-air-purple hover:text-[#f59801]">國際線出境虛擬導覽></Link>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<style>
.banner-guide {
  background-image: url(/public/image/banner-guide.png);
}
</style>
