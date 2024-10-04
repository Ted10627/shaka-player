<script setup>
import { ref, onMounted, nextTick } from 'vue';

const imgWidth = ref('');
const headlineRef = ref(null);

const setImgWidth = async () => {
  await nextTick(); // 等待 DOM 完全渲染

  if (headlineRef.value) {
    const contentWidth = headlineRef.value.getBoundingClientRect().width;
    imgWidth.value = `${contentWidth}px`;
  }
};

onMounted(() => {
  setImgWidth();
});
</script>

<template>
  <div>
    <div class="text-xl font-bold md:text-3xl lg:text-4xl mb-1 md:mb-2">
      <span ref="headlineRef">
        <slot name="title">默認標題</slot>
      </span>
    </div>
    <div class="flex">
      <img
        alt="底線"
        :style="{ width: imgWidth }"
        class="h-[4px] md:h-[10px]"
        src="/transportation-border-title.png"
      />
      <img
        class="mx-[4px] md:mx-[10px] h-[4px] md:h-[10px]"
        src="/transportation-border-title2.png"
        alt=""
      />
      <img
        class="h-[4px] md:h-[10px]"
        src="/transportation-border-title3.png"
        alt=""
      />
    </div>
  </div>
</template>

<style scoped></style>
