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
  bus1: {
    number: '500',
    name: '⮕ 台中車站',
    time: '1',
  },
  bus2: {
    number: '162',
    name: '⮕ 靜宜大學',
    time: '5',
  },
  bus3: {
    number: '123',
    name: '⮕ 慈濟醫院',
    time: '15',
  },
  bus4: {
    number: '302',
    name: '⮕ 台中車站',
    time: '24',
  },
  default: {
    icon: '',
    name: '',
    click: '',
  },
});
</script>

<template>
  <div
    class="flex items-center w-[280px] h-[44px] border-b border-gray-300 mt-[10px]"
  >
    <div
      class="flex justify-center items-center w-[80px] h-[24px] border border-black bg-white rounded-full text-sm md:text-lg"
    >
      {{ traffic[props.trafficName].number }}
    </div>
    <div class="flex-1 flex justify-start ml-3">
      <div
        class="flex justify-center items-center h-full text-sm md:text-lg"
      >
        {{ traffic[props.trafficName].name }}
      </div>
    </div>
    <div class="flex-3">
      <div
        class="flex justify-center items-center h-full text-sm md:text-lg"
      ></div>
    </div>
  </div>
</template>

<style></style>
