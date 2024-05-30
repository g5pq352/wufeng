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
			<div class="flex mt-[122px] px-10">
				<div class="mr-4"><img src="images/message-tag.svg"></div>
				<div class="tracking-normal">
					<div class="text-sm text-gray mb-1">2023全霧峰精選系列</div>
					<div class="font-bold text-black text-6xl leading-tight">
						得天獨厚的<br>
						天生好米
					</div>
				</div>
			</div>

			<div class="relative mt-9 mb-16 category-border-radius">
				<img src="images/message-pic-2.jpg">
				<div class="absolute bottom-0 w-full h-3">
					<div class="w-full h-[33.33333%] bg-blue"></div>
					<div class="w-full h-[33.33333%] bg-orange"></div>
					<div class="w-full h-[33.33333%] bg-green"></div>
				</div>
			</div>

			<div class="px-8 text-black-400 text-justify text-[14px] mb-[64px]">
				霧峰香米並曾獲全國總冠軍米及十大經典好米等殊榮。 行政院農業委員會於2005年輔導成立霧峰農會酒莊，以霧峰香米為主要原料生產初霧清酒。 系列酒品包括：極品純米吟釀、吟釀、燒酎、本釀造、生清酒、濁酒等，並有酒粕香皂、酒粕面膜、酒粕軟糖及白巧克力清酒軟糖等周邊產品。<br>
				<br>
				<div class="-mx-4"><img src="images/message-pic-2-1.jpg"></div>
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