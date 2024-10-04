<script setup>
import { ref, onMounted, watch, computed } from 'vue';
import axios from 'axios';
import { airData } from '@/Store/AirDate.js';

const getAirData = airData();

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
  }
  // 確保資料存在
  if (!Array.isArray(resFlights.value) || resFlights.value.length === 0) {
    throw new Error('API 資料格式錯誤或無資料');
  }

  // 使用 flatMap 處理 FIDSDeparture 和 FIDSArrival 將內容資料展開後，同時對出入境分類
  const departures = resFlights.value.flatMap(
    (item) => item.FIDSDeparture || [],
  );
  const arrivals = resFlights.value.flatMap((item) => item.FIDSArrival || []);

  // 出入境放入陣列flight(所有資料)
  flight.value = { departures, arrivals };
};

// 用來放按鈕過濾後資料的陣列
const filterFlights = ref([]);
// 按鈕功能類別/類型
const category = ref('');
const nowType = ref('');
// 顯示類型
const displayType = ref([
  'Arrival',
  'internationalArrival',
  'crossStraitArrival',
]);

// 國際與國內
const setCategory = (set) => {
  category.value = set;
  setDisplayType();
};

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
            foreign.value.some(
              (place) => place.id === flight.DepartureAirportID,
            ) &&
            (!searchQuery.value ||
              flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    } else if (nowType.value === 'Departure') {
      displayType.value = ['Departure'];
      filterFlights.value = TimeFilter(
        flight.value.departures.filter(
          (flight) =>
            flight.DepartureAirportID === 'RMQ' &&
            foreign.value.some(
              (place) => place.id === flight.ArrivalAirportID,
            ) &&
            (!searchQuery.value ||
              flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
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
            domestic.value.some(
              (place) => place.id === flight.DepartureAirportID,
            ) &&
            (!searchQuery.value ||
              flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    } else if (nowType.value === 'Departure') {
      displayType.value = ['Departure'];
      filterFlights.value = TimeFilter(
        flight.value.departures.filter(
          (flight) =>
            flight.DepartureAirportID === 'RMQ' &&
            domestic.value.some(
              (place) => place.id === flight.ArrivalAirportID,
            ) &&
            (!searchQuery.value ||
              flight.FlightNumber.includes(searchQuery.value.toUpperCase())),
        ),
      );
    }
  }
};
// 依 category 屬性改變更多航班連結
const flightLink = computed(() => {
  return category.value === 'international'
    ? 'flight.international-flights'
    : 'flight.domestic-flights';
});

// 時間過濾航班
const TimeFilter = (flights) => {
  const NowTime = new Date();
  return flights.filter((flightItem) => {
    const FlyTime = new Date(
      flightItem.ScheduleDepartureTime || flightItem.ScheduleArrivalTime,
    );
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
  const place = [...foreign.value, ...domestic.value].find(
    (a) => a.id === airportID,
  );
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

// 按下搜尋按鈕
const searchFlights = () => {
  setType(nowType.value);
  setDisplayType();
};

// 初始設置
onMounted(() => {
  getAPI().then(() => {
    category.value = 'international';
    nowType.value = 'Arrival';
    setDisplayType();
  });
});

const hoverArrival = ref(false);
const hoverDeparture = ref(false);
const hoverSearch = ref(false);
</script>

<template>
  <!-- 航空資訊 -->
  <div
    class="z-20 lg:absolute w-full lg:max-w-[1080px] lg:top-[70%] lg:left-2/5 md:text-2xl text-sm"
  >
    <div class="flex">
      <button
        type="button"
        @click="setCategory('international')"
        :class="[
          category === 'international'
            ? 'text-white bg-air-purple'
            : 'text-black bg-light-purple',
        ]"
        class="mr-[5px] lg:mr-0 hover:text-white hover:bg-air-purple transition-all duration-300 shadow-md rounded-tl-my w-full lg:w-[290px] h-[40px] sm:h-[65px] lg:h-[110px]"
      >
        國際及兩岸航線
      </button>

      <button
        type="button"
        @click="setCategory('domestic')"
        :class="[
          category === 'domestic'
            ? 'text-white bg-air-purple'
            : 'text-black bg-light-purple',
        ]"
        class="hover:text-white hover:bg-air-purple transition-all duration-300 shadow-md rounded-tr-my w-full lg:w-[290px] h-[40px] sm:h-[65px] lg:h-[110px]"
      >
        國內航線
      </button>
      <!-- 下面無功能，為了版面而占用空間 -->
      <div
        class="relative p-5 w-[500px] h-[110px] items-center hidden lg:block"
      >
        <div class="p-2 flex-1 h-[60px] w-[460px] border-width rounded"></div>
      </div>
    </div>
    <div v-if="category" class="flex items-center mt-1 md:mt-2 shadow-md">
      <button
        type="button"
        @click="setType('Arrival')"
        :class="[nowType === 'Arrival' ? 'text-white bg-air-purple' : 'bg-white']"
        class="mr-[5px] lg:mr-0 hover:text-white hover:bg-air-purple transition-all duration-300 w-full lg:w-[290px] h-[40px] sm:h-[65px] lg:h-[110px]"
        @mouseover="hoverArrival = true"
        @mouseleave="hoverArrival = false"
        @focus="hoverArrival = true"
        @blur="hoverArrival = false"
        tabindex="0"
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
          抵達
        </div>
      </button>

      <button
        type="button"
        @click="setType('Departure')"
        :class="[nowType === 'Departure' ? 'text-white bg-air-purple' : 'bg-white']"
        class="hover:text-white hover:bg-air-purple duration-300 w-full lg:w-[290px] h-[40px] sm:h-[65px] lg:h-[110px]"
        @mouseover="hoverDeparture = true"
        @mouseleave="hoverDeparture = false"
        @focus="hoverDeparture = true"
        @blur="hoverDeparture = false"
        tabindex="0"
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
                  : '/icon/airplane-takeoff-ch.png',
            ]"
          />
          起飛
        </div>
      </button>
      <div class="hidden lg:block">
        <div
          type="button"
          class="relative p-5 flex w-full h-[40px] sm:h-[65px] lg:h-[110px] items-center lg:w-[500px]"
          @mouseover="hoverSearch = true"
          @mouseleave="hoverSearch = false"
          @focus="hoverSearch = true"
          @blur="hoverSearch = false"
          tabindex="0"
          :class="hoverSearch ? 'hover:bg-white' : 'bg-[#dedede]'"
        >
          <input
            v-model="searchQuery"
            type="text"
            placeholder="搜尋航班編號"
            class="focus:outline-none p-2 flex-1 h-[60px] w-full max-w-[460px] border-black border-b-2"
            :class="hoverSearch ? 'hover:bg-white' : 'bg-[#dedede]'"
          />
          <img
            alt="icon"
            src="/icon/search.png"
            class="w-[40px] h-[40px] cursor-pointer absolute right-10"
            @click="searchFlights"
            @keydown.enter="searchFlights"
            @keydown.space.prevent="searchFlights"
          />
        </div>
      </div>
    </div>
    <!-- 手機版搜尋 -->
    <div class="flex lg:hidden mt-1 h-[44px] sm:h-[65px]">
      <div class="flex w-[70%] px-5 py-2 bg-white items-center">
        <input
          v-model="searchQuery"
          type="text"
          placeholder="搜尋航班編號"
          class="focus:outline-none w-full h-full border-[#5D5D5D] text-[#5D5D5D] border-b-2"
        />
      </div>
      <button
        type="button"
        class="flex w-[30%] justify-center items-center active:bg-[#f59801] text-white bg-air-purple"
        @click="searchFlights"
        @keydown.enter="searchFlights"
        @keydown.space.prevent="searchFlights"
      >
        <img
          class="w-[16px] h-[16px] mr-[5px]"
          src="/icon/tabler-search.png"
          alt=""
        />
        <div>搜尋</div>
      </button>
    </div>
    <div v-if="nowType" class="mt-1">
      <table class="w-full">
        <thead class="relative h-[65px]">
          <!-- 用於解決特殊白線造成的細微間距錯誤 -->
          <div class="absolute top-0 left-0 w-full h-full">
            <table class="w-full">
              <thead class="h-[65px] bg-[#343557]">
                <tr class="text-white bg-air-blue">
                  <th class="text-center h-[50px] lg:h-[80px] lg:w-[25%]">
                    <div class="flex justify-center items-center border-r-2">
                      時間
                    </div>
                  </th>
                  <th class="text-center lg:w-[25%]">
                    <div class="flex justify-center items-center border-r-2">
                      班機編號
                    </div>
                  </th>
                  <th
                    v-if="displayType.includes('Arrival')"
                    class="text-center lg:w-[25%]"
                  >
                    <div class="flex justify-center items-center border-r-2">
                      出發地
                    </div>
                  </th>
                  <th
                    v-if="displayType.includes('Departure')"
                    class="text-center lg:w-[25%]"
                  >
                    <div class="flex justify-center items-center border-r-2">
                      目的地
                    </div>
                  </th>
                  <th class="text-center lg:w-[25%]">狀態</th>
                </tr>
              </thead>
            </table>
          </div>
          <tr class="text-white bg-air-blue">
            <th class="text-center h-[50px] lg:h-[80px] lg:w-[25%]">
              <div class="flex justify-center items-center border-r-2">
                時間
              </div>
            </th>
            <th class="text-center lg:w-[25%]">
              <div class="flex justify-center items-center border-r-2">
                班機編號
              </div>
            </th>
            <th
              v-if="displayType.includes('Arrival')"
              class="text-center lg:w-[25%]"
            >
              <div class="flex justify-center items-center border-r-2">
                出發地
              </div>
            </th>
            <th
              v-if="displayType.includes('Departure')"
              class="text-center lg:w-[25%]"
            >
              <div class="flex justify-center items-center border-r-2">
                目的地
              </div>
            </th>
            <th class="text-center lg:w-[25%]">狀態</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-if="filterFlights.length === 0">
            <td colspan="5" class="text-center md:text-3xl py-4 bg-slate-200">
              查無資料
            </td>
          </tr>
          <tr
            v-for="flightItem in filterFlights.slice(0, 5)"
            :key="flightItem.FlightNumber"
            class="border shadow-md p-2"
            :class="{
              'text-red-600':
                flightItem.ArrivalRemark === '延誤' ||
                flightItem.ArrivalRemark === '取消' ||
                flightItem.DepartureRemark === '延誤' ||
                flightItem.DepartureRemark === '取消',
              'text-black': !(
                flightItem.ArrivalRemark === '延誤' ||
                flightItem.ArrivalRemark === '取消' ||
                flightItem.DepartureRemark === '延誤' ||
                flightItem.DepartureRemark === '取消'
              ),
            }"
          >
            <!-- 表定到達時間 -->
            <td
              v-if="displayType.includes('Arrival')"
              class="text-center h-[48px] lg:h-[80px]"
            >
              {{ formatTime(flightItem.ScheduleArrivalTime) }}
            </td>
            <!-- 表定出發時間 -->
            <td
              v-if="displayType.includes('Departure')"
              class="text-center h-[48px] lg:h-[80px]"
            >
              {{ formatTime(flightItem.ScheduleDepartureTime) }}
            </td>
            <td>
              <div class="flex items-center justify-center">
                <img
                  :src="`https://www.tca.gov.tw/upload/webstyle_7_default/img/air_logo/${flightItem.AirlineID}.png`"
                  alt="logo"
                  class="w-5 h-5 hidden lg:block"
                />
                <span class="ml-2 hidden lg:block">{{
                  getname(flightItem.AirlineID)
                }}</span>
                <span class="ml-2"
                >{{ flightItem.AirlineID }}-{{
                  flightItem.FlightNumber
                }}</span
                >
              </div>
            </td>
            <td
              v-if="displayType.includes('Arrival')"
              class="text-center from-items-1"
            >
              {{ getPlaceName(flightItem.DepartureAirportID) }}
            </td>
            <td
              v-if="displayType.includes('Departure')"
              class="text-center from-items-1"
            >
              {{ getPlaceName(flightItem.ArrivalAirportID) }}
            </td>
            <td
              v-if="displayType.includes('Arrival')"
              class="text-center from-items-1"
            >
              {{ flightItem.ArrivalRemark }}
            </td>
            <td
              v-if="displayType.includes('Departure')"
              class="text-center from-items-1"
            >
              {{ flightItem.DepartureRemark }}
            </td>
          </tr>
        </tbody>
      </table>
      <div
        class="flex justify-center items-center shadow-md bg-light-gray lg:bg-white lg:bg-opacity-60 h-[40px] sm:h-[60px] lg:h-[80px]"
      >
        <Link
          :href="route(flightLink)"
          class="flex items-center h-[40px] transition-all duration-100 hover:border-b-2 hover:border-black hover:mb-[-2px]"
        >顯示更多航班
          <img
            class="mt-[2px] w-[14px] h-[14px] lg:w-[30px] lg:h-[30px]"
            src="/icon/park-right.png"
            alt=""
          />
        </Link>
      </div>
    </div>
  </div>
</template>

<style></style>
