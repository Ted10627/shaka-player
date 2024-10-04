<script setup>
import { ref, onMounted } from 'vue';
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
// 按鈕回傳分類設定
const setDisplayType = (type) => {
  // if (!flight.value.departures || !flight.value.arrivals) {
  //   console.error('Flight data is not available yet.');
  //   return;
  // }

  if (type === 'internationalArrival') {
    displayType.value = ['Arrival'];
    filterFlights.value = TimeFilter(
      flight.value.arrivals.filter(
        (flight) =>
          flight.ArrivalAirportID === 'RMQ' &&
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
onMounted(() => {
  getAPI().then(() => {
    setDisplayType('internationalArrival');
  });
});

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
</script>

<template>
  <main>
    <div>
      <button
        type="button"
        @click="setDisplayType('internationalArrival')"
        class="p-3 m-2 rounded hover:bg-green-400 bg-green-200"
      >
        今日國際及兩岸航線抵達
      </button>
      <button
        type="button"
        @click="setDisplayType('internationalDeparture')"
        class="p-3 m-2 rounded hover:bg-green-400 bg-green-200"
      >
        今日國際及兩岸航線起飛
      </button>
      <button
        type="button"
        @click="setDisplayType('domesticArrival')"
        class="p-3 m-2 rounded hover:bg-green-400 bg-green-200"
      >
        今日國內航線抵達
      </button>
      <button
        type="button"
        @click="setDisplayType('domesticDeparture')"
        class="p-3 m-2 rounded hover:bg-green-400 bg-green-200"
      >
        今日國內航線起飛
      </button>
    </div>

    <div>
      <table class="w-full border-collapse">
        <thead>
          <tr>
            <th>表定時間</th>
            <th>實際時間</th>
            <th>班機編號</th>
            <th v-if="displayType.includes('Arrival')">出發地</th>
            <th v-if="displayType.includes('Departure')">目的地</th>
            <th>狀態</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="flightItem in filterFlights" :key="flightItem.FlightNumber">
            <!-- 表定到達時間 -->
            <td v-if="displayType.includes('Arrival')">
              {{ formatTime(flightItem.ScheduleArrivalTime) }}
            </td>
            <!-- 實際到達時間 -->
            <td v-if="displayType.includes('Arrival')">
              {{ formatTime(flightItem.ActualArrivalTime) }}
            </td>
            <!-- 表定出發時間 -->
            <td v-if="displayType.includes('Departure')">
              {{ formatTime(flightItem.ScheduleDepartureTime) }}
            </td>
            <!-- 實際到達時間 -->
            <td v-if="displayType.includes('Departure')">
              {{ formatTime(flightItem.ActualDepartureTime) }}
            </td>
            <td>
              <div class="flex justify-start">
                <img :src="`/${flightItem.AirlineID}.png`" alt="logo" class="w-5 h-5" />{{
                  getname(flightItem.AirlineID)
                }}
                {{ flightItem.AirlineID }}-{{ flightItem.FlightNumber }}
              </div>
            </td>
            <td v-if="displayType.includes('Arrival')">
              {{ getPlaceName(flightItem.DepartureAirportID) }}
            </td>
            <td v-if="displayType.includes('Departure')">
              {{ getPlaceName(flightItem.ArrivalAirportID) }}
            </td>
            <td v-if="displayType.includes('Arrival')">
              {{ flightItem.ArrivalRemark }}
            </td>
            <td v-if="displayType.includes('Departure')">
              {{ flightItem.DepartureRemark }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<style></style>
