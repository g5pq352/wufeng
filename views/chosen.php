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
			<div class="relative rounded-b-[32px] overflow-hidden mt-[50px] mb-[34px]">
				<div class=""><img src="images/chosen-pic.jpg"></div>
				<div class="flex items-end absolute bottom-12 left-7">
					<div class="mr-4"><svg width="61.28" height="87.36" viewBox="0 0 61.28 87.36">
						<path d="M50.51,22.94L53.49,0h-10.02l-2.98,22.94h-15.48L27.98,0h-10.02l-2.98,22.94H2.8v11.25H13.54l-2.06,16.26H0v11.25H10.02l-3.49,25.66h10.02l3.49-25.66h15.48l-3.49,25.66h10.02l3.49-25.66h12.93v-11.25h-11.47l2.06-16.26h12.21v-11.25h-10.77Zm-13.53,27.51h-15.48l2.06-16.26h15.48l-2.06,16.26Z" style="fill: #fff;"/>
					</svg></div>
					<div class="font-bold text-6xl text-white leading-tight tracking-normal">
						走進霧峰的<br>
						時光隧道
					</div>
				</div>
				<div class="absolute bottom-0 w-full h-3">
					<div class="w-full h-[33.33333%] bg-blue"></div>
					<div class="w-full h-[33.33333%] bg-orange"></div>
					<div class="w-full h-[33.33333%] bg-green"></div>
				</div>
			</div>

			<div class="px-4 mb-[60px]">
				<ul v-scope="{
					posts: [{
						pic: 'images/chosen-1.jpg',
						title: `#全世界<br>最大清代〔宮保第〕<br>一品官宅建築群`,
						note: '霧峰林家建築群',
					}, {
						pic: 'images/chosen-2.jpg',
						title: `#我有故事<br>也有酒`,
						note: '民生故事館',
					}, {
						pic: 'images/chosen-3.jpg',
						title: `#全台灣<br>第一個新市鎮`,
						note: '光復新村',
					}, {
						pic: 'images/chosen-4.jpg',
						title: `#台灣<br>民主發源地`,
						note: '省議會紀念園區',
					}]
				}" class="space-y-4">
					<li v-for="p in posts" class="category-border-radius bg-white p-3">
						<div class="flex items-center">
							<div class="mr-3 max-w-[45%]"><img :src="p.pic" class="rounded-lg "></div>
							<div class="">
								<div class="font-bold text-xl mb-2" v-html="p.title"></div>
								<div class="text-sm text-gray-300">{{p.note}}</div>
							</div>
						</div>
					</li>
				</ul>

				<div class="mb-5 px-6 mt-[60px]">
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
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>

</script>