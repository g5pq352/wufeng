<?php
require_once 'Connections/connect2data.php';
require_once 'paginator.class.php';

$ryder_cat = (isset($slug)) ? $slug : 'default';

if ($ryder_cat == 'default') {
    $order = "ORDER BY
    CASE WHEN d_sort = 0 THEN 1 ELSE 2 END,
    d_date DESC";
}else{
    $order = "ORDER BY d_sort ASC";
}

$cat = $DB->row("SELECT * FROM class_set, file_set WHERE c_parent='sightsC' AND c_slug=? AND c_id=file_d_id AND file_type='sightsCCover' AND c_active=1", [$ryder_cat]);

//page start
$page = (isset($p)) ? $p : 1;
$_GET['page'] = $page;
$maxItem = 8;
$limit = ($page - 1) * $maxItem;

$pp = $page - 1;
$prevurl = "$baseurl/sights/category/$slug/$pp";

$nn = $page + 1;
$nexturl = "$baseurl/sights/category/$slug/$nn";

// 拿來計算全部有幾則
$workTotal = $DB->query("SELECT * FROM data_set, class_set, file_set WHERE d_class1='sights' AND d_class2=c_id AND d_id=file_d_id AND file_type='sightsCover' AND (c_slug=? OR ?='default') AND c_active=1 AND d_active=1 $order", [$ryder_cat, $ryder_cat]);
$pageTotalCount = count($workTotal);
$totalpage = ceil($pageTotalCount / $maxItem);

//使用
$work = $DB->query("SELECT * FROM data_set, class_set, file_set WHERE d_class1='sights' AND d_class2=c_id AND d_id=file_d_id AND file_type='sightsCover' AND (c_slug=? OR ?='default') AND c_active=1 AND d_active=1 $order LIMIT ?, ?", [$ryder_cat, $ryder_cat, $limit, $maxItem]);

$pages = new Paginator;
$pages->items_total = $pageTotalCount;
$pages->items_per_page = $maxItem;
$pages->paginate();
//page end
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
				<div class="mb-7"><img src="<?= $baseurl ?>/<?= $cat['file_link1'] ?>" class="mx-auto" width="130"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]"><?= $cat['c_title'] ?></div>
					<div class="font-en text-gray-400 text-4xl">#<?= $cat['c_title_en'] ?></div>
				</div>
			</div>

			<div class="px-4 mb-[112px]">
				<ul v-scope="{
					posts: [
						<?php foreach($work as $row) : ?>
							{
								pic: `<?= $baseurl ?>/<?= $row['file_link1'] ?>`,
								title: `<?= nl2br($row['d_title']) ?>`,
								note: `<?= nl2br($row['d_data1']) ?>`,
								link: '<?= $baseurl ?>/sights/<?= nl2br($row['d_slug']) ?>',
							},
						<?php endforeach ?>
					]
				}" class="space-y-4">
					<li v-for="p in posts" class="category-border-radius bg-white p-3"><a :href="p.link">
						<div class="flex items-center">
							<div class="mr-3 max-w-[45%]"><img :src="p.pic" class="rounded-lg"></div>
							<div class="">
								<div class="font-bold text-xl mb-2" v-html="p.title"></div>
								<div class="text-sm text-gray-300" v-html="p.note"></div>
							</div>
						</div>
					</a></li>
				</ul>

				<div class="mt-[58px] mb-5">
					<div class="flex items-center justify-center font-en font-medium">
						<a href="<?= $prevurl ?>" class="mr-6 basic-hover"><svg width="43" height="43" viewBox="0 0 42.84 42.84">
							<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
							<g>
							<rect x="19.57" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
							<polygon points="13.38 21.42 20.17 24.33 20.17 18.52 13.38 21.42" style="fill: #fff;"/>
							</g>
						</svg></a>

						<nav v-scope="{
			                now: '<?= $page ?>',
			                total: <?= $totalpage ?>,
			                link: '<?= "$baseurl/sights/category/$slug" ?>',
			                item: 6,
			                }" class="flex items-center justify-center">

			                <a href="javascript:;" class="text-black text-3xl">{{now}}</a>

			                <a :href="`${link}/${total}`" class="page-total basic-hover text-gray-400 mt-1">{{total}}</a>
			            </nav>


						<!-- <a href="javascript:;" class="text-black text-3xl">2</a> -->
						<!-- <a href="javascript:;" class="text-gray-400 page-total mt-1">5</a> -->


						<a href="<?= $nexturl ?>" class="ml-6 basic-hover"><svg width="43" height="43" viewBox="0 0 42.84 42.84">
							<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
							<g>
							<rect x="15.67" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
							<polygon points="29.46 21.42 22.68 18.52 22.68 24.33 29.46 21.42" style="fill: #fff;"/>
							</g>
						</svg></a>
					</div>
				</div>

				<div class="basic-hover" onclick="history.back()">
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