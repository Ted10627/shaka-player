<script>
import mainTitle from '@/Components/HomeView/MainTitle.vue';

export default {
  components: {
    mainTitle,
  },
  data() {
    return {
      keyword: '',
      currentPage: 1,
      itemsPerPage: 10,
      itemDate: '', // 用來存儲用戶選擇的日期
      items: [
        {
          id: 216,
          date: '2024-05-17',
          location: '國際大廳',
          content: '黑色登山帽',
          method: '轉交航警所',
        },
        {
          id: 215,
          date: '2024-07-14',
          location: '國際航廈出境大廳門口',
          content: '吉伊卡哇烏薩奇吊飾',
          method: '轉交航警所',
        },
        {
          id: 214,
          date: '2024-07-11',
          location: '國際航廈出境大廳座椅',
          content: '背包(內有防曬乳、防曬噴罐、濕紙巾)',
          method: '轉交航警所',
        },
        {
          id: 213,
          date: '2024-05-17',
          location: '國際大廳椅子上',
          content: '灰色鴨舌帽',
          method: '轉交航警所',
        },
        {
          id: 212,
          date: '2024-05-04',
          location: '國內大廳6號門內沙發區',
          content: '行動電源*1、充電頭*1(sony)、充電線*1(type c)',
          method: '轉交航警所',
        },
        {
          id: 211,
          date: '2024-03-03',
          location: '國際航廈出境大廳座椅',
          content: '傑尼龜玩偶',
          method: '轉交航警所',
        },
        {
          id: 210,
          date: '2024-02-18',
          location: '臺中空中站1號門車道圍牆',
          content: '峰香菸一條',
          method: '轉交航警所',
        },
        {
          id: 209,
          date: '2024-02-13',
          location: '國內大廳座椅區',
          content: '紙袋',
          method: '轉交航警所',
        },
        {
          id: 208,
          date: '2023-12-30',
          location: '國內航廈六號門座位',
          content: '灰色男用側背包',
          method: '轉交航警所',
        },
        {
          id: 207,
          date: '2023-12-30',
          location: '國際航廈公車站月台',
          content: '起司蛋糕',
          method: '轉交航警所',
        },
        {
          id: 206,
          date: '2023-11-17',
          location: '國際航廈公車站月台',
          content: '保溫瓶(PERFECT 玫瑰金色 網狀袋)',
          method: '轉交航警所',
        },
        {
          id: 205,
          date: '2023-11-04',
          location: '國內大廳座椅區',
          content: 'iPad',
          method: '轉交航警所',
        },
        {
          id: 204,
          date: '2023-10-25',
          location: '國內航廈真堂上',
          content: 'SAMSUNG手機',
          method: '轉交航警所',
        },
        {
          id: 203,
          date: '2023-10-20',
          location: '臺中航空站國內大廳座椅上',
          content: 'SAMSUNG黑色手機',
          method: '轉交航警所',
        },
        {
          id: 202,
          date: '2023-10-17',
          location: '臺中航空站國內大廳座椅上',
          content: '快樂出遊的心情',
          method: '轉交航警所',
        },
        {
          id: 201,
          date: '2023-10-10',
          location: '臺中航空站國內大廳座椅上',
          content: 'iPad',
          method: '轉交航警所',
        },
      ],
    };
  },

  computed: {
    filteredItems() {
      // 先過濾符合條件的資料
      const filtered = this.items.filter((item) => {
        const itemDate = new Date(item.date).toISOString().split('T')[0];
        const dateFilter = !this.itemDate || itemDate >= this.itemDate;
        const keywordFilter = !this.keyword ||
          item.content.includes(this.keyword) ||
          item.location.includes(this.keyword);
        return dateFilter && keywordFilter;
      });
      // 確保分頁的計算邏輯是正確的
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = this.currentPage * this.itemsPerPage;
      // 切割過濾後的資料
      return filtered.slice(startIndex, endIndex);
    },
    totalPages() {
      const filtered = this.items.filter((item) => {
        const itemDate = new Date(item.date).toISOString().split('T')[0];
        const dateFilter = !this.itemDate || itemDate >= this.itemDate;
        const keywordFilter = !this.keyword ||
          item.content.includes(this.keyword) ||
          item.location.includes(this.keyword);
        return dateFilter && keywordFilter;
      });
      return Math.ceil(filtered.length / this.itemsPerPage);
    },
  },

  methods: {
    nextPage() {
      // 防止超過總頁數
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    prevPage() {
      // 防止低於第 1 頁
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
  },
};
</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      遺失物查詢
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>:href="route('')"
        <span> > </span>
        <Link :href="route('')" class="hover:underline">機場服務</Link>:href="route('')"
        <span> > </span>
        <Link :href="route('')" class="hover:underline">遺失物查詢</Link>:href="route('')"
      </div>
      <mainTitle>
        <template #title>遺失物查詢</template>
      </mainTitle>
      <div class="w-full">
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <!-- 搜尋區 -->
          <div class="flex flex-col gap-0 sm:gap-2 text-sm lg:text-xl">
            <div class="flex flex-col sm:flex-row gap-1 sm:gap-4 items-center">
              <p class=" text-sm lg:text-xl lg:w-[100px] w-[90px] flex justify-center">關鍵字搜尋</p>
              <div class="w-full flex-1 flex flex-col mb-0">
                <input type="text" v-model="keyword" placeholder="請輸入關鍵字" class="bg-[#E8E8E8] p-2 border" />
              </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-1 sm:gap-4 items-center mt-2">
              <p class="text-sm lg:text-xl lg:w-[100px] w-[90px] flex justify-center">遺失日期</p>
              <div class="w-full flex flex-col flex-1 md:mb-0">
                <input type="date" v-model="itemDate" class="bg-[#E8E8E8] p-2 border" />
              </div>
              <div class="w-full flex-1 flex">
                <button type="button" @click="search"
                  class="w-full bg-air-purple text-white px-4 py-2 hover:text-[#471C87] hover:bg-white hover:shadow-lg">
                  查詢
                </button>
              </div>
            </div>
          </div>
          <!-- 表格區 -->
          <div class="mt-6 overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-200">
              <thead>
                <tr class="bg-air-purple">
                  <th class="border border-gray-200 px-4 py-4 text-white text-sm lg:text-xl">
                    編號
                  </th>
                  <th class="border border-gray-200 px-4 py-4 text-white text-sm lg:text-xl">
                    拾獲日期
                  </th>
                  <th class="border border-gray-200 px-4 py-4 text-white text-sm lg:text-xl">
                    拾獲地點
                  </th>
                  <th class="border border-gray-200 px-4 py-4 text-white text-sm lg:text-xl">
                    拾獲內容
                  </th>
                  <th class="border border-gray-200 px-4 py-4 text-white text-sm lg:text-xl">
                    處理方式
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in filteredItems" :key="item.id" class="text-center">
                  <td class="form-shadow border-b-2 px-4 py-4 text-sm lg:text-xl">
                    {{ item.id }}
                  </td>
                  <td class="form-shadow border-b-2 px-4 py-4 text-sm lg:text-xl">
                    {{ item.date }}
                  </td>
                  <td class="form-shadow border-b-2 px-4 py-4 text-sm lg:text-xl">
                    {{ item.location }}
                  </td>
                  <td class="form-shadow border-b-2 px-4 py-4 text-sm lg:text-xl">
                    {{ item.content }}
                  </td>
                  <td class="form-shadow border-b-2 px-4 py-4 text-sm lg:text-xl">
                    {{ item.method }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- 分頁區域 -->
        <div class="mt-4 flex gap-4 justify-between items-center text-sm lg:text-xl">
          <button type="button" @click="prevPage" :disabled="currentPage === 1"
            class="flex-1 py-2 rounded-md bg-white text-[#471C87] hover:bg-[#471C87] hover:text-[#FFFFFF]">
            上一頁
          </button>
          <button type="button" @click="nextPage" :disabled="currentPage === totalPages"
            class="flex-1 py-2 rounded-md bg-white text-[#471C87] hover:bg-[#471C87] hover:text-[#FFFFFF]">
            下一頁
          </button>
        </div>
      </div>
      <!-- 聯絡資訊 -->
      <div class="bg-white text-sm lg:text-2xl p-5 lg:p-10 white rounded-[20px]">
        <p>航空警察局高雄分局臺中分駐站聯絡電話：(04)-26155001</p>
        <p>
          航空警察局高雄分局臺中分駐站遺失物查詢網址：
          <Link :href="route('#')" class="text-[#471C87]">https://op2.npa.gov.tw/NM107-512Client/OP010A10_Q1.jsp</Link>
        </p>
        <p>財政部關務署臺中關聯絡電話：(04)-26155172</p>
        <p>
          財政部關務署臺中關網址為：
          <Link :href="route('#')" class="text-[#471C87]">https://taichung.customs.gov.tw</Link>
        </p>
      </div>
      <div class="w-full text-sm lg:text-2xl">文章最後更新日期：2024-06-14</div>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}

.form-shadow {
  box-shadow: 0 4px 2px -2px rgb(0 0 0 / 0.05);
}
</style>
