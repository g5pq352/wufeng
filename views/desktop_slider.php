<ul v-scope="{
	posts: [
		'images/slider-pic-1.jpg',
		'images/slider-pic-2.jpg',
		'images/slider-pic-3.jpg',
		'images/slider-pic-4.jpg',
	]
}" v-on:vue:mounted="autosliderHandler($el)" id="autoslider">
	<li v-for="pic in posts" class="w-full h-full" :style="'background: url('+pic+') center center /cover;'"></li>
</ul>