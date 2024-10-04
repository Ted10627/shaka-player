<script setup></script>

<template>
  <div
    class="banner-guide w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <p class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">
      注意事項
    </p>
  </div>
  <div class="px-5">
    <div class="w-full max-w-[1260px] flex flex-col gap-5 lg:gap-12 m-auto py-10">
      <div class="text-sm lg:text-xl">
        <Link :href="route('home')" class="hover:underline">首頁</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">搭機指南</Link>
        <span> > </span>
        <Link :href="route('')" class="hover:underline">注意事項</Link>
      </div>
      <div class="flex flex-wrap w-full sm:flex-nowrap">
        <a onclick="document.getElementById('first').scrollIntoView({ behavior: 'smooth' });"
          class="flex-1 sm:rounded-l-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-air-purple text-center hover:bg-[#471C87] hover:text-[#FFFFFF]">
          預訂機位
        </a>
        <a onclick="document.getElementById('second').scrollIntoView({ behavior: 'smooth' });"
          class="flex-1 w-full shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-air-purple text-center hover:bg-[#471C87] hover:text-[#FFFFFF]">
          購票、退票
        </a>
        <a onclick="document.getElementById('third').scrollIntoView({ behavior: 'smooth' });"
          class="flex-1 shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-air-purple text-center hover:bg-[#471C87] hover:text-[#FFFFFF]">
          班機延誤
        </a>
        <a onclick="document.getElementById('fourth').scrollIntoView({ behavior: 'smooth' });"
          class="flex-1 sm:rounded-r-[40px] shadow-xl p-2 lg:p-5 white text-xs md:text-base lg:text-2xl text-air-purple text-center hover:bg-[#471C87] hover:text-[#FFFFFF]">
          攜帶貴重物品
        </a>
      </div>
      <div id="first" class="p-5 lg:p-10 white rounded-[20px] scroll-m-[12.5rem]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">一、預訂機位與報到注意事項</p>
        <ol class="list-decimal px-3 lg:px-5">
          <li class="text-sm lg:text-xl">建議消費者預先訂位以便順利成行。</li>
          <li class="text-sm lg:text-xl">
            完成訂位手續時，必須向訂位人員取得電腦訂位代號及確認搭機的日期、班次、時間、出發地、目的地及姓名正確的寫法或拼法（國際航線需確認機票姓名是否與護照上英譯名字相同），並留下能直接聯絡
            的電話，以便班機若有變動，航空公司能迅速通知乘客。
          </li>
          <li class="text-sm lg:text-xl">
            如果取消行程，亦請電話告知訂位人員，以免影響其他乘客訂位權益。
          </li>
          <li class="text-sm lg:text-xl">
            逢年過節國內線部份航線訂位開放時間是有管制的，建議提前洽詢各航空公司。
          </li>
          <li class="text-sm lg:text-xl">
            國內線班機一般於起飛前60分鐘（國際線為起飛前2至3個小時）開始受理乘客報到手續，
            國內線乘客最遲應於起飛前30分鐘（國際線為起飛前45至60分鐘）辦妥報到手續，否則機位
            將會由候補乘客遞補；惟上述時間之規定可能因航空公司而不同，為保障權益，仍請洽詢各航空公司。
          </li>
          <li class="text-sm lg:text-xl">為維護自身權益，請在規劃行程時，事先訂位、提早報到。</li>
        </ol>
      </div>
      <div id="second" class="p-5 lg:p-10 white rounded-[20px] scroll-m-[12.5rem]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">二、購票、退票注意事項</p>
        <ol class="list-decimal px-3 lg:px-5">
          <li class="text-sm lg:text-xl">
            乘客可向航空公司或旅行社購買機票，機票姓名一經填寫，不得塗改，除特殊約定外，
            通常機票自開票日起算一年有效，如到期未使用，可於開票日起算二年內向原購票單位辦理退票，
            惟需扣除手續費。另有些折扣較大的機票，可能附帶使用效期限制或是其他特別限制條件，購買時應詢問清楚，
            避免您的權益受損。
          </li>
          <li class="text-sm lg:text-xl">
            遺失機票時可於有效期內向原購票單位辦理掛失，經航空公司查證該機票未使用時，得辦理退費，
            惟亦需扣除或收取手續費。
          </li>
          <li class="text-sm lg:text-xl">
            機票於有效期限內，如經主管機關核定調整票面價時，機票必須依使用時主管機關核定票面價與乘客所持機票
            票面價之差額多退少補。
          </li>
        </ol>
      </div>
      <div id="third" class="p-5 lg:p-10 white rounded-[20px] scroll-m-[12.5rem]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">三、班機延誤時航空公司應提供之服務</p>
        <ol class="list-decimal px-3 lg:px-5">
          <li class="text-sm lg:text-xl">
            對於班機延誤資訊，航空公司應立即透過傳播媒體管道提供相關資訊予大眾，
            對於尚未赴機場搭機之乘客尤應善盡預先告知之責任；旅行團部分應請旅行社轉知乘客，
            並與帶團之旅行社代表保持密切連絡，以儘量避免發生乘客滯留機場情形。
          </li>
          <li class="text-sm lg:text-xl">
            航空公司於確定班機無法依表定時間起程，致國內航線遲延15分鐘以上、
            國際航線遲延30分鐘以上者或變更航線、起降地點時，應即向乘客詳實說明原因及處理方式。
            遲延時間逾五小時以上，且乘客未接受運送人安排者，得向原售票單位辦理退票，運送人不得收取退票手續費。
          </li>
          <li class="text-sm lg:text-xl">
            航空公司應於機場內標示航班遲延情況之最新資訊，俾便乘客儘早因應。
          </li>
          <li class="text-sm lg:text-xl">
            航空公司應視實際情況並斟酌乘客需要，適時提供必要之通訊、必要之飲食或膳宿、
            必要之禦寒或醫藥急救之物品，以及必要之轉機或其他交通工具。
          </li>
          <li class="text-sm lg:text-xl">
            航空公司應合理照顧乘客權益，如受限於當地實際情況，無法提供前項服務時，應即向乘客詳實說明原因並妥善處理。
          </li>
        </ol>
      </div>
      <div class="p-5 lg:p-10 white rounded-[20px]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">四、遇有不可抗力因素造成班機延誤時</p>
        <div class="px-3 lg:px-5">
          <p class="text-sm lg:text-xl">
            天候不佳（如濃霧、颱風等）造成班機延誤確屬不可抗力因素，航空公司雖與乘客同為受害者，
            仍願盡力提供相關服務，其作法甚至已優於國際慣例；惟由於外在條件限制（如機場內商家無法
            提供熱飲或熱食、對外交通中斷…），相關服務可能無法使乘客完全滿意，此時亦請乘客多予體諒
            與配合，勿以霸機、抗爭等方式干涉機場運作。霸機或拒絕登機是不理性的行為，除使自己及其他
            旅客之行程更為延誤外，亦會影響機場秩序及損害國家形象，甚至可能因違法而受刑責。另依據現行
            規定，航空公司遇有不可抗力因素造成班機延誤（如遇天候變化、不可歸責於航空公司之機件故障、
            主管機關命令約束或其他必要情況），除另有交易習慣者外，以乘客因遲到而增加支出之必要費用為限。
            倘若消費者仍需向航空公司爭取權益，則建議循申訴管道請相關單位協助處理。
          </p>
        </div>
      </div>
      <div class="p-5 lg:p-10 white rounded-[20px]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">五、避免遇到班機延誤之小撇步</p>
        <div class="px-3 lg:px-5">
          <p class="text-sm lg:text-xl">
            為減低班機因天候不佳延誤時對於乘客之影響，建議消費者欲於天候不佳季節（如颱風警報發布期間
            或2、3月的霧季等）搭機時，能於出發前向航空公司洽詢班機飛航資訊。
          </p>
        </div>
      </div>
      <div class="p-5 lg:p-10 white rounded-[20px]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">六、旅遊不便保障</p>
        <div class="px-3 lg:px-5">
          <p class="text-sm lg:text-xl">
            目前多數銀行已針對刷卡購買機票之消費者提供旅遊不便險保障，一般於旅遊期間發生班機延誤、
            行李延誤或遺失…等狀況時，消費者可依發卡銀行規定獲得賠償；為維護消費者權益，提醒消費者應
            先洽銀行充分瞭解各項旅遊不便險之規定，以於有需要時向銀行申請理賠。
          </p>
        </div>
      </div>
      <div id="fourth" class="p-5 lg:p-10 white rounded-[20px] scroll-m-[12.5rem]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">七、攜帶貴重物品應注意事項</p>
        <div class="px-3 lg:px-5">
          <p class="text-sm lg:text-xl">
            對於乘客的託運行李，航空公司及地勤代理公司均會盡心妥善處理，然而有時仍難完全避免遺失或損壞的風險；
            另依據國際規範，放置於託運行李中的貴重物品，如有損失，航空公司可免負賠償責任。故建議乘客務必將貴重
            物品隨身攜帶，不要置於託運行李內。如因乘客擬隨身攜帶的物品超過航空公司所規定手提行李之大小及重量限制，
            而必須以託運行李方式處理時，謹在此提醒乘客：依據國際慣例，行李遺失或損壞之賠償將以行李重量做為計算標準，
            為免較高價值物品遺失或損壞時僅能比照一般行李賠償而造成乘客更大損失，建議乘客以報值方式辦理託運，俾屆時可
            獲得較合理之賠償；至於報值行李的限制、報值行李所需手續費，以及行李損失可獲理賠金額等細節，仍請直接洽詢各
            航空公司。另如航空公司所能提供之報值行李服務未能符合需求，建議乘客事先另洽保險公司辦理保險。
          </p>
        </div>
      </div>
      <div class="p-5 lg:p-10 white rounded-[20px]">
        <p class="py-2 text-xl lg:text-2xl font-bold text-air-purple">五、避免遇到班機延誤之小撇步</p>
        <div class="px-3 lg:px-5">
          <p class="text-sm lg:text-xl">
            為減低班機因天候不佳延誤時對於乘客之影響，建議消費者欲於天候不佳季節（如颱風警報發布期間
            或2、3月的霧季等）搭機時，能於出發前向航空公司洽詢班機飛航資訊。
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.banner-guide {
  background-image: url(/public/image/banner-guide.png);
}

a {
  cursor: pointer;
}
</style>
