<html>
<head>
	<?php include 'html_head.php'; ?>

	<style type="text/css">
	.fade-enter-active, .fade-leave-active {
		transition: opacity .15s;
	}
	.fade-enter, .fade-leave-to {
		opacity: 0;
	}
	</style>
</head>

<body>
	<?php include 'topmenu.php'; ?>

	<div class="flex lg:block lg:mr-0">
		<div class="w-[50vw] xl:w-[50vw] h-screen sticky top-0 lg:hidden">
			<?php include 'desktop_slider.php'; ?>
		</div>
		<div class="w-[35vw] lg:w-full">
			<!--  -->
			<div class="px-4 mt-[92px] mb-[110px]">
				<div class="bg-orange category-border-radius mb-9">
					<div class="flex items-center px-7 py-7 text-white">
						<div class="min-w-[134px] mr-4"><img src="images/traffic-3.svg" class="mx-auto"></div>
						<div class="">
							<div class="font-bold text-[42px]">U-Bike</div>
							<div class="font-en">U-Bike Stations</div>
						</div>
					</div>
				</div>

				<div class="mb-28">
					<div class="text-orange font-bold text-5xl mb-7">U-Bike站點</div>
					<ul v-scope="{
						posts: [
							'霧峰農工',
							'立法院中部辦公室',
							'光復新村(新生路)',
							'臺中市立光復國民中小學',
							'霧峰健體中心',
							'北峰公園',
							'霧峰區綜合運動場',
							'大愛公園',
							'乾溪綠廊公園',
							'亞洲大學(安藤忠雄美術館)',
							'亞洲大學(體育館)',
							'霧工一霧工五路口',
							'北勢活動中心',
							'丁台里活動中心',
							'四德國小',
							'立法院民主議政園區民主草坪',
							'中投東豐正路口',
							'臺中市立圖書館霧峰以文分館',
						]
					}" class="space-y-5">
						<li v-for="p in posts" class="flex items-center">
							<div class="mr-2"><svg width="20" height="20" viewBox="0 0 19.71 18.99">
								<rect x="0" y="0" width="19.71" height="18.99" rx="9.5" ry="9.5" style="fill: #dd4426;"/>
								<g>
								<path d="M6.25,9.8c.11,.02,.21,.05,.31,.09,.02,0,.05,.02,.07,.02,.07,.03,.05,.02-.09-.04,.03,.03,.09,.04,.13,.06,.1,.05,.19,.11,.28,.17,.03,.02,.15,.12,.04,.02-.12-.11,.04,.03,.06,.05,.08,.07,.16,.15,.24,.23,.03,.04,.07,.07,.1,.11,.1,.11,.04,.08,0-.02,.09,.19,.25,.36,.35,.56,.02,.04,.04,.09,.06,.13,.05,.11,.03,.02-.01-.03,.07,.07,.1,.27,.12,.37,.04,.13,.07,.25,.09,.38,.01,.07,.02,.14,.04,.21,.03,.16-.01-.18,0-.02,.04,.54,.04,1.07-.02,1.62s.53,1.08,1.06,1.06c.63-.03,.99-.47,1.06-1.06,.15-1.29,.01-2.64-.6-3.8-.55-1.04-1.56-1.9-2.72-2.16-.54-.12-1.17,.16-1.3,.74-.12,.54,.16,1.17,.74,1.3h0Z" style="fill: #efebe4;"/>
								<path d="M6.77,5.52c1.92,.45,3.5,1.65,4.42,3.39,.84,1.59,1.11,3.53,.87,5.3-.08,.57,.14,1.14,.74,1.3,.49,.14,1.23-.17,1.3-.74,.32-2.38,.05-4.8-1.08-6.94s-3.27-3.8-5.69-4.36c-1.33-.31-1.9,1.74-.56,2.05h0Z" style="fill: #efebe4;"/>
								</g>
							</svg></div>
							<div class="font-bold">{{p}}</div>
						</li>
					</ul>
				</div>

				<div class="mb-[68px] px-12">
					<div class="bg-white px-12 pt-3 pb-5 text-center category-border-radius">
						<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
						<div class="font-bold mb-4">霧峰</div>
						<div class=""><a href="" class="fancy-link" target="_blank"><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
					</div>
				</div>

				<div class="">
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