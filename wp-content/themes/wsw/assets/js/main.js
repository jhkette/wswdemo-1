(()=>{"use strict";function e(){var e=document.querySelectorAll(".question-container");e&&e.forEach((function(e){e.addEventListener("click",(function(){return function(e){console.log(e.childNodes[0]),console.log(e.nextSibling.id);var t=document.getElementById(e.childNodes[1].id),n=document.getElementById(e.nextSibling.id);t.classList.toggle("rotated"),n.classList.toggle("visible")}(e)}))}))}function t(){var e=window.pageYOffset,t=document.getElementById("commonlinks-cont"),n=document.getElementById("header-container"),o=document.getElementById("logo");e>200?(n.classList.add("small"),o.classList.add("small"),t.classList.add("vanish"),t.style.display="none",n.style.opacity=".95"):(n.classList.remove("small"),o.classList.remove("small"),t.classList.remove("vanish"),t.style.display="block",n.style.opacity="1")}function n(){var e=document.getElementById("mobile-nav"),t=document.getElementById("nav-icon1");e.classList.toggle("open"),t.classList.toggle("open")}function o(){var o=document.querySelector(".carousel");if(o)new Flickity(o,{autoPlay:5e3,wrapAround:!0,bgLazyLoad:!0,contain:!0});e(),document.getElementById("nav-icon1").addEventListener("click",n),window.addEventListener("scroll",function(e){var t,n=this,o=arguments.length>1&&void 0!==arguments[1]?arguments[1]:10;return function(){for(var i=arguments.length,l=new Array(i),s=0;s<i;s++)l[s]=arguments[s];clearTimeout(t),t=setTimeout((function(){e.apply(n,l)}),o)}}(t)),document.querySelectorAll(".readmore").forEach((function(e){e.addEventListener("mouseover",(function(){return function(e){document.getElementById(e.childNodes[1].id).classList.add("move")}(e)})),e.addEventListener("mouseleave",(function(){return function(e){document.getElementById(e.childNodes[1].id).classList.remove("move")}(e)}))}))}window.addEventListener("load",(function(){o()}))})();
//# sourceMappingURL=main.js.map