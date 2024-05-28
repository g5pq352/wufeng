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
			<div class="flex mt-[122px] px-10">
				<div class="mr-4"><img src="images/message-tag.svg"></div>
				<div class="tracking-normal">
					<div class="flex items-center text-sm text-gray mb-1">
						<div class="tracking-tight">Oct 19, 2013</div>
						<div class="mx-2 mb-1">|</div>
						<div class="">活動情報</div>
					</div>
					<div class="font-bold text-black text-6xl leading-tight">
						迎接霧峰，<br>
						共襄文化盛宴！
					</div>
				</div>
			</div>

			<div class="relative mt-9 mb-16 category-border-radius">
				<img src="images/news-1-1.jpg">
				<div class="absolute bottom-0 w-full h-3">
					<div class="w-full h-[33.33333%] bg-blue"></div>
					<div class="w-full h-[33.33333%] bg-orange"></div>
					<div class="w-full h-[33.33333%] bg-green"></div>
				</div>
			</div>

			<div class="px-8 text-black-400 text-justify text-[14px] mb-[64px]">
				在這個美麗的季節裡，我們迎來了一年一度的霧峰文化祭，這是一個繽紛多彩的盛會，聚集了來自各地的文化精華，讓我們攜手共度一場難忘的文化之旅。<br>
				<br>
				<div class="-mx-4"><img src="images/news-1-2.jpg"></div>
				<br>
				霧峰的才華橫溢將在這裡展現無遺。由當地藝術家和表演者組成的舞台劇、音樂會，將讓你沉浸在音樂和表演的藝術世界中。<br>
				<br>
				<div class="-mx-4"><img src="images/news-1-3.jpg"></div>
				<br>
				品嚐來自霧峰地道美食的機會絕對不容錯過！各式各樣的小吃攤位將讓你品味到當地獨特的美味，讓味蕾在這個文化盛會中獲得滿滿的享受。<br>
		 		霧峰的手工藝品和藝術作品將在市集中展現，這是一個絕佳的機會，讓你親身體驗霧峰的藝術風采，同時也能尋找一些獨一無二的禮品。<br>
				<br>
				<div class="-mx-4"><img src="images/news-1-4.jpg"></div>
				<br>
				參與各種文化工作坊，了解霧峰深厚的歷史和傳統。手作、烹飪、傳統藝術等等，讓你全身心地融入當地文化。
			</div>

			<nav class="flex items-center justify-center px-[58px] space-x-6 mb-6">
				<a href="javascript:;"><img src="images/share-1.svg"></a>
				<a href="javascript:;"><img src="images/share-2.svg"></a>
				<a href="javascript:;"><img src="images/share-3.svg"></a>
				<a href="javascript:;"><img src="images/share-4.svg"></a>
			</nav>

			<div class="px-4 mb-[114px]">
				<div class="mb-10">
					<ul class="grid grid-cols-2 gap-x-2 text-center">
						<li class="bg-white pt-3 pb-5 category-border-radius">
							<div class="inline-block mb-1"><img src="images/menu-quick-1.svg"></div>
							<div class="font-bold mb-4">霧峰</div>
							<div class=""><a href=""><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">加入官方LINE</span></a></div>
						</li>
						<li class="bg-white pt-3 pb-5 category-border-radius">
							<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
							<div class="font-bold mb-4">即刻前往</div>
							<div class=""><a href=""><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
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
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>

</script>