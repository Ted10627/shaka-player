import { ref } from 'vue';
import { defineStore } from 'pinia';

export const airData = defineStore('airData', () => {
  // 航空公司
  const allAirname = ref([
    { id: 'B7', name: '立榮航空' },
    { id: 'AE', name: '華信航空' },
    { id: 'CX', name: '國泰航空' },
    { id: 'IT', name: '台灣虎航' },
    { id: 'JX', name: '星宇航空' },
    { id: 'MU', name: '中國東方' },
    { id: 'UO', name: '香港快運' },
    { id: 'VJ', name: '越捷航空' },
    { id: 'TW', name: '德威航空' },
    { id: 'QH', name: '越竹航空' },
    { id: 'HX', name: '香港航空' },
  ]);

  // 國內航線
  const allDomestic = ref([
    { id: 'MZG', name: '澎湖' },
    { id: 'KNH', name: '金門' },
    { id: 'LZN', name: '南竿' },
    { id: 'HUN', name: '花蓮' },
  ]);

  // 國際航線
  const allForeign = ref([
    { id: 'PVG', name: '上海浦東' },
    { id: 'PQC', name: '富國島' },
    { id: 'BKK', name: '曼谷' },
    { id: 'HKG', name: '香港' },
    { id: 'DAD', name: '峴港' },
    { id: 'SHA', name: '上海虹橋' },
    { id: 'ICN', name: '仁川' },
    { id: 'PUS', name: '釜山' },
    { id: 'NKG', name: '南京' },
    { id: 'HAN', name: '河內' },
  ]);
  const allMessages = ref([
    '臺中機場配合漢光演習113年7月25日部分航班受影響',
    '臺中機場配合颱風警報113年7月26日航班受影響',
    '臺中機場配合颱風警報113年7月27日部分航班受影響',
  ]);

  return {
    allAirname,
    allDomestic,
    allForeign,
    allMessages,
  };
});
