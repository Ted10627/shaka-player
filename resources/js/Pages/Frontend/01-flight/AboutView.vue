<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const AirAPI =
  'https://tdx.transportdata.tw/api/basic/v2/Air/FIDS/Airport/RMQ?%24top=30&%24format=JSON';

// 所有航班資料陣列
const flight = ref([]);
const displayType = ref(['Arrival', 'internationalArrival', 'crossStraitArrival']);

// 取得 API 資料
const getAPI = async () => {
  // try {
  // 抓取API資料給resFlights(航班資訊)
  const cachedData = localStorage.getItem('apiData');
  let resFlights = ref([]);
  // 利用localStorage給資料到cachedData，並檢查cachedData有無資料，無資料就抓給他
  if (cachedData) {
    resFlights.value = JSON.parse(cachedData);
  } else {
    const response = await axios.get(AirAPI);
    resFlights.value = response.data;
    localStorage.setItem('apiData', JSON.stringify(resFlights.value));
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
// 時間過濾航班
const TimeFilter = (flights) => {
  const NowTime = new Date();
  return flights.filter((flightItem) => {
    const FlyTime = new Date(flightItem.ScheduleDepartureTime || flightItem.ScheduleArrivalTime);
    return FlyTime > NowTime;
  });
};

// 用來放按鈕過濾後資料的陣列
const filterFlights = ref([]);
// 按鈕回傳類型設定
const setDisplayType = (type) => {
  if (type === 'internationalArrival') {
    displayType.value = ['Arrival'];
    filterFlights.value = TimeFilter(
      flight.value.arrivals.filter(
        // flight(航班資料)
        (flight) =>
          // 到達台中機場
          flight.ArrivalAirportID === 'RMQ' &&
          // 用foreign(國際航班)中的ID去篩選flight中的ArrivalAirportID(目的是排除國內線)
          foreign.value.some((place) => place.id === flight.DepartureAirportID),
      ),
    ).slice(0, 6);
  } else if (type === 'internationalDeparture') {
    displayType.value = ['Departure'];
    filterFlights.value = TimeFilter(
      flight.value.departures.filter(
        (flight) =>
          flight.DepartureAirportID === 'RMQ' &&
          foreign.value.some((place) => place.id === flight.ArrivalAirportID),
      ),
    ).slice(0, 6);
  } else if (type === 'domesticArrival') {
    displayType.value = ['Arrival'];
    filterFlights.value = TimeFilter(
      flight.value.arrivals.filter(
        (flight) =>
          flight.ArrivalAirportID === 'RMQ' &&
          domestic.value.some((place) => place.id === flight.DepartureAirportID),
      ),
    ).slice(0, 6);
  } else if (type === 'domesticDeparture') {
    displayType.value = ['Departure'];
    filterFlights.value = TimeFilter(
      flight.value.departures.filter(
        (flight) =>
          flight.DepartureAirportID === 'RMQ' &&
          domestic.value.some((place) => place.id === flight.ArrivalAirportID),
      ),
    ).slice(0, 6);
  }
};
// 组件挂载时获取数据
onMounted(() => {
  getAPI().then(() => {
    setDisplayType('internationalArrival');
  });
});

// 航空公司數據
const airname = ref([
  { id: 'B7', name: '立榮航空' },
  { id: 'AE', name: '華信航空' },
  { id: 'CX', name: '國泰航空' },
  { id: 'IT', name: '台灣虎航' },
  { id: 'JX', name: '星宇航空' },
  { id: 'MU', name: '中國東方' },
  { id: 'UO', name: '香港快運' },
  { id: 'VJ', name: '越捷航空' },
  { id: 'TW', name: '德威航空' },
  { id: 'QH', name: '越竹航空' },
  { id: 'HX', name: '香港航空' },
]);

// 國內航線
const domestic = ref([
  { id: 'MZG', name: '澎湖' },
  { id: 'KNH', name: '金門' },
  { id: 'LZN', name: '南竿' },
  { id: 'HUN', name: '花蓮' },
]);

// 國際航線
const foreign = ref([
  { id: 'PVG', name: '上海' },
  { id: 'PQC', name: '富國島' },
  { id: 'BKK', name: '曼谷' },
  { id: 'KNH', name: '金門島' },
  { id: 'HKG', name: '香港' },
  { id: 'DAD', name: '峴港' },
  { id: 'SHA', name: '上海' },
  { id: 'ICN', name: '仁川' },
  { id: 'PUS', name: '釜山' },
  { id: 'NKG', name: '南京' },
  { id: 'HAN', name: '河內' },
]);

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
  return time ? time.substring(11, 16) : '時間錯誤';
};
</script>

<template>
  <main>
    <div class="flex mb-4">
      <!-- 篩選標籤 -->
      <button
        type="button"
        @click="setDisplayType('internationalArrival')"
        class="flex-1 p-3 m-1 rounded bg-gray-200 hover:bg-gray-400"
      >
        國際及兩岸航班
      </button>
      <button
        type="button"
        @click="setDisplayType('domesticArrival')"
        class="flex-1 p-3 m-1 rounded bg-gray-200 hover:bg-gray-400"
      >
        國內航班
      </button>
    </div>
    <div class="flex mb-4">
      <!-- 抵達和離站 -->
      <button
        type="button"
        @click="setDisplayType('Arrival')"
        class="flex-1 p-3 m-1 rounded bg-gray-200 hover:bg-gray-400"
      >
        到達
      </button>
      <button
        type="button"
        @click="setDisplayType('Departure')"
        class="flex-1 p-3 m-1 rounded bg-gray-200 hover:bg-gray-400"
      >
        起飛
      </button>
    </div>
    <div class="flex mb-4">
      <input
        v-model="searchQuery"
        type="text"
        placeholder="搜尋航班編號"
        class="flex-1 p-2 border rounded"
      />
      <button type="button" @click="handleSearch" class="p-3 m-1 rounded bg-gray-200 hover:bg-gray-400">
        搜尋
      </button>
    </div>
    <div>
      <!-- 航班表格 -->
      <table class="w-full border-collapse">
        <thead>
          <tr>
            <th>時間</th>
            <th>航班編號</th>
            <th>起飛地</th>
            <th>狀態</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="flightItem in filterFlights" :key="flightItem.FlightNumber">
            <td>
              {{ formatTime(flightItem.ScheduleDepartureTime || flightItem.ScheduleArrivalTime) }}
            </td>
            <td>{{ getname(flightItem.AirlineID) }} {{ flightItem.FlightNumber }}</td>
            <td>
              {{ getPlaceName(flightItem.DepartureAirportID || flightItem.ArrivalAirportID) }}
            </td>
            <td>{{ flightItem.Status || '預計' }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<style></style>
