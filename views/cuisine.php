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
			<div class="mt-[132px] mb-[86px]">
				<div class="mb-7"><img src="images/sights-deco-1.svg" class="mx-auto" width="130"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">在地美食</div>
					<div class="font-en text-gray-400 text-4xl">#Local Cuisine</div>
				</div>
			</div>

			<div class="px-4 mb-[112px]">
				<ul v-scope="{
					posts: [{
						pic: 'images/chosen-1.jpg',
						title: `初霧純米吟釀`,
						note: `小公務員不可能的<br>清酒任務`,
						link: 'cuisine/初霧純米吟釀',
					}, {
						pic: 'images/chosen-2.jpg',
						title: `森川火鍋`,
						note: `吃到飽火鍋，超人氣麻油燒酒烏骨雞`,
						link: 'cuisine/森川火鍋',
					}, {
						pic: 'images/chosen-3.jpg',
						title: `農學食堂`,
						note: `一場以農為本的<br>創意之路`,
						link: 'cuisine/農學食堂',
					}, {
						pic: 'images/chosen-4.jpg',
						title: `肉尬`,
						note: `益全香米<br>尬上肉`,
						link: 'cuisine/肉尬',
					}, {
						pic: 'images/cuisine-1.jpg',
						title: `雞排本色`,
						note: `全台獨賣厚實飽滿多汁天然“有色”雞排`,
						link: 'cuisine/雞排本色',
					}, {
						pic: 'images/cuisine-2.jpg',
						title: `甘田果園`,
						note: `荔之甘精緻農園<br>天然體驗農場`,
						link: 'cuisine/甘田果園',
					}, {
						pic: 'images/cuisine-3.jpg',
						title: `胡同李`,
						note: `最在地的<br>東北大餡水餃`,
						link: 'cuisine/胡同李',
					}]
				}" class="space-y-4">
					<li v-for="p in posts" class="category-border-radius bg-white p-3"><a :href="p.link">
						<div class="flex items-center">
							<div class="mr-3 max-w-[45%]"><img :src="p.pic" class="rounded-lg"></div>
							<div class="">
								<div class="font-bold text-xl mb-2" v-html="p.title"></div>
								<div class="text-sm text-gray-300" v-html="p.note"></div>
							</div>
						</div>
					</a></li>
				</ul>

				<div class="mt-[58px] mb-5">
					<div class="flex items-center justify-center font-en font-medium">
						<a href="javascript:;" class="mr-6 basic-hover"><svg width="43" height="43" viewBox="0 0 42.84 42.84">
							<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
							<g>
							<rect x="19.57" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
							<polygon points="13.38 21.42 20.17 24.33 20.17 18.52 13.38 21.42" style="fill: #fff;"/>
							</g>
						</svg></a>


						<a href="javascript:;" class="text-black text-3xl">2</a>
						<a href="javascript:;" class="text-gray-400 page-total mt-1">5</a>


						<a href="javascript:;" class="ml-6 basic-hover"><svg width="43" height="43" viewBox="0 0 42.84 42.84">
							<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
							<g>
							<rect x="15.67" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
							<polygon points="29.46 21.42 22.68 18.52 22.68 24.33 29.46 21.42" style="fill: #fff;"/>
							</g>
						</svg></a>
					</div>
				</div>

				<div class="basic-hover" onclick="history.back()">
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
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>

</script>