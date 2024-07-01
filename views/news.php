<?php
require_once 'Connections/connect2data.php';
require_once 'paginator.class.php';

//page start
$page = (isset($p)) ? $p : 1;
$_GET['page'] = $page;
$maxItem = 8;
$limit = ($page - 1) * $maxItem;

$pp = $page - 1;
$prevurl = (isset($slug)) ? "$baseurl/news/$slug/$pp" : "$baseurl/news/$pp";

$nn = $page + 1;
$nexturl = (isset($slug)) ? "$baseurl/news/$slug/$nn" : "$baseurl/news/$nn";

// 拿來計算全部有幾則
$workTotal = $DB->query("SELECT * FROM data_set, file_set WHERE d_class1='news' AND d_id=file_d_id AND file_type='newsCover' AND d_active=1 ORDER BY d_sort ASC");
$pageTotalCount = count($workTotal);
$totalpage = ceil($pageTotalCount / $maxItem);

//使用
$work = $DB->query("SELECT * FROM data_set, file_set WHERE d_class1='news' AND d_id=file_d_id AND file_type='newsCover' AND d_active=1 ORDER BY d_sort ASC LIMIT ?, ?", [$limit, $maxItem]);

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
			<div class="mt-[132px] mb-[92px]">
				<div class="-ml-3 -mb-[112px]"><img src="images/news-deco.svg"></div>
				<div class="text-center">
					<div class="font-bold text-[28px]">活動情報</div>
					<div class="font-en text-gray-400 text-4xl">#News</div>
				</div>
			</div>

			<div class="px-4 mb-[112px]">
				<ul v-scope="{
					posts: [
						<?php foreach ($work as $row): ?>
							{
								pic: '<?= $baseurl ?>/<?= $row['file_link1'] ?? '' ?>',
								date: `<?= date("M d, y", strtotime($row['d_date'])) ?>`,
								title: `<?= nl2br($row['d_title']) ?>`,
								note: `<?= nl2br($row['d_data1']) ?>`,
								link: '<?= $baseurl ?>/news/<?= $row['d_slug'] ?>',
							},
	                    <?php endforeach ?>
					]
				}" class="space-y-4">
					<li v-for="p in posts" class="category-border-radius bg-white p-3"><a :href="p.link">
						<div class="flex">
							<div class="mr-3 max-w-[45%]"><img :src="p.pic" class="rounded-2xl"></div>
							<div class="">
								<div class="font-en text-sm font-light text-gray-300 mb-4">{{p.date}}</div>
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
			                link: '<?= (isset($slug)) ? "$baseurl/news/$slug" : "$baseurl/news" ?>',
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

				<div class="basic-hover">
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