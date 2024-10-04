<script setup>
import { reactive, ref } from 'vue';

const props = defineProps({
  guideName: {
    type: String,
    default: 'default',
  },
});
const guide = reactive({
  card1: {
    img: '/image/guide-1.png',
    title: '出發',
    smtitle: '旅行前請確認以下資訊',
    content1: '搭機報到手續',
    content2: '搭機出示證明文件',
    content3: '出境流程',
    to1: 'guide.check-in',
    to2: 'guide.check-in',
    to3: '/',
  },
  card2: {
    img: '/image/guide-2.png',
    title: '抵達',
    smtitle: '台中機場提供最好的服務品質',
    content1: '入境流程',
    content2: '來往兩岸港澳地區須知',
    content3: '如何離開機場',
    to1: '/',
    to2: '/',
    to3: 'traffic.bus-information',
  },
  card3: {
    img: '/image/guide-3.png',
    title: '搭機安全須知',
    smtitle: '遵守行李規範，安全登機',
    content1: '搭機安全須知',
    content2: '注意事項',
    content3: '來往兩岸港澳地區須知',
    to1: 'guide.security-notice',
    to2: 'guide.relevant-regulation',
    to3: '/',
  },
  undefined: {
    img: '',
    title: '',
    smtitle: '',
    content1: '',
    content2: '',
    content3: '',
    to1: '/',
    to2: '/',
    to3: '/',
  },
});
const currentGuide = guide[props.guideName] || guide.default;
const hover1 = ref(false);
const hover2 = ref(false);
const hover3 = ref(false);
</script>

<template>
  <div
    class="relative flex items-center justify-end w-[330px] flex-shrink-0 lg:w-[450px] lg:ml-[40px]"
  >
    <div
      class="absolute left-[30px] lg:left-0 lg:top-[14%] w-[240px] h-[227px] lg:w-[300px] lg:h-[285px] bg-white rounded-tl-[50px] shadow-[0px_0px_6px_rgba(0,0,0,0.25)]"
    >
      <div
        class="flex flex-col m md:justify-between w-full h-full p-[30px] lg:pt-8 lg:pl-10 lg:pb-12"
      >
        <div>
          <div class="text-xl lg:text-2xl font-bold">
            {{ currentGuide?.title || '標題' }}
          </div>
          <div class="text-sm lg:text-lg text-[#5d5d5d]">
            {{ currentGuide?.smtitle || '副標題' }}
          </div>
        </div>
        <div class="mt-3 text-sm lg:text-lg">
          <Link :href="currentGuide?.to1 ? route(currentGuide.to1) : '/'">
            <div
              class="flex items-center text-[#471C87] hover:text-[#F59801]"
              @mouseover="hover1 = true"
              @mouseleave="hover1 = false"
              @focus="hover1 = true"
              @blur="hover1 = false"
              tabindex="0"
            >
              {{ currentGuide?.content1 || '內容1' }}
              <img
                class="flex ml-2 w-[20px] h-[20px]"
                :src="
                  hover1
                    ? '/icon/hover-park-right.png'
                    : '/icon/guide-park-right.png'
                "
                alt=""
              />
            </div>
          </Link>
          <Link :href="currentGuide?.to2 ? route(currentGuide.to2) : '/'">
            <div
              class="flex items-center mt-3 text-[#471C87] hover:text-[#F59801]"
              @mouseover="hover2 = true"
              @mouseleave="hover2 = false"
              @focus="hover2 = true"
              @blur="hover2 = false"
              tabindex="0"
            >
              {{ currentGuide?.content2 || '內容2' }}
              <img
                class="flex ml-2 w-[20px] h-[20px]"
                :src="
                  hover2
                    ? '/icon/hover-park-right.png'
                    : '/icon/guide-park-right.png'
                "
                alt=""
              />
            </div>
          </Link>
          <Link :href="currentGuide?.to3 ? route(currentGuide.to3) : '/'">
            <div
              class="flex items-center mt-3 text-[#471C87] hover:text-[#F59801]"
              @mouseover="hover3 = true"
              @mouseleave="hover3 = false"
              @focus="hover3 = true"
              @blur="hover3 = false"
              tabindex="0"
            >
              {{ currentGuide?.content3 || '內容3' }}
              <img
                class="flex ml-2 w-[20px] h-[20px]"
                :src="
                  hover3
                    ? '/icon/hover-park-right.png'
                    : '/icon/guide-park-right.png'
                "
                alt=""
              />
            </div>
          </Link>
        </div>
      </div>
    </div>
    <img
      class="w-[226px] h-[320px] lg:w-[350px] lg:h-[400px]"
      :src="currentGuide?.img || '沒有圖'"
      alt=""
    />
  </div>
</template>

<style></style>
