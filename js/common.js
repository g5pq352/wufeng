"use strict";var _createClass=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function changeSlideClasses(e,t,n){e&&e.getCellElements().forEach(function(e){e.classList[t](n)})}Flickity.createMethods.push("_createPrevNextCells"),Flickity.prototype._createPrevNextCells=function(){this.on("select",this.setPrevNextCells)},Flickity.prototype.setPrevNextCells=function(){changeSlideClasses(this.previousSlide,"remove","is-prev"),changeSlideClasses(this.nextSlide,"remove","is-next"),this.previousSlide=this.slides[(this.selectedIndex-1+this.slides.length)%this.slides.length],this.nextSlide=this.slides[(this.selectedIndex+1+this.slides.length)%this.slides.length],changeSlideClasses(this.previousSlide,"add","is-prev"),changeSlideClasses(this.nextSlide,"add","is-next")};var RyderMarquee=function(){function n(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:0;_classCallCheck(this,n),this.hero=$(e).parent().get(0),this.wrapper=e,this.delta=0,this.transform=0,this.step="mobile"==device?.8:1.2,this.direct=t%2,this.hover=!1,1==this.direct&&(this.wrapper.style.transform="translate3d(-"+this.wrapper.getBoundingClientRect().width/2+"px, 0, 0)",this.transform=-this.wrapper.getBoundingClientRect().width/2)}return _createClass(n,[{key:"animate",value:function(){this.hover||(this.transform+=this.step),1==this.direct?(0<this.transform&&(this.transform=-this.wrapper.getBoundingClientRect().width/2),this.wrapper.style.transform="translate3d("+this.transform+"px, 0, 0)"):(this.transform>this.wrapper.getBoundingClientRect().width/2&&(this.transform=0),this.wrapper.style.transform="translate3d(-"+this.transform+"px, 0, 0)")}},{key:"render",value:function(){this.scrollY=$(window).scrollTop();var e=this.hero.getBoundingClientRect(),e=(window.innerHeight+this.scrollY-(e.top+this.scrollY))/((window.innerHeight+e.height)/100);0<e&&e<100&&this.animate()}},{key:"create",value:function(){gsap.ticker.add(this.render.bind(this))}}]),n}();function autosliderHandler(e){var t=$(e).flickity({draggable:!1,prevNextButtons:!1,pageDots:!1,wrapAround:!0,imagesLoaded:!0,fade:!0,cellAlign:"center",adaptiveHeight:!0,arrowShape:"",autoPlay:4e3,pauseAutoPlayOnHover:!1});$("body").on("mouseleave",function(e){t.flickity("playPlayer")})}$.fn.ryderCool=function(e){return this.each(function(){var i=$(this),s=$.extend({hook:.9,repeat:!1,enter_check:!0,leave_check:!0,count:0,enter:function(){},leave:function(){}},e);$(window).on("scroll",function(){var e=$(window).scrollTop(),e=i.offset().top-e,t=(n=$(window).height())*s.hook,n=i.height()-n*(1-s.hook);t<e||e<-n?(1<=s.count&&(s.enter_check=s.repeat),s.leave_check&&s.leave(i),s.leave_check=!1):e<t&&(s.enter_check&&s.enter(i),s.enter_check&&s.count++,s.enter_check=!1,s.leave_check=!0)}).trigger("scroll")})},$(window).on("resize",function(){1025<$(this).width()?("mobile"==window.device&&location.reload(),window.device="desktop"):("desktop"==window.device&&location.reload(),window.device="mobile")}).trigger("resize"),$(".scrolldown").on("click",function(){var e=null!=$(this).data("down")?$(this).data("down"):1;gsap.to(window,{duration:1.2,scrollTo:$(window).height()*e,ease:Power2.easeInOut})}),$("[data-r]").each(function(e,t){var n;n="mobile"==device&&null!=$(t).data("mobile-r")?$(t).data("mobile-r"):$(t).data("r");var i=Object.assign({trigger:t,start:"top 80%",end:"bottom 0%",toggleActions:"play none play none"},n.scrollTrigger),i=($(t).offset().top<=$(window).height()*i.start.replace(/[^0-9]/g,"")/100&&(n.delay=null!=n.delay?n.delay+=1:1),delete n.scrollTrigger,{scrollTrigger:i,duration:1.2,ease:"power2.out"}),i=(t=""!=n&&"stagger"in n?$(t).children():t,Object.assign(i,n));gsap.from(t,i)}),$(".backtotop").on("click",function(){gsap.to(window,{duration:1.2,scrollTo:0,ease:Power2.easeInOut})}),$(".marquee").each(function(e,t){var n=$(t).contents().clone();$(t).append(n),new RyderMarquee(t,0).create()}),$(".searcOpen").on("click",function(){$(".searchWrap").toggleClass("opacity-0 pointer-events-none"),$(".menuSlide").toggleClass("is-open"),$(".searcOpen svg").eq(0).toggleClass("hidden"),$(".searcOpen svg").eq(1).toggleClass("hidden")}),$(".search-bg").on("click",function(){$(".searchWrap").addClass("opacity-0 pointer-events-none"),$(".menuSlide").toggleClass("is-open"),$(".searcOpen svg").eq(0).toggleClass("hidden"),$(".searcOpen svg").eq(1).toggleClass("hidden"),$("#desktop-search").toggleClass("z-20")}),$(".openMenu").on("click",function(){$(".menuWrap").toggleClass("opacity-0 pointer-events-none")}),$(".closeMenu").on("click",function(){$(".menuWrap").toggleClass("opacity-0 pointer-events-none")}),$("#desktop-search").on("click",function(){$(this).addClass("z-20"),$("#desktop-searchWrap").removeClass("opacity-0 pointer-events-none")}),$(window).on("load",function(){$("#preload").fadeOut(300),autosliderHandler()});
//# sourceMappingURL=common.js.map
