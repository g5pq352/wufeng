<html>
<head>
	<?php include 'html_head.php'; ?>
</head>

<body>
	<?php include 'topmenu.php'; ?>

	<div class="mt-[132px] mb-[92px]">
		<div class="-ml-3 -mb-[112px]"><img src="images/news-deco.svg"></div>
		<div class="text-center">
			<div class="font-bold text-[28px]">活動情報</div>
			<div class="font-en text-gray-400 text-4xl">#News</div>
		</div>
	</div>

	<div class="px-4 mb-[112px]">
		<ul v-scope="{
			posts: [{
				pic: 'images/news-1.jpg',
				title: `迎接霧峰，<br>共襄文化盛宴！`,
				note: `在全世界最大戲台<br>辦文化祭。`,
				link: `news/迎接霧峰，共襄文化盛宴！`,
			}, {
				pic: 'images/news-2.jpg',
				title: `最新活動!<br>一日農夫!!`,
				note: `小公務員不可能的<br>清酒任務`,
				link: `news/最新活動!一日農夫!!`,
			}, {
				pic: 'images/news-3.jpg',
				title: `2023霧峰必吃美食`,
				note: `一場以農為本的<br>創意餐點。`,
				link: `news/2023霧峰必吃美食`,
			}, {
				pic: 'images/news-4.jpg',
				title: `農旅開跑了!`,
				note: `了解更多<br>霧峰農業與生態。`,
				link: `news/農旅開跑了!`,
			}, {
				pic: 'images/news-5.jpg',
				title: `國際賞鳥活動!`,
				note: `獨特的生態系統<br>黑翅鳶與霧峰米。`,
				link: `news/國際賞鳥活動!`,
			}, {
				pic: 'images/news-6.jpg',
				title: `宮保第<br>最新活動`,
				note: `在花廳，度曲臨風Ⅳ<br>女怕嫁錯郎`,
				link: `news/宮保第最新活動`,
			}, {
				pic: 'images/news-7.jpg',
				title: `初霧純米吟釀`,
				note: `初露周年慶<br>兩人同行一人免費!<br>一同見證霧峰香米傳奇`,
				link: `news/初霧純米吟釀`,
			}]
		}" class="space-y-4">
			<li v-for="p in posts" class="category-border-radius bg-white p-3"><a :href="p.link">
				<div class="flex">
					<div class="mr-3 max-w-[45%]"><img :src="p.pic" class="rounded-2xl"></div>
					<div class="">
						<div class="font-en text-sm font-light text-gray-300 mb-4">Oct 19, 2013</div>
						<div class="font-bold text-xl mb-2" v-html="p.title"></div>
						<div class="text-sm text-gray-300" v-html="p.note"></div>
					</div>
				</div>
			</a></li>
		</ul>

		<div class="mt-[58px] mb-5">
			<div class="flex items-center justify-center font-en font-medium">
				<a href="javascript:;" class="mr-6"><svg width="42.84" height="42.84" viewBox="0 0 42.84 42.84">
					<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
					<g>
					<rect x="19.57" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
					<polygon points="13.38 21.42 20.17 24.33 20.17 18.52 13.38 21.42" style="fill: #fff;"/>
					</g>
				</svg></a>


				<a href="javascript:;" class="text-black text-3xl">2</a>
				<a href="javascript:;" class="text-gray-400 page-total mt-1">5</a>


				<a href="javascript:;" class="ml-6"><svg width="42.84" height="42.84" viewBox="0 0 42.84 42.84">
					<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
					<g>
					<rect x="15.67" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
					<polygon points="29.46 21.42 22.68 18.52 22.68 24.33 29.46 21.42" style="fill: #fff;"/>
					</g>
				</svg></a>
			</div>
		</div>

		<div class="">
			<div class="text-white font-en bg-gray-400 py-4 rounded-t-[28px] rounded-br-[28px]"><a href="javascript:;" class="flex items-center justify-center">
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

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>

</script>