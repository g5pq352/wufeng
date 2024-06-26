<?php
require_once 'Connections/connect2data.php';
require_once 'paginator.class.php';

$catlist = $DB->query("SELECT * FROM class_set WHERE c_parent='mapC' AND c_active=1 ORDER BY c_sort ASC");
?>
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
		<div class="w-[36vw] xl:w-[33vw] relative lg:w-full">
			<!--  -->
			<div class="absolute lg:fixed z-10 w-full px-5 top-[62px]">
				<form action="javascript:;" id="mapForm" class="" >
					<select name="cats" id="" class="" style="width: 100%;">
						<option value="">全部</option>
						<option value="全部">全部</option>

						<?php foreach($catlist as $c) : ?>
							<option value="<?= $c['c_title'] ?>"><?= $c['c_title'] ?></option>
						<?php endforeach ?>

						<!-- <option value="在地美食">在地美食</option>
						<option value="霧峰商圈">霧峰商圈</option>
						<option value="民宿飯店">民宿飯店</option>
						<option value="自然景點">自然景點</option>
						<option value="人文歷史">人文歷史</option>
						<option value="熱門打卡">熱門打卡</option>
						<option value="Ubike">Ubike</option>
						<option value="停車場">停車場</option> -->
					</select>
				</form>
			</div>

			<div class="overflow-hidden">
				<div id="map" class="h-screen -mx-1"></div>
			</div>

			<section class="hidden" v-scope="{
				posts: [
					<?php foreach($catlist as $c) : ?>
					<?php $works = $DB->query("SELECT * FROM data_set, class_set, file_set WHERE d_class1='map' AND c_parent='mapC' AND d_class2=? AND d_id=file_d_id AND file_type='mapCover' AND d_active=1 ORDER BY d_sort ASC", [$c['c_id']]); ?>
						{
							cat: '<?= $c['c_title'] ?>',
							lists: [
								<?php foreach($works as $row) : ?>
									{
										lat: '<?= $row['d_data1'] ?>',
										lng: '<?= $row['d_data2'] ?>',
										pic_s: '<?= $baseurl ?>/<?= $row['file_link3'] ?>',
										pic: '<?= $baseurl ?>/<?= $row['file_link1'] ?>',
										title: '<?= $row['d_title'] ?>',
										phone: '<?= $row['d_data3'] ?>',
										address: '<?= $row['d_data4'] ?>',
										time: '<?= $row['d_data5'] ?>',
										content: `<?= nl2br($row['d_content']) ?>`,
										link: `<?= $row['d_data6'] ?>`,
									},
								<?php endforeach ?>
							],
						},
					<?php endforeach ?>
				]
			}">
				<article v-for="(p, i) in posts">
					<div v-for="list in (p.lists)" class="" :data-cat="p.cat" :data-lat="list.lat" :data-lng="list.lng">
						<div class="pic-s"><img :src="list.pic_s"></div>
						<div class="pic"><img :src="list.pic"></div>
						<div class="title">{{list.title}}</div>
						<div class="phone">{{list.phone}}</div>
						<div class="address">{{list.address}}</div>
						<div class="time">{{list.time}}</div>
						<div class="content" v-html="list.content"></div>
						<div class="link">{{list.link}}</div>
					</div>
				</article>
			</section>


			<div id="fancy-app" class="m-fancyWrap fixed z-90 inset-0 bg-fancy flex justify-center items-center transition-all duration-500 opacity-0 pointer-events-none">
				<div class="fancy-closeBlock fixed -z-10 inset-0 cursor-pointer bg-black opacity-80"></div>

				<!-- code here -->
				<div class="relative mx-6 max-w-[30vw]">
					<div class="px-3 py-4 bg-white mb-2 category-border-radius">
						<div class="fancy-cat absolute right-4 top-4 text-sm text-gray-300 border border-gray-300 rounded-[12px] px-1">在地美食</div>

						<div class="mb-2"><img src="views/images/map/map-6.jpg" width="150" class="fancy-pic rounded-3xl"></div>
						<div class="fancy-title font-bold text-[25px] mb-2">霧峰木瓜牛乳大王</div>
						<ul class="text-sm space-y-1 mb-4">
							<li class="flex items-center">
								<div class="w-5 mr-4"><img src="views/images/map/fancy-icon-1.svg" class="mx-auto"></div>
								<div class="fancy-phone">0907-267-088</div>
							</li>
							<li class="flex items-center">
								<div class="w-5 mr-4"><img src="views/images/map/fancy-icon-2.svg" class="mx-auto"></div>
								<div class="fancy-adress">台中市霧峰區四德路61號</div>
							</li>
							<li class="flex items-center">
								<div class="w-5 mr-4"><img src="views/images/map/fancy-icon-3.svg" class="mx-auto"></div>
								<div class="fancy-time">週二至週日 08:00-17:00</div>
							</li>
						</ul>
						<div class="fancy-text text-sm text-gray-300">「霧峰牛乳大王」曾榮獲「臺中市政府建國百年百大優良名攤認證標章」，可見品質信譽都是獲得肯定的。 「霧峰牛乳大王」主打賣點是木瓜牛奶，將木瓜與牛奶用果汁機打在一起，沒有加水稀釋，香醇濃郁，入口滑順，是臺灣常見的街邊飲料。</div>

						<div class="text-black font-en flex items-center justify-center mt-6">
							<div class="fancy-close flex items-center justify-center leading-none border-b border-dashed border-black min-w-[100px] basic-hover">
								<span><svg width="13.72" height="5.78" viewBox="0 0 13.72 5.78">
									<rect x="6.15" y="2.15" width="7.57" height="1.48" style="fill: #000;"/>
									<polygon points="0 2.89 6.75 5.78 6.75 0 0 2.89" style="fill: #000;"/>
								</svg></span>
								<span class="ml-2">back</span>
							</div>
						</div>
					</div>
					<div class="flex">
						<div class="inline-block">
							<div class="bg-white px-12 pt-3 pb-5 text-center category-border-radius">
								<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
								<div class="font-bold mb-4">即刻前往</div>
								<div class=""><a href="" class="fancy-link" target="_blank"><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
							</div>
						</div>
						<div class="flex-auto fancy-closeBlock"></div>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgXG2NdbRztXHMwDdYtG726ehhQNkzLcU" id="google-map-js-js"></script>
</html>

<script>
function formatState (state) {
	if (!state.id) {
		return state.text;
	}
	var $state = $(
		'<span class="flex items-center font-bold"><img src="views/images/map/' + state.element.value.toLowerCase() + '.svg" class="img-flag mr-4" /> ' + state.text + '<img src="views/images/map/map-go.svg" class="ml-auto mr-2"></span>'
	);
	return $state;
};
$("select").select2({
	placeholder: "景點分類",
	minimumResultsForSearch: Infinity,
	templateResult: formatState
});

var originalStyle = [];

$(window).on("load", function() {
	var map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 15,
	    center: new google.maps.LatLng(24.0455977, 120.7334986),
	    styles: originalStyle,
	    // zoomControl: false,
	    // scrollwheel: false,
	    streetViewControl: false,
	    mapTypeControl: false,
	    // draggable: false,
	    fullscreenControl: false,
	});

	$("article >div").each(function(i, el){
		var _lat = $(el).data("lat")
		var _lng = $(el).data("lng")
		var _img = $(el).find(".pic-s img").attr("src")

		var _cat = $(el).data("cat")
		var _pic = $(el).find(".pic img").attr("src")
		var _title = $(el).find(".title").text()
		var _phone = $(el).find(".phone").text()
		var _address = $(el).find(".address").text()
		var _time = $(el).find(".time").text()
		var _link = $(el).find(".link").text()

		var marker = new google.maps.Marker({
		    position: new google.maps.LatLng(_lat, _lng),
		    map: map,
		    icon: _img,
	    });



	    gsap.delayedCall(.5, () => {
			$('#map img[src="'+marker.icon+'"]').closest("div").addClass("markers")
			$('#map img[src="'+marker.icon+'"]').closest("div").css("overflow", "hidden")
			$('#map img[src="'+marker.icon+'"]').closest("div").css("border-radius", "50%")
			$('#map img[src="'+marker.icon+'"]').closest("div").css("border", "2px solid #fff")

			$('#map img[src="'+marker.icon+'"]').closest("div").attr('data-cat', _cat);

			// console.log($('#map .markers'))
		})


		marker.addListener('click', function() {
			$(".m-fancyWrap .fancy-pic").attr("src", _pic)
			$(".m-fancyWrap .fancy-cat").text(_cat)
			$(".m-fancyWrap .fancy-title").text(_title)
			$(".m-fancyWrap .fancy-phone").text(_phone)
			$(".m-fancyWrap .fancy-address").text(_address)
			$(".m-fancyWrap .fancy-time").text(_time)
			$(".m-fancyWrap .fancy-link").attr("href", _link)

			$(".m-fancyWrap").toggleClass("opacity-0 pointer-events-none")
		})

	})
})

$(".fancy-closeBlock, .fancy-close").on("click", function(){
	$(".m-fancyWrap").toggleClass("opacity-0 pointer-events-none")
})


$("select[name='cats']").on("change", function(){
	var _val = $(this).val()

	$('#map .markers').each(function(i, el){
		var _cat = $(el).data("cat")

		if(_val != _cat){
			if(_val == "全部") {
				$(el).removeClass("opacity-0 pointer-events-none")
			}else{
				$(el).addClass("opacity-0 pointer-events-none")
			}
		}else{
			$(el).removeClass("opacity-0 pointer-events-none")
		}
	})
})
</script>