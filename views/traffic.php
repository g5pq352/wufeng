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
		<div class="w-[35vw] xl:w-[33vw] lg:w-full">
			<!--  -->
			<div class="mt-[132px] mb-[86px]">
				<div class="mb-7"><img src="images/sights-deco-1.svg" class="mx-auto" width="130"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">交通資訊</div>
					<div class="font-en text-gray-400 text-4xl">#Traffic</div>
				</div>
			</div>

			<div class="px-4 mb-40">
				<ul v-scope="{
					posts: [{
						icon: 'images/traffic-1.svg',
						title: '公車',
						title_en: 'Bus Route',
						link: 'traffic/BusRoute',
					}, {
						icon: 'images/traffic-2.svg',
						title: '汽車',
						title_en: 'Car Route',
						link: 'traffic/CarRoute',
					}, {
						icon: 'images/traffic-3.svg',
						title: 'U-Bike',
						title_en: 'U-Bike Stations',
						link: 'traffic/U-Bike',
					}]
				}" class="trafficList space-y-2 mb-9">
					<li v-for="(p, i) in posts" class="category-border-radius text-white"><a :href="p.link" class="flex items-center px-7 py-7">
						<div class="min-w-[134px] mr-4"><img :src="p.icon" class="mx-auto"></div>
						<div class="">
							<div class="font-bold" :class="[
								i == 2 ? 'text-[42px]' : 'text-[56px]'
							]">{{p.title}}</div>
							<div class="font-en">{{p.title_en}}</div>
						</div>
					</a></li>
				</ul>

				<div class="mb-5 px-12">
					<div class="bg-white px-12 pt-3 pb-5 text-center category-border-radius">
						<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
						<div class="font-bold mb-4">霧峰</div>
						<div class=""><a href="" class="fancy-link" target="_blank"><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
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