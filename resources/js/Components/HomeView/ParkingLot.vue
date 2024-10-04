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
  state1: {
    name: '國內航廈北側(室外)',
    color: 'bg-warning-green',
    out: '空曠',
  },
  state2: {
    name: '國際航廈B1',
    color: 'bg-warning-red',
    out: '擁擠',
  },
  default: {
    name: '',
    color: '',
    out: '',
  },
});
const hover = ref(false);
</script>

<template>
  <div class="w-[250px] mt-4">
    <div class="flex items-center w-full mb-2">
      <img
        class="flex w-[30px] h-[30px] ml-2"
        src="/icon/parking-fill.png"
        alt="icon"
      />{{ traffic[props.trafficName].name }}
    </div>
    <div class="flex justify-end items-center">
      <div
        class="flex justify-center items-center w-[120px] h-[38px] text-2xl text-white rounded-[4px] mr-3"
        :class="[traffic[props.trafficName].color]"
      >
        {{ traffic[props.trafficName].out }}
      </div>
      <div
        class="relative flex border-b-2 border-[#5d5d5d]"
        @mouseover="hover = true"
        @mouseleave="hover = false"
        @focus="hover = true"
        @blur="hover = false"
        tabindex="0"
        :class="hover ? 'border-[#e1e1e1]' : 'border-[#5d5d5d]'"
      >
        <div
          class="absolute left-0 bottom-0 w-full h-[40%] bg-[#FDD900]"
          :class="hover ? 'block' : 'hidden'"
        ></div>
        <a
          class="z-20 flex justify-center items-center text-sm md:text-base lg:text-lg text-[#5d5d5d]"
          href=""
          :class="hover ? ' text-black' : 'text-[#5d5d5d]'"
        >查看位置
          <img
            class="w-[16px] h-[16px] md:w-[20px] md:h-[20px] ml-[5px]"
            src="/icon/parking-right.png"
            alt=""
          />
        </a>
      </div>
    </div>
  </div>
</template>

<style></style>
