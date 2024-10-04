<script setup>
import { ref, onMounted, nextTick, computed } from 'vue';
import { gsap } from 'gsap';

// 公告內容
const messages = ref([
  '臺中機場配合颱風警報113年7月26日航班受影響',
  '臺中機場配合颱風警報113年7月27日部分航班受影響',
]);

const currentIndex = ref(0); // 記數器，用於追踪當前顯示的公告索引
const marqueeContent = ref(null);

// 計算當前顯示的公告
const currentMessage = computed(() => messages.value[currentIndex.value]);

onMounted(async () => {
  await nextTick(); // 確保 DOM 渲染完成

  const tickerElement = marqueeContent.value;

  if (tickerElement) { // 檢查元素是否存在
    // 計算顯示區域的寬度
    const containerWidth = tickerElement.parentElement.offsetWidth;

    const animateMessage = () => {
      const messageWidth = tickerElement.scrollWidth; // 使用 scrollWidth 來獲取內容實際寬度

      const tl = gsap.timeline({
        onComplete: () => {
          currentIndex.value =
            (currentIndex.value + 1) % messages.value.length;
          animateMessage(); // 遞歸調用以處理下一則公告
        },
      });

      tl.set(tickerElement, { x: containerWidth }); // 初始位置在顯示區域之外

      tl.to(tickerElement, {
        x: 0, // 從右側移入到顯示區域
        duration: 3, // 設置移入持續時間
        ease: 'none',
      })
        .to(
          {},
          { duration: 3 }, // 停頓3秒
        )
        .to(tickerElement, {
          x: -messageWidth, // 完整退出顯示區域
          duration: 3, // 設置移動持續時間
          ease: 'none',
        });
    };

    // 開始動畫，從第一則公告開始
    animateMessage();
  } else {
    // console.error('Marquee content element not found');
  }
});
</script>

<template>
  <div
    class="text-sm w-full max-w-[860px] llg:max-w-[1080px] md:text-2xl absolute bottom-[-10px] md:bottom-[-30px] left-2/5 lg:top-[5%]"
  >
    <div
      class="relative flex h-[40px] md:h-[70px] lg:h-[80px] announcement shadow-xl border-[#f59801] border-[5px] lg:border-0"
    >
      <div
        class="absolute top-[-5px] left-[-3px] lg:top-0 lg:left-0 z-10 flex justify-center items-center w-full max-w-[120px] md:max-w-[180px] lg:max-w-[220px] h-[40px] md:h-[70px] lg:h-[80px] announcement-title"
      >
        <img alt="公告icon"
          src="/icon/announcement.png"
          class="w-[20px] h-[20px] md:w-[32px] md:h-[32px] lg:w-[44px] lg:h-[44px]"
        />
        公告資訊
      </div>
      <div
        class="flex justify-center items-center w-full max-w-[120px] md:max-w-[160px] lg:max-w-[220px] lg:max-w/[220px] announcement-title"
      >
        塞空間用
      </div>

      <div
        class="flex ml-[20px] mr-[15px] lg:ml-[30px] lg:mr-[50px] relative overflow-hidden w-full"
      >
        <div ref="marqueeContent" class="marquee-content">
          <div class="flex items-center">
            {{ currentMessage }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.marquee-content {
    display: flex;
    white-space: nowrap;
}
</style>
