<script setup>
import { ref, computed, watch } from 'vue';
// import mainTitle from '@/Components/HomeView/MainTitle.vue';

const faqData = ref([
  {
    question: 'Q1 開車接送親友，機場有何便利措施？',
    answer: '進入本站停車場抽票取卡後，30分鐘免費。',
    updateDate: '2022-03-31',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q2 身心障礙者停車是否有優惠？',
    answer: '持身心障礙手冊，身心障礙者或必要陪同載送殘障旅客當日免費（第二天則則收費）。',
    updateDate: '2024-05-09',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q3 機車停放處？',
    answer: '機車停放處位於機場的西側停車場。',
    updateDate: '2024-05-09',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q4 計程車服務？ 服務不佳申訴管道?',
    answer:
      '巡迴計程車候車位置：國際航廈地下室<br>排班計程車服務不佳申訴方式：<br>臺中市交通局(電話：04-22289111轉60317)<br>航空警察局臺中分駐所（電話：04-26155001）',
    updateDate: '2024-05-09',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q5 請問要去哪裡搭乘大眾運輸交通工具?',
    answer: '國際航廈地下室。',
    updateDate: '2024-05-09',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q6 如何由臺中機場到台中火車站?',
    answer:
      '至國際航廈地下室搭乘302、500公車。即時公車動態資訊參考網頁:https://citybus.taichung.gov.tw/ebus/driving-map',
    updateDate: '2024-05-09',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q7 如何由臺中機場到高鐵台中站?',
    answer:
      '至國際航廈地下室搭乘156、302、151、500公車或捷運綠線。即時公車動態資訊參考網頁:https://citybus.taichung.gov.tw/ebus/driving-map',
    updateDate: '2024-05-09',
    open: false,
    category: '交通問題',
  },
  {
    question: 'Q1 旅客攜帶檢疫物未申報之裁處是由何單位為之？裁罰金額為多少？',
    answer: '旅客攜帶檢疫物未申報之行為，是由動植物防疫檢疫署進行裁處，金額為新台幣一千至一百萬元。',
    updateDate: '2024-05-28',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q2 旅客於入境室受檢疫犬偵測到攜有應施動植物檢疫物品，是否即受處罰？',
    answer:
      '攜帶應申報物品之時機終止於海關綠線檯，如旅客攜有應申報之動植物產品，卻逕擇綠線檯通關，全程亦未有任何申報意思表示，而遭查獲者，方受裁處罰鍰且無法攜出，必須放棄進行銷燬。',
    updateDate: '2024-05-28',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q3 攜帶茶葉的出入境，是否有檢疫規定的管制？',
    answer:
      '茶葉非屬應施檢疫品目，旅客攜帶茶葉的出入境，檢疫上並無管制規定；因其製造過程，已經發酵或半發酵後再行烘培，沒有檢疫上的顧慮，只是攜帶上仍應注意關稅或限量等問題。',
    updateDate: '2015-10-14',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q4 各航空公司國內飛離島航班，常因拒絕檢疫證明文件不全之犬貓登機而與旅客發生困擾，請問相關規定是否有可能放寬？',
    answer:
      '過去赴離島檢疫相關證明文件不全之犬貓，確曾嚴格禁止登機，到站後經查驗文件不全者，即要求退運等等作為，現經考量檢疫風險後，目前便民作法為允許犬貓於抵達離島(例：澎湖)後，經檢查無傳染病之虞者，於現場或請畜主攜帶至指定醫療院所補行狂犬病預防注射後放行，同時將通報犬貓所在地防疫機關進行追蹤。惟為免日後因犬貓未依規定施打預防注射遭罰且避免耽誤旅客行程破壞旅遊興致，仍請各航空公司協助向民眾宣導說明，依規定完成注射且備妥相關文件再前往。',
    updateDate: '2015-10-14',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q5 若遭狂犬病發之患者咬傷，是否有感染的危險？',
    answer:
      '狂犬病症狀發作的動物，其唾液已含有病毒，所以被咬後極可能會受到感染，應儘速就醫。人若感染發病，死亡率近100%。',
    updateDate: '2015-10-14',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q6 嬰兒及小孩的機票如何計費？',
    answer:
      '一、2歲以下不佔位的小孩可購買嬰兒票。（一）一位嬰兒與一位成人旅客同行，嬰兒可適用不佔機位之嬰兒票價。（二）但如果一位成人旅客攜帶兩位嬰兒同行，則其中一位嬰兒必須另購買佔座位之兒童機票且必須坐在嬰兒座椅內，該嬰兒座椅必須適用安全標準許可。（有些航空公司不搭載出生未滿 14 日之嬰兒，詳細資料請洽航空公司）。（三）一般而言，嬰兒票價為全額票價的10%，但可能依不同航線或不同票種而有不同的折扣。搭機時應攜帶政府單位核發之嬰兒身份證明文件，例如：健保手冊。各班機允許搭載嬰兒之人數，取決於機上「氧氣面罩」及「嬰兒救生衣」的數量，故建議有嬰兒隨行的旅客應提早事先訂位。二、2歲以上12歲以下之小孩可購買兒童票，國內線兒童票價為全額票價的75%；國際線一般而言，兒童票價為全額票價的75%，但可能依不同航線或不同票種而有不同的折扣。',
    updateDate: '2015-08-24',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q7 國內航線身心障礙者機票有無優惠？',
    answer:
      '身心障礙者及其陪同人（限1人）均可半票優惠，但考慮緊急狀況時，航機服務人員之救護人力問題，每一機型之飛機依其服務人員數目，有其特定的限制身心障礙半票人數。',
    updateDate: '2015-08-24',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q8 免費行李託運額度？',
    answer:
      '大部份航空公司都會給予免費託運行李，但是有額度限制，國內線一般額度為10公斤；國際線額度為20公斤(不含廉價航空公司)；超過則需收費，並以託運為準(有關託運行李及手提行李大小、重量之規定因航空公司及機型而異，仍請事先洽詢各航空公司)。',
    updateDate: '2015-08-24',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q9 入境旅客攜帶菸酒之規定為何？',
    answer:
      '一、入境旅客攜帶菸酒之免稅數量為酒1公升、捲菸200支或雪茄25支或菸絲1磅，但僅適用於年滿20歲之成年旅客。二、旅客攜帶進口餽贈或自用之菸酒，不得超過酒5公升、捲菸1,000支或菸絲5磅或雪茄125支。超過限量之部分，須檢具菸酒進口許可執照，否則不得輸入。超過前述免稅數量之部分，仍需繳稅後始得放行。三、旅客輸入之菸酒，依國庫署規定不得轉售。 (詳情請洽財政部關務署臺中關，電話：04-26155098)',
    updateDate: '2015-03-09',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q10 旅客攜帶黃金、外幣、新台幣、人民幣及有價證券入、出境時，應如何辦理通關手續？其有關規定如何？',
    answer:
      '一、入境部份：<br>（一）黃金：旅客攜帶黃金總值超過美幣2萬元者，應向經濟部國際貿易局申請輸入許可證，並辦理報關驗放手續。（二）外幣：旅客攜帶外幣超過美幣1萬元等值現金者，應於入境時繕具「中華民國海關申報單」向海關申報。未經申報或申報不實者，其超額部分沒入之。（三）新台幣：旅客攜帶新台幣入境以10萬元為限，如所帶之新台幣超過該項限額時，應在入境前先向中央銀行申請核准，持憑查驗放行；超額部分未經核准，不准攜入。（四）人民幣：旅客攜帶人民幣入境以2萬元為限，超過限額者，應自動向海關申報；超過部分，由旅客自行封存於海關，出境時准予攜出。（五）有價證券（指無記名之旅行支票、其他支票、本票、匯票或得由持有人在本國或外國行使權利之其他有價證券）：旅客攜帶有價證券入境總面額逾等值1萬美元者，應向海關申報。未依規定申報或申報不實者，科以相當於未申報或申報不實之有價證券價額之罰鍰。二、出境部分：<br>（一）黃金：旅客攜帶黃金總值超過美金2萬元者，應向經濟部國際貿易局申請輸出許可證，並辦理報關驗放手續。（二）外幣：旅客出境攜帶超過美幣1萬元等值現金者，應向海關報明登記。未依規定報明登記者，其超額部分沒入之；申報不實者，其超過申報部分沒入之。（三）新台幣：旅客出境攜帶新台幣以10萬元為限，超過限額時，應在出境前事先向中央銀行申請核准，持憑查驗放行；超額部分未經核准，不准攜出。（四）人民幣：旅客出境攜帶人民幣以2萬元為限，超過限額時，雖向海關申報，仍僅能於限額內攜出；申報不實者，其超過2萬元部分沒入之。（五）有價證券（指無記名之旅行支票、其他支票、本票、匯票、或得由持有人在本國或外國行使權利之其他有價證券）：旅客出境攜帶有價證券總面額逾等值1萬美元者，應向海關申報。未依規定申報或申報不實者，科以相當於未申報或申報不實之有價證券價額之罰鍰。(詳情請洽財政部關務署臺中關，電話：04-26155098)',
    updateDate: '2015-10-13',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q11 如何辦理自動通關？',
    answer:
      '要準備有相片的雙證件，具備護照，身高140公分以上，於出國時直接向移民署洽辦自動通關作業。外籍人士須具備居留證及護照，身高必須140公分以上。詳參考『入出國自動查驗通關系統 e-Gate』<br>連結網址：http://www.immigration.gov.tw/lp.asp?ctNode=36092&CtUnit=19627&BaseDSD=7&mp=1',
    updateDate: '2024-06-04',
    open: false,
    category: '搭機及入出境相關問題',
  },
  {
    question: 'Q1 哺集乳室有提供相關耗材？',
    answer:
      '目前機場哺集乳室備有洗手乳、各尺寸紙尿布及濕紙巾等耗材，提供旅客緊應急需使用。',
    updateDate: '2022-03-31',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q2 機場那裡可以抽菸？',
    answer:
      '依照菸害防治法規定，目前在國際航廈最南端車道旁設置有吸菸區，另站前4號門旁之人行穿越道至樓下中航路旁可以吸菸。',
    updateDate: '2022-03-31',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q3 服務台有提供哪些服務？',
    answer:
      '提供諮詢服務、廣播尋人、失物查詢、身心障礙服務及其他服務事項，並接受旅客建議。服務台旁放置大型資料陳放架，擺設政令宣導刊物、旅遊資料供旅客索取。',
    updateDate: '2015-03-09',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q4 哺集乳室位置在哪？',
    answer:
      '國際航廈大廳近餐廳處設有一處哺集乳室；國內航廈於北側近停車場處置有一處哺集乳室，使用者可至服務臺申請借用。另外國際候機室及入境廊廳均有哺集乳室，若於管制區內可逕行使用。',
    updateDate: '2015-08-25',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q5 寄放行李的地方？',
    answer:
      '在國際航廈入境大廳。',
    updateDate: '2019-03-20',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q6 投幣式寄物箱卡鎖或找零等問題？',
    answer:
      '航廈之投幣式寄物箱是由投幣式寄物箱前方之租車業者承接服務項目，有相關問題請直接洽租車業者提供服務。',
    updateDate: '2015-03-09',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q7 機場有打包服務?',
    answer:
      '航廈之打包服務是由租車業者承接服務項目，相關服務請直接洽租車業者。',
    updateDate: '2015-03-09',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q8 行李手推車存放處在哪裏？',
    answer:
      '航廈前、國際航廈地下停車場及入境行李提領區均置有行李手推車存放處，可供搭機旅客使用。',
    updateDate: '2015-08-25',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q9 遺失物品，如何洽詢？',
    answer:
      '於本航廈拾獲物品均交給航空警察局高雄分局台中分駐所保管及招領，若逾一週未有旅客洽詢，則該遺失物轉至航空警察局高雄分局保管及招領。洽詢電話：04-26155001',
    updateDate: '2019-03-20',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q10 兌換外幣在哪？服務時間？手續費多少?',
    answer:
      '機場兌換外幣有兩處，一處設置在國際入境行李轉盤旁，服務時間為每日09~16時。另一處設置在國際航廈報到大廳與入境大廳之間通廊，服務時間為每日06~23時。目前台幣兌換外幣(港幣、美金..)於台幣2000元面值以內手續費20元，以上為100元。外幣兌換台幣手續費一律30元。',
    updateDate: '2015-03-09',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q11 電信櫃檯位置？服務時間？',
    answer:
      '設置在國際航廈一樓報到大廳服務台旁。目前服務時間為每日10~22時',
    updateDate: '2015-08-24',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q12 辦理旅遊平安保險櫃檯位置？',
    answer:
      '設置在國際航廈一樓報到大廳服務台旁。目前服務時間為每日06:00~18:00。',
    updateDate: '2015-08-24',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q13 租車服務公司位置？',
    answer:
      '在國際航廈出境大廳2號門旁。',
    updateDate: '2019-02-21',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q14 請問有提供免費無線上網服務嗎?',
    answer:
      '航廈全區皆提供免費無線上網服務(iTAIWAN須於第一次登入時認證，往後與一般無線上網程序相同)；另國際候機室由免稅店提供免費無線上網服務。',
    updateDate: '2015-08-24',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q15 請問有提供手機充電服務嗎?',
    answer:
      '有的。於國內航廈到站出口、國際航廈一樓大廳及國際航廈三樓候機室均有提供手機免費充電服務。',
    updateDate: '2015-03-09',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q16 請問護理服務檯在哪裡?',
    answer:
      '國內航廈在一樓服務台，國際航廈在一樓報到大廳與入境大廳之間的通廊。',
    updateDate: '2015-03-09',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q17 請問哪裡有ATM提款機?',
    answer:
      '機場有三部ATM提款機，一部設置在國際航廈一樓台灣銀行外幣兌換櫃檯旁，一部設置國際入境行李提領區，另一部設在國內航廈一樓報到櫃檯前。三座都有 "Union Pay 銀聯" 的符號。此外設置於國際航廈ATM提款機兩台還有「PLUS」服務。',
    updateDate: '2019-03-20',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q18 請問哪裡可以辦理退稅?',
    answer:
      '國際航廈往國內航廈通道旁有個關務署臺中關服務櫃檯辦理退稅作業。',
    updateDate: '2015-08-24',
    open: false,
    category: '設施與其他服務',
  },
  {
    question: 'Q19 請問哪裡有餐廳?',
    answer:
      '機場內有餐廳二處，一處在國際航廈入境大廳、一處在國際航廈三樓候機室。',
    updateDate: '2022-03-31',
    open: false,
    category: '設施與其他服務',
  },
]);

// 計算格式化的 FAQ 數據
const selectedCategory = ref('交通問題');

const formattedFaqData = computed(() => {
  return faqData.value
    .filter((item) => selectedCategory.value === '所有分類' || item.category === selectedCategory.value)
    .map((item) => {
      return {
        ...item,
        answer: item.answer.replace(/。/g, '。<br>'), // 將句號替換為句號加換行
      };
    });

});
watch(selectedCategory, () => {
  faqData.value.forEach(item => item.open = false);
});
// function toggle(index) {
//   faqData.value[index].open = !faqData.value[index].open
//   console.log(index, faqData.value[index].open)
// }
function toggle(index) {
  const originalIndex = faqData.value.findIndex(item => item.question === formattedFaqData.value[index].question);
  faqData.value[originalIndex].open = !faqData.value[originalIndex].open;
  // console.log(originalIndex, faqData.value[originalIndex].open);
}

</script>

<template>
  <div
    class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover"
  >
    <div class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      常見問題
    </div>
  </div>
  <div class="max-w-[1260px] w-full px-5">
    <div class="w-full flex flex-col gap-5 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>常見問題</div>
      <div>
        <div>
          <div class="w-full shadow-lg mb-3 flex flex-col lg:flex-row gap-0 bg-white">
            <!-- lg:columns-4 -->
            <div class="grow flex items-center">
              <button class="w-full h-full flex items-center justify-center text-black py-4 border-r-2" type="button"
                @click="selectedCategory = '交通問題'"
                :class="{
                  'bg-air-purple text-white': selectedCategory === '交通問題',
                  'text-black': selectedCategory !== '交通問題'
                }">
                交通問題
              </button>
            </div>
            <div class="grow flex items-center">
              <button class="w-full h-full flex items-center justify-center text-black py-4 border-r-2" type="button"
                @click="selectedCategory = '搭機及入出境相關問題'"
                :class="{
                  'bg-air-purple text-white': selectedCategory === '搭機及入出境相關問題',
                  'text-black': selectedCategory !== '搭機及入出境相關問題'
                }">
                搭機及入出境相關問題
              </button>
            </div>
            <div class="grow flex items-center">
              <button type="button" class="w-full h-full flex items-center justify-center text-black py-4 border-r-2"
                @click="selectedCategory = '設施與其他服務'"
                :class="{
                  'bg-air-purple text-white': selectedCategory === '設施與其他服務',
                  'text-black': selectedCategory !== '設施與其他服務'
                }"
              >設施與其他服務</button>
            </div>
            <div class="bg-white px-5 flex items-center grow py-4">
              <input type="text" placeholder="輸入關鍵字" class="focus:outline-none w-full flex justify-between bg-slate-100 text-base pl-6 pr-5 py-2 rounded-full mr-3">
              <img class="searchicon w-[20px] h-[20px]" src="/icon/search.png" frameborder="0" alt="icon">
            </div>

          </div>
          <div v-for="(item, i) in formattedFaqData" :key="i">
            <div @click="toggle(i)" @keydown.enter="toggle(i)" tabindex="0" class="question flex justify-between items-center text-2xl text-air-purple bg-white shadow-lg">
              {{ item.question }}
              <img
                class="arrow-icon h-[12px] w-[20px] ml-4"
                :class="{ 'rotate-180': item.open }"
                src="/icon/Vector.png"
                alt="arrow icon"
              />
            </div>
            <div v-if="item.open" class="answer">
              <div class="text-xl font-normal" v-html="item.answer"></div>
              <div class="update-date text-lg decoration-customGray mt-2">文章最後更新日期：{{ item.updateDate }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.banner-service {
  background-image: url(/image/banner-flight.png);
}

.question {
  font-weight: bold;
  cursor: pointer;
  padding: 18px 26px;
  background-color: white;
}
.question:hover {
  background-color: rgb(248, 248, 248);
}
.answer {
  padding: 18px 26px;
  background-color: #F8F8FF;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) inset;
}
.arrow-icon {
  transition: transform 0s ease; /* 加入旋轉動畫 */
}

.rotate-180 {
  transform: rotate(180deg);
}

.update-date {
  /* font-size: 0.8rem; */
  color: gray;
}
.searchicon{
  background-size: contain;
}
</style>
