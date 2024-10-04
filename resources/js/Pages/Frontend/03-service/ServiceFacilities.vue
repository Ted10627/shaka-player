<script setup>
import { ref, computed } from 'vue';
import mainTitle from '@/Components/HomeView/MainTitle.vue';

const facilities = ref([
  {
    id: 1,
    name: '旅客諮詢櫃檯',
    category: '旅客諮詢',
    time: '06:00~23:00',
    phone: '',
    location: '航廈一樓',
    image: '/image/facility/information.jpg',
    link: 'service.facility-information',
  },
  {
    id: 2,
    name: '金融服務櫃檯01',
    category: '金融服務',
    time: '06:00~23:00',
    phone: '服務電話 04-26155127',
    location: '航廈二樓',
    image: '/image/facility/bank.jpg',
    link: 'service.financial-service',
  },
  {
    id: 4,
    name: '金融服務櫃檯02',
    category: '金融服務',
    time: '09:00~17:00',
    phone: '服務電話 04-26155127',
    location: '入境行李提領區',
    image: '/image/facility/ATM.luggage.jpg',
    link: 'service.financial-service',
  },
  {
    id: 3,
    name: '金融服務櫃檯03',
    category: '金融服務',
    time: '09:00~17:00',
    phone: '服務電話 04-26155127',
    location: '國內線大廳',
    image: '/image/facility/bank.jpg',
    link: 'service.financial-service',
  },
  {
    id: 5,
    name: '臺灣銀行ATM',
    category: '金融服務',
    time: '06:00~23:00',
    phone: '服務電話 04-26155127',
    location: '國際線一樓',
    image: '/image/facility/ATM.luggage.jpg',
    link: 'service.financial-service',
  },
  {
    id: 6,
    name: '臺灣銀行ATM',
    category: '金融服務',
    time: '06:00~23:00',
    phone: '服務電話 04-26155127',
    location: '國內線一樓大廳',
    image: '/image/facility/ATM.1F.jpg',
    link: 'service.financial-service',
  },
  {
    id: 7,
    name: '保險服務櫃台',
    category: '保險服務',
    time: '09:00~17:00',
    phone: '服務電話 04-26155052',
    location: '國際線一樓',
    image: '/image/facility/Insurance.jpg',
    link: 'service.insurance-service',
  },
  {
    id: 8,
    name: '電信網路',
    category: '電信網路',
    time: '10:00~22:00',
    phone: '服務電話 04-26155100',
    location: '國際線一樓',
    image: '/image/facility/telecom.jpg',
    link: 'service.telecommunication-network',
  },
  {
    id: 9,
    name: '租車服務',
    category: '租車服務',
    time: '08:30~19:00',
    phone: '服務電話 04-26155233',
    location: '國際線一樓',
    image: '/image/facility/car.rental.jpg',
    link: 'service.cars-rental-service',
  },
  {
    id: 10,
    name: '行李打包服務',
    category: '行李打包服務',
    time: '08:30~19:00',
    phone: '服務電話 04-26155233',
    location: '國際線一樓',
    image: '/image/facility/luggage.packing.jpg',
    link: 'service.baggage-packing',
  },
  {
    id: 11,
    name: '投幣式儲物櫃',
    category: '投幣式儲物櫃',
    time: '06:00~23:00',
    phone: '服務電話 04-26155233',
    location: '國際線一樓',
    image: '/image/facility/locker.jpg',
    link: 'service.storage-services',
  },
  {
    id: 12,
    name: '全家便利商店',
    category: '購物及餐廳',
    time: '06:00~19:00',
    phone: '',
    location: '國際線一樓中央處',
    image: '/image/facility/Family.jpg',
    link: 'service.food-stores',
  },
  {
    id: 13,
    name: 'hómee KITCHEN',
    category: '購物及餐廳',
    time: '09:30~20:30',
    phone: '',
    location: '國際線一樓',
    image: '/image/facility/homeeKITCHEN.jpg',
    link: 'service.food-stores',
  },
  {
    id: 14,
    name: '萊爾富便利商店',
    category: '購物及餐廳',
    time: '05:00~21:00',
    phone: '',
    location: '國內線離站安檢門',
    image: '/image/facility/hilife.png',
    link: 'service.food-stores',
  },
  {
    id: 15,
    name: '護理服務',
    category: '護理服務',
    time: '05:30~23:30',
    phone: '服務電話 04-26155199',
    location: '航廈一樓',
    image: '/image/facility/nursing.jpg',
    link: 'service.medical-service',
  },
  {
    id: 16,
    name: '旅遊服務中心',
    category: '旅遊服務中心',
    time: '09:00~18:00',
    phone: '服務電話 04-26155029',
    location: '入境大廳',
    image: '/image/facility/travel.jpg',
    link: 'service.tourist-counter',
  },
  {
    id: 17,
    name: '馬祖新村',
    category: '購物及餐廳',
    time: '10:00~19:00',
    phone: '',
    location: '國際線一樓',
    image: '/image/facility/mazu.jpg',
    link: 'service.food-stores',
  },
  {
    id: 18,
    name: '臺中機場檢疫站',
    category: '其他服務',
    time: '點入查看',
    phone: '服務電話 點入查看',
    location: '航廈一樓',
    image: '/image/facility/quarantine.jpg',
    link: 'service.#',
  },
  {
    id: 19,
    name: '財政部關務署臺中關',
    category: '其他服務',
    time: '05:30~23:00',
    phone: '服務電話 點入查看',
    location: '航廈一樓',
    image: '/image/facility/tax.jpg',
    link: 'service.#',
  },
  {
    id: 20,
    name: '充電服務',
    category: '充電服務',
    time: '06:00~23:00',
    phone: '',
    location: '航廈一樓及三樓',
    image: '/image/facility/Charge.jpg',
    link: 'service.#',
  },
  {
    id: 21,
    name: '食品藥物管理署',
    category: '其他服務',
    time: '點入查看',
    phone: '服務電話 04-23692401',
    location: '航廈入境大廳',
    image: '/image/facility/food.inspection.jpg',
    link: 'service.#',
  },
]);

const selectedCategory = ref('全部');

const filteredFacilities = computed(() => {
  if (selectedCategory.value === '全部') {
    return facilities.value;
  }
  return facilities.value.filter((facility) => facility.category === selectedCategory.value);

});
</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <div class="w-[1260px] px-5 mx-auto text-6xl text-bold text-[#ffffff]">服務設施</div>
  </div>
  <div class="w-full px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁 > 機場服務 > 1F服務設施</div>
      <mainTitle>
        <template #title>1F服務設施</template>
      </mainTitle>
      <section class="w-full flex flex-col lg:flex-row gap-[50px]">
        <div class="w-full lg:w-[260px] flex flex-row lg:flex-col gap-2 sm:gap-5 lg:gap-[50px]">
          <select
            name="floor"
            class="w-[50%] lg:w-full flex px-4 py-2 lg:px-10 lg:py-5 air-purple text-white"
          >
            <option value="floor-b1">機場 B1</option>
            <option value="floor-1f" selected>機場 1F</option>
            <option value="floor-2f">機場 2F</option>
            <option value="floor-3f">機場 3F</option>
            <option value="floor-4f">機場 4F</option>
          </select>
          <select
            v-model="selectedCategory"
            name="facility"
            class="facility-select-phone w-full flex-1 px-4 py-2 lg:px-10 lg:py-5 bg-light-gray text-black"
          >
            <option value="全部" selected>全部</option>
            <option value="旅客諮詢">旅客諮詢櫃檯</option>
            <option value="金融服務">金融服務</option>
            <option value="保險服務">保險服務</option>
            <option value="電信網路">電信網路</option>
            <option value="租車服務">租車服務</option>
            <option value="行李打包服務">行李打包服務</option>
            <option value="投幣式儲物櫃">投幣式儲物櫃</option>
            <option value="購物及餐廳">購物及餐廳</option>
            <option value="旅遊服務中心">旅遊服務中心</option>
            <option value="護理服務">護理服務</option>
            <option value="充電服務">充電服務</option>
            <option value="其他服務">其他服務</option>
          </select>
          <ul class="facility-select bg-light-gray">
            <li
              v-for="(category, index) in [
                '全部',
                '旅客諮詢',
                '金融服務',
                '保險服務',
                '電信網路',
                '租車服務',
                '行李打包服務',
                '投幣式儲物櫃',
                '購物及餐廳',
                '護理服務',
                '旅遊服務中心',
                '充電服務',
                '其他服務'
              ]"
              :key="index"
              @click="selectedCategory = category"
              @keydown.enter="selectedCategory = category"
              class="text-black font-medium hover:bg-white"
              :class="{ active: selectedCategory === category }"
            >
              {{ category }}
            </li>
          </ul>
        </div>
        <!-- 設施卡片 -->
        <div class="card-height grow flex-row grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
          <Link
            v-for="facility in filteredFacilities"
            :key="facility.id"
            :href="route(facility.link)"
          >
            <div class="grow h-fit white rounded-[20px] p-5 cursor-pointer">
              <div
                class="h-[200px] w-full bg-cover bg-top"
                :style="{ backgroundImage: `url(${facility.image})` }"
              ></div>
              <div class="h-[160px] pt-5 flex flex-col content-between">
                <div class="text-black font-medium">{{ facility.name }}</div>
                <div class="text-xl font-normal">服務時間 {{ facility.time }}</div>
                <div class="mt-auto flex justify-self-end">
                  <div class="text-xl font-normal">位置</div>
                  <div class="text-xl font-normal text-air-purple pl-5 flex">
                    <img
                      class="w-6 h-5 my-auto pr-1"
                      src="/public/icon/faciliry-card-icon.png"
                      alt=""
                    />
                    {{ facility.location }}
                  </div>
                </div>
              </div>
            </div>
          </Link>
        </div>
      </section>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/public/image/banner-service.png);
}
option {
  background-color: #ffffff;
  color: black;
}
.facility-select li {
  padding: 20px 40px;
  cursor: pointer;
}
/* .facility-select li:hover {
  color: #471c87;
  background-color: #ffffff;
} */
.facility-select-phone {
  display: none;
}
.card-height {
  height: fit-content;
}
@media (max-width: 1065px) {
  .facility-select-phone {
    display: block;
  }
  .facility-select {
    display: none;
  }
}
</style>
