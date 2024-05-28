<?php
if(isset($now)){

}else{
	$now = '';
}
?>

<div id="preload" style="z-index: 109; position: fixed; top: 0; right: 0; bottom: 0; left: 0; background-color: #fff;"></div>

<header class="hidden lg:flex fixed top-0 z-20 bg-orange-100 w-full flex items-center justify-between px-5 py-3">
	<div class="font-bold text-5xl tracking-wide"><a href="<?= $baseurl ?>">霧峰好玩</a></div>

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

	<form action="<?= $baseurl ?>/search" method="POST" enctype="multipart/form-data" class="relative px-5 mt-[62px]">
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

<div class="fixed right-0 top-0 h-screen flex z-30 justify-end lg:justify-center lg:w-full lg:block lg:relative lg:h-auto">
	<div class="menuWrap absolute bg-[#efebe4] top-0 h-full z-60 overflow-y-auto transition-all duration-500 opacity-0 pointer-events-none w-[21vw] -left-[21vw] xl:w-[25vw] xl:-left-[25vw] xl:zoom-90 lg:left-auto lg:w-full lg:fixed">
		<div class="closeMenu absolute top-3 right-5 basic-hover"><svg width="19.41" height="17.61" viewBox="0 0 19.41 17.61">
			<line x1="18.59" y1=".92" x2=".82" y2="16.69" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
			<line x1="18.59" y1="16.69" x2=".82" y2=".92" style="fill: none; stroke: #251714; stroke-miterlimit: 10; stroke-width: 2.46px;"/>
		</svg></div>

		<div class="pt-[118px] mb-12 hidden lg:block"><img src="images/menu-big-logo.svg" class="mx-auto"></div>

		<div class="px-9 pt-16 lg:pt-0">
			<form action="<?= $baseurl ?>/search" method="POST" enctype="multipart/form-data" class="hidden lg:block relative mb-7">
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
					posts: [{
						cat: '<?= $baseurl ?>/news',
						title: '菇的故鄉',
					},{
						cat: '<?= $baseurl ?>/news',
						title: '台灣最大清代官宅',
					},{
						cat: '<?= $baseurl ?>/news',
						title: '心魂傾注造酒精神',
					},{
						cat: '<?= $baseurl ?>/news',
						title: '二戰後臺灣第一個新市鎮',
					},{
						cat: '<?= $baseurl ?>/news',
						title: '民主發源地',
					},{
						cat: '<?= $baseurl ?>/news',
						title: '國際巨星的MV場景',
					},{
						cat: '<?= $baseurl ?>/news',
						title: '十分鐘登頂小百岳',
					}]
				}" class="grid grid-cols-2 lg:space-y-3 lg:block">
					<a v-for="p in posts" :href="p.cat + '/' + p.title" class="inline-block mb-1 lg:mb-0 lg:flex shrink-0 lg:flex-auto items-center lg:justify-between lg:border-b lg:border-gray-400 lg:pb-1">
						<span class="text-blue text-[15px] lg:text-base">{{p.title}}</span>
						<span class="pr-7 hidden lg:inline-block"><svg width="14.22" height="13.59" viewBox="0 0 14.22 13.59">
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
							<div class="font-bold text-3xl lg:text-base">{{p.title}}</div>
						</div>
						<div class=""><img src="images/recommend-go-desk.svg" class="lg:hidden"><img src="images/recommend-go.svg" class="hidden lg:block"></div>
					</a>
				</nav>
			</div>

			<div class="mb-10 hidden lg:block">
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
	<div class="w-[11vw] xl:w-[16vw] h-screen bg-orange-100 border-l-2 border-white lg:hidden">

		<div class="searchWrap absolute top-0 w-full h-screen z-20 transition-all duration-500 opacity-0 pointer-events-none" id="desktop-searchWrap">
			<div class="search-bg absolute w-full h-full top-0 left-0 bg-black-700 opacity-80"></div>
		</div>

		<form action="<?= $baseurl ?>/search" method="POST" enctype="multipart/form-data" class="relative px-5 mt-6 mb-7" id="desktop-search">
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

		<div class="xl:zoom-80">
			<div class="text-center"><img src="images/desktop-logo.svg" class="inline-block"></div>

			<nav class="w-full mt-5">
				<a class="openMenu" href="javascript:;"><div class="bg-orange-100 flex items-center justify-center py-1 border border-transparent rounded-[12px] h-[68px] duration-300 transition-all hover:border-white hover:bg-[#E2DED7]">
					<div class="text-center w-[50px] mr-5"><img src="images/menu-logo-6.svg" class="max-w-[36px] inline-block lg:max-w-none"></div>
					<div class="text-center font-bold text-[21px] lg:text-sm">打開選單</div>
				</div></a>
				<a class="" href="<?= $baseurl ?>"><div class="bg-orange-100 flex items-center justify-center py-1 border border-transparent rounded-[12px] h-[68px] duration-300 transition-all hover:border-white hover:bg-[#E2DED7]">
					<div class="text-center w-[50px] mr-5"><img src="images/menu-logo-1.svg" class="max-w-[36px] inline-block lg:max-w-none"></div>
					<div class="text-center font-bold text-[21px] lg:text-sm">進入首頁</div>
				</div></a>
				<a class="" href="<?= $baseurl ?>/news"><div class="bg-orange-100 flex items-center justify-center py-1 border border-transparent rounded-[12px] h-[68px] duration-300 transition-all hover:border-white hover:bg-[#E2DED7]">
					<div class="text-center w-[50px] mr-5"><img src="images/menu-logo-2-desk.svg" class="max-w-[48px] lg:max-w-none"></div>
					<div class="text-center font-bold text-[21px] lg:text-sm">活動情報</div>
				</div></a>
				<a class="" href="<?= $baseurl ?>/map"><div class="bg-orange-100 flex items-center justify-center py-1 border border-transparent rounded-[12px] h-[68px] duration-300 transition-all hover:border-white hover:bg-[#E2DED7]">
					<div class="text-center w-[50px] mr-5"><img src="images/menu-logo-5.svg" class="max-w-[46px] inline-block lg:max-w-none"></div>
					<div class="text-center font-bold text-[21px] lg:text-sm">地圖搜尋</div>
				</div></a>
				<a class="" href="<?= $baseurl ?>/cuisine"><div class="bg-orange-100 flex items-center justify-center py-1 border border-transparent rounded-[12px] h-[68px] duration-300 transition-all hover:border-white hover:bg-[#E2DED7]">
					<div class="text-center w-[50px] mr-5"><img src="images/menu-logo-4.svg" class="max-w-[36px] inline-block lg:max-w-none"></div>
					<div class="text-center font-bold text-[21px] lg:text-sm">在地美食</div>
				</div></a>
			</nav>

			<div class="mt-5 mb-6 px-4">
				<ul class="text-center bg-white space-y-10 pt-5 pb-6 category-border-radius">
					<li class="">
						<div class="inline-block mb-1"><img src="images/menu-quick-1.svg"></div>
						<div class="text-[15px] font-bold mb-4">霧峰</div>
						<div class=""><a href="" class="basic-hover"><span class="bg-green text-sm text-white p-2 rounded-t-[20px] rounded-br-[20px]">加入官方LINE</span></a></div>
					</li>
					<li class="">
						<div class="inline-block mb-1"><img src="images/menu-quick-2.png" width="40"></div>
						<div class="text-[15px] font-bold mb-4">即刻前往</div>
						<div class=""><a href="" class="basic-hover"><span class="bg-green text-sm text-white p-2 rounded-t-[20px] rounded-br-[20px]">打開地圖</span></a></div>
					</li>
				</ul>
			</div>

			<nav class="flex items-center px-9 space-x-3 mb-6">
				<a href="javascript:;" class="basic-hover"><img src="images/share-1.svg"></a>
				<a href="javascript:;" class="basic-hover"><img src="images/share-2.svg"></a>
				<a href="javascript:;" class="basic-hover"><img src="images/share-3.svg"></a>
				<a href="javascript:;" class="basic-hover"><img src="images/share-4.svg"></a>
			</nav>

			<div class="text-gray-400 text-center font-medium tracking-normal">
				<a class="basic-hover" href="<?= $baseurl ?>">中文</a>
				<span>/</span>
				<a class="basic-hover" href="javascript:;" class="font-en">EN</a>
			</div>
		</div>
	</div>
</div>

<div class="small-menuWrap fixed bg-orange-100 w-full bottom-0 z-10 hidden lg:block">
	<nav class="grid grid-cols-5 text-center" v-scope="{}">
		<a href="<?= $baseurl ?>/news" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]" :class="[
			'<?=$now?>' == 'news' ? 'border-white bg-[#E2DED7]' : ''
		]">
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
		<a href="<?= $baseurl ?>/map" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]" :class="[
			'<?=$now?>' == 'map' ? 'border-white bg-[#E2DED7]' : ''
		]">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-4.svg"></div>
			<div class="font-medium text-xs tracking-normal">地圖搜尋</div>
		</a>
		<a href="<?= $baseurl ?>/cuisine" class="pb-4 border-2 border-orange-100 rounded-lg hover:border-white hover:bg-[#E2DED7]" :class="[
			'<?=$now?>' == 'cuisine' ? 'border-white bg-[#E2DED7]' : ''
		]">
			<div class="h-10 flex items-center justify-center"><img src="images/fix-item-5.svg"></div>
			<div class="font-medium text-xs tracking-normal">在地美食</div>
		</a>
	</nav>
</div>