webpackJsonp(["app/js/index/index"], {
	0 : function(t, e, i) {
		"use strict";
		function n(t) {
			return t && t.__esModule ? t: {
			default:
				t
			}
		}
		var o = i("370d3340744bf261df0e"),
		s = n(o);
		if (i("7840d638cc48059df0fc"), echo.init(), $(".es-poster .swiper-slide").length > 1) {
			new s.
		default(".es-poster.swiper-container", {
				pagination: ".swiper-pager",
				paginationClickable: !0,
				autoplay: 5e3,
				autoplayDisableOnInteraction: !1,
				loop: !0,
				calculateHeight: !0,
				roundLengths: !0,
				onInit: function(t) {
					$(".swiper-slide").removeClass("swiper-hidden")
				}
			})
		}
		$("body").on("click", ".js-course-filter",
		function() {
			var t = $(this),
			e = t.data("type"),
			i = $(".course-filter .visible-xs .active a").text();
			$.get(t.data("url"),
			function(n) {
				$("#" + e + "-list-section").after(n).remove();
				var o = t.parent();
				o.hasClass("course-sort") || (i = t.find("a").text()),
				$(".course-filter .visible-xs .btn").html(i + ' <span class="caret"></span>'),
				echo.init()
			})
		})
	},
	"7840d638cc48059df0fc": function(t, e) {
		"use strict";
		$("body").on("click", ".teacher-item .follow-btn",
		function() {
			var t = $(this);
			$.post(t.data("url"),
			function() {
				var e = t.data("loggedin");
				1 === e && (t.hide(), t.closest(".teacher-item").find(".unfollow-btn").show())
			})
		}).on("click", ".unfollow-btn",
		function() {
			var t = $(this);
			$.post(t.data("url"),
			function() {}).always(function() {
				t.hide(),
				t.closest(".teacher-item").find(".follow-btn").show()
			})
		})
	}
});