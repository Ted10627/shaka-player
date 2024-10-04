<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { gsap } from 'gsap';
import autoPlayCarousel from '@/Components/HomeView/AutoPlayCarousel.vue';
import mainTitle from '@/Components/HomeView/MainTitle.vue';
import trafficButton from '@/Components/HomeView/TrafficButton.vue';
import busInformation from '@/Components/HomeView/BusInformation.vue';
import parkingLot from '@/Components/HomeView/ParkingLot.vue';
import guideCards from '@/Components/HomeView/GuideCards.vue';
import service from '@/Components/HomeView/ServiceOptions.vue';
import announcementCarousel from '@/Components/HomeView/AnnouncementCarousel.vue';
import announcementTicker from '@/Components/HomeView/AnnouncementTicker.vue';
import { MotionPathPlugin } from 'gsap/MotionPathPlugin';
import liveFlightSchedule from '@/Components/HomeView/LiveFlightSchedule.vue';
// import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(MotionPathPlugin);
// gsap.registerPlugin(ScrollTrigger);

const planeRef = ref(null);

onMounted(() => {
  gsap.to(planeRef.value, {
    duration: 10,
    motionPath: {
      path: [
        { x: 0, y: 0 },
        { x: -200, y: -100 },
        { x: -400, y: 0 },
        { x: -300, y: 350 },
        { x: 400, y: -50 },
        { x: 1000, y: -600 },
      ],
      type: 'quadratic',
      autoRotate: true,
    },
    repeat: -1,
    ease: 'linear',
  });
  // 設置 ScrollTrigger，動差設定

  // ScrollTrigger.create({
  //   trigger: '#flight-guide',
  //   start: 'top top',
  //   end: '+=500px',
  //   pinSpacing: false,
  //   pin: true,
  // });
});

// 天氣描述
const describeUrl =
    'https://opendata.cwa.gov.tw/api/v1/rest/datastore/F-D0047-073?Authorization=CWA-AB77557D-8FFC-412D-91D5-8D4235C1406D&limit=1&format=JSON&locationName=%E6%B2%99%E9%B9%BF%E5%8D%80&elementName=Wx';
// 取得攝氏度
const temperatureUrl =
    'https://opendata.cwa.gov.tw/api/v1/rest/datastore/F-D0047-073?Authorization=CWA-AB77557D-8FFC-412D-91D5-8D4235C1406D&limit=1&format=JSON&locationName=%E6%B2%99%E9%B9%BF%E5%8D%80&elementName=AT';
// 溫度
const temperature = ref('');
// 天氣描述
const description = ref('');
// 取得使用者時間
const userTime = ref(new Date());

const getWeather = async () => {
  // 取得天氣描述
  const describeRes = await axios.get(describeUrl);
  const weatherElements =
            describeRes.data.records.locations[0].location[0].weatherElement[0]
              .time;

  // 當前時間
  const now = new Date();

  // 選取當前時間的天氣描述
  const currentWeather = weatherElements.find((element) => {
    const startTime = new Date(element.startTime);
    const endTime = new Date(element.endTime);
    return now >= startTime && now < endTime;
  });

  // 如果找到當前時間的天氣描述，更新 description
  if (currentWeather) {
    description.value = currentWeather.elementValue[1].value;
  // console.log('取得當前時間的天氣API:', description.value);
  }
  //  else {
  //     console.log('未找到當前時間的天氣描述');
  //   }
  // } catch (error) {
  //   console.error('取得天氣錯誤:', error);

};

const fetchTemperature = async () => {
  try {
    const response = await fetch(temperatureUrl);
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.json();

    if (data.success === 'true' && data.records && data.records.locations) {
      const location = data.records.locations[0];
      const weatherElement = location.location[0].weatherElement.find(
        (element) => element.elementName === 'AT',
      );

      if (
        weatherElement &&
                weatherElement.time &&
                weatherElement.time.length > 0
      ) {
        const temperatures = weatherElement.time.map((t) =>
          parseFloat(t.elementValue[0].value),
        );
        const maxTemp = Math.max(...temperatures);
        const minTemp = Math.min(...temperatures);

        temperature.value = `${maxTemp}°C / ${minTemp}°C`;
      } else {
        temperature.value = '無法獲取溫度';
      }
    } else {
      temperature.value = '無法獲取溫度';
    }
  } catch {
    // console.error('獲取溫度數據時出錯:', error);
    temperature.value = '無法獲取溫度';
  }
};
onMounted(() => {
  getWeather();
  fetchTemperature();
  setInterval(() => {
    userTime.value = new Date();
  }, 1000);
});
// 交通資訊輪流撥放
const cards = ['card1', 'card2', 'card3'];
</script>

<template>
  <div class="flex w-full justify-center bg-white">
    <div class="flex w-full max-w-[1720px] justify-center">
      <div class="relative flex w-full justify-center">
        <autoPlayCarousel />
        <!-- 航空資訊 -->
        <div
          class="absolute w-full lg:max-w-[1080px] bottom-[32%] left-2/5 text-2xl shadow-md z-index-2 hidden lg:block"
        >
          <liveFlightSchedule></liveFlightSchedule>
        </div>
        <!-- 公告區 -->
        <announcementTicker></announcementTicker>
        <!-- 天氣卡 -->
        <div
          class="text-2xl absolute top-[22%] right-0 hidden lg:block"
        >
          <table class="w-full max-w-[500px]">
            <thead class="h-[80px]">
              <tr
                class="shadow-[-6px_5px_10px_rgba(255,255,255,0.5)] text-white bg-air-blue flex justify-center items-center rounded-time"
              >
                <th class="text-center">
                  <div
                    class="pl-[30px] flex justify-center items-center w-[250px] h-[25px]"
                  >
                    台中
                    {{
                      userTime.toLocaleTimeString(
                        'zh-TW',
                        {
                          hour: '2-digit',
                          minute: '2-digit',
                          hourCycle: 'h23',
                        }
                      )
                    }}
                    <div
                      class="flex ml-12 items-center border-r-2 h-[20px]"
                    ></div>
                  </div>
                </th>
                <th class="text-center">
                  <div
                    class="flex justify-center items-center pr-[30px]"
                  >
                    {{ temperature }}
                    <div
                      class="flex h-[80px] items-center ml-3"
                    >
                      <img
                        :src="`https://www.cwa.gov.tw/V8/assets/img/weather_icons/weathers/svg_icon/day/${description}.svg`"
                        alt="天氣圖"
                        class="w-[40px] h-[40px] m-2"
                      />
                    </div>
                  </div>
                </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- 地圖區 -->
  <div
    class="relative w-full justify-center lg:translate-y-[-100px] bg-white lg:overflow-hidden hidden lg:block"
  >
    <div class="flex justify-center">
      <img class="z-index-0" src="/image/bg-map.png" alt="背景地圖" />
    </div>
    <img
      ref="planeRef"
      class="z-10 absolute bottom-[27%] left-[48%]"
      src="/image/plane.png"
      alt="飛機"
    />
  </div>
  <!-- 地圖區手機板 -->
  <div
    class="w-full px-[8px] py-[40px] md:pt-20 md:p-[35px] block lg:hidden bg-white"
  >
    <mainTitle class="mb-[20px]">
      <template #title>本日航班搜索</template>
    </mainTitle>
    <div class="w-full">
      <liveFlightSchedule></liveFlightSchedule>
    </div>
  </div>
  <!-- 交通資訊 -->
  <div class="z-10 flex w-full justify-center items-center bg-[#f6f6f6]">
    <div
      class="w-full max-w-[1600px] p-[8px] md:p-[35px] lg:px-[100px] flex flex-col gap-10"
    >
      <mainTitle>
        <template #title>交通資訊</template>
      </mainTitle>
      <div class="w-full max-w-[1400px]">
        <div
          class="w-full flex flex-col xl:flex-row xl:h-[300px] gap-10 xl:gap-0 p-2"
        >
          <div
            class="flex flex-col h-full sm:flex-row basis-8/12 gap-10 sm:gap-0"
          >
            <div class="flex-1 sm:border-r border-black">
              <div class="flex justify-center items-start">
                <div class="flex flex-col justify-center">
                  <trafficButton
                    traffic-name="bus"
                    class="mb-5"
                  ></trafficButton>
                  <busInformation
                    traffic-name="bus1"
                  ></busInformation>
                  <busInformation
                    traffic-name="bus2"
                  ></busInformation>
                  <busInformation
                    traffic-name="bus3"
                  ></busInformation>
                  <busInformation
                    traffic-name="bus4"
                  ></busInformation>
                </div>
              </div>
            </div>
            <!-- 其他交通 -->
            <div class="flex-1">
              <div class="flex justify-center items-start">
                <div class="flex flex-col justify-center">
                  <trafficButton
                    traffic-name="taxi"
                  ></trafficButton>
                  <trafficButton
                    traffic-name="car"
                    class="mt-2 sm:mt-8"
                  ></trafficButton>
                  <trafficButton
                    traffic-name="pin"
                    class="mt-2 sm:mt-8"
                  ></trafficButton>
                  <trafficButton
                    traffic-name="map"
                    class="mt-2 sm:mt-8"
                  ></trafficButton>
                </div>
              </div>
            </div>
          </div>
          <!-- 停車場資訊 -->
          <div class="flex-1 flex justify-center mt-[20px] lg:mt-0">
            <div
              class="flex-col w-full h-full py-[20px] px-5 2xl:px-[60px] bg-light-gray rounded-[20px] text-xl md:text-2xl font-bold"
            >
              <div class="flex items-center w-full">
                <div class="flex">停車場</div>
                <div
                  class="flex h-full justify-center items-center"
                >
                  <img
                    class="w-[20px] h-[20px] md:w-[24px] md:h-[24px] ml-2"
                    src="/icon/page-right.png"
                    alt="icon"
                  />
                </div>
              </div>
              <div class="flex xl:flex-col flex-wrap">
                <parkingLot
                  traffic-name="state1"
                  class="mr-10"
                ></parkingLot>
                <parkingLot traffic-name="state2"></parkingLot>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 搭機指南 -->
  <div
    id="flight-guide"
    class="flex lg:justify-center lg:items-end w-full h-[550px] md:h-[600px] lg:h-[850px] bg-[#f6f6f6]"
  >
    <div
      class="relative flex-col lg:justify-between w-full max-w-[1600px] lg:h-[700px] p-2 lg:pr-[35px] md:p-[35px] lg:p-[100px] lg:rounded-t-[50px] bg-white"
    >
      <div
        class="hidden lg:block absolute w-full max-w-[495px] lg:h-[495px] left-[-200px] top-[-100px] bg-[#471C87] bg-opacity-10 rounded-r-[50px]"
      ></div>
      <div class="my-[20px]">
        <mainTitle>
          <template #title>搭機指南</template>
        </mainTitle>
      </div>
      <!-- 搭機指南輪播 -->
      <div class="flex justify-center lg:justify-end w-full">
        <div
          class="relative w-full lg:max-w-[1200px] justify-center items-center mr-[30px] hidden lg:block"
        >
          <announcementCarousel carousel-name="carousel1">
            <guideCards
              v-for="(card, index) in cards"
              :key="index"
              :guide-name="card"
            />
          </announcementCarousel>
          <div
            class="hidden lg:block absolute z-0 top-0 -right-1 w-[87px] h-full bg-gradient-to-r from-transparent to-white"
          ></div>
        </div>
        <!-- 搭機指南平板版輪播 -->
        <div
          class="relative w-full lg:max-w-[1200px] justify-center items-center mr-[30px] hidden md:block lg:hidden"
        >
          <announcementCarousel carousel-name="lg1">
            <guideCards
              v-for="(card, index) in cards"
              :key="index"
              :guide-name="card"
            />
          </announcementCarousel>
          <div
            class="hidden md:block lg:hidden absolute z-0 top-0 -right-1 w-[87px] h-full bg-gradient-to-r from-transparent to-white"
          ></div>
        </div>
        <!-- 搭機指南手機版輪播 -->
        <div
          class="relative w-full sm:max-w-[1200px] justify-center items-center mr-[30px] block md:hidden"
        >
          <announcementCarousel carousel-name="sm1">
            <guideCards
              v-for="(card, index) in cards"
              :key="index"
              :guide-name="card"
            />
          </announcementCarousel>
          <div
            class="block md:hidden absolute z-0 top-0 -right-1 w-[87px] h-full bg-gradient-to-r from-transparent to-white"
          ></div>
        </div>
      </div>
    </div>
  </div>
  <!-- 旅客服務專區 -->
  <div
    class="relative flex justify-center w-full lg:h-[1450px] lg:py-[150px]"
  >
    <div class="w-full max-w-[1600px] lg:h-full bg-white z-10">
      <div
        class="flex-1 w-full lg:h-[50%] z-10 p-[8px] md:p-[35px] lg:p-[100px]"
      >
        <div class="mb-[20px] lg:mb-[80px]">
          <mainTitle>
            <template #title>旅客服務專區</template>
          </mainTitle>
        </div>
        <div
          class="flex justify-between w-full text-[#4C4E93] text-sm font-bold md:text-2xl"
        >
          <div class="flex-col flex w-full mr-[20px] lg:mr-[80px]">
            <service service-name="s1"></service>
            <service service-name="s2"></service>
            <service service-name="s3"></service>
          </div>
          <div class="w-full">
            <service service-name="s4"></service>
            <service service-name="s5"></service>
            <service service-name="s6"></service>
          </div>
        </div>
      </div>
      <div class="flex-1 w-full lg:h-[50%] z-10 p-[5px] lg:p-[100px]">
        <div class="mb-[20px] lg:mb-[80px]">
          <mainTitle>
            <template #title>政府公告</template>
          </mainTitle>
        </div>
        <!-- 政府公告輪播 -->
        <div
          class="w-full max-w-[1400px] lg:h-[250px] hidden md:block pr-3"
        >
          <announcementCarousel carousel-name="carousel2">
            <div>
              <a
                href="https://www.immigration.gov.tw/5385/7244/7250/7317/%E5%85%B6%E4%BB%96/30112/"
              >
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-1.png"
                    alt="公告-1"
                    type="button"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://aoaws.anws.gov.tw/AWS/index.php">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-2.png"
                    alt="公告-2"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://asf.aphia.gov.tw/">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-3.png"
                    alt="公告-3"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://www.humanrights.moj.gov.tw/">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-4.png"
                    alt="公告-4"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://5000.taiwan.net.tw/index.html">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-5.png"
                    alt="公告-5"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://www.taiwan.net.tw/">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-6.png"
                    alt="公告-6"
                  />
                </picture>
              </a>
            </div>
          </announcementCarousel>
        </div>
        <!-- 手機版政府公告輪播 -->
        <div
          class="w-full max-w-[1400px] lg:h-[250px] block md:hidden pr-3"
        >
          <announcementCarousel carousel-name="lg2">
            <div>
              <a
                href="https://www.immigration.gov.tw/5385/7244/7250/7317/%E5%85%B6%E4%BB%96/30112/"
              >
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-1.png"
                    alt="公告-1"
                    type="button"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://aoaws.anws.gov.tw/AWS/index.php">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-2.png"
                    alt="公告-2"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://asf.aphia.gov.tw/">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-3.png"
                    alt="公告-3"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://www.humanrights.moj.gov.tw/">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-4.png"
                    alt="公告-4"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://5000.taiwan.net.tw/index.html">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-5.png"
                    alt="公告-5"
                  />
                </picture>
              </a>
            </div>
            <div>
              <a href="https://www.taiwan.net.tw/">
                <picture>
                  <img
                    class="min-w-[288px] h-[164px] md:min-w-[450px] md:h-[250px] mb-5 mr-4 border border-gray-300 rounded-[20px] shadow-md"
                    src="/image/government-notice-6.png"
                    alt="公告-6"
                  />
                </picture>
              </a>
            </div>
          </announcementCarousel>
        </div>
      </div>
    </div>

    <!-- 背景圖 -->
    <img
      class="absolute w-full h-full top-0 left-0 object-cover object-center z-0"
      src="/image/service-area-background.png"
      alt="旅客服務底圖"
    />
  </div>
</template>

<style>
th,
td {
    text-align: left;
}

td {
    padding: 8px;
}

.rounded-tl-my {
    border-top-left-radius: 50px;
}

.rounded-time {
    border-top-left-radius: 80px;
    border-bottom-left-radius: 15px;
}

.rounded-tr-my {
    border-top-right-radius: 50px;
}

.rounded-banner {
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
}

.announcement-title {
    background-color: #f59801;
    color: white;
    border-radius: 80px;
    padding: 0;
    margin: 0;
}

.announcement {
    background-color: white;
    color: black;
    border-top-left-radius: 100px;
    border-bottom-left-radius: 100px;
    border-top-right-radius: 160px;
    border-bottom-right-radius: 30px;
    position: relative;
}

.marquee-content {
    display: flex;
    width: calc(100% * 3.5);
    animation: marquee 25s linear infinite;
    height: 100%;
    font-weight: bold;
}

.transportation-guide {
    width: 100%;
    height: 490px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f6f6f6;
}

.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.7);
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 10;
}
</style>
