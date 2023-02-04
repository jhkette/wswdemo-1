(() => {
  "use strict";
  function e() {
    var e = window.pageYOffset,
      n = document.getElementById("commonlinks-cont"),
      t = document.getElementById("header-container"),
      o = document.getElementById("logo");
    e > 200
      ? (t.classList.add("small"),
        o.classList.add("small"),
        n.classList.add("vanish"),
        (n.style.display = "none"),
        (t.style.opacity = ".95"))
      : (t.classList.remove("small"),
        o.classList.remove("small"),
        n.classList.remove("vanish"),
        (n.style.display = "block"),
        (t.style.opacity = "1"));
  }
  window.addEventListener("load", function () {
    !(function () {
      var i = document.querySelector(".carousel");
      new Flickity(i, {
        autoPlay: 5e3,
        wrapAround: !0,
        bgLazyLoad: !0,
        contain: !0,
      });
      document.getElementById("nav-icon1").addEventListener("click", o);
      document.getElementById("header-container");
      window.addEventListener(
        "scroll",
        (function (e) {
          var n,
            t =
              arguments.length > 1 && void 0 !== arguments[1]
                ? arguments[1]
                : 10,
            o =
              !(arguments.length > 2 && void 0 !== arguments[2]) ||
              arguments[2];
          return function () {
            var d = this,
              l = arguments,
              i = function () {
                (n = null), o || e.apply(d, l);
              },
              s = o && !n;
            clearTimeout(n), (n = setTimeout(i, t)), s && e.apply(d, l);
          };
        })(e)
      ),
        document.querySelectorAll(".readmore").forEach(function (e) {
          e.addEventListener("mouseover", function () {
            return n(e);
          }),
            e.addEventListener("mouseleave", function () {
              return t(e);
            });
        });
      var s = document.querySelectorAll(".image-container");
      console.log(s),
        s.forEach(function (e) {
          e.addEventListener("mouseover", function () {
            return d(e);
          }),
            e.addEventListener("mouseleave", function () {
              return l(e);
            });
        });
    })();
  });
  var n = function (e) {
      document.getElementById(e.childNodes[1].id).classList.add("move");
    },
    t = function (e) {
      document.getElementById(e.childNodes[1].id).classList.remove("move");
    };
  function o() {
    var e = document.getElementById("mobile-nav"),
      n = document.getElementById("nav-icon1");
    e.classList.toggle("open"), n.classList.toggle("open");
  }
  var d = function (e) {
      document.getElementById(e.childNodes[3].id).classList.add("line");
    },
    l = function (e) {
      document.getElementById(e.childNodes[3].id).classList.remove("line");
    };
})();
//# sourceMappingURL=main.js.map
