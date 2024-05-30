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
				<div class="mb-7"><img src="images/about-deco.svg" class="mx-auto" width="130"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">關於霧峰</div>
					<div class="font-en text-gray-400 text-4xl">#About Wufeng</div>
				</div>
			</div>

			<div class="relative px-4 mb-28">
				<div class="bg-white category-border-radius px-8 py-10">
					<div class="text-center"><img src="images/about-map.svg" class="inline-block"></div>
					<div class="font-bold text-lg mb-4">
						#得天獨厚的<br>
						農業寶地
					</div>
					<div class="text-sm text-[#9F9F9F] text-jusitfy">
						霧峰區，位於台中盆地之東側和台中山地之交界處，北鄰大里區、太平區，東鄰臺灣省南投縣國姓鄉，南隔烏溪與南投縣草屯鎮相望，西南端與彰化縣芬園鄉相鄰，西接烏日區。盆地和坡地地形，約各佔一半。以車籠埔斷層為界，西側屬台中盆地的一部分，以沖積扇平地為主；東側屬丘陵地形，以東南側為高，等高線多在200-500公尺之間。全區地勢呈東南高，西北低；其中則以東南山境為最高峰－－「霧峰奧山」，又稱霧峰契山，海拔標高483公尺，位於青桐林生態產業園區內，與大橫屏山山脈並行。
					</div>
				</div>

				<div class="pop absolute tf w-full text-center transition-all duration-500 opacity-0 pointer-events-none">
					<div class="px-12 inline-block">
						<div class="bg-[#EFEAE3] px-12 pt-3 pb-5 text-center category-border-radius">
							<div class="inline-block mb-1"><img src="images/menu-quick-1.svg" width="56"></div>
							<div class="font-bold text-3xl mb-4">WUWU</div>
							<div class=""><a href="talk"><span class="bg-green text-lg text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開好友訊息</span></a></div>
						</div>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>


	<!-- <form action="javascript:;" method="POST" id="contactForm">
		<input type="text" name="title" placeholder="輸入一些啥啊">

		<button id="send">
			下去就是囉
		</button>
	</form> -->

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>
$(window).on("scroll", function () {
	var _scroll_trigger = (device == 'mobile') ? 400 : 100
	if ($(this).scrollTop() > _scroll_trigger){
		$(".pop").removeClass("opacity-0 pointer-events-none")
	}
})

$("#send").on("click", function () {
    if($("#contactForm").valid() == true){
        var answer = confirm("您確認要送出您所填寫的資訊嗎？");
        if (answer){
        	$.ajax({
				type: "POST",
				url: "./testMail.php",
				data: $("#contactForm").serialize(),
				success: function(data) {
					console.log('success!!!')
				}
			});
        }
    }
})
</script>