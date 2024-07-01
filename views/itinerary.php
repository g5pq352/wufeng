<?php
require_once 'Connections/connect2data.php';
require_once 'paginator.class.php';

$catlist = $DB->query("SELECT * FROM class_set, file_set WHERE c_parent='tourC' AND file_d_id=c_id AND file_type='tourCCover' AND c_active=1 ORDER BY c_sort ASC");
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
		<div class="w-[35vw] xl:w-[33vw] lg:w-full">
			<!--  -->
			<div class="mt-[132px] mb-[86px]">
				<div class="mb-7"><img src="images/itinerary-deco.svg" class="mx-auto"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">套裝行程</div>
					<div class="font-en text-gray-400 text-4xl">#Package Tour</div>
				</div>
			</div>

			<section v-scope="{
				posts: [
					<?php foreach($catlist as $c) : ?>
					<?php $works = $DB->query("SELECT * FROM data_set, file_set WHERE d_class1='tour' AND d_class2=? AND d_id=file_d_id AND file_type='tourCover' AND d_active=1 ORDER BY d_sort ASC", [$c['c_id']]); ?>
						{
						title: `<?= $c['c_title'] ?>`,
						tags: `<?= $c['c_content'] ?>`,
						pic: '<?= $c['file_link1'] ?>',
						sliders: [
							<?php foreach($works as $row) : ?>
								{
									pic: '<?= $row['file_link1'] ?>',
									title: `<?= nl2br($row['d_title']) ?>`,
									time: '<?= date("H:i", strtotime($row['d_date'])) ?>',
								},
							<?php endforeach ?>
						],
						link: `<?= $baseurl ?>/itinerary/<?= $c['c_slug'] ?>`,
					},
					<?php endforeach ?>
				]
			}" class="itineraryList px-4 space-y-10 mb-[112px]" v-on:vue:mounted="sightsListHandler($el)">
				<article v-for="(p, i) in posts" class="">
					<div class="item text-white category-border-radius py-7 px-4">
						<a :href="p.link">
							<div class="font-bold text-[56px] leading-none mb-3">{{p.title}}</div>
							<ul class="data-array text-sm flex flex-wrap items-center lg:space-y-1 opacity-80"><span>{{p.tags}}</span></ul>
							<div class="mt-7 mb-4"><img :src="p.pic" class="rounded-2xl"></div>
							<div class="date font-en font-medium text-[72px] leading-none relative z-10 -mb-4"></div>
						</a>
						<div class="relative" class="itinerarySlider">
							<div class="absolute z-10 -top-[48px] right-0 flex space-x-2">
								<div class="itinerary-prev basic-hover"><svg width="44" height="44" viewBox="0 0 43.8 43.8">
									<circle cx="21.9" cy="21.9" r="21.4" style="fill: none; stroke: #fff; stroke-miterlimit: 10;"/>
									<g>
										<rect x="20.1" y="21.2" width="7.6" height="1.5" style="fill: #fff;"/>
										<polygon points="13.9 21.9 20.7 24.8 20.7 19 13.9 21.9" style="fill: #fff;"/>
									</g>
								</svg></div>
								<div class="itinerary-next basic-hover"><svg width="44" height="44" viewBox="0 0 43.8 43.8">
									<circle cx="21.9" cy="21.9" r="21.4" style="fill: none; stroke: #fff; stroke-miterlimit: 10;"/>
									<g>
										<rect x="16.2" y="21.2" width="7.6" height="1.5" style="fill: #fff;"/>
										<polygon points="30 21.9 23.2 19 23.2 24.8 30 21.9" style="fill: #fff;"/>
									</g>
								</svg></div>
							</div>

							<ul v-scope="" v-on:vue:mounted="itineraryHandler($el)">
								<li v-for="(item, i) in (p.sliders)" class="w-[35%] mr-6" :data-time="item.time">
									<div class="relative pic rounded-3xl overflow-hidden"><img :src="item.pic"></div>
									<div class="bg-white w-2 h-6 ml-2 -mt-2 relative"></div>
									<div class="absolute w-[120%] left-0 top-[112px] border-b border-dashed opacity-70"></div>
									<div class="ml-[7px] mt-1">
										<div class="w-max font-bold text-lg">{{item.title}}</div>
										<div class="font-en text-sm font-light opacity-70">0{{i+1}}</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="text-white font-en bg-gray-400 py-4 rounded-t-[28px] rounded-br-[28px] basic-hover"><a :href="p.link" class="flex items-center justify-center">
						<div class="flex items-center justify-centerr leading-none border-b border-dashed min-w-[100px]">
							<span class="mr-2 li">read more</span>
							<span><svg width="13.72" height="5.78" viewBox="0 0 13.72 5.78">
								<rect x="0" y="2.15" width="7.57" height="1.48" style="fill: #fff;"/>
								<polygon points="13.72 2.89 6.97 0 6.97 5.78 13.72 2.89" style="fill: #fff;"/>
							</svg></span>
						</div>
					</a></div>
				</article>
			</section>
			<!--  -->
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>
function sightsListHandler(el){
	var _el = $("article", el);

	_el.each(function(i, item){
		var value = $(".data-array", item).text();
		var code = value.split(/[(\r\n)\r\n]+/)

		code.forEach((use, index) => {
			use = '<li class="rounded-full border border-white px-2 mr-1">' + use + '</li>';
			$(".data-array", item).append(use)
		})

		$(".data-array span", item).remove()
	})

}
function itineraryHandler(el) {
	var $carousel = $(el).flickity({
		"prevNextButtons": false,
		"pageDots": false,
		"wrapAround": true,
		"autoPlay": 4000,
		"pauseAutoPlayOnHover": false,
		"imagesLoaded": true,
		"cellAlign": "left",
		"selectedAttraction": 0.02,
		"arrowShape": ""
	});

	$(el).closest("article").find(".itinerary-prev").on("click", () => {
		$carousel.flickity('previous')
		$carousel.flickity('stopPlayer');
	})
	$(el).closest("article").find(".itinerary-next").on("click", () => {
		$carousel.flickity('next')
		$carousel.flickity('stopPlayer');
	})

	$(el).closest("article").find(".date").text($("li", el).eq(0).data("time"))

	$carousel.on( 'change.flickity', function( event, index ) {
		$(el).closest("article").find(".date").text($("li", el).eq(index).data("time"))
	});
}
</script>