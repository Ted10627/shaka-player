<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
const isChecked = ref(false);
const router = useRouter();
onMounted(() => {
  router.beforeEach((to, from, next) => {
    isChecked.value = false; // 每次路由變化時重置 checkbox 的狀態
    next(); // 繼續導航
  });
});
</script>

<template>
  <!-- 漢堡 -->
  <label
    for="switch"
    data-collapse-toggle="navbar-dropdown"
    type="button"
    :class="[
      'inline-flex flex-col items-center w-16 md:w-[100px] h-16 md:h-[100px] p-2 justify-center text-sm lg:hidden',
      { 'bg-light-gray': isMenuOpen }
    ]"
    aria-controls="navbar-dropdown"
    :aria-expanded="isMenuOpen.toString()"
    @click="toggleMenu"
    @keydown.enter="toggleMenu"
  >
    <span class="sr-only">Open main menu</span>
    <img
      v-if="!isChecked"
      class="w-8 h-8 sm:w-10 sm:h-10"
      src="/icon/ham-icon.png"
      aria-hidden="true"
      alt="icon"
    />
    <!-- 替換選單打開時的圖標 -->
    <img v-else class="w-8 h-8 sm:w-10 sm:h-10" src="/icon/ham-open-icon.png" aria-hidden="true" alt="icon" />
    <p v-if="!isChecked" class="text-base font-medium text-custom-gray">Menu</p>
    <p v-else class="text-base font-medium text-air-orange">Menu</p>
  </label>
  <input type="checkbox" class="lg:hidden" id="switch" v-model="isChecked" />
  <!-- 選單內容 -->
  <ul class="menu z-10 text-base font-medium text-custom-gray bg-light-gray">
    <li class="relative p-3 flex justify-end">
      <input
        class="vice-nav-search w-full pl-[20px] focus:outline-none"
        placeholder="搜尋"
        type="text"
      />
      <button type="button" class="absolute vice-nav-search-button">
        <img class="vice-nav-search-icon" src="/icon/tabler-search.png" alt="icon" />
      </button>
    </li>
    <li class="flex">
      <button type="button" class="language-choose flex-1 py-5">English</button>
      <button type="button" class="language-choose flex-1 py-5">日本語</button>
      <button type="button" class="language-choose flex-1 py-5">繁體中文</button>
    </li>
    <input type="checkbox" id="flight-btn-switch" class="chevron-switch" hidden />
    <label for="flight-btn-switch" class="chevron-switch-lable">
      <li class="menu-item" tabindex="0">
        航班資訊
        <img class="plus-icon" src="/icon/clarity_plus-line.png" alt="icon" />
        <img class="delete-icon" src="/icon/iwwa_delete.png" alt="icon" />
      </li>
      <ul class="sub-dropdown-menu">
        <li class="p-3 bg-gray text-air-purple">國際及兩岸航班</li>
        <Link :href="route('flight.international-flights')"
        ><li>即時航班</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>定期航班</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('flight.airline')"
        ><li>航空公司</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <li class="p-3 bg-gray text-air-purple">國內航班</li>
        <Link :href="route('flight.domestic-flights')"
        ><li>即時航班</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>定期航班</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('flight.airline')"
        ><li>航空公司</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('flight.standby-information')"
        ><li>國內線候補資訊</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
      </ul>
    </label>
    <input type="checkbox" id="guide-btn-switch" class="chevron-switch" hidden />
    <label for="guide-btn-switch" class="chevron-switch-lable">
      <li class="menu-item" tabindex="0">
        搭機指南
        <img class="plus-icon" src="/icon/clarity_plus-line.png" alt="" />
        <img class="delete-icon" src="/icon/iwwa_delete.png" alt="" />
      </li>
      <ul class="sub-dropdown-menu">
        <Link :href="route('guide.flight-process')"
        ><li>搭機流程</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('guide.check-in')"
        ><li>報到及通關</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('guide.security-notice')"
        ><li>搭機安全須知</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('guide.concession-ticket')"
        ><li>票價優惠說明</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('guide.relevant-regulation')"
        ><li>注意事項</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('guide.tax-refund')"
        ><li>外籍旅客購物退稅須知</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>來往兩岸港澳地區須知</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>國際線出入境虛擬導覽</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
      </ul>
    </label>
    <input type="checkbox" id="serve-btn-switch" class="chevron-switch" hidden />
    <label for="serve-btn-switch" class="chevron-switch-lable">
      <li class="menu-item" tabindex="0">
        機場服務
        <img class="plus-icon" src="/icon/clarity_plus-line.png" alt="" />
        <img class="delete-icon" src="/icon/iwwa_delete.png" alt="" />
      </li>
      <ul class="sub-dropdown-menu">
        <Link :href="route('service.floor-plan')"
        ><li>機場導覽圖</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('service.facilities')"
        ><li>服務設施</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('service.accessible-transportation')"
        ><li>無障礙服務</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('service.baby-stroller')"
        ><li>嬰兒車借用</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('service.lost-property')"
        ><li>遺失物查詢</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>服務電話</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('service.passenger-complaints')"
        ><li>旅客申訴專區</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>線上申辦</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>表單下載</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
      </ul>
    </label>
    <input type="checkbox" id="tran-btn-switch" class="chevron-switch" hidden />
    <label for="tran-btn-switch" class="chevron-switch-lable">
      <li class="menu-item" tabindex="0">
        機場交通
        <img class="plus-icon" src="/icon/clarity_plus-line.png" alt="" />
        <img class="delete-icon" src="/icon/iwwa_delete.png" alt="" />
      </li>
      <ul class="sub-dropdown-menu">
        <Link :href="route('traffic.google-map')"
        ><li>機場位置</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('traffic.parking-lot')"
        ><li>停車資訊</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('traffic.taxi-service')"
        ><li>計程車服務</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('traffic.car-rental-service')"
        ><li>租車服務</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('traffic.bus-information')"
        ><li>公車資訊</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('traffic.sightseeing-guide')"
        ><li>觀光指南</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
      </ul>
    </label>
    <input type="checkbox" id="tran-btn-switch" class="chevron-switch" hidden />
    <label for="tran-btn-switch" class="chevron-switch-lable">
      <li class="menu-item" tabindex="0">
        行政專區
        <img class="plus-icon" src="/icon/clarity_plus-line.png" alt="" />
        <img class="delete-icon" src="/icon/iwwa_delete.png" alt="" />
      </li>
      <ul class="sub-dropdown-menu">
        <Link :href="route('')"
        ><li>機場簡介</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>機場景點與公共藝術</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>國際貨運資訊</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>開放資料專區</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>政府資訊公開</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>相關作業規定</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>飛安宣導專區</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>遙控無人機飛行指南</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>噪音補償</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>人事園地</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>SMS安全管理系統</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
        <Link :href="route('')"
        ><li>場內駕駛許可證題庫與教材</li>
          <img src="/icon/icon-park_right_light.png" alt="" />
        </Link>
      </ul>
    </label>
    <li class="menu-btn flex h-20">
      <Link :href="route('homepage.announcement-information1')">
        <img src="/icon/mdi_announcement.png" alt="icon" />公告資訊</Link
      >
      <Link :href="route('homepage.faq')"> <img src="/icon/ri_question-fill.png" alt="icon" />常見問題</Link>
    </li>
  </ul>
</template>

<style scoped>
label {
  cursor: pointer;
}
input {
  display: none;
}
input:checked ~ .menu {
  max-height: 100vh;
  overflow: scroll;
  position: absolute;
  top: 100px;
  right: 0;
}
.menu {
  width: 100vw;
  max-width: 500px;
  max-height: 0;
  overflow: hidden;
}
.menu-item {
  display: flex;
  justify-content: space-between;
  padding: 24px 12px;
  border-bottom: 1px solid #909090;
  color: #343557;
}
.menu a {
  width: 100%;
  display: block;
  padding: 12px 12px;
  font-size: 0.875rem;
  font-weight: 400;
  color: #343557;
  display: flex;
  text-align: center;
  justify-content: space-between;
  background-color: #ffffff;
}
.menu a:hover {
  background-color: #efefef;
}
.menu img {
  width: 20px;
  height: 20px;
  object-fit: cover;
}
.menu-btn a {
  height: 100%;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  background-color: #efefef;
}
.menu-btn img {
  width: 40px;
  height: 40px;
  object-fit: cover;
}
.chevron-switch + label .sub-dropdown-menu {
  display: none;
}

.chevron-switch:checked + label .sub-dropdown-menu {
  display: block;
}
.chevron-switch:checked + label li .plus-icon {
  display: none;
}
.delete-icon {
  display: none;
}
.chevron-switch:checked + label li .delete-icon {
  display: block;
}

.vice-nav-search {
  display: flex;
  align-items: center;
  width: 200px;
  height: 38px;
  border-radius: 40px;
  background-color: #dedede;
  font-size: 18px;
}
.vice-nav-search-icon {
  width: 20px;
  height: 20px;
  background-color: #343557;
}
.vice-nav-search-button {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 33px;
  height: 33px;
  background-color: #343557;
  border-radius: 40px;
}
.language-choose {
  background-color: #343557;
  color: #ffffff;
}
.language-choose:hover {
  color: #343557;
  background-color: #e1e1e1;
}
@media (max-width: 1024px) {
  .vice-nav-search {
    width: 100%;
  }
}
@media (max-width: 768px) {
  input:checked ~ .menu {
    position: absolute;
    top: 4rem;
  }
}
</style>
