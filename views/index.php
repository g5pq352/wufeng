<?php
require_once 'Connections/connect2data.php';
$latestlist = $DB->query("SELECT l_date, DAY(l_date) AS D FROM latest_set WHERE l_parent='latestC' AND l_active=1 AND DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= l_date GROUP BY D ORDER BY D ASC");
?>
<html>
<head>
	<?php include 'html_head.php'; ?>

	<style>
	.small-menuWrap{
		display: none;
	}
	</style>
</head>

<body class="bg-[#efebe4]">
	<?php include 'topmenu.php'; ?>

	<!-- <div class="fixed inset-0 w-full h-full move-go hidden z-10">
		<div class="absolute top-0 left-0 w-full h-full bg-[#000000] opacity-50"></div>
		<div class="absolute tf"><img src="images/move-go.svg"></div>
	</div> -->

	<main class="fixed bg-orange-100 z-60 fixed w-full h-full top-0 left-0">
		<div class="fixed tf -z-20"><img src="images/index-logo.svg" class="w-[390px] lg:w-auto lg:max-w-none"></div>

		<div class="box-area px-12 lg:px-5 pt-7 pb-32 text-white text-3xl lg:text-sm relative h-screenreen">
			<div class="box-bg absolute w-full h-[200%] top-0 left-0 z-30 bg-gradient-to-t from-orange-100 via-orange-100 to-transparent"></div>

			<div class="items-area relative">
				<div class="pic absolute -z-10 top-0 left-0 lg:-top-32 lg:left-auto lg:right-3"><img src="images/fly-img-1-desk.jpg" class="lg:hidden"><img src="images/fly-img-1.jpg" class="hidden lg:block"></div>

				<div class="item absolute -top-2 flex right-4 lg:-top-12 lg:right-0"><span class="category-border-radius-right py-2 px-7 bg-blue">\( ^▽^ )/</span></div>
				<div class="item absolute top-[6vh] flex right-4 lg:-top-[3vh] lg:right-0"><span class="category-border-radius-right py-2 px-7 bg-green">
					要不要計劃一個台灣霧峰的旅行？<br>
					聽說那裡風景優美，美食也很棒。
				</span></div>
				<div class="item absolute top-[12vh] flex lg:top-[5vh] right-0"><span class="category-border-radius-right py-2 px-7 bg-orange">Σヽ(ﾟД ﾟ; )ﾉ 好想去~~!<br><br></span></div>
				<div class="item absolute top-[2vh] left-[8vw] lg:top-[15vh] lg:left-auto flex z-10"><span class="category-border-radius py-2 px-7 bg-blue">天啊!+1</span></div>
				<div class="item absolute top-[7vh] left-[12vw] lg:left-auto flex ml-16"><span class="category-border-radius-right py-2 px-7 bg-green">現在馬上就出發!!!</span></div>
				<div class="item absolute top-[16vh] flex left-[22vw] lg:left-auto lg:right-0"><span class="category-border-radius-right py-2 px-7 bg-white text-black">現在馬上就出發!!!</span></div>

				<div class="pic absolute -z-10 top-0 right-0 lg:top-16 lg:-right-5"><img src="images/fly-img-2-desk.jpg" class="lg:hidden"><img src="images/fly-img-2.jpg" class="hidden lg:block"></div>

				<div class="item absolute top-[23vh] flex right-[22vw] lg:right-0"><span class="category-border-radius-right py-2 px-7 bg-blue">
					全世界最大清代<br>
					〔宮保第〕一品官宅建築群<br>
					在霧峰!!!
				</span></div>
				<div class="item absolute top-[28vh] left-[2vw] lg:left-auto flex"><span class="category-border-radius py-2 px-7 bg-orange">好想去吃霧峰米</span></div>
				<div class="item absolute top-[35vh] flex"><span class="category-border-radius py-2 px-7 bg-white text-black">天啊!+1</span></div>
				<div class="item absolute top-[38vh] flex right-[25vw] lg:right-8"><span class="category-border-radius py-2 px-7 bg-green">還有農旅行程可以參考</span></div>
				<div class="item absolute top-[40vh] left-[20vw] lg:top-[44vh] lg:left-10 flex"><span class="category-border-radius py-2 px-7 bg-blue">LET’S GO!!</span></div>
				<div class="item absolute top-[46vh] left-[7vw] lg:left-auto flex"><span class="category-border-radius py-2 px-7 bg-blue"><br>霧峰有機田有守護神?!</span></div>
				<div class="item absolute top-[56vh] left-[27vw] lg:left-[18px] flex"><span class="category-border-radius py-2 px-7 bg-blue">(＾ω＾)</span></div>
				<div class="item absolute top-[50vh] flex lg:top-[54vh] right-[10vw] lg:right-0 z-10"><span class="category-border-radius-right py-2 px-7 bg-white text-black">
					我們來一場以農為本的<br>
					創意之路吧!!!!
				</span></div>
				<div class="item absolute top-[61vh] flex right-[18vw] lg:right-0"><span class="category-border-radius-right py-2 px-7 bg-green">
					要不要計劃一個台灣霧峰的旅行？<br>
					聽說那裡風景優美，美食也很棒。
				</span></div>
				<div class="item absolute top-[58vh] left-[6vw] lg:top-[67vh] lg:left-5 flex"><span class="category-border-radius py-2 px-7 bg-white text-black">天啊!+1</span></div>
				<div class="item absolute top-[68vh] flex right-[20vw] lg:right-0 z-20"><span class="category-border-radius-right py-2 px-7 bg-orange">Σヽ(ﾟД ﾟ; )ﾉ 好想去~~!<br><br></span></div>
				<div class="item absolute top-[63vh] left-[26vw] lg:top-[73vh] flex z-10"><span class="category-border-radius py-2 px-7 bg-green">好想去吃霧峰米</span></div>
				<div class="item absolute top-[71vh] left-[11vw] lg:top-[76vh] lg:left-auto flex"><span class="category-border-radius py-2 px-7 bg-blue">天啊!+1</span></div>

				<div class="pic absolute -z-10 top-[64vh] left-[12vw] lg:top-[72vh] lg:left-3"><img src="images/fly-img-3-desk.jpg" class="lg:hidden"><img src="images/fly-img-3.jpg" class="hidden lg:block"></div>

				<div class="item absolute top-[78vh] flex right-[25vw] lg:right-0 z-10"><span class="category-border-radius-right py-2 px-7 bg-green">
					要不要計劃一個台灣霧峰的旅行？<br>
					聽說那裡風景優美，美食也很棒。
				</span></div>
				<div class="item absolute top-[84vh] flex left-[24vw] lg:left-[60px] z-20"><span class="category-border-radius-right py-2 px-7 bg-white text-black">現在馬上就出發!!!</span></div>
				<div class="item absolute top-[76vh] left-[17vw] lg:top-[88vh] lg:left-5 flex"><span class="category-border-radius py-2 px-7 bg-blue">(＾ω＾)</span></div>
				<div class="item absolute top-[90vh] flex right-[136px] lg:right-0"><span class="category-border-radius-right py-2 px-7 bg-blue">\( ^▽^ )/</span></div>
			</div>
		</div>
	</main>

	<div class="flex lg:block lg:mr-0">
		<div class="w-[50vw] xl:w-[50vw] h-screen sticky top-0 lg:hidden">
			<?php include 'desktop_slider.php'; ?>
		</div>
		<div class="w-[35vw] xl:w-[33vw] lg:w-full">
			<!--  -->
			<div class="">
				<div class="mt-[100px] space-y-12" id="aritcleList">

					<?php foreach($latestlist as $latestC) :
					$w = date("w", strtotime($latestC['l_date']));
					$week = array(
						"0"=>"日",
						"1"=>"一",
						"2"=>"二",
						"3"=>"三",
						"4"=>"四",
						"5"=>"五",
						"6"=>"六"
					);
					?>
					<?php $lists = $DB->query("SELECT * FROM latest_set WHERE l_parent='latestC' AND l_active=1 AND DAY(l_date)=? ORDER BY l_sort ASC", [$latestC['D']]); ?>
						<section class="px-5">
							<div class="text-center text-white mb-3"><span class="inline-block rounded-full bg-gray-400 px-2"><?= date("m月d日", strtotime($latestC['l_date'])).'('.$week[$w].')' ?></span></div>
							<div class="space-y-12">
								<!-- 物件 start -->

								<?php foreach($lists as $list) : ?>
								<?php $list_pic = $DB->row("SELECT * FROM file_set WHERE file_d_id=? AND file_type='latestCCover'", [$list['l_id']]); ?>

									<!-- 版型一(五格) -->
									<?php if($list['l_class'] == 1) : ?>
									<?php $works = $DB->query("SELECT * FROM data_set WHERE d_class1='latest' AND d_class2=? AND d_active=1 ORDER BY d_sort ASC LIMIT 4", [$list['l_id']]); ?>
										<article>
											<div class="category-border-radius">
												<div class="relative"><a href="<?= $baseurl ?>/chosen/<?= $list['l_slug'] ?>">
													<div class=""><img src="<?= $list_pic['file_link1'] ?>" class=""></div>
													<div class="absolute h-full flex flex-col justify-end top-0 left-0 px-3 py-4 text-white">
														<div class=""><img src="images/tg-big.svg"></div>
														<div class="text-[27px] font-bold"><?= $list['l_title'] ?></div>
													</div>
												</a></div>
												<ul class="grid grid-cols-2" v-scope="{
													posts: [
														<?php foreach($works as $row) : ?>
														<?php $pic = $DB->row("SELECT * FROM file_set WHERE file_d_id=? AND file_type='latestCover'", [$row['d_id']]); ?>
															{
																title: `<?= $row['d_title'] ?>`,
																pic: '<?= $baseurl ?>/<?= $pic['file_link1'] ?>',
																link: `<?= $baseurl ?>/chosen/<?= $list['l_slug'] ?>`,
															},
														<?php endforeach ?>
													]
												}">
													<li v-for="(p, i) in posts" class="relative"><a :href="p.link">
														<div class="relative">
															<img :src="p.pic">
															<div class="absolute top-0 left-0 w-full h-full bg-black-700 opacity-50"></div>
														</div>
														<div class="absolute flex flex-col justify-between h-full top-0 left-0 px-3 py-4 text-white">
															<div class="">
																<div class="opacity-60">no.{{i+1}}</div>
																<div class="text-3xl lg:text-base">{{p.title}}</div>
															</div>
															<div class="">
																<div class="text-3xl lg:text-base">{{p.note}}</div>
															</div>
														</div>
													</a></li>
												</ul>
											</div>
											<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base"><?= date("H:i", strtotime($latestC['l_date'])) ?></div>
										</article>
									<?php endif ?>

									<!-- 版型二(輪播) -->
									<?php if($list['l_class'] == 2) : ?>
									<?php
									$works = $DB->row("SELECT * FROM data_set, file_set WHERE d_class1='latest' AND d_class2=? AND file_d_id=d_id AND file_type='latestCover' AND d_active=1 ORDER BY d_sort ASC", [$list['l_id']]);
									$pics = $DB->query("SELECT * FROM file_set WHERE file_d_id=? AND file_type='image'", [$works['d_id']]);
									?>
										<article>
											<div class="category-border-radius">
												<div class="relative"><a href="<?= $baseurl ?>/message/<?= $works['d_slug'] ?>">
													<div class=""><img src="images/item-1.jpg"></div>
													<!-- <div class="absolute top-4 right-4 text-white text-sm border border-white rounded-full px-2">假日去哪兒</div> -->
													<div class="absolute h-full flex flex-col top-0 left-0 px-3 py-4 text-white">
														<div class=""><img src="images/tg-big.svg"></div>
														<div class="text-[25px] font-bold"><?= nl2br($list['l_title']) ?></div>
													</div>
												</a></div>
												<div class="relative">
													<ul v-scope="{
														posts: [
															<?php foreach($pics as $pic) : ?>
																'<?= $baseurl ?>/<?= $pic['file_link1'] ?>',
															<?php endforeach ?>
														]
													}" v-on:vue:mounted="modsHandler($el)" class="modsSlider">
														<li v-for="p in posts" class="w-[55%]"><img :src="p"></li>
													</ul>

													<div class="mods-prev basic-hover absolute tf-y left-2"><svg  width="42.84" height="42.84" viewBox="0 0 42.84 42.84">
														<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
														<g>
														<rect x="19.57" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
														<polygon points="13.38 21.42 20.17 24.33 20.17 18.52 13.38 21.42" style="fill: #fff;"/>
														</g>
													</svg></div>
													<div class="mods-next basic-hover absolute tf-y right-2"><svg width="42.84" height="42.84" viewBox="0 0 42.84 42.84">
														<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
														<g>
														<rect x="15.67" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
														<polygon points="29.46 21.42 22.68 18.52 22.68 24.33 29.46 21.42" style="fill: #fff;"/>
														</g>
													</svg></div>
												</div>
											</div>
											<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base"><?= date("H:i", strtotime($latestC['l_date'])) ?></div>
										</article>
									<?php endif ?>

									<!-- 版型二(三格) -->
									<?php if($list['l_class'] == 3) : ?>
									<?php $works = $DB->query("SELECT * FROM data_set, file_set WHERE d_class1='latest' AND d_class2=? AND file_d_id=d_id AND file_type='latestCover' AND d_active=1 ORDER BY d_sort ASC LIMIT 3", [$list['l_id']]); ?>
										<article>
											<div class="category-border-radius">
												<ul class="" v-scope="{
														posts: [
															<?php foreach($works as $row) : ?>
																{
																	pic: '<?= $baseurl ?>/<?= $row['file_link1'] ?>',
																	cat: '<?= $list['l_title'] ?>',
																	title: `<?= nl2br($row['d_data1']) ?>`,
																	link: `<?= $baseurl ?>/message/<?= $row['d_slug'] ?>`,
																},
															<?php endforeach ?>
														]
													}">
													<li v-for="(p, i) in posts"><a :href="p.link" class="relative flex category-border-radius px-8 py-6 lg:p-3 pb-10 justify-between" :class="{
														'bg-blue': i == 0, 'bg-green': i == 1, 'bg-orange': i == 2
													}">
														<div class="mr-3" :class="i % 2 != 0 ? 'hidden' : ''"><img :src="p.pic" class="max-w-[260px] lg:max-w-full rounded-[32px]"></div>
														<div class="text-white">
															<div class="rounded-full border border-white px-2 lg:text-sm opacity-80 mb-4 w-max text-lg">{{p.cat}}</div>
															<div class="mb-1"><img src="images/tg-big-white.svg" class="w-16 lg:w-auto"></div>
															<div class="font-bold text-[44px] leading-tight tracking-wide lg:text-[26px] lg:tracking-normal" v-html="p.title"></div>
														</div>
														<div class="ml-3" :class="i % 2 == 0 ? 'hidden' : ''"><img :src="p.pic" class="max-w-[240px] lg:max-w-full rounded-[32px]"></div>
													</a></li>
												</ul>
											</div>
											<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base"><?= date("H:i", strtotime($latestC['l_date'])) ?></div>
										</article>
									<?php endif ?>

								<?php endforeach ?>

								<!-- 物件 end -->
							</div>
						</section>
					<?php endforeach ?>

					<!-- <section class="px-5">
						<div class="text-center text-white mb-3"><span class="inline-block rounded-full bg-gray-400 px-2">11月9日(四)</span></div>
						<div class="space-y-12">
							<article>
								<div class="category-border-radius">
									<div class="relative"><a href="chosen">
										<div class=""><img src="images/item-1.jpg" class=""></div>
										<div class="absolute h-full flex flex-col justify-end top-0 left-0 px-3 py-4 text-white">
											<div class=""><img src="images/tg-big.svg"></div>
											<div class="text-[27px] font-bold">走進霧峰的時光隧道</div>
										</div>
									</a></div>
									<ul class="grid grid-cols-2" v-scope="{
											posts: [{
												title: '霧峰林家建築群',
												tag: '全世界最大清代',
												note: '〔宮保第〕一品官宅建築群',
												pic: 'images/item-2.jpg',
												link: `chosen`,
											}, {
												title: '民生故事館',
												tag: '我有故事',
												note: '也有酒',
												pic: 'images/item-3.jpg',
												link: `chosen`,
											}, {
												title: '光復新村',
												tag: '全台灣',
												note: '第一個新市鎮',
												pic: 'images/item-4.jpg',
												link: `chosen`,
											},{
												title: '省議會紀念園區',
												tag: '台灣',
												note: '民主發源地',
												pic: 'images/item-5.jpg',
												link: `chosen`,
											}]
										}">
										<li v-for="(p, i) in posts" class="relative"><a :href="p.link">
											<div class="relative">
												<img :src="p.pic">
												<div class="absolute top-0 left-0 w-full h-full bg-black-700 opacity-50"></div>
											</div>
											<div class="absolute flex flex-col justify-between h-full top-0 left-0 px-3 py-4 text-white">
												<div class="">
													<div class="opacity-60">no.{{i+1}}</div>
													<div class="text-3xl lg:text-base">{{p.title}}</div>
												</div>
												<div class="">
													<div class="text-3xl lg:text-base">{{p.note}}</div>
												</div>
											</div>
										</a></li>
									</ul>
								</div>
								<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base">7:00</div>
							</article>
							<article>
								<div class="category-border-radius">
									<div class="relative"><a href="message/全世界最大清代〔宮保第〕一品官宅建築群">
										<div class=""><img src="images/item-1.jpg"></div>
										<div class="absolute top-4 right-4 text-white text-sm border border-white rounded-full px-2">假日去哪兒</div>
										<div class="absolute h-full flex flex-col top-0 left-0 px-3 py-4 text-white">
											<div class=""><img src="images/tg-big.svg"></div>
											<div class="text-[25px] font-bold">全世界最大清代<br>〔宮保第〕一品官宅建築群</div>
										</div>
									</a></div>
									<div class="relative">
										<ul v-scope="{
											posts: [
												'images/item-6.jpg',
												'images/item-8.jpg',
												'images/item-6.jpg',
												'images/item-7.jpg',
											]
										}" v-on:vue:mounted="modsHandler($el)" class="modsSlider">
											<li v-for="p in posts" class="w-[55%]"><img :src="p"></li>
										</ul>

										<div class="mods-prev basic-hover absolute tf-y left-2"><svg  width="42.84" height="42.84" viewBox="0 0 42.84 42.84">
											<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
											<g>
											<rect x="19.57" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
											<polygon points="13.38 21.42 20.17 24.33 20.17 18.52 13.38 21.42" style="fill: #fff;"/>
											</g>
										</svg></div>
										<div class="mods-next basic-hover absolute tf-y right-2"><svg width="42.84" height="42.84" viewBox="0 0 42.84 42.84">
											<circle cx="21.42" cy="21.42" r="21.42" style="fill: #b4b4b5;"/>
											<g>
											<rect x="15.67" y="20.68" width="7.61" height="1.49" style="fill: #fff;"/>
											<polygon points="29.46 21.42 22.68 18.52 22.68 24.33 29.46 21.42" style="fill: #fff;"/>
											</g>
										</svg></div>
									</div>
								</div>
								<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base">12:00</div>
							</article>
							<article>
								<div class="category-border-radius">
									<div class="relative"><a href="chosen">
										<div class=""><img src="images/item-1.jpg" class=""></div>
										<div class="absolute h-full flex flex-col justify-end top-0 left-0 px-3 py-4 text-white">
											<div class=""><img src="images/tg-big.svg"></div>
											<div class="text-[27px] font-bold">走進霧峰的時光隧道</div>
										</div>
									</a></div>
									<ul class="grid grid-cols-2" v-scope="{
											posts: [{
												title: '霧峰林家建築群',
												tag: '全世界最大清代',
												note: '〔宮保第〕一品官宅建築群',
												pic: 'images/item-2.jpg',
												link: `chosen`,
											}, {
												title: '民生故事館',
												tag: '我有故事',
												note: '也有酒',
												pic: 'images/item-3.jpg',
												link: `chosen`,
											}, {
												title: '光復新村',
												tag: '全台灣',
												note: '第一個新市鎮',
												pic: 'images/item-4.jpg',
												link: `chosen`,
											},{
												title: '省議會紀念園區',
												tag: '台灣',
												note: '民主發源地',
												pic: 'images/item-5.jpg',
												link: `chosen`,
											}]
										}">
										<li v-for="(p, i) in posts" class="relative"><a :href="p.link">
											<div class="relative">
												<img :src="p.pic">
												<div class="absolute top-0 left-0 w-full h-full bg-black-700 opacity-50"></div>
											</div>
											<div class="absolute flex flex-col justify-between h-full top-0 left-0 px-3 py-4 text-white">
												<div class="">
													<div class="opacity-60">no.{{i+1}}</div>
													<div class="text-3xl lg:text-base">{{p.title}}</div>
												</div>
												<div class="">
													<div class="text-3xl lg:text-base">{{p.note}}</div>
												</div>
											</div>
										</a></li>
									</ul>
								</div>
								<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base">7:00</div>
							</article>
						</div>
					</section>
					<section class="px-5">
						<div class="text-center text-white mb-3"><span class="inline-block rounded-full bg-gray-400 px-2">11月10日(五)</span></div>
						<div class="space-y-12">
							<article>
								<div class="category-border-radius">
									<ul class="" v-scope="{
											posts: [{
												pic: 'images/item-13.jpg',
												cat: '2023全霧峰精選系列',
												title: `走進霧峰的<br>時光隧道`,
												link: `message/全世界最大清代〔宮保第〕一品官宅建築群`,
											}, {
												pic: 'images/item-14.jpg',
												cat: '2023全霧峰精選系列',
												title: `得天獨厚的<br>天生好米`,
												link: `message2/得天獨厚的天生好米`,
											}, {
												pic: 'images/item-15.jpg',
												cat: '2023全霧峰精選系列',
												title: `台灣<br>民主發源地`,
												link: `message3/台灣民主發源地`,
											}]
										}">
										<li v-for="(p, i) in posts"><a :href="p.link" class="relative flex category-border-radius px-8 py-6 lg:p-3 pb-10 justify-between" :class="{
											'bg-blue': i == 0, 'bg-green': i == 1, 'bg-orange': i == 2
										}">
											<div class="mr-3" :class="i % 2 != 0 ? 'hidden' : ''"><img :src="p.pic" class="max-w-[260px] lg:max-w-full rounded-[32px]"></div>
											<div class="text-white">
												<div class="rounded-full border border-white px-2 lg:text-sm opacity-80 mb-4 w-max text-lg">{{p.cat}}</div>
												<div class="mb-1"><img src="images/tg-big-white.svg" class="w-16 lg:w-auto"></div>
												<div class="font-bold text-[44px] leading-tight tracking-wide lg:text-[26px] lg:tracking-normal" v-html="p.title"></div>
											</div>
											<div class="ml-3" :class="i % 2 == 0 ? 'hidden' : ''"><img :src="p.pic" class="max-w-[240px] lg:max-w-full rounded-[32px]"></div>
										</a></li>
									</ul>
								</div>
								<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base">7:00</div>
							</article>
						</div>
					</section>
				</div>

				<div class="mt-12 mb-32" id="last-child">
					<div class="h-[71vh] lg:h-[120vw] w-full category-border-radius" style="background: url('images/index-para.jpg') center center / cover no-repeat;"></div>

					<div class="font-en text-gray mt-2 text-right text-3xl lg:text-base px-5">13:00</div>
				</div>
			</div> -->
		</div>
		<div class="mt-12 mb-5 mr-4 lg:hidden"><svg width="34.36" height="34.36" viewBox="0 0 34.36 34.36" class="backtotop ml-auto basic-hover">
			<rect width="34.36" height="34.36" rx="8" ry="8" transform="translate(34.36 34.36) rotate(180)" style="fill: #fff;"/>
			<g>
				<rect x="16.19" y="16.23" width="1.98" height="10.15" style="fill: #231815;"/>
				<polygon points="17.18 7.98 13.3 17.03 21.05 17.03 17.18 7.98" style="fill: #231815;"/>
			</g>
		</svg></div>
	</div>

	<div class="fixed bottom-0 w-full hidden lg:block">
		<div class="mb-5 mr-4"><svg width="34.36" height="34.36" viewBox="0 0 34.36 34.36" class="backtotop ml-auto">
			<rect width="34.36" height="34.36" rx="8" ry="8" transform="translate(34.36 34.36) rotate(180)" style="fill: #fff;"/>
			<g>
				<rect x="16.19" y="16.23" width="1.98" height="10.15" style="fill: #231815;"/>
				<polygon points="17.18 7.98 13.3 17.03 21.05 17.03 17.18 7.98" style="fill: #231815;"/>
			</g>
		</svg></div>

		<div class="bg-[#efebe4]">
			<div class="menuList">
				<ul class="marquee flex flex-nowrap w-max space-x-6 font-bold bg-green text-white border border-white rounded-[12px] overflow-hidden">
					<li class="inline-block w-max">2023/11/16 22°C  最新祭典活動開始了!快到霧峰遊玩</li>
					<li class="inline-block w-max">2023/11/16 22°C  最新祭典活動開始了!快到霧峰遊玩</li>
					<li class="inline-block w-max">2023/11/16 22°C  最新祭典活動開始了!快到霧峰遊玩</li>
				</ul>

				<div class="flex min-h-[190px] h-full">
					<div class="bg-orange-100 flex items-center px-3 border border-white rounded-[12px] overflow-hidden"><img src="images/menu-logo.svg"></div>
					<nav class="grid grid-cols-3 w-full h-[190px]">
						<a class="h-[95px]" href="<?= $baseurl ?>"><div class="h-full relative h-full bg-orange-100 flex items-end justify-center py-1 border border-white rounded-[12px] overflow-hidden">
							<div class="absolute tf -mt-2"><img src="images/menu-logo-1.svg" class="max-w-none"></div>
							<div class="text-center font-bold text-sm">進入首頁</div>
						</div></a>
						<a class="h-[95px]" href="<?= $baseurl ?>/news"><div class="h-full relative h-full bg-orange-100 flex items-end justify-center py-1 border border-white rounded-[12px] overflow-hidden">
							<div class="absolute tf mt-2 -ml-2"><img src="images/menu-logo-2.svg" class="max-w-none"></div>
							<div class="text-center font-bold text-sm">活動情報</div>
						</div></a>
						<a class="h-[95px]" href="javascript:;"><div class="h-full relative h-full bg-orange-100 flex items-end justify-center py-1 border border-white rounded-[12px] overflow-hidden">
							<div class="absolute tf -mt-2"><img src="images/menu-logo-3.svg" class="max-w-none"></div>
							<div class="text-center font-bold text-sm">熱點通知</div>
						</div></a>
						<a class="h-[95px]" href="<?= $baseurl ?>/sights/category/在地美食"><div class="h-full relative h-full bg-orange-100 flex items-end justify-center py-1 border border-white rounded-[12px] overflow-hidden">
							<div class="absolute tf -mt-2"><img src="images/menu-logo-4.svg" class="max-w-none"></div>
							<div class="text-center font-bold text-sm">在地美食</div>
						</div></a>
						<a class="h-[95px]" href="<?= $baseurl ?>/map"><div class="h-full relative h-full bg-orange-100 flex items-end justify-center py-1 border border-white rounded-[12px] overflow-hidden">
							<div class="absolute tf -mt-2"><img src="images/menu-logo-5.svg" class="max-w-none"></div>
							<div class="text-center font-bold text-sm">地圖搜尋</div>
						</div></a>
						<a class="h-[95px] openMenu" href="javascript:;"><div class="h-full relative h-full bg-orange-100 flex items-end justify-center py-1 border border-white rounded-[12px] overflow-hidden">
							<div class="absolute tf -mt-2"><img src="images/menu-logo-6.svg" class="max-w-none"></div>
							<div class="text-center font-bold text-sm">打開選單</div>
						</div></a>
					</nav>
				</div>
			</div>

			<div class="menuSlide h-10 flex items-center justify-center bg-orange-100 border border-white rounded-[12px] overflow-hidden">
				<div class="">
					<svg width="8.82" height="6.79" viewBox="0 0 8.82 6.79">
						<polygon points="4.41 0 0 6.79 8.82 6.79 4.41 0"/>
					</svg>
				</div>
				<div class="ch font-bold text-xs tracking-normal ml-2">下滑收合</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>
</body>

<?php include 'script.php'; ?>
</html>

<script>
$("#aritcleList section:last-child").attr('id', 'last-child');

var lastScrollTop = 0;
$(window).scroll(function(event){
	var st = $("body").scrollTop();
	if (st > lastScrollTop){
		$(".menuList").slideUp(300)
		// $("#last-child").addClass("is-open")
		$(".menuSlide .ch").text("點此展開")
		$(".menuSlide").addClass("is-open")
	}
	lastScrollTop = st;
});

// TweenMax.to($(window), .1, {
// 	scrollTo: {
// 		y: $("#last-child"),
// 		offsetY: 0
// 	},
// 	ease:Power2.easeInOut,
// 	onComplete: function() {}
// })

gsap.set(".box-bg", {
	y: "100%",
})

var _name = $.cookie('name');     // 读取 cookie
$(function() {
	if(_name) {
		$("main").addClass('opacity-0 pointer-events-none')

		// TweenMax.to($(window), 2.5, {
		// 	delay: 1,
		// 	scrollTo: {
		// 		y: $("#last-child"),
		// 		offsetY: -$("#last-child").height()
		// 	},
		// 	ease:Power2.easeInOut,
		// 	onComplete: function() {
		// 		$(".move-go").fadeIn(500)
		// 	}
		// })
	} else {
		gsap.delayedCall(0.2, function () {
			gsap.to(".box-bg", {
				y: "-50%",
				duration: 1.5,
				delay: 2,
				ease: "none",
				onComplete: function () {
					$("main").fadeOut(1000)
					$("body").removeClass("is-lock")

					// TweenMax.to($(window), 2.5, {
					// 	scrollTo: {
					// 		y: $("#last-child"),
					// 		offsetY: -$("#last-child").height()
					// 	},
					// 	ease:Power2.easeInOut,
					// 	onComplete: function() {
					// 		$(".move-go").fadeIn(500)
					// 	}
					// })
				}
			})
		});
		
		birdsreset()
		$.cookie('name', 'first');  // 创建 cookie
	}
});

$(window).scroll(function() {
	$(".move-go").fadeOut(200)
})



function birdsreset() {
	// bird set position
	gsap.set($(".items-area .item"), {
		// opacity: 0,
		scale: 0,
		// y: function(index, target, targets) {
		// 	return gsap.utils.random($("main").height() * 0.85, $("main").height() * 0)
		// },
	});
	gsap.set($(".items-area .pic"), {
		opacity: 0,
	});

	// bird fly
	gsap.to($(".items-area .item"), {
		scale: 1,
		// opacity: 1,
		stagger: {
			each: .1,
	    	ease: "power2.out",
		},
		// duration: .25,
		duration: .4,
		ease: "back.out",
	});
	gsap.to($(".items-area .pic"), {
		opacity: 1,
		stagger: .555,
	    ease: "none",
	});
}

function modsHandler(el) {
	var $carousel = $(el).flickity({
		"prevNextButtons": false,
		"pageDots": false,
		"wrapAround": true,
		"autoPlay": 4000,
		"pauseAutoPlayOnHover": false,
		"imagesLoaded": true,
		"cellAlign": "center",
		"selectedAttraction": 0.02,
		"arrowShape": ""
	});

	$(".mods-prev").on("click", () => {
		$carousel.flickity('previous')
	})
	$(".mods-next").on("click", () => {
		$carousel.flickity('next')
	})
}

$(".menuSlide").on("click", function(){
	if($(this).hasClass("is-open")){
		$(this).find(".ch").text("下滑收合")
	}else{
		$(this).find(".ch").text("點此展開")
	}

	$(this).toggleClass("is-open")

	$(".menuList").slideToggle(300)

	// $("#last-child").toggleClass("is-open")
})
</script>