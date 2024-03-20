<div id="preload" style="z-index: 109; position: fixed; top: 0; right: 0; bottom: 0; left: 0; background-color: #fff;"></div>

<header class="fixed top-0 z-50 bg-orange-100 w-full flex items-center justify-between px-5 py-3">
	<div class="font-bold text-5xl tracking-wide"><a href="./">霧峰好玩</a></div>

	<div class="searcOpen">
		<svg width="18.77" height="18.01" viewBox="0 0 18.77 18.01">
			<circle cx="7.78" cy="7.78" r="6.55" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
			<line x1="12.77" y1="12" x2="17.9" y2="17.14" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
		</svg>
		
		<svg width="19.41" height="17.61" viewBox="0 0 19.41 17.61" class="hidden">
			<line x1="18.59" y1=".92" x2=".82" y2="16.69" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
			<line x1="18.59" y1="16.69" x2=".82" y2=".92" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
		</svg>
	</div>
</header>

<div class="searchWrap fixed top-0 w-full h-screen z-20 transition-all duration-500 opacity-0 pointer-events-none">
	<div class="search-bg absolute w-full h-full top-0 left-0 bg-black-700 opacity-80"></div>

	<form action="" method="post" class="relative px-5 mt-[62px]">
		<div class="relative">
			<input type="text" name="search" placeholder="輸入景點關鍵字" class="w-full px-5 py-3">
			<div class="absolute right-4 tf-y">
				<button><svg width="15.28" height="14.66" viewBox="0 0 15.28 14.66">
					<circle cx="6.33" cy="6.33" r="5.33" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2px;"/>
					<line x1="10.4" y1="9.77" x2="14.58" y2="13.95" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2px;"/>
				</svg></button>
			</div>
		</div>
	</form>
</div>

<div class="menuWrap fixed bg-[#efebe4] top-0 w-full h-full z-60 overflow-y-auto transition-all duration-500 opacity-0 pointer-events-none">
	<div class="closeMenu absolute top-3 right-5"><svg width="19.41" height="17.61" viewBox="0 0 19.41 17.61">
		<line x1="18.59" y1=".92" x2=".82" y2="16.69" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
		<line x1="18.59" y1="16.69" x2=".82" y2=".92" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
	</svg></div>

	<div class="pt-[118px] mb-12"><img src="images/menu-big-logo.svg" class="mx-auto"></div>

	<div class="px-9">
		<form action="" method="POST" class="relative mb-7">
			<div class="relative">
				<input type="text" name="search" placeholder="輸入景點關鍵字" class="text-center w-full px-5 py-3">
				<div class="absolute right-4 tf-y">
					<button><svg width="15.28" height="14.66" viewBox="0 0 15.28 14.66">
						<circle cx="6.33" cy="6.33" r="5.33" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2px;"/>
						<line x1="10.4" y1="9.77" x2="14.58" y2="13.95" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2px;"/>
					</svg></button>
				</div>
			</div>
		</form>

		<div class="">
			<div class="font-bold mb-4">熱門搜尋</div>

			<nav v-scope="{
				posts: [
					'菇的故鄉',
					'台灣最大清代官宅',
					'心魂傾注造酒精神',
					'二戰後臺灣第一個新市鎮',
					'民主發源地',
					'國際巨星的MV場景',
					'十分鐘登頂小百岳'
				]
			}" class="space-y-2">
				<a v-for="p in posts" :href="p" class="flex items-center justify-between border-b border-gray-400 pb-1">
					<span class="text-blue">{{p}}</span>
					<span class="pr-7"><svg width="14.22" height="13.59" viewBox="0 0 14.22 13.59">
						<circle cx="5.71" cy="5.71" r="5.33" style="fill: none; stroke: #0082c2; stroke-miterlimit: 10; stroke-width: .75px;"/>
						<line x1="9.77" y1="9.15" x2="13.95" y2="13.33" style="fill: none; stroke: #0082c2; stroke-miterlimit: 10; stroke-width: .75px;"/>
					</svg></span>
				</a>
			</nav>
		</div>

		<div class="my-7">
			<div class="font-bold mb-4">為你推薦</div>

			<nav v-scope="{
				posts: [{
					icon: 'images/recommend-1.svg',
					title: '進入首頁',
					link: '<?= $baseurl ?>',
				},{
					icon: 'images/recommend-2.svg',
					title: '關於霧峰',
					link: '<?= $baseurl ?>/about',
				},{
					icon: 'images/recommend-3.svg',
					title: '活動情報',
					link: '<?= $baseurl ?>/news',
				},{
					icon: 'images/recommend-4.svg',
					title: '在地美食',
					link: '<?= $baseurl ?>/cuisine',
				},{
					icon: 'images/recommend-5.svg',
					title: '景點探索',
					link: '<?= $baseurl ?>/sights',
				},{
					icon: 'images/recommend-6.svg',
					title: '地圖搜尋',
					link: '<?= $baseurl ?>/map',
				},{
					icon: 'images/recommend-7.svg',
					title: '套裝行程',
					link: '<?= $baseurl ?>/itinerary',
				},{
					icon: 'images/recommend-8.svg',
					title: '交通資訊',
					link: '<?= $baseurl ?>/traffic',
				}]
			}" class="space-y-2">
				<a v-for="p in posts" :href="p.link" class="flex items-center justify-between border-b border-gray-400 pb-1">
					<div class="flex items-center">
						<div class="mr-4"><img :src="p.icon"></div>
						<div class="font-bold">{{p.title}}</div>
					</div>
					<div class=""><img src="images/recommend-go.svg"></div>
				</a>
			</nav>
		</div>

		<div class="mb-10">
			<ul class="grid grid-cols-2 gap-x-2 text-center">
				<li class="bg-white pt-3 pb-5 category-border-radius">
					<div class="inline-block mb-1"><img src="images/menu-quick-1.svg"></div>
					<div class="font-bold mb-4">霧峰</div>
					<div class=""><a href=""><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">加入官方LINE</span></a></div>
				</li>
				<li class="bg-white pt-3 pb-5 category-border-radius">
					<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
					<div class="font-bold mb-4">即刻前往</div>
					<div class=""><a href=""><span class="bg-green text-[14px] text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
				</li>
			</ul>
		</div>

		<div class="mb-7 text-black text-xs">
			<div class="">© 2024 TAICHUNG WUFENG ALL RIGHTS RESERVED.</div>
			<div class="opacity-50">SITE BY 很好設計 GOODS DESIGN</div>
		</div>
	</div>
</div>

<div class="small-menuWrap fixed bg-orange-100 w-full bottom-0 z-50">
	<nav class="grid grid-cols-5 text-center">
		<a href="<?= $baseurl ?>/news" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-1.svg"></div>
			<div class="font-medium text-xs tracking-normal">活動情報</div>
		</a>
		<a href="<?= $baseurl ?>" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-2.svg"></div>
			<div class="font-medium text-xs tracking-normal">進入首頁</div>
		</a>
		<a href="javascript:;" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7] openMenu">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-3.svg"></div>
			<div class="font-medium text-xs tracking-normal">打開選單</div>
		</a>
		<a href="<?= $baseurl ?>/map" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-4.svg"></div>
			<div class="font-medium text-xs tracking-normal">地圖搜尋</div>
		</a>
		<a href="<?= $baseurl ?>/cuisine" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-5.svg"></div>
			<div class="font-medium text-xs tracking-normal">在地美食</div>
		</a>
	</nav>
</div>