<script setup>
definePageMeta({
    layout: 'admin',
});

const showList = ref('productes');

function changeShow(listName) {
    showList.value = listName;
}
</script>

<template>
    <div class="h-screen w-full glassmorphism fixed z-10"></div>
    <div class="px-4 pt-[78px]">
        <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <!-- Main widget -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        <span
                            class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">$45,385</span>
                        <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Sales this week</h3>
                    </div>
                    <div
                        class="flex items-center justify-end flex-1 text-base font-medium text-green-500 dark:text-green-400">
                        12.5%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div id="main-chart" style="min-height: 435px;">
                    <div id="apexchartszwcorpxk" class="apexcharts-canvas apexchartszwcorpxk apexcharts-theme-light"
                        style="width: 855px; height: 420px;"><svg id="SvgjsSvg4308" width="855" height="420"
                            xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable"
                            xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <foreignObject x="0" y="0" width="855" height="420">
                                <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                    xmlns="http://www.w3.org/1999/xhtml"
                                    style="inset: auto 0px 1px; position: absolute; max-height: 210px;">
                                    <div class="apexcharts-legend-series" rel="1" seriesname="Revenue"
                                        data:collapsed="false" style="margin: 2px 10px;"><span
                                            class="apexcharts-legend-marker" rel="1" data:collapsed="false"
                                            style="background: rgb(26, 86, 219); color: rgb(26, 86, 219); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                            class="apexcharts-legend-text" rel="1" i="0" data:default-text="Revenue"
                                            data:collapsed="false"
                                            style="color: rgb(156, 163, 175); font-size: 14px; font-weight: 500; font-family: Inter, sans-serif;">Revenue</span>
                                    </div>
                                    <div class="apexcharts-legend-series" rel="2" seriesname="Revenuexxpreviousxperiodx"
                                        data:collapsed="false" style="margin: 2px 10px;"><span
                                            class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                            style="background: rgb(253, 186, 140); color: rgb(253, 186, 140); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                            class="apexcharts-legend-text" rel="2" i="1"
                                            data:default-text="Revenue%20(previous%20period)" data:collapsed="false"
                                            style="color: rgb(156, 163, 175); font-size: 14px; font-weight: 500; font-family: Inter, sans-serif;">Revenue
                                            (previous period)</span></div>
                                </div>
                            </foreignObject>
                            <g id="SvgjsG4310" class="apexcharts-inner apexcharts-graphical"
                                transform="translate(95.1572265625, 30)">
                                <defs id="SvgjsDefs4309">
                                    <clipPath id="gridRectMaskzwcorpxk">
                                        <rect id="SvgjsRect4316" width="733.69677734375" height="313.494" x="-4" y="-2"
                                            rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                            stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMaskzwcorpxk"></clipPath>
                                    <clipPath id="nonForecastMaskzwcorpxk"></clipPath>
                                    <clipPath id="gridRectMarkerMaskzwcorpxk">
                                        <rect id="SvgjsRect4317" width="749.69677734375" height="333.494" x="-12"
                                            y="-12" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                            stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <linearGradient id="SvgjsLinearGradient4335" x1="0" y1="0" x2="0" y2="1">
                                        <stop id="SvgjsStop4336" stop-opacity="0" stop-color="rgba(26,86,219,0)"
                                            offset="0"></stop>
                                        <stop id="SvgjsStop4337" stop-opacity="0.15" stop-color="rgba(141,171,237,0.15)"
                                            offset="1"></stop>
                                        <stop id="SvgjsStop4338" stop-opacity="0.15" stop-color="rgba(141,171,237,0.15)"
                                            offset="1"></stop>
                                    </linearGradient>
                                    <linearGradient id="SvgjsLinearGradient4357" x1="0" y1="0" x2="0" y2="1">
                                        <stop id="SvgjsStop4358" stop-opacity="0" stop-color="rgba(253,186,140,0)"
                                            offset="0"></stop>
                                        <stop id="SvgjsStop4359" stop-opacity="0.15" stop-color="rgba(254,221,198,0.15)"
                                            offset="1"></stop>
                                        <stop id="SvgjsStop4360" stop-opacity="0.15" stop-color="rgba(254,221,198,0.15)"
                                            offset="1"></stop>
                                    </linearGradient>
                                </defs>
                                <line id="SvgjsLine4315" x1="0" y1="0" x2="0" y2="309.494" stroke="#374151"
                                    stroke-dasharray="10" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0"
                                    y="0" width="1" height="309.494" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                    stroke-width="1"></line>
                                <g id="SvgjsG4363" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG4364" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        <text id="SvgjsText4366" font-family="Inter, sans-serif" x="0" y="338.494"
                                            text-anchor="middle" dominant-baseline="auto" font-size="14px"
                                            font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4367">01 Feb</tspan>
                                            <title>01 Feb</title>
                                        </text><text id="SvgjsText4369" font-family="Inter, sans-serif"
                                            x="120.949462890625" y="338.494" text-anchor="middle"
                                            dominant-baseline="auto" font-size="14px" font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4370">02 Feb</tspan>
                                            <title>02 Feb</title>
                                        </text><text id="SvgjsText4372" font-family="Inter, sans-serif"
                                            x="241.89892578125" y="338.494" text-anchor="middle"
                                            dominant-baseline="auto" font-size="14px" font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4373">03 Feb</tspan>
                                            <title>03 Feb</title>
                                        </text><text id="SvgjsText4375" font-family="Inter, sans-serif"
                                            x="362.848388671875" y="338.494" text-anchor="middle"
                                            dominant-baseline="auto" font-size="14px" font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4376">04 Feb</tspan>
                                            <title>04 Feb</title>
                                        </text><text id="SvgjsText4378" font-family="Inter, sans-serif"
                                            x="483.7978515625" y="338.494" text-anchor="middle" dominant-baseline="auto"
                                            font-size="14px" font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4379">05 Feb</tspan>
                                            <title>05 Feb</title>
                                        </text><text id="SvgjsText4381" font-family="Inter, sans-serif"
                                            x="604.747314453125" y="338.494" text-anchor="middle"
                                            dominant-baseline="auto" font-size="14px" font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4382">06 Feb</tspan>
                                            <title>06 Feb</title>
                                        </text><text id="SvgjsText4384" font-family="Inter, sans-serif"
                                            x="725.69677734375" y="338.494" text-anchor="middle"
                                            dominant-baseline="auto" font-size="14px" font-weight="500" fill="#9ca3af"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Inter, sans-serif;">
                                            <tspan id="SvgjsTspan4385">07 Feb</tspan>
                                            <title>07 Feb</title>
                                        </text>
                                    </g>
                                    <line id="SvgjsLine4386" x1="0" y1="310.494" x2="725.69677734375" y2="310.494"
                                        stroke="#374151" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt">
                                    </line>
                                </g>
                                <g id="SvgjsG4399" class="apexcharts-grid">
                                    <g id="SvgjsG4400" class="apexcharts-gridlines-horizontal">
                                        <line id="SvgjsLine4409" x1="0" y1="0" x2="725.69677734375" y2="0"
                                            stroke="#374151" stroke-dasharray="1" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine4410" x1="0" y1="77.3735" x2="725.69677734375" y2="77.3735"
                                            stroke="#374151" stroke-dasharray="1" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine4411" x1="0" y1="154.747" x2="725.69677734375" y2="154.747"
                                            stroke="#374151" stroke-dasharray="1" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine4412" x1="0" y1="232.12050000000002" x2="725.69677734375"
                                            y2="232.12050000000002" stroke="#374151" stroke-dasharray="1"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine4413" x1="0" y1="309.494" x2="725.69677734375" y2="309.494"
                                            stroke="#374151" stroke-dasharray="1" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG4401" class="apexcharts-gridlines-vertical"></g>
                                    <line id="SvgjsLine4402" x1="0" y1="310.494" x2="0" y2="316.494" stroke="#374151"
                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4403" x1="120.949462890625" y1="310.494" x2="120.949462890625"
                                        y2="316.494" stroke="#374151" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4404" x1="241.89892578125" y1="310.494" x2="241.89892578125"
                                        y2="316.494" stroke="#374151" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4405" x1="362.848388671875" y1="310.494" x2="362.848388671875"
                                        y2="316.494" stroke="#374151" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4406" x1="483.7978515625" y1="310.494" x2="483.7978515625"
                                        y2="316.494" stroke="#374151" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4407" x1="604.747314453125" y1="310.494" x2="604.747314453125"
                                        y2="316.494" stroke="#374151" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4408" x1="725.69677734375" y1="310.494" x2="725.69677734375"
                                        y2="316.494" stroke="#374151" stroke-dasharray="0" stroke-linecap="butt"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine4415" x1="0" y1="309.494" x2="725.69677734375" y2="309.494"
                                        stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    <line id="SvgjsLine4414" x1="0" y1="1" x2="0" y2="309.494" stroke="transparent"
                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                </g>
                                <g id="SvgjsG4318" class="apexcharts-area-series apexcharts-plot-series">
                                    <g id="SvgjsG4319" class="apexcharts-series" seriesName="Revenue"
                                        data:longestSeries="true" rel="1" data:realIndex="0">
                                        <path id="SvgjsPath4339"
                                            d="M 0 309.494L 0 171.76917000000003C 42.33231201171875 171.76917000000003 78.61715087890624 225.15688500000033 120.949462890625 225.15688500000033C 163.28177490234376 225.15688500000033 199.56661376953124 249.14267000000018 241.89892578125 249.14267000000018C 284.2312377929687 249.14267000000018 320.5160766601563 106.00169500000038 362.848388671875 106.00169500000038C 405.1807006835937 106.00169500000038 441.4655395507813 171.76917000000003 483.7978515625 171.76917000000003C 526.1301635742187 171.76917000000003 562.4150024414063 210.45592000000033 604.747314453125 210.45592000000033C 647.0796264648437 210.45592000000033 683.3644653320313 287.82942 725.69677734375 287.82942C 725.69677734375 287.82942 725.69677734375 287.82942 725.69677734375 309.494M 725.69677734375 287.82942z"
                                            fill="url(#SvgjsLinearGradient4335)" fill-opacity="1" stroke-opacity="1"
                                            stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                            class="apexcharts-area" index="0" clip-path="url(#gridRectMaskzwcorpxk)"
                                            pathTo="M 0 309.494L 0 171.76917000000003C 42.33231201171875 171.76917000000003 78.61715087890624 225.15688500000033 120.949462890625 225.15688500000033C 163.28177490234376 225.15688500000033 199.56661376953124 249.14267000000018 241.89892578125 249.14267000000018C 284.2312377929687 249.14267000000018 320.5160766601563 106.00169500000038 362.848388671875 106.00169500000038C 405.1807006835937 106.00169500000038 441.4655395507813 171.76917000000003 483.7978515625 171.76917000000003C 526.1301635742187 171.76917000000003 562.4150024414063 210.45592000000033 604.747314453125 210.45592000000033C 647.0796264648437 210.45592000000033 683.3644653320313 287.82942 725.69677734375 287.82942C 725.69677734375 287.82942 725.69677734375 287.82942 725.69677734375 309.494M 725.69677734375 287.82942z"
                                            pathFrom="M -1 2630.6990000000005L -1 2630.6990000000005L 120.949462890625 2630.6990000000005L 241.89892578125 2630.6990000000005L 362.848388671875 2630.6990000000005L 483.7978515625 2630.6990000000005L 604.747314453125 2630.6990000000005L 725.69677734375 2630.6990000000005">
                                        </path>
                                        <path id="SvgjsPath4340"
                                            d="M 0 171.76917000000003C 42.33231201171875 171.76917000000003 78.61715087890624 225.15688500000033 120.949462890625 225.15688500000033C 163.28177490234376 225.15688500000033 199.56661376953124 249.14267000000018 241.89892578125 249.14267000000018C 284.2312377929687 249.14267000000018 320.5160766601563 106.00169500000038 362.848388671875 106.00169500000038C 405.1807006835937 106.00169500000038 441.4655395507813 171.76917000000003 483.7978515625 171.76917000000003C 526.1301635742187 171.76917000000003 562.4150024414063 210.45592000000033 604.747314453125 210.45592000000033C 647.0796264648437 210.45592000000033 683.3644653320313 287.82942 725.69677734375 287.82942"
                                            fill="none" fill-opacity="1" stroke="#1a56db" stroke-opacity="1"
                                            stroke-linecap="butt" stroke-width="4" stroke-dasharray="0"
                                            class="apexcharts-area" index="0" clip-path="url(#gridRectMaskzwcorpxk)"
                                            pathTo="M 0 171.76917000000003C 42.33231201171875 171.76917000000003 78.61715087890624 225.15688500000033 120.949462890625 225.15688500000033C 163.28177490234376 225.15688500000033 199.56661376953124 249.14267000000018 241.89892578125 249.14267000000018C 284.2312377929687 249.14267000000018 320.5160766601563 106.00169500000038 362.848388671875 106.00169500000038C 405.1807006835937 106.00169500000038 441.4655395507813 171.76917000000003 483.7978515625 171.76917000000003C 526.1301635742187 171.76917000000003 562.4150024414063 210.45592000000033 604.747314453125 210.45592000000033C 647.0796264648437 210.45592000000033 683.3644653320313 287.82942 725.69677734375 287.82942"
                                            pathFrom="M -1 2630.6990000000005L -1 2630.6990000000005L 120.949462890625 2630.6990000000005L 241.89892578125 2630.6990000000005L 362.848388671875 2630.6990000000005L 483.7978515625 2630.6990000000005L 604.747314453125 2630.6990000000005L 725.69677734375 2630.6990000000005">
                                        </path>
                                        <g id="SvgjsG4320" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                            <g id="SvgjsG4322" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4323" r="5" cx="0" cy="171.76917000000003"
                                                    class="apexcharts-marker no-pointer-events w0wniplu1"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="0" j="0" index="0"
                                                    default-marker-size="5"></circle>
                                                <circle id="SvgjsCircle4324" r="5" cx="120.949462890625"
                                                    cy="225.15688500000033"
                                                    class="apexcharts-marker no-pointer-events w3ha7i0ev"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="1" j="1" index="0"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4325" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4326" r="5" cx="241.89892578125"
                                                    cy="249.14267000000018"
                                                    class="apexcharts-marker no-pointer-events wyprm8xho"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="2" j="2" index="0"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4327" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4328" r="5" cx="362.848388671875"
                                                    cy="106.00169500000038"
                                                    class="apexcharts-marker no-pointer-events w3bxj859d"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="3" j="3" index="0"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4329" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4330" r="5" cx="483.7978515625"
                                                    cy="171.76917000000003"
                                                    class="apexcharts-marker no-pointer-events wqsjk5qdh"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="4" j="4" index="0"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4331" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4332" r="5" cx="604.747314453125"
                                                    cy="210.45592000000033"
                                                    class="apexcharts-marker no-pointer-events w4zoa7428"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="5" j="5" index="0"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4333" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4334" r="5" cx="725.69677734375" cy="287.82942"
                                                    class="apexcharts-marker no-pointer-events w6o7r9umm"
                                                    stroke="#ffffff" fill="#1a56db" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="6" j="6" index="0"
                                                    default-marker-size="5"></circle>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG4341" class="apexcharts-series" seriesName="Revenuexxpreviousxperiodx"
                                        data:longestSeries="true" rel="2" data:realIndex="1">
                                        <path id="SvgjsPath4361"
                                            d="M 0 309.494L 0 94.39567000000034C 42.33231201171875 94.39567000000034 78.61715087890624 29.015062500000113 120.949462890625 29.015062500000113C 163.28177490234376 29.015062500000113 199.56661376953124 145.46218000000044 241.89892578125 145.46218000000044C 284.2312377929687 145.46218000000044 320.5160766601563 171.76917000000003 362.848388671875 171.76917000000003C 405.1807006835937 171.76917000000003 441.4655395507813 82.78964500000029 483.7978515625 82.78964500000029C 526.1301635742187 82.78964500000029 562.4150024414063 17.022170000000187 604.747314453125 17.022170000000187C 647.0796264648437 17.022170000000187 683.3644653320313 71.18362000000025 725.69677734375 71.18362000000025C 725.69677734375 71.18362000000025 725.69677734375 71.18362000000025 725.69677734375 309.494M 725.69677734375 71.18362000000025z"
                                            fill="url(#SvgjsLinearGradient4357)" fill-opacity="1" stroke-opacity="1"
                                            stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                            class="apexcharts-area" index="1" clip-path="url(#gridRectMaskzwcorpxk)"
                                            pathTo="M 0 309.494L 0 94.39567000000034C 42.33231201171875 94.39567000000034 78.61715087890624 29.015062500000113 120.949462890625 29.015062500000113C 163.28177490234376 29.015062500000113 199.56661376953124 145.46218000000044 241.89892578125 145.46218000000044C 284.2312377929687 145.46218000000044 320.5160766601563 171.76917000000003 362.848388671875 171.76917000000003C 405.1807006835937 171.76917000000003 441.4655395507813 82.78964500000029 483.7978515625 82.78964500000029C 526.1301635742187 82.78964500000029 562.4150024414063 17.022170000000187 604.747314453125 17.022170000000187C 647.0796264648437 17.022170000000187 683.3644653320313 71.18362000000025 725.69677734375 71.18362000000025C 725.69677734375 71.18362000000025 725.69677734375 71.18362000000025 725.69677734375 309.494M 725.69677734375 71.18362000000025z"
                                            pathFrom="M -1 2630.6990000000005L -1 2630.6990000000005L 120.949462890625 2630.6990000000005L 241.89892578125 2630.6990000000005L 362.848388671875 2630.6990000000005L 483.7978515625 2630.6990000000005L 604.747314453125 2630.6990000000005L 725.69677734375 2630.6990000000005">
                                        </path>
                                        <path id="SvgjsPath4362"
                                            d="M 0 94.39567000000034C 42.33231201171875 94.39567000000034 78.61715087890624 29.015062500000113 120.949462890625 29.015062500000113C 163.28177490234376 29.015062500000113 199.56661376953124 145.46218000000044 241.89892578125 145.46218000000044C 284.2312377929687 145.46218000000044 320.5160766601563 171.76917000000003 362.848388671875 171.76917000000003C 405.1807006835937 171.76917000000003 441.4655395507813 82.78964500000029 483.7978515625 82.78964500000029C 526.1301635742187 82.78964500000029 562.4150024414063 17.022170000000187 604.747314453125 17.022170000000187C 647.0796264648437 17.022170000000187 683.3644653320313 71.18362000000025 725.69677734375 71.18362000000025"
                                            fill="none" fill-opacity="1" stroke="#fdba8c" stroke-opacity="1"
                                            stroke-linecap="butt" stroke-width="4" stroke-dasharray="0"
                                            class="apexcharts-area" index="1" clip-path="url(#gridRectMaskzwcorpxk)"
                                            pathTo="M 0 94.39567000000034C 42.33231201171875 94.39567000000034 78.61715087890624 29.015062500000113 120.949462890625 29.015062500000113C 163.28177490234376 29.015062500000113 199.56661376953124 145.46218000000044 241.89892578125 145.46218000000044C 284.2312377929687 145.46218000000044 320.5160766601563 171.76917000000003 362.848388671875 171.76917000000003C 405.1807006835937 171.76917000000003 441.4655395507813 82.78964500000029 483.7978515625 82.78964500000029C 526.1301635742187 82.78964500000029 562.4150024414063 17.022170000000187 604.747314453125 17.022170000000187C 647.0796264648437 17.022170000000187 683.3644653320313 71.18362000000025 725.69677734375 71.18362000000025"
                                            pathFrom="M -1 2630.6990000000005L -1 2630.6990000000005L 120.949462890625 2630.6990000000005L 241.89892578125 2630.6990000000005L 362.848388671875 2630.6990000000005L 483.7978515625 2630.6990000000005L 604.747314453125 2630.6990000000005L 725.69677734375 2630.6990000000005">
                                        </path>
                                        <g id="SvgjsG4342" class="apexcharts-series-markers-wrap" data:realIndex="1">
                                            <g id="SvgjsG4344" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4345" r="5" cx="0" cy="94.39567000000034"
                                                    class="apexcharts-marker no-pointer-events wvfwqh24y"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="0" j="0" index="1"
                                                    default-marker-size="5"></circle>
                                                <circle id="SvgjsCircle4346" r="5" cx="120.949462890625"
                                                    cy="29.015062500000113"
                                                    class="apexcharts-marker no-pointer-events wzou7aqd2"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="1" j="1" index="1"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4347" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4348" r="5" cx="241.89892578125"
                                                    cy="145.46218000000044"
                                                    class="apexcharts-marker no-pointer-events wl1y42w12"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="2" j="2" index="1"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4349" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4350" r="5" cx="362.848388671875"
                                                    cy="171.76917000000003"
                                                    class="apexcharts-marker no-pointer-events w8fnhbum3"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="3" j="3" index="1"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4351" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4352" r="5" cx="483.7978515625"
                                                    cy="82.78964500000029"
                                                    class="apexcharts-marker no-pointer-events w4vntx9om"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="4" j="4" index="1"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4353" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4354" r="5" cx="604.747314453125"
                                                    cy="17.022170000000187"
                                                    class="apexcharts-marker no-pointer-events wzl9jus36"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="5" j="5" index="1"
                                                    default-marker-size="5"></circle>
                                            </g>
                                            <g id="SvgjsG4355" class="apexcharts-series-markers"
                                                clip-path="url(#gridRectMarkerMaskzwcorpxk)">
                                                <circle id="SvgjsCircle4356" r="5" cx="725.69677734375"
                                                    cy="71.18362000000025"
                                                    class="apexcharts-marker no-pointer-events w0i28h1cyh"
                                                    stroke="#ffffff" fill="#fdba8c" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="0.9" rel="6" j="6" index="1"
                                                    default-marker-size="5"></circle>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG4321" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    <g id="SvgjsG4343" class="apexcharts-datalabels" data:realIndex="1"></g>
                                </g>
                                <line id="SvgjsLine4416" x1="0" y1="0" x2="725.69677734375" y2="0" stroke="#b6b6b6"
                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                    class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine4417" x1="0" y1="0" x2="725.69677734375" y2="0" stroke-dasharray="0"
                                    stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                <g id="SvgjsG4418" class="apexcharts-yaxis-annotations"></g>
                                <g id="SvgjsG4419" class="apexcharts-xaxis-annotations"></g>
                                <g id="SvgjsG4420" class="apexcharts-point-annotations"></g>
                                <rect id="SvgjsRect4421" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                    class="apexcharts-zoom-rect"></rect>
                                <rect id="SvgjsRect4422" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                    class="apexcharts-selection-rect"></rect>
                            </g>
                            <rect id="SvgjsRect4314" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                            <g id="SvgjsG4387" class="apexcharts-yaxis" rel="0" transform="translate(42.1572265625, 0)">
                                <g id="SvgjsG4388" class="apexcharts-yaxis-texts-g"><text id="SvgjsText4389"
                                        font-family="Inter, sans-serif" x="20" y="31.4" text-anchor="end"
                                        dominant-baseline="auto" font-size="14px" font-weight="500" fill="#9ca3af"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Inter, sans-serif;">
                                        <tspan id="SvgjsTspan4390">$6800</tspan>
                                        <title>$6800</title>
                                    </text><text id="SvgjsText4391" font-family="Inter, sans-serif" x="20"
                                        y="108.77350000000001" text-anchor="end" dominant-baseline="auto"
                                        font-size="14px" font-weight="500" fill="#9ca3af"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Inter, sans-serif;">
                                        <tspan id="SvgjsTspan4392">$6600</tspan>
                                        <title>$6600</title>
                                    </text><text id="SvgjsText4393" font-family="Inter, sans-serif" x="20"
                                        y="186.14700000000002" text-anchor="end" dominant-baseline="auto"
                                        font-size="14px" font-weight="500" fill="#9ca3af"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Inter, sans-serif;">
                                        <tspan id="SvgjsTspan4394">$6400</tspan>
                                        <title>$6400</title>
                                    </text><text id="SvgjsText4395" font-family="Inter, sans-serif" x="20"
                                        y="263.52049999999997" text-anchor="end" dominant-baseline="auto"
                                        font-size="14px" font-weight="500" fill="#9ca3af"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Inter, sans-serif;">
                                        <tspan id="SvgjsTspan4396">$6200</tspan>
                                        <title>$6200</title>
                                    </text><text id="SvgjsText4397" font-family="Inter, sans-serif" x="20" y="340.894"
                                        text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="500"
                                        fill="#9ca3af" class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Inter, sans-serif;">
                                        <tspan id="SvgjsTspan4398">$6000</tspan>
                                        <title>$6000</title>
                                    </text></g>
                            </g>
                            <g id="SvgjsG4311" class="apexcharts-annotations"></g>
                        </svg>
                        <div class="apexcharts-tooltip apexcharts-theme-light">
                            <div class="apexcharts-tooltip-title"
                                style="font-family: Inter, sans-serif; font-size: 14px;"></div>
                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                    class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(26, 86, 219);"></span>
                                <div class="apexcharts-tooltip-text"
                                    style="font-family: Inter, sans-serif; font-size: 14px;">
                                    <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-y-label"></span><span
                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                    <div class="apexcharts-tooltip-goals-group"><span
                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                </div>
                            </div>
                            <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                    class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(253, 186, 140);"></span>
                                <div class="apexcharts-tooltip-text"
                                    style="font-family: Inter, sans-serif; font-size: 14px;">
                                    <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-y-label"></span><span
                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                    <div class="apexcharts-tooltip-goals-group"><span
                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                            <div class="apexcharts-xaxistooltip-text"
                                style="font-family: Inter, sans-serif; font-size: 12px;"></div>
                        </div>
                        <div
                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                            <div class="apexcharts-yaxistooltip-text"></div>
                        </div>
                    </div>
                </div>
                <!-- Card Footer -->
                <div
                    class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                    <div>
                        <button
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                            type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg
                                class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="weekly-sales-dropdown"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(355px, 707px);"
                            data-popper-placement="bottom">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                                    Sep 16, 2021 - Sep 22, 2021
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Last 7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Last 90 days</a>
                                </li>
                            </ul>
                            <div class="py-1" role="none">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Custom...</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="#"
                            class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                            Sales Report
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!--Tabs widget -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Estadístiques
                    aquest mes</h3>
                <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400"
                    id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button @click="changeShow('productes')" id="faq-tab" data-tabs-target="#faq" type="button"
                            role="tab" aria-controls="faq" aria-selected="true"
                            class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600"
                            :class="{ 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500': showList === 'productes' }">
                            Top products
                        </button>
                    </li>
                    <li class="w-full">
                        <button @click="changeShow('clientes')" id="about-tab" data-tabs-target="#about" type="button"
                            role="tab" aria-controls="about" aria-selected="false"
                            class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600"
                            :class="{ 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500': showList === 'clientes' }">
                            Top Customers
                        </button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    <div class="pt-4" :class="{ 'hidden': showList === 'clientes' }" id="faq" role="tabpanel"
                        aria-labelledby="faq-tab">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/products/iphone.png"
                                            alt="imac image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                iPhone 14 Pro
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                                    </path>
                                                </svg>
                                                2.5%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $445,467
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/products/imac.png"
                                            alt="imac image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple iMac 27"
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                                    </path>
                                                </svg>
                                                12.5%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $256,982
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/products/watch.png"
                                            alt="watch image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple Watch SE
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-red-600 dark:text-red-500">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z">
                                                    </path>
                                                </svg>
                                                1.35%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $201,869
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/products/ipad.png"
                                            alt="ipad image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple iPad Air
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                                    </path>
                                                </svg>
                                                12.5%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $103,967
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <img class="flex-shrink-0 w-10 h-10"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/products/imac.png"
                                            alt="imac image">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                                Apple iMac 24"
                                            </p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-red-600 dark:text-red-500">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z">
                                                    </path>
                                                </svg>
                                                2%
                                                <span class="ml-2 text-gray-500">vs last month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $98,543
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4" :class="{ 'hidden': showList === 'productes' }" id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/users/neil-sims.png"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            Neil Sims
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@flowbite.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $3320
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green.png"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            Bonnie Green
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@flowbite.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $2467
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/users/michael-gough.png"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            Michael Gough
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@flowbite.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $2235
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/users/thomas-lean.png"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            Thomes Lean
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@flowbite.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $1842
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://flowbite-admin-dashboard.vercel.app/images/users/lana-byrd.png"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            Lana Byrd
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@flowbite.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        $1044
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Card Footer -->
                <div
                    class="flex items-center justify-between pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                    <div>
                        <button
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                            type="button" data-dropdown-toggle="stats-dropdown">Darrers 7 dies<svg class="w-4 h-4 ml-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="stats-dropdown"
                            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(355px, 248px);"
                            data-popper-placement="top" data-popper-reference-hidden="" data-popper-escaped="">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                                    Sep 16, 2021 - Sep 22, 2021
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Last 7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Last 90 days</a>
                                </li>
                            </ul>
                            <div class="py-1" role="none">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Custom...</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="#"
                            class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                            Informe complet
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ESTADISTICAS INFERIOR -->
        <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-2">
            <!-- CLIENTES -->
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Clients</h3>
                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
                    <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                        <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                                </path>
                            </svg>
                            3,4%
                        </span>
                        Des de l'últim mes
                    </p>
                </div>
            </div>
            <!-- VALORACIONES -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <div class="flex items-center">
                        <div class="w-[18%] flex flex-col items-center">
                            <h3 class="mb-2 text-base font-normal text-gray-500 dark:text-gray-400">Valoracions</h3>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                3,3
                            </span>
                            <PuntuacionComp :rating="3.5" />
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center mb-2">
                                <div class="mr-5 text-sm font-medium dark:text-white">5</div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                </div>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="mr-5 text-sm font-medium dark:text-white">4</div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                </div>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="mr-5 text-sm font-medium dark:text-white">3</div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                </div>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="mr-5 text-sm font-medium dark:text-white">2</div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                </div>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="mr-5 text-sm font-medium dark:text-white">1</div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="traffic-channels-chart" class="w-full"></div>
            </div>
        </div>
        <!-- VALORACIONES -->
        <div class="grid grid-cols-1 my-4 xl:grid-cols-2 xl:gap-4">
            <!-- VAL. PRODUCTOS -->
            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Valoracions de productes</h3>
                    <a href="#"
                        class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                        View all
                    </a>
                </div>
                <!-- Chat -->
                <form class="overflow-y-auto lg:max-h-[60rem] 2xl:max-h-fit">
                    <article class="mb-5">
                        <footer class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <img class="w-6 h-6 mr-2 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                        alt="Michael Gough">Michael Gough
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate=""
                                        datetime="2022-02-08" title="February 8th, 2022"> 01/03/2023 4:15 PM</time></p>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment1"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600"
                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1119px, 1054px);"
                                data-popper-escaped="" data-popper-placement="top" data-popper-reference-hidden="">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <p class="mb-2 text-gray-900 dark:text-white">
                            Hello <a href="#"
                                class="font-medium hover:underline text-primary-600 dark:text-primary-500">@designteam</a>
                            Let's schedule a kick-off meeting and workshop this week. It would be great to gather
                            everyone involved in the design project. Let me know about your availability in the thread.
                        </p>
                        <p class="mb-3 text-gray-900 dark:text-white">Looking forward to it! Thanks.</p>
                        <a href="#"
                            class="inline-flex items-center text-xs font-medium text-primary-700 sm:text-sm dark:text-primary-500">
                            4 replies
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z">
                                </path>
                            </svg>
                        </a>
                    </article>
                    <article class="mb-5">
                        <footer class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <img class="w-6 h-6 mr-2 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                        alt="Bonnie avatar">Bonnie Green
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate=""
                                        datetime="2022-02-08" title="February 8th, 2022"> 01/03/2023 4:15 PM</time></p>
                            </div>
                            <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment2"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600"
                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1119px, 1234px);"
                                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <p class="mb-3 text-gray-900 dark:text-white">Hello everyone,</p>
                        <p class="mb-2 text-gray-900 dark:text-white">
                            Thank you for the workshop, it was very productive meeting. I can't wait to start working on
                            this new project with you guys. But first things first, I'am waiting for the offer and pitch
                            deck from you. It would be great to get it by the end o the month.
                        </p>
                        <p class="mb-3 text-gray-900 dark:text-white">Cheers!</p>
                        <div class="flex items-center mb-2 space-x-2">
                            <button type="button"
                                class="py-1.5 px-3 inline-flex items-center rounded-lg bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700">
                                <svg aria-hidden="true" class="h-5 mr-2" viewBox="0 0 24 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24 14.1907C24 12.7352 23.7409 11.3397 23.2659 10.0486C22.9412 13.8526 20.9132 15.8065 18.7941 14.8966C16.8092 14.0439 18.1468 10.7199 18.2456 9.13377C18.4122 6.44506 18.2372 3.36742 13.3532 0.808594C15.3826 4.69095 13.5882 7.10295 11.7064 7.24977C9.61835 7.41283 7.70612 5.45542 8.412 2.27895C6.12635 3.96318 6.06 6.79801 6.76518 8.63189C7.50071 10.5434 6.73553 12.1317 4.94188 12.3081C2.93718 12.5058 1.82329 10.1615 2.85035 6.42601C1.07294 8.51895 0 11.2295 0 14.1907C0 20.8182 5.37247 26.1907 12 26.1907C18.6275 26.1907 24 20.8182 24 14.1907Z"
                                        fill="#F4900C"></path>
                                    <path
                                        d="M19.3349 17.7211C19.4393 19.8981 17.5271 20.7515 16.4979 20.3393C15.0113 19.7442 15.4102 18.7221 15.0276 16.6044C14.645 14.4868 13.1746 13.0164 10.9984 12.3691C12.5866 16.8395 10.1182 18.487 8.82428 18.7814C7.50287 19.0821 6.17511 18.7807 6.02334 15.9529C4.4817 17.4875 3.52734 19.6108 3.52734 21.9571C3.52734 22.2169 3.54358 22.4724 3.56617 22.7266C5.73323 24.8682 8.70993 26.1924 11.9979 26.1924C15.2859 26.1924 18.2626 24.8682 20.4297 22.7266C20.4523 22.4724 20.4685 22.2169 20.4685 21.9571C20.4685 20.4134 20.0563 18.967 19.3349 17.7211Z"
                                        fill="#FFCC4D"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">14</span>
                            </button>
                            <button type="button"
                                class="py-1.5 px-3 inline-flex items-center rounded-lg bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700">
                                <svg aria-hidden="true" class="h-5 mr-2" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.24467 6.07733C3.87207 5.63882 4.81784 5.72291 5.38116 6.18812L4.73508 5.24903C4.21514 4.5075 4.40135 3.70523 5.14355 3.18462C5.88575 2.66601 7.98887 4.06031 7.98887 4.06031C7.46426 3.31143 7.56238 2.36233 8.31125 1.83705C9.06012 1.31377 10.0933 1.49465 10.6179 2.24486L17.5727 12.0697L16.6864 20.663L9.28906 17.9652L2.83686 8.3987C2.30758 7.64516 2.49046 6.60594 3.24467 6.07733Z"
                                        fill="#EF9645"></path>
                                    <path
                                        d="M1.79857 11.5433C1.79857 11.5433 1.04302 10.442 2.14497 9.68715C3.24559 8.93226 4.00047 10.0329 4.00047 10.0329L7.50523 15.1442C7.62603 14.9426 7.75819 14.7437 7.90569 14.5475L3.04135 7.45454C3.04135 7.45454 2.28647 6.35392 3.38775 5.59904C4.48837 4.84416 5.24325 5.94478 5.24325 5.94478L9.81859 12.6172C9.98879 12.4784 10.163 12.3389 10.3425 12.2021L5.03835 4.46572C5.03835 4.46572 4.28347 3.3651 5.38475 2.61022C6.48537 1.85534 7.24025 2.95596 7.24025 2.95596L12.5444 10.691C12.7393 10.5715 12.9322 10.4681 13.1258 10.3586L8.168 3.12883C8.168 3.12883 7.41312 2.02821 8.51373 1.27333C9.61435 0.518448 10.3692 1.61907 10.3692 1.61907L15.6113 9.26398L16.4083 10.4267C13.1058 12.692 12.7914 16.9536 14.6783 19.7055C15.0554 20.2561 15.606 19.879 15.606 19.879C13.3414 16.5758 14.0328 12.8642 17.336 10.5995L16.3622 5.72586C16.3622 5.72586 15.9985 4.44169 17.282 4.07727C18.5661 3.71351 18.9306 4.99767 18.9306 4.99767L20.0552 8.33757C20.5011 9.66178 20.9756 10.9813 21.6037 12.2294C23.3771 15.7536 22.3178 20.1333 18.9739 22.4273C15.3263 24.9283 10.3399 23.9985 7.83828 20.3516L1.79857 11.5433Z"
                                        fill="#FFDC5D"></path>
                                    <path
                                        d="M8.00913 21.3583C5.33934 21.3583 2.64153 18.6605 2.64153 15.9907C2.64153 15.6216 2.37122 15.3232 2.00212 15.3232C1.63302 15.3232 1.30664 15.6216 1.30664 15.9907C1.30664 19.9954 4.00445 22.6932 8.00913 22.6932C8.37822 22.6932 8.67657 22.3668 8.67657 21.9977C8.67657 21.6286 8.37822 21.3583 8.00913 21.3583Z"
                                        fill="#5DADEC"></path>
                                    <path
                                        d="M4.67212 22.6649C2.66978 22.6649 1.33489 21.33 1.33489 19.3277C1.33489 18.9586 1.03654 18.6602 0.667445 18.6602C0.298348 18.6602 0 18.9586 0 19.3277C0 21.9974 2.00234 23.9998 4.67212 23.9998C5.04121 23.9998 5.33956 23.7014 5.33956 23.3323C5.33956 22.9632 5.04121 22.6649 4.67212 22.6649ZM16.0187 1.30664C15.6503 1.30664 15.3512 1.60566 15.3512 1.97409C15.3512 2.34252 15.6503 2.64153 16.0187 2.64153C18.6885 2.64153 21.3583 5.03699 21.3583 7.98109C21.3583 8.34952 21.6573 8.64854 22.0257 8.64854C22.3941 8.64854 22.6931 8.34952 22.6931 7.98109C22.6931 4.3008 20.0234 1.30664 16.0187 1.30664Z"
                                        fill="#5DADEC"></path>
                                    <path
                                        d="M19.3559 0C18.9875 0 18.6885 0.270983 18.6885 0.639413C18.6885 1.00784 18.9875 1.33489 19.3559 1.33489C21.3583 1.33489 22.6651 2.81996 22.6651 4.64408C22.6651 5.01251 22.9915 5.31153 23.3606 5.31153C23.7297 5.31153 24 5.01251 24 4.64408C24 2.0831 22.0257 0 19.3559 0Z"
                                        fill="#5DADEC"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8</span>
                            </button>
                            <button type="button"
                                class="py-1.5 px-3 inline-flex items-center rounded-lg bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700">
                                <svg aria-hidden="true" class="h-5 mr-2" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.75255 5.29787C7.67789 5.37254 7.62122 5.46254 7.57388 5.56121L7.56855 5.55587L0.0910439 22.4003L0.0983774 22.4076C-0.0402924 22.6763 0.191713 23.223 0.667057 23.699C1.1424 24.1743 1.68908 24.4063 1.95775 24.2676L1.96442 24.2743L18.8088 16.7961L18.8035 16.7901C18.9015 16.7435 18.9915 16.6868 19.0668 16.6108C20.1082 15.5694 18.4195 12.1927 15.2961 9.06862C12.1713 5.94455 8.79458 4.25651 7.75255 5.29787Z"
                                        fill="#DD2E44"></path>
                                    <path
                                        d="M8.66858 8.30273L0.279048 21.9737L0.0910439 22.3971L0.0983774 22.4044C-0.0402924 22.6731 0.191713 23.2197 0.667057 23.6958C0.821728 23.8504 0.982398 23.9678 1.13973 24.0671L11.3353 11.6361L8.66858 8.30273Z"
                                        fill="#EA596E"></path>
                                    <path
                                        d="M15.3439 9.01304C18.4573 12.1278 20.186 15.4479 19.2033 16.4292C18.2213 17.4119 14.9012 15.6839 11.7858 12.5705C8.67174 9.45572 6.9437 6.13431 7.92573 5.15228C8.90841 4.17026 12.2285 5.8983 15.3439 9.01304Z"
                                        fill="#A0041E"></path>
                                    <path
                                        d="M12.3913 9.37694C12.2587 9.48427 12.0853 9.54028 11.902 9.52028C11.3233 9.45761 10.8366 9.25627 10.496 8.93826C10.1353 8.60159 9.95727 8.14958 10.0059 7.6969C10.0913 6.90221 10.8886 6.17286 12.248 6.31953C12.7767 6.3762 13.0127 6.2062 13.0207 6.12486C13.03 6.04419 12.836 5.82752 12.3073 5.77019C11.7286 5.70752 11.242 5.50618 10.9006 5.18817C10.54 4.8515 10.3613 4.39949 10.4106 3.94681C10.4973 3.15213 11.294 2.42278 12.652 2.57011C13.0373 2.61145 13.2407 2.53211 13.3267 2.48078C13.3954 2.43878 13.4227 2.39878 13.4254 2.37544C13.4334 2.29477 13.242 2.0781 12.712 2.02077C12.346 1.98077 12.0807 1.65276 12.1213 1.28608C12.1607 0.920076 12.488 0.655404 12.8553 0.695405C14.2134 0.841408 14.8374 1.72343 14.7514 2.51878C14.6647 3.3148 13.868 4.04281 12.5087 3.89681C12.1233 3.85481 11.922 3.93481 11.8353 3.98615C11.7666 4.02748 11.7386 4.06815 11.736 4.09082C11.7273 4.17215 11.92 4.38816 12.45 4.44549C13.808 4.59216 14.432 5.47351 14.346 6.26887C14.26 7.06355 13.4634 7.7929 12.1047 7.64557C11.7193 7.60423 11.5166 7.68423 11.43 7.7349C11.3606 7.77757 11.334 7.81757 11.3313 7.84024C11.3226 7.9209 11.5153 8.13758 12.0447 8.19491C12.41 8.23491 12.676 8.56359 12.6353 8.92959C12.6167 9.11226 12.524 9.27027 12.3913 9.37694Z"
                                        fill="#AA8DD8"></path>
                                    <path
                                        d="M20.4411 15.5411C21.7565 15.1698 22.6638 15.7565 22.8798 16.5265C23.0958 17.2958 22.6278 18.2699 21.3131 18.6399C20.7998 18.7839 20.6458 19.0292 20.6665 19.1072C20.6891 19.1859 20.9498 19.3152 21.4618 19.1706C22.7765 18.8005 23.6839 19.3872 23.8999 20.1566C24.1172 20.9266 23.6479 21.8993 22.3325 22.27C21.8198 22.414 21.6651 22.66 21.6878 22.738C21.7098 22.816 21.9698 22.9453 22.4825 22.8013C22.8358 22.702 23.2052 22.908 23.3045 23.262C23.4032 23.6167 23.1972 23.9847 22.8425 24.0847C21.5285 24.4547 20.6205 23.8693 20.4031 23.0986C20.1871 22.3293 20.6558 21.3566 21.9718 20.9859C22.4852 20.8413 22.6392 20.5966 22.6165 20.5179C22.5952 20.4399 22.3352 20.3099 21.8232 20.4539C20.5071 20.8246 19.6004 20.2392 19.3838 19.4679C19.1671 18.6985 19.6358 17.7259 20.9511 17.3545C21.4631 17.2112 21.6171 16.9645 21.5958 16.8872C21.5731 16.8085 21.3138 16.6792 20.8011 16.8232C20.4465 16.9232 20.0791 16.7165 19.9791 16.3625C19.8798 16.0092 20.0864 15.6411 20.4411 15.5411Z"
                                        fill="#77B255"></path>
                                    <path
                                        d="M15.3333 13.7449C15.1373 13.7449 14.9439 13.6589 14.8119 13.4949C14.5819 13.2069 14.6292 12.7875 14.9159 12.5575C15.0612 12.4409 18.528 9.71812 23.4274 10.4188C23.7921 10.4708 24.0455 10.8081 23.9935 11.1728C23.9415 11.5368 23.6068 11.7928 23.2388 11.7382C18.91 11.1235 15.7806 13.5742 15.7499 13.5989C15.6259 13.6975 15.4793 13.7449 15.3333 13.7449Z"
                                        fill="#AA8DD8"></path>
                                    <path
                                        d="M3.83539 10.9697C3.77205 10.9697 3.70739 10.9604 3.64338 10.9417C3.29071 10.8357 3.0907 10.4643 3.19671 10.1117C3.95206 7.59628 4.63674 3.58219 3.79539 2.5355C3.70138 2.41683 3.55938 2.30016 3.23404 2.32483C2.60869 2.37283 2.66803 3.69219 2.66869 3.70552C2.69669 4.07287 2.42069 4.39287 2.05401 4.42021C1.68134 4.44287 1.36666 4.1722 1.33933 3.80486C1.27066 2.8855 1.55667 1.1148 3.13404 0.995461C3.83805 0.942127 4.42273 1.1868 4.83541 1.70014C6.41611 3.66752 4.81141 9.37099 4.47407 10.495C4.3874 10.7837 4.12206 10.9697 3.83539 10.9697Z"
                                        fill="#77B255"></path>
                                    <path
                                        d="M16.999 7.63774C17.5513 7.63774 17.9991 7.19002 17.9991 6.63772C17.9991 6.08542 17.5513 5.6377 16.999 5.6377C16.4467 5.6377 15.999 6.08542 15.999 6.63772C15.999 7.19002 16.4467 7.63774 16.999 7.63774Z"
                                        fill="#5C913B"></path>
                                    <path
                                        d="M1.33336 13.6355C2.06976 13.6355 2.66673 13.0385 2.66673 12.3021C2.66673 11.5657 2.06976 10.9688 1.33336 10.9688C0.596967 10.9688 0 11.5657 0 12.3021C0 13.0385 0.596967 13.6355 1.33336 13.6355Z"
                                        fill="#9266CC"></path>
                                    <path
                                        d="M21.666 14.3047C22.2183 14.3047 22.6661 13.857 22.6661 13.3047C22.6661 12.7524 22.2183 12.3047 21.666 12.3047C21.1137 12.3047 20.666 12.7524 20.666 13.3047C20.666 13.857 21.1137 14.3047 21.666 14.3047Z"
                                        fill="#5C913B"></path>
                                    <path
                                        d="M15.666 22.3038C16.2183 22.3038 16.6661 21.856 16.6661 21.3037C16.6661 20.7514 16.2183 20.3037 15.666 20.3037C15.1137 20.3037 14.666 20.7514 14.666 21.3037C14.666 21.856 15.1137 22.3038 15.666 22.3038Z"
                                        fill="#5C913B"></path>
                                    <path
                                        d="M18.6683 4.30052C19.4047 4.30052 20.0017 3.70355 20.0017 2.96715C20.0017 2.23076 19.4047 1.63379 18.6683 1.63379C17.9319 1.63379 17.335 2.23076 17.335 2.96715C17.335 3.70355 17.9319 4.30052 18.6683 4.30052Z"
                                        fill="#FFCC4D"></path>
                                    <path
                                        d="M21.6699 6.9688C22.2222 6.9688 22.67 6.52107 22.67 5.96877C22.67 5.41648 22.2222 4.96875 21.6699 4.96875C21.1176 4.96875 20.6699 5.41648 20.6699 5.96877C20.6699 6.52107 21.1176 6.9688 21.6699 6.9688Z"
                                        fill="#FFCC4D"></path>
                                    <path
                                        d="M19.668 9.63384C20.2203 9.63384 20.668 9.18611 20.668 8.63381C20.668 8.08151 20.2203 7.63379 19.668 7.63379C19.1157 7.63379 18.668 8.08151 18.668 8.63381C18.668 9.18611 19.1157 9.63384 19.668 9.63384Z"
                                        fill="#FFCC4D"></path>
                                    <path
                                        d="M5.00198 16.9668C5.55427 16.9668 6.002 16.5191 6.002 15.9668C6.002 15.4145 5.55427 14.9668 5.00198 14.9668C4.44968 14.9668 4.00195 15.4145 4.00195 15.9668C4.00195 16.5191 4.44968 16.9668 5.00198 16.9668Z"
                                        fill="#FFCC4D"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">3</span>
                            </button>
                        </div>
                    </article>
                </form>
            </div>
            <!-- VAL. COMERCIO -->
            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Valoracions del comerç</h3>
                    <a href="#"
                        class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                        View all
                    </a>
                </div>
                <!-- Chat -->
                <form class="overflow-y-auto lg:max-h-[60rem] 2xl:max-h-fit">
                    <article class="mb-5">
                        <footer class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <img class="w-6 h-6 mr-2 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                        alt="Michael Gough">Michael Gough
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate=""
                                        datetime="2022-02-08" title="February 8th, 2022"> 01/03/2023 4:15 PM</time></p>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment1"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600"
                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1119px, 1054px);"
                                data-popper-escaped="" data-popper-placement="top" data-popper-reference-hidden="">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <p class="mb-2 text-gray-900 dark:text-white">
                            Hello <a href="#"
                                class="font-medium hover:underline text-primary-600 dark:text-primary-500">@designteam</a>
                            Let's schedule a kick-off meeting and workshop this week. It would be great to gather
                            everyone involved in the design project. Let me know about your availability in the thread.
                        </p>
                        <p class="mb-3 text-gray-900 dark:text-white">Looking forward to it! Thanks.</p>
                        <a href="#"
                            class="inline-flex items-center text-xs font-medium text-primary-700 sm:text-sm dark:text-primary-500">
                            4 replies
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z">
                                </path>
                            </svg>
                        </a>
                    </article>
                    <article class="mb-5">
                        <footer class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <img class="w-6 h-6 mr-2 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                        alt="Bonnie avatar">Bonnie Green
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate=""
                                        datetime="2022-02-08" title="February 8th, 2022"> 01/03/2023 4:15 PM</time></p>
                            </div>
                            <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment2"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-36 dark:bg-gray-700 dark:divide-gray-600"
                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1119px, 1234px);"
                                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <p class="mb-3 text-gray-900 dark:text-white">Hello everyone,</p>
                        <p class="mb-2 text-gray-900 dark:text-white">
                            Thank you for the workshop, it was very productive meeting. I can't wait to start working on
                            this new project with you guys. But first things first, I'am waiting for the offer and pitch
                            deck from you. It would be great to get it by the end o the month.
                        </p>
                        <p class="mb-3 text-gray-900 dark:text-white">Cheers!</p>
                        <div class="flex items-center mb-2 space-x-2">
                            <button type="button"
                                class="py-1.5 px-3 inline-flex items-center rounded-lg bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700">
                                <svg aria-hidden="true" class="h-5 mr-2" viewBox="0 0 24 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24 14.1907C24 12.7352 23.7409 11.3397 23.2659 10.0486C22.9412 13.8526 20.9132 15.8065 18.7941 14.8966C16.8092 14.0439 18.1468 10.7199 18.2456 9.13377C18.4122 6.44506 18.2372 3.36742 13.3532 0.808594C15.3826 4.69095 13.5882 7.10295 11.7064 7.24977C9.61835 7.41283 7.70612 5.45542 8.412 2.27895C6.12635 3.96318 6.06 6.79801 6.76518 8.63189C7.50071 10.5434 6.73553 12.1317 4.94188 12.3081C2.93718 12.5058 1.82329 10.1615 2.85035 6.42601C1.07294 8.51895 0 11.2295 0 14.1907C0 20.8182 5.37247 26.1907 12 26.1907C18.6275 26.1907 24 20.8182 24 14.1907Z"
                                        fill="#F4900C"></path>
                                    <path
                                        d="M19.3349 17.7211C19.4393 19.8981 17.5271 20.7515 16.4979 20.3393C15.0113 19.7442 15.4102 18.7221 15.0276 16.6044C14.645 14.4868 13.1746 13.0164 10.9984 12.3691C12.5866 16.8395 10.1182 18.487 8.82428 18.7814C7.50287 19.0821 6.17511 18.7807 6.02334 15.9529C4.4817 17.4875 3.52734 19.6108 3.52734 21.9571C3.52734 22.2169 3.54358 22.4724 3.56617 22.7266C5.73323 24.8682 8.70993 26.1924 11.9979 26.1924C15.2859 26.1924 18.2626 24.8682 20.4297 22.7266C20.4523 22.4724 20.4685 22.2169 20.4685 21.9571C20.4685 20.4134 20.0563 18.967 19.3349 17.7211Z"
                                        fill="#FFCC4D"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">14</span>
                            </button>
                            <button type="button"
                                class="py-1.5 px-3 inline-flex items-center rounded-lg bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700">
                                <svg aria-hidden="true" class="h-5 mr-2" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.24467 6.07733C3.87207 5.63882 4.81784 5.72291 5.38116 6.18812L4.73508 5.24903C4.21514 4.5075 4.40135 3.70523 5.14355 3.18462C5.88575 2.66601 7.98887 4.06031 7.98887 4.06031C7.46426 3.31143 7.56238 2.36233 8.31125 1.83705C9.06012 1.31377 10.0933 1.49465 10.6179 2.24486L17.5727 12.0697L16.6864 20.663L9.28906 17.9652L2.83686 8.3987C2.30758 7.64516 2.49046 6.60594 3.24467 6.07733Z"
                                        fill="#EF9645"></path>
                                    <path
                                        d="M1.79857 11.5433C1.79857 11.5433 1.04302 10.442 2.14497 9.68715C3.24559 8.93226 4.00047 10.0329 4.00047 10.0329L7.50523 15.1442C7.62603 14.9426 7.75819 14.7437 7.90569 14.5475L3.04135 7.45454C3.04135 7.45454 2.28647 6.35392 3.38775 5.59904C4.48837 4.84416 5.24325 5.94478 5.24325 5.94478L9.81859 12.6172C9.98879 12.4784 10.163 12.3389 10.3425 12.2021L5.03835 4.46572C5.03835 4.46572 4.28347 3.3651 5.38475 2.61022C6.48537 1.85534 7.24025 2.95596 7.24025 2.95596L12.5444 10.691C12.7393 10.5715 12.9322 10.4681 13.1258 10.3586L8.168 3.12883C8.168 3.12883 7.41312 2.02821 8.51373 1.27333C9.61435 0.518448 10.3692 1.61907 10.3692 1.61907L15.6113 9.26398L16.4083 10.4267C13.1058 12.692 12.7914 16.9536 14.6783 19.7055C15.0554 20.2561 15.606 19.879 15.606 19.879C13.3414 16.5758 14.0328 12.8642 17.336 10.5995L16.3622 5.72586C16.3622 5.72586 15.9985 4.44169 17.282 4.07727C18.5661 3.71351 18.9306 4.99767 18.9306 4.99767L20.0552 8.33757C20.5011 9.66178 20.9756 10.9813 21.6037 12.2294C23.3771 15.7536 22.3178 20.1333 18.9739 22.4273C15.3263 24.9283 10.3399 23.9985 7.83828 20.3516L1.79857 11.5433Z"
                                        fill="#FFDC5D"></path>
                                    <path
                                        d="M8.00913 21.3583C5.33934 21.3583 2.64153 18.6605 2.64153 15.9907C2.64153 15.6216 2.37122 15.3232 2.00212 15.3232C1.63302 15.3232 1.30664 15.6216 1.30664 15.9907C1.30664 19.9954 4.00445 22.6932 8.00913 22.6932C8.37822 22.6932 8.67657 22.3668 8.67657 21.9977C8.67657 21.6286 8.37822 21.3583 8.00913 21.3583Z"
                                        fill="#5DADEC"></path>
                                    <path
                                        d="M4.67212 22.6649C2.66978 22.6649 1.33489 21.33 1.33489 19.3277C1.33489 18.9586 1.03654 18.6602 0.667445 18.6602C0.298348 18.6602 0 18.9586 0 19.3277C0 21.9974 2.00234 23.9998 4.67212 23.9998C5.04121 23.9998 5.33956 23.7014 5.33956 23.3323C5.33956 22.9632 5.04121 22.6649 4.67212 22.6649ZM16.0187 1.30664C15.6503 1.30664 15.3512 1.60566 15.3512 1.97409C15.3512 2.34252 15.6503 2.64153 16.0187 2.64153C18.6885 2.64153 21.3583 5.03699 21.3583 7.98109C21.3583 8.34952 21.6573 8.64854 22.0257 8.64854C22.3941 8.64854 22.6931 8.34952 22.6931 7.98109C22.6931 4.3008 20.0234 1.30664 16.0187 1.30664Z"
                                        fill="#5DADEC"></path>
                                    <path
                                        d="M19.3559 0C18.9875 0 18.6885 0.270983 18.6885 0.639413C18.6885 1.00784 18.9875 1.33489 19.3559 1.33489C21.3583 1.33489 22.6651 2.81996 22.6651 4.64408C22.6651 5.01251 22.9915 5.31153 23.3606 5.31153C23.7297 5.31153 24 5.01251 24 4.64408C24 2.0831 22.0257 0 19.3559 0Z"
                                        fill="#5DADEC"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8</span>
                            </button>
                            <button type="button"
                                class="py-1.5 px-3 inline-flex items-center rounded-lg bg-gray-100 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700">
                                <svg aria-hidden="true" class="h-5 mr-2" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.75255 5.29787C7.67789 5.37254 7.62122 5.46254 7.57388 5.56121L7.56855 5.55587L0.0910439 22.4003L0.0983774 22.4076C-0.0402924 22.6763 0.191713 23.223 0.667057 23.699C1.1424 24.1743 1.68908 24.4063 1.95775 24.2676L1.96442 24.2743L18.8088 16.7961L18.8035 16.7901C18.9015 16.7435 18.9915 16.6868 19.0668 16.6108C20.1082 15.5694 18.4195 12.1927 15.2961 9.06862C12.1713 5.94455 8.79458 4.25651 7.75255 5.29787Z"
                                        fill="#DD2E44"></path>
                                    <path
                                        d="M8.66858 8.30273L0.279048 21.9737L0.0910439 22.3971L0.0983774 22.4044C-0.0402924 22.6731 0.191713 23.2197 0.667057 23.6958C0.821728 23.8504 0.982398 23.9678 1.13973 24.0671L11.3353 11.6361L8.66858 8.30273Z"
                                        fill="#EA596E"></path>
                                    <path
                                        d="M15.3439 9.01304C18.4573 12.1278 20.186 15.4479 19.2033 16.4292C18.2213 17.4119 14.9012 15.6839 11.7858 12.5705C8.67174 9.45572 6.9437 6.13431 7.92573 5.15228C8.90841 4.17026 12.2285 5.8983 15.3439 9.01304Z"
                                        fill="#A0041E"></path>
                                    <path
                                        d="M12.3913 9.37694C12.2587 9.48427 12.0853 9.54028 11.902 9.52028C11.3233 9.45761 10.8366 9.25627 10.496 8.93826C10.1353 8.60159 9.95727 8.14958 10.0059 7.6969C10.0913 6.90221 10.8886 6.17286 12.248 6.31953C12.7767 6.3762 13.0127 6.2062 13.0207 6.12486C13.03 6.04419 12.836 5.82752 12.3073 5.77019C11.7286 5.70752 11.242 5.50618 10.9006 5.18817C10.54 4.8515 10.3613 4.39949 10.4106 3.94681C10.4973 3.15213 11.294 2.42278 12.652 2.57011C13.0373 2.61145 13.2407 2.53211 13.3267 2.48078C13.3954 2.43878 13.4227 2.39878 13.4254 2.37544C13.4334 2.29477 13.242 2.0781 12.712 2.02077C12.346 1.98077 12.0807 1.65276 12.1213 1.28608C12.1607 0.920076 12.488 0.655404 12.8553 0.695405C14.2134 0.841408 14.8374 1.72343 14.7514 2.51878C14.6647 3.3148 13.868 4.04281 12.5087 3.89681C12.1233 3.85481 11.922 3.93481 11.8353 3.98615C11.7666 4.02748 11.7386 4.06815 11.736 4.09082C11.7273 4.17215 11.92 4.38816 12.45 4.44549C13.808 4.59216 14.432 5.47351 14.346 6.26887C14.26 7.06355 13.4634 7.7929 12.1047 7.64557C11.7193 7.60423 11.5166 7.68423 11.43 7.7349C11.3606 7.77757 11.334 7.81757 11.3313 7.84024C11.3226 7.9209 11.5153 8.13758 12.0447 8.19491C12.41 8.23491 12.676 8.56359 12.6353 8.92959C12.6167 9.11226 12.524 9.27027 12.3913 9.37694Z"
                                        fill="#AA8DD8"></path>
                                    <path
                                        d="M20.4411 15.5411C21.7565 15.1698 22.6638 15.7565 22.8798 16.5265C23.0958 17.2958 22.6278 18.2699 21.3131 18.6399C20.7998 18.7839 20.6458 19.0292 20.6665 19.1072C20.6891 19.1859 20.9498 19.3152 21.4618 19.1706C22.7765 18.8005 23.6839 19.3872 23.8999 20.1566C24.1172 20.9266 23.6479 21.8993 22.3325 22.27C21.8198 22.414 21.6651 22.66 21.6878 22.738C21.7098 22.816 21.9698 22.9453 22.4825 22.8013C22.8358 22.702 23.2052 22.908 23.3045 23.262C23.4032 23.6167 23.1972 23.9847 22.8425 24.0847C21.5285 24.4547 20.6205 23.8693 20.4031 23.0986C20.1871 22.3293 20.6558 21.3566 21.9718 20.9859C22.4852 20.8413 22.6392 20.5966 22.6165 20.5179C22.5952 20.4399 22.3352 20.3099 21.8232 20.4539C20.5071 20.8246 19.6004 20.2392 19.3838 19.4679C19.1671 18.6985 19.6358 17.7259 20.9511 17.3545C21.4631 17.2112 21.6171 16.9645 21.5958 16.8872C21.5731 16.8085 21.3138 16.6792 20.8011 16.8232C20.4465 16.9232 20.0791 16.7165 19.9791 16.3625C19.8798 16.0092 20.0864 15.6411 20.4411 15.5411Z"
                                        fill="#77B255"></path>
                                    <path
                                        d="M15.3333 13.7449C15.1373 13.7449 14.9439 13.6589 14.8119 13.4949C14.5819 13.2069 14.6292 12.7875 14.9159 12.5575C15.0612 12.4409 18.528 9.71812 23.4274 10.4188C23.7921 10.4708 24.0455 10.8081 23.9935 11.1728C23.9415 11.5368 23.6068 11.7928 23.2388 11.7382C18.91 11.1235 15.7806 13.5742 15.7499 13.5989C15.6259 13.6975 15.4793 13.7449 15.3333 13.7449Z"
                                        fill="#AA8DD8"></path>
                                    <path
                                        d="M3.83539 10.9697C3.77205 10.9697 3.70739 10.9604 3.64338 10.9417C3.29071 10.8357 3.0907 10.4643 3.19671 10.1117C3.95206 7.59628 4.63674 3.58219 3.79539 2.5355C3.70138 2.41683 3.55938 2.30016 3.23404 2.32483C2.60869 2.37283 2.66803 3.69219 2.66869 3.70552C2.69669 4.07287 2.42069 4.39287 2.05401 4.42021C1.68134 4.44287 1.36666 4.1722 1.33933 3.80486C1.27066 2.8855 1.55667 1.1148 3.13404 0.995461C3.83805 0.942127 4.42273 1.1868 4.83541 1.70014C6.41611 3.66752 4.81141 9.37099 4.47407 10.495C4.3874 10.7837 4.12206 10.9697 3.83539 10.9697Z"
                                        fill="#77B255"></path>
                                    <path
                                        d="M16.999 7.63774C17.5513 7.63774 17.9991 7.19002 17.9991 6.63772C17.9991 6.08542 17.5513 5.6377 16.999 5.6377C16.4467 5.6377 15.999 6.08542 15.999 6.63772C15.999 7.19002 16.4467 7.63774 16.999 7.63774Z"
                                        fill="#5C913B"></path>
                                    <path
                                        d="M1.33336 13.6355C2.06976 13.6355 2.66673 13.0385 2.66673 12.3021C2.66673 11.5657 2.06976 10.9688 1.33336 10.9688C0.596967 10.9688 0 11.5657 0 12.3021C0 13.0385 0.596967 13.6355 1.33336 13.6355Z"
                                        fill="#9266CC"></path>
                                    <path
                                        d="M21.666 14.3047C22.2183 14.3047 22.6661 13.857 22.6661 13.3047C22.6661 12.7524 22.2183 12.3047 21.666 12.3047C21.1137 12.3047 20.666 12.7524 20.666 13.3047C20.666 13.857 21.1137 14.3047 21.666 14.3047Z"
                                        fill="#5C913B"></path>
                                    <path
                                        d="M15.666 22.3038C16.2183 22.3038 16.6661 21.856 16.6661 21.3037C16.6661 20.7514 16.2183 20.3037 15.666 20.3037C15.1137 20.3037 14.666 20.7514 14.666 21.3037C14.666 21.856 15.1137 22.3038 15.666 22.3038Z"
                                        fill="#5C913B"></path>
                                    <path
                                        d="M18.6683 4.30052C19.4047 4.30052 20.0017 3.70355 20.0017 2.96715C20.0017 2.23076 19.4047 1.63379 18.6683 1.63379C17.9319 1.63379 17.335 2.23076 17.335 2.96715C17.335 3.70355 17.9319 4.30052 18.6683 4.30052Z"
                                        fill="#FFCC4D"></path>
                                    <path
                                        d="M21.6699 6.9688C22.2222 6.9688 22.67 6.52107 22.67 5.96877C22.67 5.41648 22.2222 4.96875 21.6699 4.96875C21.1176 4.96875 20.6699 5.41648 20.6699 5.96877C20.6699 6.52107 21.1176 6.9688 21.6699 6.9688Z"
                                        fill="#FFCC4D"></path>
                                    <path
                                        d="M19.668 9.63384C20.2203 9.63384 20.668 9.18611 20.668 8.63381C20.668 8.08151 20.2203 7.63379 19.668 7.63379C19.1157 7.63379 18.668 8.08151 18.668 8.63381C18.668 9.18611 19.1157 9.63384 19.668 9.63384Z"
                                        fill="#FFCC4D"></path>
                                    <path
                                        d="M5.00198 16.9668C5.55427 16.9668 6.002 16.5191 6.002 15.9668C6.002 15.4145 5.55427 14.9668 5.00198 14.9668C4.44968 14.9668 4.00195 15.4145 4.00195 15.9668C4.00195 16.5191 4.44968 16.9668 5.00198 16.9668Z"
                                        fill="#FFCC4D"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">3</span>
                            </button>
                        </div>
                    </article>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.glassmorphism {
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}
</style>