<div class="relative overflow-hidden">
	<div class="absolute top-0 left-0 w-full z-10 border border-white rounded-[12px] overflow-hidden xl:zoom-80">
		<ul class="marquee flex flex-nowrap w-max space-x-6 font-bold bg-green text-white text-[22px] tracking-normal rounded-[12px] overflow-hidden py-2">
			<li class="inline-block w-max">2023/11/16 22°C  最新祭典活動開始了!快到霧峰遊玩</li>
			<li class="inline-block w-max">2023/11/16 22°C  最新祭典活動開始了!快到霧峰遊玩</li>
			<li class="inline-block w-max">2023/11/16 22°C  最新祭典活動開始了!快到霧峰遊玩</li>
		</ul>
	</div>

	<div class="h-screen relative" id="vegasWrap" v-scope="{}" v-on:vue:mounted="autosliderHandler($el)"></div>

	<!-- <ul v-scope="{
		posts: [
			'images/slider-pic-1.jpg',
			'images/slider-pic-2.jpg',
			'images/slider-pic-3.jpg',
			'images/slider-pic-4.jpg',
		]
	}" v-on:vue:mounted="autosliderHandler($el)" id="autoslider">
		<li v-for="pic in posts" class="w-full h-full" :style="'background: url('+pic+') center center /cover;'"></li>
	</ul> -->
</div>