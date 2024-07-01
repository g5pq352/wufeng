<?php
require_once 'Connections/connect2data.php';
require_once 'paginator.class.php';

$catlist = $DB->query("SELECT * FROM class_set, file_set WHERE c_parent='sightsC' AND c_id=file_d_id AND file_type='sightsCCover' AND c_active=1 ORDER BY c_sort ASC");
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
				<div class="mb-7"><img src="images/sights-deco.svg" class="mx-auto"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">景點探索</div>
					<div class="font-en text-gray-400 text-4xl">#Sights</div>
				</div>
			</div>

			<section v-scope="{
				posts: [
					<?php foreach ($catlist as $c): ?>
	                    {
	                    	title: `<?= nl2br($c['c_title']) ?>`,
	                    	tags: `<?= $c['c_content'] ?>`,
							pic: `<?= $baseurl ?>/<?= $c['file_link1'] ?>`,
	                        link: '<?= $baseurl ?>/sights/category/<?= $c['c_slug'] ?>',
	                        slug: '<?= $c['c_slug'] ?>'
	                    },
	                <?php endforeach ?>
				]
			}" class="sightsList px-4 space-y-4 mb-[112px]" v-on:vue:mounted="sightsListHandler($el)">
			<!-- 'bg-orange': i == 3*i+1, 'bg-green': i == 3*i+2, 'bg-blue': i == 3*i -->
				<article v-for="(p, i) in posts" class="category-border-radius text-white p-7 bg-orange"><a :href="p.link">
					<div class="flex items-center mr-4">
						<div class="">
							<div class="font-bold text-[26px] mb-2">{{p.title}}</div>
							<ul class="data-array text-sm flex flex-wrap items-center lg:space-y-1 opacity-80"><span>{{p.tags}}</span></ul>
						</div>
						<div class=""><img :src="p.pic" class="max-w-none lg:max-w-[92px]"></div>
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

$(window).on("load", function() {


	
})
</script>