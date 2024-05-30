<html>
<head>
	<?php include 'html_head.php'; ?>
</head>

<body>
	<?php include 'topmenu.php'; ?>

	<div class="flex lg:block lg:mr-0">
		<div class="w-[50vw] xl:w-[50vw] h-screen sticky top-0 lg:hidden">
			<?php include 'desktop_slider.php'; ?>
		</div>
		<div class="w-[35vw] lg:w-full">
			<!--  -->
			<div class="px-4 mt-[66px] mb-[114px]">
				<div class="category-border-radius relative bg-green text-white px-4 pt-[22px] pb-16 mb-10">
					<div class="font-bold text-[70px] leading-none mb-3">農旅</div>
					<div class="font-en">Agricultural<br>Tourism</div>

					<div class="absolute font-en text-4xl bottom-[22px] right-4"><span class="text-[15px] mr-2">TWD</span>5,000</div>
				</div>

				<div class="">
					<ul v-scope="{
						posts: [{
							pic: 'images/itinerary-slider-3-1.jpg',
							date: '08:00',
							title: `霧峰公園`,
							note: `蜿蜒步徑穿越樹影婆娑，湖泊映照天空之美。此地為心靈寧靜角落，盡情沉醉大自然恩賜。`,
						}, {
							pic: 'images/itinerary-slider-3-2.jpg',
							date: '10:00',
							title: `五福黑翅鳶`,
							note: `五福社區設置棲架的緣由黑翅鳶1998年在台灣出現紀錄，2001年在雲林出現繁殖紀錄後，近年已在台灣平原成為普遍分布的猛禽。 這種體長約37cm，全身大致為醒目的黑白兩色，眼睛為紅色的猛禽除了會利用田間較高的樹枝作為覓食棲枝外，還會在空中定點振翅(又稱作懸停)尋找田間的獵物。`,
						}, {
							pic: 'images/itinerary-slider-3-3.jpg',
							date: '12:30',
							title: `肉尬`,
							note: `位於台中新開幕的「肉尬雞滷飯」是一間復古中式餐廳。使用在地霧峰香米製作，使用霧峰在地原料，吃的到最健康最不一樣的滷肉飯。`,
						}, {
							pic: 'images/itinerary-slider-3-4.jpg',
							date: '15:00',
							title: `初露吟釀`,
							note: `初霧吟釀清酒（如上圖），臺灣頂級清酒，以初霧燒酎為基酒釀造的清酒，生產具有代表性的台灣清酒，走黑色瓶身銀色的標籤，黑色字體，高檔質感，喝下一口，可感受清淡爽又帶香淳的風味，順口甘醇。`,
						}]
					}" class="space-y-4">
						<li v-for="(p, i) in posts" class="category-border-radius bg-white px-4 py-3">
							<div class="flex mb-3">
								<div class="mr-12"><img :src="p.pic" class="rounded-2xl"></div>
								<div class="">
									<div class="text-[#C8C9C9] font-en font-light text-right text-sm">Schedule 0{{i+1}}</div>
									<div class="text-green font-en font-medium text-8xl">{{p.date}}</div>
								</div>
							</div>
							<div class="font-bold text-xl mb-2">{{p.title}}</div>
							<div class="text-sm text-gray-300 text-justify">{{p.note}}</div>
						</li>
					</ul>
				</div>

				<div class="mt-[60px]">
					<div class="mb-5 px-6">
						<ul class="flex items-center justify-center text-center">
							<li class="bg-white pt-3 pb-5 category-border-radius min-w-[166px] mr-6">
								<div class="inline-block mb-1"><img src="images/menu-quick-1.svg"></div>
								<div class="font-bold mb-4">霧峰</div>
								<div class=""><a href=""><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">加入官方LINE</span></a></div>
							</li>
							<li class="">
								<nav class="grid grid-cols-2 gap-[14px]">
									<a href="javascript:;"><img src="images/share-1.svg"></a>
									<a href="javascript:;"><img src="images/share-2.svg"></a>
									<a href="javascript:;"><img src="images/share-3.svg"></a>
									<a href="javascript:;"><img src="images/share-4.svg"></a>
								</nav>
							</li>
						</ul>
					</div>

					<div class="space-y-4">
						<div class="text-white font-en bg-gray-400 py-4 rounded-t-[28px] rounded-br-[28px]"><a href="javascript:;" class="flex items-center justify-center">
							<div class="flex items-center justify-centerr leading-none border-b border-dashed min-w-[100px]">
								<span class="mr-2 li">read more</span>
								<span><svg width="13.72" height="5.78" viewBox="0 0 13.72 5.78">
									<rect x="0" y="2.15" width="7.57" height="1.48" style="fill: #fff;"/>
									<polygon points="13.72 2.89 6.97 0 6.97 5.78 13.72 2.89" style="fill: #fff;"/>
								</svg></span>
							</div>
						</a></div>
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
			</div>
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>

</script>