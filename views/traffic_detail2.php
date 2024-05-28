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
		<div class="w-[55vw] xl:w-[50vw] h-screen sticky top-0 lg:hidden">
			<?php include 'desktop_slider.php'; ?>
		</div>
		<div class="w-[33.1vw] lg:w-full">
			<!--  -->
			<div class="px-4 mt-[92px] mb-[110px]">
				<div class="bg-green category-border-radius mb-9">
					<div class="flex items-center px-7 py-7 text-white">
						<div class="min-w-[134px] mr-4"><img src="images/traffic-2.svg" class="mx-auto"></div>
						<div class="">
							<div class="font-bold text-[56px]">汽車</div>
							<div class="font-en">Car Route</div>
						</div>
					</div>
				</div>

				<div class="mb-28">
					<div class="text-green font-bold text-5xl mb-7">停車場</div>
					<ul v-scope="{
						posts: [{
							title: '嘟嘟房停車場-台中霧峰站',
							free: '0',	
						}, {
							title: '明台停車場',
							free: '0',	
						}, {
							title: '民主議政園區第一停車場',
							free: '0',	
						}, {
							title: 'CITY PARKING城市車旅停車場',
							free: '0',	
						}, {
							title: 'CITY PARKING城市車旅停車場(本堂公園站)',
							free: '0',	
						}, {
							title: '921地震教育園區聯外停車場',
							free: '1',	
						}, {
							title: 'CITY PARKING城市車旅停車場（霧峰明台站）',
							free: '0',	
						}, {
							title: 'CITY PARKING城市車旅停車場',
							free: '0',	
						}, {
							title: '光復新村大小車停車場',
							free: '1',	
						}, {
							title: '本堂里公共停車場',
							free: '0',	
						}, {
							title: 'uTagGo大車河民主議政園區第二停車場',
							free: '0',	
						}, {
							title: 'uTagGo大車河民主議政園區第一停車場',
							free: '0',	
						}, {
							title: '921地震教育園區無障礙停車場',
							free: '1',	
						}, {
							title: 'CITY PARKING城市車旅停車場（亞大美術館站）',
							free: '0',	
						}, {
							title: '亞大醫院第二臨時公園停車場',
							free: '0',	
						}]
					}" class="space-y-5">
						<li v-for="p in posts" class="flex items-center">
							<div class="mr-2"><svg width="20" height="20" viewBox="0 0 19.71 18.99">
								<rect x="0" y="0" width="19.71" height="18.99" rx="9.5" ry="9.5" transform="translate(19.71 18.99) rotate(-180)" style="fill: #00a44e;"/>
								<path d="M6.17,4.29h4.08c2.91,0,4.96,.91,4.96,3.6s-2.09,3.79-4.86,3.79h-1.89v4.05h-2.28V4.29Zm4,5.59c1.86,0,2.8-.65,2.8-1.99s-1.05-1.8-2.88-1.8h-1.65v3.79h1.72Z" style="fill: #efebe4;"/>
							</svg></div>
							<div class="font-bold text-[14px]">{{p.title}}</div>
							<div class="ml-2" :class="[
								p.free == 1 ? '' : 'hidden'
							]"><svg width="36.88" height="14.31" viewBox="0 0 36.88 14.31">
								<path d="M16.29-11.29h4.3c2.76,0,5,2.24,5,5V25.6h-9.31c-2.76,0-5-2.24-5-5V-6.28c0-2.76,2.24-5,5-5Z" transform="translate(25.6 -11.29) rotate(90)" style="fill: #00a44e;"/>
								<g>
								<path d="M6.78,2.26h4.47v1.49h-2.69v2.31h2.31v1.5h-2.31v3.61h-1.79V2.26Z" style="fill: #efebe4;"/>
								<path d="M13.13,4.43h1.43l.12,1.26h.06c.53-.89,1.22-1.4,2-1.4,.52,0,.73,.08,1.04,.2l-.35,1.5c-.29-.11-.54-.17-.85-.17-.65,0-1.29,.38-1.68,1.4v3.95h-1.78V4.43Z" style="fill: #efebe4;"/>
								<path d="M18.78,7.8c0-2.18,1.31-3.51,2.71-3.51,1.57,0,2.38,1.33,2.38,3.2,0,.32-.04,.66-.06,.83h-3.3c.11,1.09,.65,1.66,1.43,1.66,.41,0,.73-.12,1.09-.34l.6,1.07c-.54,.4-1.22,.61-1.92,.61-1.63,0-2.93-1.28-2.93-3.51Zm3.6-.7c0-.91-.28-1.48-.85-1.48-.52,0-.97,.5-1.06,1.48h1.91Z" style="fill: #efebe4;"/>
								<path d="M25.02,7.8c0-2.18,1.31-3.51,2.71-3.51,1.57,0,2.38,1.33,2.38,3.2,0,.32-.04,.66-.06,.83h-3.3c.11,1.09,.65,1.66,1.43,1.66,.41,0,.73-.12,1.09-.34l.6,1.07c-.54,.4-1.22,.61-1.92,.61-1.63,0-2.93-1.28-2.93-3.51Zm3.6-.7c0-.91-.28-1.48-.85-1.48-.52,0-.97,.5-1.06,1.48h1.91Z" style="fill: #efebe4;"/>
								</g>
							</svg></div>
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