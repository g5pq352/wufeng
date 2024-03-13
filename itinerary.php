<html>
<head>
	<?php include 'html_head.php'; ?>
</head>

<body>
	<?php include 'topmenu.php'; ?>

	<div class="mt-[132px] mb-[86px]">
		<div class="mb-7"><img src="images/itinerary-deco.svg" class="mx-auto"></div>
		<div class="text-center">
			<div class="font-bold text-[28px]">套裝行程</div>
			<div class="font-en text-gray-400 text-4xl">#Package Tour</div>
		</div>
	</div>

	<section v-scope="{
		posts: [{
			title: '文旅',
			tags: [
				'台灣最大的清代一品官宅宮保第暨建築群',
				'臺灣議會之父',
				'台灣民主發源地',
				'最大戲台',
			],
			pic: 'images/itinerary-1.jpg',
			date: '9:00',
			sliders: [{
				pic: 'images/itinerary-slider-1-1.jpg',
				title: '霧峰林家花園',
			}, {
				pic: 'images/itinerary-slider-1-2.jpg',
				title: '肉尬',
			}, {
				pic: 'images/itinerary-slider-1-3.jpg',
				title: '省議會紀念園區',
			}, {
				pic: 'images/itinerary-slider-1-1.jpg',
				title: '霧峰林家花園',
			}],
			link: `itinerary_detail.php`,
		}, {
			title: '食旅',
			tags: [
				'大自然的恩賜',
				'霧峰香米',
				'霧峰香蕉',
				'滿天星空',
				'特有生態',
			],
			pic: 'images/itinerary-2.jpg',
			date: '8:00',
			sliders: [{
				pic: 'images/itinerary-slider-2-1.jpg',
				title: '在地早餐',
			}, {
				pic: 'images/itinerary-slider-2-2.jpg',
				title: '肉粽嫂',
			}, {
				pic: 'images/itinerary-slider-2-3.jpg',
				title: '木瓜牛乳大王',
			}, {
				pic: 'images/itinerary-slider-2-4.jpg',
				title: '民生故事館',
			}],
			link: `itinerary_detail.php`,
		}, {
			title: '農旅',
			tags: [
				'初露純米吟釀',
				'益全香米',
				'生物防治',
				'黑翅鳶',
				'獨有生態',
			],
			pic: 'images/itinerary-3.jpg',
			date: '10:00',
			sliders: [{
				pic: 'images/itinerary-slider-3-1.jpg',
				title: '霧峰公園',
			}, {
				pic: 'images/itinerary-slider-3-2.jpg',
				title: '五福黑翅鳶',
			}, {
				pic: 'images/itinerary-slider-3-3.jpg',
				title: '肉尬',
			}, {
				pic: 'images/itinerary-slider-3-4.jpg',
				title: '初露吟釀',
			}],
			link: `itinerary_detail.php`,
		}]
	}" class="px-4 space-y-10 mb-[112px]">
		<article v-for="(p, i) in posts" class="">
			<div class="text-white category-border-radius py-7 px-4" :class="{
				'bg-blue': i == 0, 'bg-orange': i == 1, 'bg-green': i == 2
			}">
				<a :href="p.link">
					<div class="font-bold text-[56px] leading-none mb-3">{{p.title}}</div>
					<ul class="text-sm flex flex-wrap items-center space-y-1">
						<li v-for="tag in (p.tags)" class="rounded-full border border-white px-2 mr-1">#{{tag}}</li>
					</ul>
					<div class="mt-7 mb-4"><img :src="p.pic" class="rounded-2xl"></div>
					<div class="font-en font-medium text-[72px] leading-none relative z-10 -mb-4">{{p.date}}</div>
				</a>
				<div class="relative">
					<div class="absolute z-10 -top-[48px] right-0 flex space-x-2">
						<div class="itinerary-prev"><svg width="44" height="44" viewBox="0 0 43.8 43.8">
							<circle cx="21.9" cy="21.9" r="21.4" style="fill: none; stroke: #fff; stroke-miterlimit: 10;"/>
							<g>
								<rect x="20.1" y="21.2" width="7.6" height="1.5" style="fill: #fff;"/>
								<polygon points="13.9 21.9 20.7 24.8 20.7 19 13.9 21.9" style="fill: #fff;"/>
							</g>
						</svg></div>
						<div class="itinerary-next"><svg width="44" height="44" viewBox="0 0 43.8 43.8">
							<circle cx="21.9" cy="21.9" r="21.4" style="fill: none; stroke: #fff; stroke-miterlimit: 10;"/>
							<g>
								<rect x="16.2" y="21.2" width="7.6" height="1.5" style="fill: #fff;"/>
								<polygon points="30 21.9 23.2 19 23.2 24.8 30 21.9" style="fill: #fff;"/>
							</g>
						</svg></div>
					</div>
					<div class="relative">
						<ul v-scope="" v-on:vue:mounted="itineraryHandler($el)" class="itinerarySlider">
							<li v-for="(item, i) in (p.sliders)" class="w-[35%] mr-6">
								<div class="relative pic rounded-3xl overflow-hidden"><img :src="item.pic"></div>
								<div class="bg-white w-2 h-6 ml-2 -mt-2 relative"></div>
								<div class="absolute w-[120%] left-0 top-[112px] border-b border-dashed opacity-70"></div>
								<div class="ml-[7px] mt-1">
									<div class="w-max font-bold text-lg">{{item.title}}</div>
									<div class="font-en text-sm font-light opacity-70">0{{i+1}}</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="text-white font-en bg-gray-400 py-4 rounded-t-[28px] rounded-br-[28px]"><a :href="p.link" class="flex items-center justify-center">
				<div class="flex items-center justify-centerr leading-none border-b border-dashed min-w-[100px]">
					<span class="mr-2 li">read more</span>
					<span><svg width="13.72" height="5.78" viewBox="0 0 13.72 5.78">
						<rect x="0" y="2.15" width="7.57" height="1.48" style="fill: #fff;"/>
						<polygon points="13.72 2.89 6.97 0 6.97 5.78 13.72 2.89" style="fill: #fff;"/>
					</svg></span>
				</div>
			</a></div>
		</article>
	</section>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>
function itineraryHandler(el) {
	var $carousel = $(el).flickity({
		"prevNextButtons": false,
		"pageDots": false,
		"wrapAround": true,
		"autoPlay": 4000,
		"pauseAutoPlayOnHover": false,
		"imagesLoaded": true,
		"cellAlign": "left",
		"selectedAttraction": 0.02,
		"arrowShape": ""
	});

	$(".itinerary-prev").on("click", () => {
		$carousel.flickity('previous')
	})
	$(".itinerary-next").on("click", () => {
		$carousel.flickity('next')
	})
}
</script>