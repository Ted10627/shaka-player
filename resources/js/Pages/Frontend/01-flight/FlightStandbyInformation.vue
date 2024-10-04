<script setup>
</script>

<template>
  <div class="banner-service w-full max-w-[1920px] max-w-auto h-[120px] sm:h-[200px] lg:h-[400px] flex items-center bg-cover">
    <div class="text-xl font-bold sm:text-4xl lg:text-6xl w-[1260px] px-5 mx-auto text-white">國內線候補資訊</div>
  </div>
  <div class="max-w-[1260px] w-full px-5">
    <div class="w-full flex flex-col gap-5 m-auto py-10">
      <div class="w-full text-sm lg:text-2xl">首頁>航班資訊>國內線候補資訊</div>
      <table class="latestNews w-full hidden lg:table">
        <thead class="w-full">
          <tr class="air-dark-blue h-[80px]">
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">目的地</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">航空公司</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">目前叫號</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">登記候補人數</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">後續班次數</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center border-r-2 text-white">現場等待人數</div>
            </th>
            <th class="text-center">
              <div class="flex justify-center text-white">補上人數</div>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white text-2xl">
          <tr class="shadow-lg">
            <td class="text-center">
              金門 30º
            </td>
            <td class="text-center">
              <div class="flex justify-center gap-2 py-3 border-b-2">
                <img src="/image/airline/Rectangle 54.png" alt="">
                <p>華信航空</p>
              </div>
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54-2.png" alt="">
                <p>立榮航空</p>
              </div>
            </td>
            <td class="text-center">
              <div class="py-3 border-b-2">8</div>
              <div class="py-3">8</div>
            </td>
            <td class="text-center">
              <div class="py-3 border-b-2">1</div>
              <div class="py-3">2</div>
            </td>
            <td class="text-center">
              <div class="py-3 border-b-2">4</div>
              <div class="py-3">3</div>
            </td>
            <td class="text-center">
              <p>0</p>
            </td>
            <td class="text-center justify-items-center">
              <p>9</p>
              <div class="text-base grid justify-items-center">
                <p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white">補上明細</p>
              </div>
            </td>
          </tr>
          <tr class="shadow-lg">
            <td class="text-center">
              澎湖 30º
            </td>
            <td class="text-center">
              <div class="flex justify-center gap-2 py-3 border-b-2">
                <img src="/image/airline/Rectangle 54.png" alt="">
                <p>華信航空</p>
              </div>
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54-2.png" alt="">
                <p>立榮航空</p>
              </div>
            </td>
            <td class="text-center">
              <div class="py-3 border-b-2">1</div>
              <div class="py-3">尚未開始叫號</div>
            </td>
            <td class="text-center">
              <div class="py-3 border-b-2">5</div>
              <div class="py-3">4</div>
            </td>
            <td class="text-center">
              <div class="py-3 border-b-2">4</div>
              <div class="py-3">8</div>
            </td>
            <td class="text-center">
              <p>4</p>
            </td>
            <td class="text-center justify-items-center">
              <p>1</p>
              <div class="text-base grid justify-items-center">
                <p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white">補上明細</p>
              </div>
            </td>
          </tr>
          <tr class="shadow-lg">
            <td class="text-center">
              南竿 29º
            </td>
            <td class="text-center">
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54-2.png" alt="">
                <p>立榮航空</p>
              </div>
            </td>
            <td class="text-center">
              <div class="py-3">
                <p>優先:尚未開始叫號<br>一般:尚未開始叫號</p>
              </div>
            </td>
            <td class="text-center">
              <div class="py-3">
                <p>優先:0<br>一般:0</p>
              </div>
            </td>
            <td class="text-center">
              <div class="py-3">2</div>
            </td>
            <td class="text-center">
              <p>0</p>
            </td>
            <td class="text-center justify-items-center">
              <p>0</p>
              <div class="text-base grid justify-items-center">
                <p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white">補上明細</p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="lg:hidden">
        <thead class="w-full">
          <tr class="air-dark-blue h-[60px]">
            <th class="text-center" colspan="3">
              <div class="flex justify-center text-white">金門 30º</div>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white text-2xl border-b-4">
          <tr>
            <td class="text-center" colspan="3">
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54.png" alt="">
                <p>華信航空</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>目前叫號</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>登記候補人數</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>後續班次數</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>8</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>1</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>4</p>
              </div>
            </td>
          </tr>
          <tr>
            <td class="text-center bg-light-purple flex justify-center gap-7 py-3" colspan="3">
              <div><p>補上人數&nbsp;:&nbsp;8</p></div>
              <div><p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white text-base">補上明細</p></div>
            </td>
          </tr>
        </tbody>
        <tbody class="bg-white text-2xl shadow-lg z-10">
          <tr>
            <td class="text-center" colspan="3">
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54-2.png" alt="">
                <p>立榮航空</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>目前叫號</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>登記候補人數</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>後續班次數</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>8</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>2</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>3</p>
              </div>
            </td>
          </tr>
          <tr>
            <td class="text-center bg-light-purple flex justify-center gap-7 py-3" colspan="3">
              <div><p>補上人數&nbsp;:&nbsp;1</p></div>
              <div><p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white text-base">補上明細</p></div>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="lg:hidden">
        <thead class="w-full">
          <tr class="air-dark-blue h-[60px]">
            <th class="text-center" colspan="3">
              <div class="flex justify-center text-white">澎湖 30º</div>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white text-2xl border-b-4">
          <tr>
            <td class="text-center" colspan="3">
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54.png" alt="">
                <p>華信航空</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>目前叫號</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>登記候補人數</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>後續班次數</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>1</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>5</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>4</p>
              </div>
            </td>
          </tr>
          <tr>
            <td class="text-center bg-light-purple flex justify-center gap-7 py-3" colspan="3">
              <div><p>補上人數&nbsp;:&nbsp;1</p></div>
              <div><p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white text-base">補上明細</p></div>
            </td>
          </tr>
        </tbody>
        <tbody class="bg-white text-2xl shadow-lg z-10">
          <tr>
            <td class="text-center" colspan="3">
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54-2.png" alt="">
                <p>立榮航空</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>目前叫號</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>登記候補人數</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>後續班次數</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>尚未開始叫號</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>4</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>8</p>
              </div>
            </td>
          </tr>
          <tr>
            <td class="text-center bg-light-purple flex justify-center gap-7 py-3" colspan="3">
              <div><p>補上人數&nbsp;:&nbsp;1</p></div>
              <div><p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white text-base">補上明細</p></div>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="lg:hidden">
        <thead class="w-full">
          <tr class="air-dark-blue h-[60px]">
            <th class="text-center" colspan="3">
              <div class="flex justify-center text-white">南竿 29º</div>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white text-2xl shadow-lg z-10">
          <tr>
            <td class="text-center" colspan="3">
              <div class="flex justify-center gap-2 py-3">
                <img src="/image/airline/Rectangle 54-2.png" alt="">
                <p>立榮航空</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>目前叫號</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>登記候補人數</p>
              </div>
            </td>
            <td class="bg-light-purple basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>後續班次數</p>
              </div>
            </td>
          </tr>
          <tr class="flex">
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>優先:尚未開始叫號<br>一般:尚未開始叫號</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>優先:0<br>一般:0</p>
              </div>
            </td>
            <td class="basis-1/3">
              <div class="flex justify-center py-3 border-r-2">
                <p>2</p>
              </div>
            </td>
          </tr>
          <tr>
            <td class="text-center bg-light-purple flex justify-center gap-7 py-3" colspan="3">
              <div><p>補上人數&nbsp;:&nbsp;0</p></div>
              <div><p class="bg-sky-400 rounded w-[70px] py-1 mt-1 text-white text-base">補上明細</p></div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style>
.banner-service{
  background-image: url(/image/banner-flight.png);
}
.air-dark-blue{
  background-color: #343557;
}
</style>
