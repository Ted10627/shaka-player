<script setup>
import { ref } from 'vue';
const props = defineProps({
  trafficName: {
    // 指定props資料是字串
    type: String,
    default: 'default',
  },
});
const traffic = ref({
  bus: {
    icon: '/icon/bxs-bus.png',
    name: '公車路線',
    to: 'traffic.bus-information',
    hover: '/icon/hover-bus.png',
  },
  taxi: {
    icon: '/icon/taxi.png',
    name: '計程車服務',
    to: 'traffic.taxi-service',
    hover: '/icon/hover-taxi.png',
  },
  car: {
    icon: '/icon/car.png',
    name: '租車服務',
    to: 'traffic.car-rental-service',
    hover: '/icon/hover-car.png',
  },
  pin: {
    icon: '/icon/map-pin-fill.png',
    name: '機場位置',
    to: 'traffic.google-map',
    hover: '/icon/hover-map-pin.png',
  },
  map: {
    icon: '/icon/map-bold.png',
    name: '觀光指南',
    to: 'traffic.sightseeing-guide',
    hover: '/icon/hover-map-bold.png',
  },
  default: {
    icon: '',
    name: '',
    to: '',
    hover: '',
  },
});
const hover = ref(false);
</script>

<template>
  <Link
    @mouseover="hover = true"
    @mouseleave="hover = false"
    @mousedown="hover = true"
    @mouseup="hover = false"
    @focus="hover = true"
    @blur="hover = false"
    :href="route(traffic[props.trafficName].to)"
  >
    <div
      class="flex w-[280px] h-[44px] md:h-[50px] rounded-full justify-between items-center bg-white hover:bg-[#f59801] hover:text-white"
    >
      <slot name="left-icon">
        <img
          class="flex w-[20px] h-[20px] md:w-[30px] md:h-[30px] ml-[28px]"
          :src="
            hover
              ? traffic[props.trafficName].hover
              : traffic[props.trafficName].icon
          "
          alt="left icon"
        />
      </slot>
      <slot name="text">
        <div class="flex text-sm font-medium md:text-xl lg:text-2xl">
          {{ traffic[props.trafficName].name }}
        </div>
      </slot>
      <slot name="right-icon">
        <img
          class="flex w-[20px] h-[20px] md:w-[30px] md:h-[30px] mr-[28px]"
          :src="
            hover
              ? '/icon/hover-right.png'
              : '/icon/black-park-right.png'
          "
          alt="right icon"
        />
      </slot>
    </div>
  </Link>
</template>

<style scoped></style>
