webpackJsonp(["app/js/testpaper/do-test/index"], {
	"8492817a6b6ebd299565": function(e, t) {
		"use strict";

		function n(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var a = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			r = function() {
				function e() {
					n(this, e)
				}
				return a(e, [{
					key: "getAnswer",
					value: function(e) {
						var t = [];
						return $("input[name=" + e + "]:checked").each(function() {
							t.push($(this).val())
						}), t
					}
				}]), e
			}();
		t.
	default = r
	},
	"3515d355d43c1a043be1": function(e, t) {
		"use strict";

		function n(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var a = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			r = function() {
				function e() {
					n(this, e)
				}
				return a(e, [{
					key: "getAnswer",
					value: function(e) {
						var t = [];
						return $("input[name=" + e + "]:checked").each(function() {
							t.push($(this).val())
						}), t
					}
				}]), e
			}();
		t.
	default = r
	},
	d43f35b4f73d35eb967a: function(e, t) {
		"use strict";

		function n(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var a = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			r = function() {
				function e() {
					n(this, e)
				}
				return a(e, [{
					key: "getAnswer",
					value: function(e) {
						var t = [],
							n = $("[name=" + e + "]").val();
						return t.push(n), t
					}
				}, {
					key: "getAttachment",
					value: function(e) {
						var t = [],
							n = $("[name=" + e + "]").parent().find('[data-role="fileId"]').val();
						return "" != n && t.push(n), t
					}
				}]), e
			}();
		t.
	default = r
	},
	"936bfc70bea5be864cc4": function(e, t) {
		"use strict";

		function n(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var a = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			r = function() {
				function e() {
					n(this, e)
				}
				return a(e, [{
					key: "getAnswer",
					value: function(e) {
						var t = [];
						return $("input[name=" + e + "]").each(function() {
							t.push($(this).val())
						}), t
					}
				}]), e
			}();
		t.
	default = r
	},
	"2a56fd48b3e3533b8e82": function(e, t) {
		"use strict";

		function n(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var a = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			r = function() {
				function e() {
					n(this, e)
				}
				return a(e, [{
					key: "getAnswer",
					value: function(e) {
						var t = [];
						return $("input[name=" + e + "]:checked").each(function() {
							t.push($(this).val())
						}), t
					}
				}]), e
			}();
		t.
	default = r
	},
	0: function(e, t, n) {
		"use strict";

		function a(e) {
			return e && e.__esModule ? e : {
			default:
				e
			}
		}
		function r(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		function i(e, t) {
			if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
			return !t || "object" != typeof t && "function" != typeof t ? e : t
		}
		function o(e, t) {
			if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
			e.prototype = Object.create(t && t.prototype, {
				constructor: {
					value: e,
					enumerable: !1,
					writable: !0,
					configurable: !0
				}
			}), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
		}
		var s = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			u = n("4428b108ee5aeb4e86ba"),
			c = a(u),
			l = n("d5fb0e67d2d4c1ebaaed"),
			f = a(l),
			d = n("f898520c5384ef4c819c"),
			h = function(e) {
				function t(e) {
					r(this, t);
					var n = i(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
				}
				return o(t, e), s(t, [{
					key: "_init"
				}, {
					key: "_initTimer"
				}, {
					key: "_clickBtnPause",
					value: function(e) {
						var t = $(e.currentTarget).toggleClass("active");
						t.hasClass("active") ? (this.$timer.timer("pause"), clearInterval(this.$usedTimer), this.$timePauseDialog.modal("show")) : (this.$timer.timer("resume"), this._initUsedTimer(), this.$timePauseDialog.modal("hide"))
					}
				}, {
					key: "_clickBtnReume",
					value: function(e) {
						this.$timer.timer("resume"), this._initUsedTimer(), this.$container.find(".js-btn-pause").removeClass("active"), this.$timePauseDialog.modal("hide")
					}
				}]), t
			}(c.
		default);
		new h($(".js-task-testpaper-body")), new f.
	default ($(".js-task-testpaper-body"))
	},
	"45d3c796d523fa97ecd2": function(e, t) {
		"use strict";

		function n(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var a = function e() {
				var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : $("html");
				n(this, e), t.attr("unselectable", "on").css("user-select", "none").on("selectstart", !1)
			};
		t.
	default = a
	},
	"4428b108ee5aeb4e86ba": function(e, t, n) {
		"use strict";

		function a(e) {
			return e && e.__esModule ? e : {
			default:
				e
			}
		}
		function r(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var i = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			o = n("2d148eb38b93bb0ef45c"),
			s = a(o),
			u = n("45d3c796d523fa97ecd2"),
			c = a(u),
			l = n("da32dea28c2b82c7aab1"),
			f = a(l),
			d = n("b334fd7e4c5a19234db2"),
			h = a(d),
			p = function() {
				function e(t) {
					r(this, e), this.$container = t, this.answers = {}, this.usedTime = 0, this.$form = t.find("form"), this._initEvent(), this._initUsedTimer(), this._isCopy(), this._alwaysSave()
				}
				return i(e, [{
					key: "_initEvent",
					value: function() {
						var e = this;
						this.$container.on("click", '[data-role="test-suspend"],[data-role="paper-submit"]', function(t) {
							return e._btnSubmit(t)
						}), this.$container.on("click", ".js-testpaper-question-list li", function(t) {
							return e._choiceList(t)
						}), this.$container.on("click", "*[data-anchor]", function(t) {
							return e._quick2Question(t)
						}), this.$container.find(".js-testpaper-question-label").on("click", "input", function(t) {
							return e._choiceLable(t)
						}), this.$container.on("click", ".js-marking", function(t) {
							return e._markingToggle(t)
						}), this.$container.on("click", ".js-favorite", function(t) {
							return e._favoriteToggle(t)
						}), this.$container.on("click", ".js-analysis", function(t) {
							return e._analysisToggle(t)
						}), this.$container.on("blur", '[data-type="fill"]', function(t) {
							return e.fillChange(t)
						})
					}
				}, {
					key: "_isCopy",
					value: function() {
						var e = this.$container.find(".js-testpaper-body").data("copy");
						e && new c.
					default
					}
				}, {
					key: "fillChange",
					value: function(e) {
						var t = $(e.currentTarget);
						this._renderBtnIndex(t.attr("name"), !! t.val())
					}
				}, {
					key: "_markingToggle",
					value: function(e) {
						var t = $(e.currentTarget).addClass("hidden");
						t.siblings(".js-marking.hidden").removeClass("hidden");
						var n = t.closest(".js-testpaper-question").attr("id");
						$('[data-anchor="#' + n + '"]').find(".js-marking-card").toggleClass("hidden")
					}
				}, {
					key: "_favoriteToggle",
					value: function(e) {
						var t = $(e.currentTarget),
							n = t.data("targetType"),
							a = t.data("targetId");
						$.post(t.data("url"), {
							targetType: n,
							targetId: a
						}, function(e) {
							t.addClass("hidden").siblings(".js-favorite.hidden").data("url", e.url), t.addClass("hidden").siblings(".js-favorite.hidden").removeClass("hidden")
						}).error(function(e) {
							(0, h.
						default)("error", e.error.message)
						})
					}
				}, {
					key: "_analysisToggle",
					value: function(e) {
						var t = $(e.currentTarget);
						t.addClass("hidden"), t.siblings(".js-analysis.hidden").removeClass("hidden"), t.closest(".js-testpaper-question").find(".js-testpaper-question-analysis").slideToggle()
					}
				}, {
					key: "_initUsedTimer",
					value: function() {
						var e = this;
						this.$usedTimer = window.setInterval(function() {
							e.usedTime += 1
						}, 1e3)
					}
				}, {
					key: "_choiceLable",
					value: function(e) {
						var t = $(e.currentTarget),
							n = t.closest(".js-testpaper-question-label");
						this.changeInput(n, t)
					}
				}, {
					key: "_choiceList",
					value: function(e) {
						var t = $(e.currentTarget),
							n = t.index(),
							a = t.closest(".js-testpaper-question").find(".js-testpaper-question-label"),
							r = a.find("label").eq(n).find("input");
						r.prop("checked", !r.prop("checked")).change(), this.changeInput(a, r)
					}
				}, {
					key: "changeInput",
					value: function(e, t) {
						var n = 0;
						e.find("label").each(function(e, t) {
							$(t).find("input").prop("checked") ? ($(t).addClass("active"), n++) : $(t).removeClass("active")
						});
						var a = t.attr("name");
						this._renderBtnIndex(a, n > 0)
					}
				}, {
					key: "_renderBtnIndex",
					value: function(e) {
						var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1],
							n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
							a = $('[data-anchor="#question' + e + '"]');
						t ? a.addClass("done") : a.removeClass("done"), n ? a.addClass("doing").siblings(".doing").removeClass("doing") : a.removeClass("doing")
					}
				}, {
					key: "_showEssayInputEditor",
				}, {
					key: "_quick2Question",
					value: function(e) {
						var t = $(e.currentTarget);
						window.location.hash = t.data("anchor")
					}
				}, {
					key: "_suspendSubmit",
					value: function(e) {
						var t = this._getAnswers(),
							n = this._getAttachments();
						$.post(e, {
							data: t,
							usedTime: this.usedTime,
							attachments: n
						}).done(function(e) {}).error(function(e) {
							(0, h.
						default)("error", e.error.message)
						})
					}
				}, {
					key: "_btnSubmit",
					value: function(e) {
						var t = $(e.currentTarget);
						t.button("loading"), this._submitTest(t.data("url"), t.data("goto"))
					}
				}, {
					key: "_submitTest",
					value: function(e) {
						var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
							n = this._getAnswers(),
							a = new f.
						default,
							r = this._getAttachments();
						$.post(e, {
							data: n,
							usedTime: this.usedTime,
							attachments: r
						}).done(function(e) {
							e.result && a.emit("finish", {
								data: ""
							}), "" != t || "" != e.goto ? window.location.href = t : "" != e.goto ? window.location.href = e.goto : "" != e.message && (0, h.
						default)("error", e.message)
						}).error(function(e) {
							(0, h.
						default)("error", e.error.message)
						})
					}
				}, {
					key: "_getAnswers",
					value: function() {
						var e = {};
						return $("*[data-type]").each(function(t) {
							var n = $(this).attr("name"),
								a = $(this).data("type"),
								r = s.
							default.getTypeBuilder(a),
								i = r.getAnswer(n);
							e[n] = i
						}), JSON.stringify(e)
					}
				}, {
					key: "_getAttachments",
					value: function() {
						var e = {};
						return $('[data-type="essay"]').each(function(t) {
							var n = $(this).attr("name"),
								a = s.
							default.getTypeBuilder("essay"),
								r = a.getAttachment(n);
							e[n] = r
						}), e
					}
				}, {
					key: "_alwaysSave",
					value: function() {
						if ($('input[name="testSuspend"]').length > 0) {
							var e = this,
								t = $('input[name="testSuspend"]').data("url");
							setInterval(function() {
								e._suspendSubmit(t);
								var n = (new Date).getHours() + ":" + (new Date).getMinutes() + ":" + (new Date).getSeconds();
								(0, h.
							default)("success", n + Translator.trans("testpaper.widget.save_success_hint"))
							}, 18e4)
						}
					}
				}]), e
			}();
		t.
	default = p
	},
	f898520c5384ef4c819c: function(e, t, n) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		}), t.initWatermark = t.onlyShowError = t.testpaperCardLocation = t.testpaperCardFixed = t.initScrollbar = void 0, n("9a5c59a43068776403d1");
		var a = n("9181c6995ae8c5c94b7a");
		t.testpaperCardFixed = function() {
			if (!(0, a.isMobileDevice)()) {
				var e = $(".js-testpaper-card");
				if (!(e.length <= 0)) {
					var t = e.offset().top;
					$(window).scroll(function(n) {
						var a = $(window).scrollTop();
						a >= t ? e.addClass("affix") : e.removeClass("affix")
					})
				}
			}
		}, t.testpaperCardLocation = function() {
			$(".js-btn-index").click(function(e) {
				var t = $(e.currentTarget);
				$(".js-testpaper-heading").length <= 0 && t.addClass("doing").siblings(".doing").removeClass("doing")
			})
		}, t.onlyShowError = function() {
			$("#showWrong").change(function(e) {
				var t = $(e.currentTarget);
				$(".js-answer-notwrong").each(function(e, n) {
					var a = $($(n).data("anchor")),
						r = a.closest(".js-testpaper-question-block");
					t.prop("checked") ? (a.hide(), r.find(".js-testpaper-question:visible").length <= 0 && r.hide()) : (a.show(), r.show())
				}), r()
			})
		}, t.initWatermark = function() {
			var e = $(".js-testpaper-watermark");
			e.length > 0 && $.get(e.data("watermark-url"), function(t) {
				e.each(function() {
					$(this).WaterMark({
						yPosition: "center",
						style: {
							"font-size": 10
						},
						opacity: .6,
						contents: t
					})
				})
			})
		}
	},
	"2d148eb38b93bb0ef45c": function(e, t, n) {
		"use strict";

		function a(e) {
			return e && e.__esModule ? e : {
			default:
				e
			}
		}
		function r(e, t) {
			if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
		}
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var i = function() {
				function e(e, t) {
					for (var n = 0; n < t.length; n++) {
						var a = t[n];
						a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
					}
				}
				return function(t, n, a) {
					return n && e(t.prototype, n), a && e(t, a), t
				}
			}(),
			o = n("8492817a6b6ebd299565"),
			s = a(o),
			u = n("3515d355d43c1a043be1"),
			c = a(u),
			l = n("d43f35b4f73d35eb967a"),
			f = a(l),
			d = n("936bfc70bea5be864cc4"),
			h = a(d),
			p = n("2a56fd48b3e3533b8e82"),
			v = a(p),
			b = function() {
				function e(t) {
					r(this, e), this.type = t
				}
				return i(e, null, [{
					key: "getTypeBuilder",
					value: function(e) {
						var t = null;
						switch (e) {
						case "choice":
							t = new s.
						default;
							break;
						case "determine":
							t = new c.
						default;
							break;
						case "essay":
							t = new f.
						default;
							break;
						case "fill":
							t = new h.
						default;
							break;
						case "single_choice":
							t = new v.
						default;
							break;
						case "uncertain_choice":
							t = new v.
						default;
							break;
						default:
							t = null
						}
						return t
					}
				}]), e
			}();
		t.
	default = b
	}
});