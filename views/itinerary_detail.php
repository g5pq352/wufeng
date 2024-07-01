<?php
require_once 'Connections/connect2data.php';

$cat = $DB->row("SELECT * FROM class_set WHERE c_parent='tourC' AND c_slug=?", [$slug]);

$works = $DB->query("SELECT * FROM data_set, file_set WHERE d_class1='tour' AND d_class2=? AND d_id=file_d_id AND file_type='tourCover' ORDER BY d_sort ASC", [$cat['c_id']]);


if (count($works) == 0) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '404.php';
    header("Location: http://$host$uri/$extra");
    exit;
}

$url = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
			<div class="px-4 mt-[66px] mb-[114px]">
				<div class="category-border-radius relative bg-green text-white px-4 pt-[22px] pb-16 mb-10">
					<div class="font-bold text-[70px] leading-none mb-3"><?= $cat['c_title'] ?></div>
					<div class="font-en"><?= nl2br($cat['c_title_en']) ?></div>

					<div class="absolute font-en text-4xl bottom-[22px] right-4"><span class="text-[15px] mr-2">TWD</span><?= moneyFormat($cat['c_data1']) ?></div>
				</div>

				<div class="">
					<ul v-scope="{
						posts: [
							<?php foreach($works as $row) : ?>
								{
									pic: '<?= $baseurl ?>/<?= $row['file_link1'] ?>',
									date: '<?= date("H:i", strtotime($row['d_date'])) ?>',
									title: `<?= $row['d_title'] ?>`,
									note: `<?= $row['d_content'] ?>`,
								},
							<?php endforeach ?>
						]
					}" class="space-y-4">
						<li v-for="(p, i) in posts" class="category-border-radius bg-white px-4 py-3">
							<div class="flex mb-3">
								<div class="mr-12"><img :src="p.pic" class="rounded-2xl"></div>
								<div class="">
									<div class="text-[#C8C9C9] font-en font-light text-right text-sm">Schedule 0{{i+1}}</div>
									<div class="text-green font-en font-medium text-8xl">{{p.date}}</div>
								</div>
							</div>
							<div class="font-bold text-xl mb-2">{{p.title}}</div>
							<div class="text-sm text-gray-300 text-justify" v-html="p.note"></div>
						</li>
					</ul>
				</div>

				<div class="mt-[60px]">
					<div class="mb-5 px-6">
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