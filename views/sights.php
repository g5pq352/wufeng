<html>
<head>
	<?php include 'html_head.php'; ?>
</head>

<body>
	<?php include 'topmenu.php'; ?>

	<div class="flex lg:block lg:mr-0">
		<div class="w-[55vw] xl:w-[50vw] h-screen sticky top-0 lg:hidden">
			<?php include 'desktop_slider.php'; ?>
		</div>
		<div class="w-[33.1vw] lg:w-full">
			<!--  -->
			<div class="mt-[132px] mb-[86px]">
				<div class="mb-7"><img src="images/sights-deco.svg" class="mx-auto"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">景點探索</div>
					<div class="font-en text-gray-400 text-4xl">#Sights</div>
				</div>
			</div>

			<section v-scope="{
				posts: [{
					title: '在地美食',
					tags: [
						'益全香米',
						'黑翅鳶',
						'初露純米吟釀',
						'有機米',
					],
					pic: 'images/sights-deco-1.svg',
					link: `cuisine`,
				}, {
					title: '霧峰商圈',
					tags: [
						'流行時尚',
						'舊城區',
						'最在地的商圈',
					],
					pic: 'images/sights-deco-2.svg',
					link: `cuisine`,
				}, {
					title: '民宿飯店',
					tags: [
						'乾淨整潔',
						'便利',
						'老屋新生',
						'最古老',
					],
					pic: 'images/sights-deco-3.svg',
					link: `cuisine`,
				}, {
					title: '自然景點',
					tags: [
						'十分百岳',
						'長步道',
						'一覽無遺',
						'貓頭鷹',
					],
					pic: 'images/sights-deco-4.svg',
					link: `cuisine`,
				}, {
					title: '人文歷史',
					tags: [
						'最大戲台',
						'九二一',
						'菇類產學館',
						'故事館',
					],
					pic: 'images/sights-deco-5.svg',
					link: `cuisine`,
				}, {
					title: '熱門打卡',
					tags: [
						'老少咸宜',
						'毛小孩',
						'穿越歷史',
						'民主發源地',
					],
					pic: 'images/sights-deco-6.svg',
					link: `cuisine`,
				}]
			}" class="sightsList px-4 space-y-4 mb-[112px]">
			<!-- 'bg-orange': i == 3*i+1, 'bg-green': i == 3*i+2, 'bg-blue': i == 3*i -->
				<article v-for="(p, i) in posts" class="category-border-radius text-white p-7 bg-orange"><a :href="p.link">
					<div class="flex items-center mr-4">
						<div class="">
							<div class="font-bold text-[26px] mb-2">{{p.title}}</div>
							<ul class="text-sm flex flex-wrap items-center space-y-1 opacity-80">
								<li v-for="tag in (p.tags)" class="rounded-full border border-white px-2 mr-1">#{{tag}}</li>
							</ul>
						</div>
						<div class=""><img :src="p.pic" class="max-w-none"></div>
					</div>
					<div class="inline-block mt-3"><div class="flex items-center leading-none border-b border-dashed">
						<div class="font-en font-light">read more</div>
						<div class="ml-2"><svg width="12.35" height="5.2" viewBox="0 0 12.35 5.2">
							<rect y="1.93" width="6.81" height="1.33" style="fill: #fff;"/>
							<polygon points="12.35 2.6 6.27 0 6.27 5.2 12.35 2.6" style="fill: #fff;"/>
						</svg></div>
					</div></div>
				</a></article>
			</section>
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>

</script>