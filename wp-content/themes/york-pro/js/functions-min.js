!function(a){"use strict";function b(){var b=["fivehundredpix","bandsintown","behance","codepen","dribbble","dropbox","email","facebook","flickr","foursquare","github","googleplay","google","houzz","instagram","itunes","linkedin","medium","meetup","pinterest","rdio","reddit","rss","smugmug","soundcloud","spotify","squarespace","stumbleupon","tumblr","twitch","twitter","vevo","vimeo","vine","vsco","yelp","youtube"];b.forEach(function(b){a('.social-navigation a[href*="'+b+'"] svg use').each(function(){a(this).attr("xlink:href",a(this).attr("xlink:href")+"#"+b+"-icon")})})}function c(){var b=i.imagesLoaded(function(){b.isotope({itemSelector:".project",layoutMode:"masonry",masonry:{columnWidth:50}})});b.infinitescroll({errorCallback:function(b,c){a(".cta").addClass(h),a(".cta-spacer").addClass(h)},navSelector:"#page_nav",nextSelector:"#page_nav a",itemSelector:".project",loading:{finishedMsg:"No more pages to load."}},function(c){var d=a(c).addClass("js--loading");d.imagesLoaded(function(){d.each(function(a){setTimeout(function(){d.eq(a).addClass("js--loaded")},150*a)}),b.isotope("appended",d,!0)})})}function d(){i.find(".project").each(function(b){var c=a(this),d=Math.floor(300*Math.random()+101)*b;setTimeout(function(){c.addClass(h)},d)})}function e(){if(g.hasClass("error404")){var a=document.querySelector(".animation-404 path"),b=a.getTotalLength();a.style.transition=a.style.WebkitTransition="none",a.style.strokeDasharray=b+" "+b,a.style.strokeDashoffset=b,a.getBoundingClientRect(),a.style.transition=a.style.WebkitTransition="stroke-dashoffset 6s ease-in-out",a.style.strokeDashoffset="0"}}function f(){var b=a(window),c=a(window).height(),d=a(".sidebar--section"),e="js--scroll";b.width()>768&&d.children().each(function(){c<a(this).innerHeight()?a(this).parent().addClass(e):a(this).parent().removeClass(e)})}var g=a("body"),h="js--active",i=a("#projects");g.fitVids(),a(document).ready(function(){d(),f(),b(),a(".animsition").animsition({inClass:"fade-in-up-sm",outClass:"fade-out-up-sm",inDuration:800,outDuration:600,linkElement:'a:not([target="_blank"]):not(.lightbox-link):not(.input-control submit)',loading:!1,unSupportCss:["animation-duration","-webkit-animation-duration","-o-animation-duration"]}),a(".mobile-menu-toggle").on("click",function(){g.toggleClass("nav-open")}),a("#nav-close").on("click",function(){g.toggleClass("nav-open")}),a(".subscribe-field").bind("focus blur",function(){a(this).closest(".mc4wp-subscribe-wrapper").toggleClass("js--focus")}),a(".subscribe-field").hover(function(){a(this).closest(".mc4wp-subscribe-wrapper").toggleClass("js--hover")}),a(g).hasClass("single")&&a(".project-assets .lazy-load img").unveil(25,function(){a(this).load(function(){this.style.opacity=1})})}),a(window).load(function(){g.is(".page-template-template-portfolio-php, .search, .blog, .archive")&&c(),e()}),a(window).resize(function(){f()})}(jQuery);