<html>
<head>
	<?php include 'html_head.php'; ?>

	<style type="text/css">
	.fade-enter-active, .fade-leave-active {
		transition: opacity .15s;
	}
	.fade-enter, .fade-leave-to {
		opacity: 0;
	}
	</style>
</head>

<body>
	<?php include 'topmenu.php'; ?>

	<div class="flex lg:block lg:mr-0">
		<div class="w-[50vw] xl:w-[50vw] h-screen sticky top-0 lg:hidden">
			<?php include 'desktop_slider.php'; ?>
		</div>
		<div class="w-[35vw] xl:w-[33vw] lg:w-full">
			<!--  -->
			<div class="px-4 mt-[92px] mb-[110px]">
				<div class="bg-blue category-border-radius mb-9">
					<div class="flex items-center px-7 py-7 text-white">
						<div class="min-w-[134px] mr-4"><img src="images/traffic-1.svg" class="mx-auto"></div>
						<div class="">
							<div class="font-bold text-[56px]">公車</div>
							<div class="font-en">Bus Route</div>
						</div>
					</div>
				</div>

				<div class="mb-28" id="app">
					<section class="pb-16 border-b border-white mb-10">
						<div class="font-bold text-5xl text-blue mb-7"><span class="text-sm">出發站：</span>台中火車站</div>
						<ul class="flex items-center space-x-6">
							<li class="text-orange-300 px-4 py-2 font-mono text-5xl category-border-radius basic-hover" :class="[ cat1 == 0 ? 'bg-blue': 'bg-gray-400']" @click="cat1Handler(0)">A</li>
							<li class="text-orange-300 px-4 py-2 font-mono text-5xl category-border-radius basic-hover" :class="[ cat1 == 1 ? 'bg-blue': 'bg-gray-400']" @click="cat1Handler(1)">B</li>
							<li class="text-orange-300 px-4 py-2 font-mono text-5xl category-border-radius basic-hover" :class="[ cat1 == 2 ? 'bg-blue': 'bg-gray-400']" @click="cat1Handler(2)">C</li>
						</ul>
						<article class="mt-7">
							<transition name="fade" mode="out-in">
								<div class="relative" v-if="cat1 == 0" key="a0">
									<div class="absolute top-0 left-[52px] border-l border-dashed border-blue h-full"></div>
									<ul class="timetableList space-y-6 ml-[94px]">
										<li>
											<div class="title font-bold">台中火車站</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行3分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中車站(臺灣大道)</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>200中興幹線</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">霧峰郵局</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行４分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中市立圖書館<br>（霧峰以文分館 U-Bike站）</div>
										</li>
									</ul>
								</div>
								<div class="relative" v-if="cat1 == 1" key="a1">
									<div class="absolute top-0 left-[52px] border-l border-dashed border-blue h-full"></div>
									<ul class="timetableList space-y-6 ml-[94px]">
										<li>
											<div class="title font-bold">台中火車站</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行4分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中車站(成功路口)</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>58/68 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">南門仔</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>200中興幹線</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">霧峰郵局</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行4分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中市立圖書館<br>（霧峰以文分館 U-Bike站）</div>
										</li>
									</ul>
								</div>
								<div class="relative" v-if="cat1 == 2" key="a2">
									<div class="absolute top-0 left-[52px] border-l border-dashed border-blue h-full"></div>
									<ul class="timetableList space-y-6 ml-[94px]">
										<li>
											<div class="title font-bold">台中火車站</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行1分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">臺中車站D月台</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>131 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">下內新</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>綠3 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">霧峰郵局</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行4分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中市立圖書館<br>（霧峰以文分館 U-Bike站）</div>
										</li>
									</ul>
								</div>
							</transition>
						</article>
					</section>

					<section>
						<div class="font-bold text-5xl text-blue mb-7"><span class="text-sm">出發站：</span>台中高鐵站</div>
						<ul class="flex items-center space-x-6">
							<li class="text-orange-300 px-4 py-2 font-mono text-5xl category-border-radius basic-hover" :class="[ cat2 == 0 ? 'bg-blue': 'bg-gray-400']" @click="cat2Handler(0)">A</li>
							<li class="text-orange-300 px-4 py-2 font-mono text-5xl category-border-radius basic-hover" :class="[ cat2 == 1 ? 'bg-blue': 'bg-gray-400']" @click="cat2Handler(1)">B</li>
							<li class="text-orange-300 px-4 py-2 font-mono text-5xl category-border-radius basic-hover" :class="[ cat2 == 2 ? 'bg-blue': 'bg-gray-400']" @click="cat2Handler(2)">C</li>
						</ul>
						<article class="mt-7">
							<transition name="fade" mode="out-in">
								<div class="relative" v-if="cat2 == 0" key="aa0">
									<div class="absolute top-0 left-[52px] border-l border-dashed border-blue h-full"></div>
									<ul class="timetableList space-y-6 ml-[94px]">
										<li>
											<div class="title font-bold">台中高鐵站</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>綠1 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">豐樂公園</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>綠3 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">霧峰郵局</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行４分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中市立圖書館<br>（霧峰以文分館 U-Bike站）</div>
										</li>
									</ul>
								</div>
								<div class="relative" v-if="cat2 == 1" key="aa1">
									<div class="absolute top-0 left-[52px] border-l border-dashed border-blue h-full"></div>
									<ul class="timetableList space-y-6 ml-[94px]">
										<li>
											<div class="title font-bold">台中高鐵站</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>151 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">霧峰郵局</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行4分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中市立圖書館<br>（霧峰以文分館 U-Bike站）</div>
										</li>
									</ul>
								</div>
								<div class="relative" v-if="cat2 == 2" key="aa2">
									<div class="absolute top-0 left-[52px] border-l border-dashed border-blue h-full"></div>
									<ul class="timetableList space-y-6 ml-[94px]">
										<li>
											<div class="title font-bold">台中高鐵站</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>158 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中車站(臺灣大道)</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-2.svg"></div>
												<div>107 公車</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">霧峰郵局</div>
											<div class="text-gray-300 text-sm flex items-center relative mt-6">
												<div class="absolute -left-7 mt-[1px]"><img src="images/ts-1.svg"></div>
												<div>步行4分鐘</div>
											</div>
										</li>
										<li>
											<div class="title font-bold">台中市立圖書館<br>（霧峰以文分館 U-Bike站）</div>
										</li>
									</ul>
								</div>
							</transition>
						</article>
					</section>
				</div>

				<div class="mb-[68px] px-12">
					<div class="bg-white px-12 pt-3 pb-5 text-center category-border-radius">
						<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
						<div class="font-bold mb-4">霧峰</div>
						<div class=""><a href="" class="fancy-link" target="_blank"><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
					</div>
				</div>

				<div class="">
					<div class="text-white font-en bg-gray-400 py-4 rounded-t-[28px] rounded-br-[28px]"><a href="javascript:;" class="flex items-center justify-center" onclick="history.back()">
						<div class="flex items-center justify-center leading-none border-b border-dashed min-w-[100px]">
							<span><svg width="13.72" height="5.78" viewBox="0 0 13.72 5.78">
								<rect x="6.15" y="2.15" width="7.57" height="1.48" style="fill: #fff;"/>
								<polygon points="0 2.89 6.75 5.78 6.75 0 0 2.89" style="fill: #fff;"/>
							</svg></span>
							<span class="ml-2 li">back</span>
						</div>
					</a></div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>
new Vue({
	el: '#app',
	data: {
		cat1: 0,
		cat2: 0,
	},
	computed: {},
	methods: {
		cat1Handler(i) {
			this.cat1 = i
		},
		cat2Handler(i) {
			this.cat2 = i
		},
	},
	filters: {},
	mounted() {

	},
	updated() {},
})
</script>