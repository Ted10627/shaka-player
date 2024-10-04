<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { useDropdownStore } from '@/Store/store';
import navDownList from '@/Components/AppVue/DownList.vue';

const dropdownStore = useDropdownStore();

const toggleList = (dropdownName) => {
  if (dropdownStore.currentOpenDropdown === dropdownName) {
    dropdownStore.closeDropdown();
    isHovered.value = false;
  } else {
    dropdownStore.toggleDropdown(dropdownName);
    isHovered.value = true;
  }
};

const handleClickOutside = (event) => {
  if (
    (!event.target.closest('.dropdown-container') && !event.target.closest('.dropdown-list')) ||
    event.target.closest('a')
  ) {
    dropdownStore.closeDropdown(); // 點擊空白處時關閉當前打開的下拉清單
    isHovered.value = false;
  }
};
const handleMouseLeave = () => {
  isHovered.value = false;
};

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});

const props = defineProps({
  buttonName: {
    type: String,
    default: 'default',
  },
});

const isHovered = ref(false); // 追蹤滑鼠是否懸停在按鈕

const button = ref({
  one: {
    name: '航班資訊',
    icon: '/icon/nav-airplane-takeoff.png',
    hoverIcon: '/icon/airplane-hover.png',
    down: 'down1',
  },
  two: {
    name: '搭機指南',
    icon: '/icon/nav-luggage.png',
    hoverIcon: '/icon/luggage-hover.png',
    down: 'down2',
  },
  three: {
    name: '機場服務',
    icon: '/icon/nav-fluent_building-people-24-filled.png',
    hoverIcon: '/icon/building-hover.png',
    down: 'down3',
  },
  four: {
    name: '機場交通',
    icon: '/icon/nav_bus.png',
    hoverIcon: '/icon/bus-hover.png',
    down: 'down4',
  },
  five: {
    name: '行政專區',
    icon: '/icon/nav_document-solid.png',
    hoverIcon: '/icon/document-hover.png',
    down: 'down5',
  },
  default: {
    name: '',
    icon: '',
    hoverIcon: '',
    down: '',
  },
});
</script>

<template>
  <li class="z-20 nav-button">
    <button
      class="relative flex items-center justify-center dropdown-container w-full md:w-auto"
      type="button"
      @click="toggleList(button[props.buttonName].down)"
      @mouseover="isHovered = true"
      @mouseleave="handleMouseLeave"
      @focus="hoverArrival = true"
      @blur="hoverArrival = false"
      tabindex="0"
      :class="{
        'active-button':
          isHovered || dropdownStore.currentOpenDropdown === button[props.buttonName].down
      }"
    >
      <img
        :src="
          isHovered || dropdownStore.currentOpenDropdown === button[props.buttonName].down
            ? button[props.buttonName].hoverIcon
            : button[props.buttonName].icon
        "
        class="button-item max-w-[28px] mr-3"
        alt="icon"
      />
      <div class="text-2xl button-item">
        {{ button[props.buttonName].name }}
      </div>
    </button>
    <div class="absolute w-full top-0 left-0 mt-[165px]">
      <div v-if="dropdownStore.currentOpenDropdown === 'down1'">
        <navDownList down-name="down1" class="dropdown-list"></navDownList>
      </div>
      <div v-if="dropdownStore.currentOpenDropdown === 'down2'">
        <navDownList down-name="down2" class="dropdown-list"></navDownList>
      </div>
      <div v-if="dropdownStore.currentOpenDropdown === 'down3'">
        <navDownList down-name="down3" class="dropdown-list"></navDownList>
      </div>
      <div v-if="dropdownStore.currentOpenDropdown === 'down4'">
        <navDownList down-name="down4" class="dropdown-list"></navDownList>
      </div>
      <div v-if="dropdownStore.currentOpenDropdown === 'down5'">
        <navDownList down-name="down5" class="dropdown-list"></navDownList>
      </div>
    </div>
  </li>
</template>

<style>
.dropdown-container {
  position: relative;
}
.button-item {
  color: #343557;
}
.dropdown-container:hover,
.active-button {
  color: #f59801;
  border-bottom: 10px solid #f59801;
  border-style: inset;
  margin-bottom: 2px;
  box-sizing: border-box;
}
.dropdown-container:hover .button-item,
.active-button .button-item {
  margin-top: 12px;
  color: #f59801;
}
</style>
