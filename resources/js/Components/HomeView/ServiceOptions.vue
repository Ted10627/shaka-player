<script setup>
import { ref, computed } from 'vue';
const props = defineProps({
  serviceName: {
    // 指定props資料是字串
    type: String,
    default: 'default',
  },
});
const service = ref({
  s1: {
    name: '電信服務',
    icon: '/icon/wifi.png',
    to: 'service.telecommunication-network',
  },
  s2: {
    name: '旅客諮詢櫃檯',
    icon: '/icon/serve-question.png',
    to: 'service.facility-information',
  },
  s3: {
    name: '無障礙服務',
    icon: '/icon/accessibility.png',
    to: 'service.accessible-service',
  },
  s4: {
    name: '金融服務',
    icon: '/icon/money-dollar.png',
    to: 'service.financial-service',
  },
  s5: {
    name: '購物及餐廳',
    icon: '/icon/fluent-food.png',
    to: 'service.food-stores',
  },
  s6: {
    name: '行李打包服務',
    icon: '/icon/serve-luggage.png',
    to: 'service.baggage-packing',
  },
  default: {
    name: '---',
    icon: '',
    to: '/',
  },
});

const now_service = computed(() => {
  return service.value[props.serviceName] || service.value.default;
});
const hover = ref(false);
</script>

<template>
  <Link
    class="hover:bg-[#E1E1E1] flex justify-between items-center w-full lg:h-[70px] border-b-[2px] border-[#4C4E93] px-[10px]"
    :href="route(now_service.to)"
    @mouseover="hover = true"
    @mouseleave="hover = false"
    @focus="hover = true"
    @blur="hover = false"
    tabindex="0"
  >
    <div class="lg:flex w-full lg:items-center">
      <div class="flex justify-center w-full lg:w-auto mt-[10px] lg:mt-0">
        <img
          class="flex w-[40px] lg:w-[30px] h-[40px] lg:h-[30px] lg:mr-4"
          :src="now_service.icon"
          alt="電信服務icon"
        />
      </div>

      <div
        class="flex justify-center lg:justify-start w-full my-[5px] lg:my-0"
      >
        {{ now_service.name }}
      </div>
    </div>
    <div>
      <img
        class="w-[30px] h-[30px] hidden lg:block"
        src="/icon/gravity-arrow-right.png"
        alt="服務icon"
      />
    </div>
  </Link>
</template>

<style></style>
