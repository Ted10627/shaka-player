<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import { airData } from '@/Store/AirDate.js';

const getAirData = airData();
const props = defineProps({
  categoryName: {
    type: String,
    default: 'default',
  },
});
// 航空公司
const airname = ref(getAirData.allAirname);
// 國內航線
const domestic = ref(getAirData.allDomestic);
// 國際航線
const foreign = ref(getAirData.allForeign);

const AirAPI =
  'https://tdx.transportdata.tw/api/basic/v2/Air/FIDS/Airport/RMQ?%24top=30&%24format=JSON';
// 所有航班資料陣列
const flight = ref([]);

// 取得 API 資料
const getAPI = async () => {
  // try {
  // 抓取API資料給resFlights(航班資訊)
  const cachedData = localStorage.getItem('apiData');
  // 資料日期
  const cachedDate = localStorage.getItem('apiDate');
  // 取得當日日期
  const todayDate = new Date().toISOString().split('T')[0];
  let resFlights = ref([]);
  // 利用localStorage給資料到cachedData，並檢查cachedData有無資料，無資料就抓給他
  if (cachedData && cachedDate === todayDate) {
    resFlights.value = JSON.parse(cachedData);
  } else {
    const response = await axios.get(AirAPI);
    resFlights.value = response.data;
    localStorage.setItem('apiData', JSON.stringify(resFlights.value));
    localStorage.setItem('apiDate', todayDate);
    // console.log('API 暫存資料:', resFlights.value);
  }
  // 確保資料存在
  if (!Array.isArray(resFlights.value) || resFlights.value.length === 0) {
    throw new Error('API 資料格式錯誤或無資料');
  }

  // 使用 flatMap 處理 FIDSDeparture 和 FIDSArrival
  const departures = resFlights.value.flatMap((item) => item.FIDSDeparture || []);
  const arrivals = resFlights.value.flatMap((item) => item.FIDSArrival || []);

  // 出入境放入陣列flight(所有資料)
  flight.value = { departures, arrivals };
  // console.log('所有航班資料:', flight.value);
  // console.log('所有出境航班資料:', flight.value.departures);
  // console.log('所有入境航班資料:', flight.value.arrivals);
  // } catch (error) {
  //   console.error('獲取資料錯誤:', error);
  // }
};

// 用來放按鈕過濾後資料的陣列
const filterFlights = ref([]);
// 按鈕功能類別/類型
const category = ref(props.categoryName);
// console.log('類別選擇回傳:', category.value);
const nowType = ref('');
// 顯示類型
const displayType = ref(['Arrival', 'internationalArrival', 'crossStraitArrival']);

// 起飛與抵達
const setType = (set) => {
  nowType.value = set;
  setDisplayType();
};

// 按鈕回傳分類設定
const setDisplayType = () => {
  // 是否為國際
  if (category.value === 'international') {
    // 是否為抵達
    if (nowType.value === 'Arrival') {
      displayType.value = ['Arrival'];
      filterFlights.value = TimeFilter(
        flight.value.arrivals.filter(
          (flight) =>
            flight.ArrivalAirportID === 'RMQ' &&
            foreign.value.some((place) => place.id === flight.DepartureAirportID) &&
            (!searchQuery.value || flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    } else if (nowType.value === 'Departure') {
      displayType.value = ['Departure'];
      filterFlights.value = TimeFilter(
        flight.value.departures.filter(
          (flight) =>
            flight.DepartureAirportID === 'RMQ' &&
            foreign.value.some((place) => place.id === flight.ArrivalAirportID) &&
            (!searchQuery.value || flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    }
  } else if (category.value === 'domestic') {
    if (nowType.value === 'Arrival') {
      displayType.value = ['Arrival'];
      filterFlights.value = TimeFilter(
        flight.value.arrivals.filter(
          (flight) =>
            flight.ArrivalAirportID === 'RMQ' &&
            domestic.value.some((place) => place.id === flight.DepartureAirportID) &&
            (!searchQuery.value || flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    } else if (nowType.value === 'Departure') {
      displayType.value = ['Departure'];
      filterFlights.value = TimeFilter(
        flight.value.departures.filter(
          (flight) =>
            flight.DepartureAirportID === 'RMQ' &&
            domestic.value.some((place) => place.id === flight.ArrivalAirportID) &&
            (!searchQuery.value || flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    }
  }
};

// 時間過濾航班
const TimeFilter = (flights) => {
  const NowTime = new Date();
  return flights.filter((flightItem) => {
    const FlyTime = new Date(flightItem.ScheduleDepartureTime || flightItem.ScheduleArrivalTime);
    return FlyTime > NowTime;
  });
};

// 根據 AirlineID 獲取航空公司名稱
const getname = (AirlineID) => {
  const airline = airname.value.find((a) => a.id === AirlineID);
  return airline ? airline.name : '未知航空公司';
};

// 根據 ArrivalAirportID 或 DepartureAirportID 獲取地點名稱
const getPlaceName = (airportID) => {
  const place = [...foreign.value, ...domestic.value].find((a) => a.id === airportID);
  return place ? place.name : '未知地點';
};

// 這是時間格式設定
const formatTime = (time) => {
  return time ? time.substring(11, 16) : '---';
};

// 搜尋
const searchQuery = ref('');
watch(
  searchQuery,
  () => {
    setDisplayType();
  },
  { immediate: true },
);

const searchInput = ref(null);
// 按下搜尋按鈕
const searchFlights = () => {
  searchQuery.value = searchInput.value.value.trim();

  if (searchQuery.value === '') {
    // 如果搜尋框內容為空，重置列表顯示
    resetToDefaultDisplay();
  } else {
    setType(nowType.value);
    setDisplayType();
  }
};

// 用來重置顯示的函數
const resetToDefaultDisplay = () => {
  // 這裡寫入重置顯示列表的邏輯
  setDisplayType(); // 或者根據你的需求使用其他方法
};
const dateOptions = ref([]);
// 生成未來兩天的日期
const generateDateOptions = () => {
  const today = new Date();
  dateOptions.value = Array.from({ length: 3 }, (_, i) => {
    const date = new Date(today);
    date.setDate(today.getDate() + i);
    return date.toISOString().split('T')[0]; // 格式化為 YYYY-MM-DD
  });
};
// 生成時間選項
const timeOptions = ref([]);
const generateTimeOptions = () => {
  for (let i = 0; i < 24; i++) {
    for (let j = 0; j < 60; j += 30) {
      const time = `${String(i).padStart(2, '0')}:${String(j).padStart(2, '0')}`;
      timeOptions.value.push(time);
    }
  }
};
// 生成表格日期
const dates = ref([]);
const generateDates = () => {
  const today = new Date();
  for (let i = 0; i < 7; i++) {
    const currentDate = new Date();
    currentDate.setDate(today.getDate() + i);
    const formattedDate = `${currentDate.getMonth() + 1}/${currentDate.getDate()}`;
    dates.value.push(formattedDate);
  }
};
// 隨機選擇圖標
const getRandomIcon = () => {
  const isTrue = Math.random() < 0.5; // 50% 機率
  return isTrue ? '/icon/true-airplane-solid.png' : '/icon/false-airplane-solid.png';
};
// 初始設置
onMounted(() => {
  getAPI().then(() => {
    nowType.value = 'Arrival';
    setDisplayType();
  });
  generateDateOptions(); // 生成日期選項
});
generateTimeOptions(); // 生成時間選項
generateDates();
const hoverArrival = ref(false);
const hoverDeparture = ref(false);
</script>

<template>
  <!-- 航空資訊 -->
  <div class="w-full lg:top-[70%] lg:left-2/5 md:text-2xl text-sm">
    <div v-if="category" class="z-20 flex w-full h-[77px] items-center mt-1 md:mt-2 shadow-2xl">
      <button
        type="button"
        @click="setType('Arrival')"
        :class="[nowType === 'Arrival' ? 'text-white bg-air-purple' : 'bg-white']"
        class="mr-[5px] lg:mr-0 hover:text-white hover:bg-air-purple duration-300 w-full h-full"
        @mouseover="hoverArrival = true"
        @mouseleave="hoverArrival = false"
        @focus="hoverArrival = true"
        @blur="hoverArrival = false"
      >
        <div class="flex justify-center items-center">
          <img
            alt="icon"
            class="w-[24px] h-[24px] md:w-[30px] lg:w-[44px] md:h-[30px] lg:h-[44px] mr-[15px]"
            :src="
              hoverArrival
                ? '/icon/airplane-landing.png'
                : nowType === 'Arrival'
                  ? '/icon/airplane-landing.png'
                  : '/icon/airplane-landing-ch.png'
            "
          />
          到站
        </div>
      </button>
      <button
        type="button"
        @click="setType('Departure')"
        :class="[nowType === 'Departure' ? 'text-white bg-air-purple' : 'bg-white']"
        class="hover:text-white hover:bg-air-purple duration-300 w-full h-full"
        @mouseover="hoverDeparture = true"
        @mouseleave="hoverDeparture = false"
        @focus="hoverDeparture = true"
        @blur="hoverDeparture = false"
      >
        <div class="flex justify-center items-center">
          <img
            alt="icon"
            class="w-[24px] h-[24px] md:w-[30px] lg:w-[44px] md:h-[30px] lg:h-[44px] mr-[15px]"
            :src="[
              hoverDeparture
                ? '/icon/airplane-takeoff.png'
                : nowType === 'Departure'
                  ? '/icon/airplane-takeoff.png'
                  : '/icon/airplane-takeoff-ch.png'
            ]"
          />
          離站
        </div>
      </button>
    </div>
    <!-- 搜尋功能區 -->
    <div class="flex-col mt-1 p-[30px] bg-white">
      <!-- 航班日期、航空公司設定列 -->
      <div class="flex items-center w-full h-[52px]">
        <!-- 日期設定 -->
        <div class="flex-1 items-center flex p-[10px]">
          <div class="flex w-[20%]">航班日期</div>
          <div class="flex w-[80%] items-center">
            <select v-model="selectedDate" @change="getAPI" class="w-full bg-[#E8E8E8] p-2">
              <option v-for="date in dateOptions" :key="date" :value="date">
                {{ date }}
              </option>
            </select>
            <div class="mx-[10px]">~</div>
            <select v-model="selectedDate" @change="getAPI" class="w-full bg-[#E8E8E8] p-2">
              <option v-for="date in dateOptions" :key="date" :value="date">
                {{ date }}
              </option>
            </select>
          </div>
        </div>
        <!-- 航空公司設定 -->
        <div class="flex-1 items-center flex p-[10px]">
          <div class="flex w-[20%]">航空公司</div>
          <div class="flex w-[80%] items-center">
            <select class="w-full bg-[#E8E8E8] p-2">
              <option></option>
            </select>
          </div>
        </div>
      </div>
      <!-- 起飛&目的、搜尋列 -->
      <div class="flex items-center w-full h-[52px] mt-[14px]">
        <!-- 起飛地設定Arrival -->
        <div :class="[nowType === 'Arrival' ? 'block' : 'hidden']" class="flex-1 p-[10px]">
          <div class="flex items-center">
            <div class="flex w-[20%]">起飛地</div>
            <div class="flex w-[78%] items-center">
              <select class="w-full bg-[#E8E8E8] p-2">
                <option></option>
              </select>
            </div>
          </div>
        </div>
        <!-- 目的地設定Departure -->
        <div :class="[nowType === 'Departure' ? 'block' : 'hidden']" class="flex-1 p-[10px]">
          <div class="flex items-center">
            <div class="flex w-[20%]">目的地</div>
            <div class="flex w-[78%] items-center">
              <select class="w-full bg-[#E8E8E8] p-2">
                <option></option>
              </select>
            </div>
          </div>
        </div>
        <button
          type="button"
          class="flex-1 flex h-full justify-center items-center active:bg-[#f59801] text-white bg-air-purple"
          @click="searchFlights"
        >
          <img class="w-[16px] h-[16px] mr-[5px]" src="/icon/tabler-search.png" alt="" />
          <div>搜尋</div>
        </button>
      </div>
    </div>
    <div v-if="nowType" class="mt-5">
      <table class="w-full">
        <thead class="relative h-[65px]">
          <!-- 用於解決特殊白線造成的細微間距錯誤 -->
          <div class="absolute top-0 left-0 w-full h-full">
            <table class="w-full">
              <thead class="h-[65px] bg-[#343557]">
                <tr class="text-white bg-air-blue">
                  <th class="text-center lg:w-[15%]">
                    <div class="flex justify-center items-center border-r-2">航空公司</div>
                  </th>
                  <th class="text-center lg:w-[10%]">
                    <div class="flex justify-center items-center border-r-2">航班編號</div>
                  </th>
                  <th v-if="displayType.includes('Arrival')" class="text-center lg:w-[10%]">
                    <div class="flex justify-center items-center border-r-2">起飛地</div>
                  </th>
                  <th v-if="displayType.includes('Departure')" class="text-center lg:w-[10%]">
                    <div class="flex justify-center items-center border-r-2">目的地</div>
                  </th>
                  <th class="text-center h-[50px] lg:h-[80px] lg:w-[10%]">
                    <div class="flex justify-center items-center border-r-2">起飛時間</div>
                  </th>
                  <th class="text-center h-[50px] lg:h-[80px] lg:w-[10%]">
                    <div class="flex justify-center items-center border-r-2">抵達時間</div>
                  </th>
                  <th
                    v-for="(date, index) in dates"
                    :key="index"
                    class="text-center h-[50px] lg:h-[80px]"
                  >
                    <div class="flex justify-center items-center">
                      {{ date }}
                    </div>
                  </th>
                </tr>
              </thead>
            </table>
          </div>
          <tr class="text-white bg-air-blue">
            <th class="text-center lg:w-[15%]">
              <div class="flex justify-center items-center border-r-2">航空公司</div>
            </th>
            <th class="text-center lg:w-[10%]">
              <div class="flex justify-center items-center border-r-2">航班編號</div>
            </th>
            <th v-if="displayType.includes('Arrival')" class="text-center lg:w-[10%]">
              <div class="flex justify-center items-center border-r-2">起飛地</div>
            </th>
            <th v-if="displayType.includes('Departure')" class="text-center lg:w-[10%]">
              <div class="flex justify-center items-center border-r-2">目的地</div>
            </th>
            <th class="text-center h-[50px] lg:h-[80px] lg:w-[10%]">
              <div class="flex justify-center items-center border-r-2">起飛時間</div>
            </th>
            <th class="text-center h-[50px] lg:h-[80px] lg:w-[10%]">
              <div class="flex justify-center items-center border-r-2">抵達時間</div>
            </th>
            <th
              v-for="(date, index) in dates"
              :key="index"
              class="text-center h-[50px] lg:h-[80px]"
            >
              <div class="flex justify-center items-center">
                {{ date }}
              </div>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-if="filterFlights.length === 0">
            <td colspan="12" class="text-center md:text-3xl py-4 bg-slate-200">查無資料</td>
          </tr>
          <tr
            v-for="flightItem in filterFlights.slice(0, 9)"
            :key="flightItem.FlightNumber"
            class="border shadow-md p-2"
          >
            <!-- 航空公司 -->
            <td>
              <div class="flex items-center justify-center">
                <img
                  :src="`https://www.tca.gov.tw/upload/webstyle_7_default/img/air_logo/${flightItem.AirlineID}.png`"
                  alt="logo"
                  class="w-5 h-5 hidden lg:block"
                />
                <span class="ml-2 hidden lg:block">{{ getname(flightItem.AirlineID) }}</span>
              </div>
            </td>
            <!-- 航班編號 -->
            <td>
              <div class="flex items-center justify-center">
                <span class="ml-2">{{ flightItem.AirlineID }}-{{ flightItem.FlightNumber }}</span>
              </div>
            </td>
            <!-- 抵達&起飛 -->
            <td v-if="displayType.includes('Arrival')" class="text-center from-items-1">
              {{ getPlaceName(flightItem.DepartureAirportID) }}
            </td>
            <td v-if="displayType.includes('Departure')" class="text-center from-items-1">
              {{ getPlaceName(flightItem.ArrivalAirportID) }}
            </td>
            <!-- 表定到達時間 -->
            <td v-if="displayType.includes('Arrival')" class="text-center h-[48px] lg:h-[80px]">
              {{ formatTime(flightItem.ScheduleArrivalTime) }}
            </td>
            <!-- 實際到達時間 -->
            <td v-if="displayType.includes('Arrival')" class="text-center h-[48px] lg:h-[80px]">
              {{ formatTime(flightItem.ActualArrivalTime) }}
            </td>
            <!-- 表定出發時間 -->
            <td v-if="displayType.includes('Departure')" class="text-center h-[48px] lg:h-[80px]">
              {{ formatTime(flightItem.ScheduleDepartureTime) }}
            </td>
            <!-- 表定出發時間 -->
            <td v-if="displayType.includes('Departure')" class="text-center h-[48px] lg:h-[80px]">
              {{ formatTime(flightItem.ActualDepartureTime) }}
            </td>
            <!-- 圖標顯示(展示為主) -->
            <td
              v-for="(date, index) in dates"
              :key="index"
              class="text-center h-[48px] lg:h-[80px]"
            >
              <div
                v-if="displayType.includes('Departure')"
                class="flex items-center justify-center"
              >
                <!-- 隨機顯示圖標 -->
                <img :src="getRandomIcon()" alt="airplane status icon" class="w-5 h-5" />
                <span class="ml-2">{{ formatTime(flightItem.ActualDepartureTime) }}</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style></style>
