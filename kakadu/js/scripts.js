!(function (t) {
    var e = {};
    function o(n) {
        if (e[n]) return e[n].exports;
        var r = (e[n] = { i: n, l: !1, exports: {} });
        return t[n].call(r.exports, r, r.exports, o), (r.l = !0), r.exports;
    }
    (o.m = t),
        (o.c = e),
        (o.d = function (t, e, n) {
            o.o(t, e) || Object.defineProperty(t, e, { enumerable: !0, get: n });
        }),
        (o.r = function (t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(t, "__esModule", { value: !0 });
        }),
        (o.t = function (t, e) {
            if ((1 & e && (t = o(t)), 8 & e)) return t;
            if (4 & e && "object" == typeof t && t && t.__esModule) return t;
            var n = Object.create(null);
            if ((o.r(n), Object.defineProperty(n, "default", { enumerable: !0, value: t }), 2 & e && "string" != typeof t))
                for (var r in t)
                    o.d(
                        n,
                        r,
                        function (e) {
                            return t[e];
                        }.bind(null, r)
                    );
            return n;
        }),
        (o.n = function (t) {
            var e =
                t && t.__esModule
                    ? function () {
                          return t.default;
                      }
                    : function () {
                          return t;
                      };
            return o.d(e, "a", e), e;
        }),
        (o.o = function (t, e) {
            return Object.prototype.hasOwnProperty.call(t, e);
        }),
        (o.p = ""),
        o((o.s = 16));
})([
    function (t, e) {
        t.exports = function (t) {
            var e = typeof t;
            return null != t && ("object" == e || "function" == e);
        };
    },
    function (t, e, o) {
        var n = o(0),
            r = o(7),
            i = o(10),
            l = Math.max,
            c = Math.min;
        t.exports = function (t, e, o) {
            var s,
                a,
                f,
                u,
                d,
                v,
                p = 0,
                h = !1,
                y = !1,
                b = !0;
            if ("function" != typeof t) throw new TypeError("Expected a function");
            function m(e) {
                var o = s,
                    n = a;
                return (s = a = void 0), (p = e), (u = t.apply(n, o));
            }
            function g(t) {
                return (p = t), (d = setTimeout(T, e)), h ? m(t) : u;
            }
            function w(t) {
                var o = t - v;
                return void 0 === v || o >= e || o < 0 || (y && t - p >= f);
            }
            function T() {
                var t = r();
                if (w(t)) return x(t);
                d = setTimeout(
                    T,
                    (function (t) {
                        var o = e - (t - v);
                        return y ? c(o, f - (t - p)) : o;
                    })(t)
                );
            }
            function x(t) {
                return (d = void 0), b && s ? m(t) : ((s = a = void 0), u);
            }
            function S() {
                var t = r(),
                    o = w(t);
                if (((s = arguments), (a = this), (v = t), o)) {
                    if (void 0 === d) return g(v);
                    if (y) return clearTimeout(d), (d = setTimeout(T, e)), m(v);
                }
                return void 0 === d && (d = setTimeout(T, e)), u;
            }
            return (
                (e = i(e) || 0),
                n(o) && ((h = !!o.leading), (f = (y = "maxWait" in o) ? l(i(o.maxWait) || 0, e) : f), (b = "trailing" in o ? !!o.trailing : b)),
                (S.cancel = function () {
                    void 0 !== d && clearTimeout(d), (p = 0), (s = v = a = d = void 0);
                }),
                (S.flush = function () {
                    return void 0 === d ? u : x(r());
                }),
                S
            );
        };
    },
    function (t, e, o) {
        var n = o(8),
            r = "object" == typeof self && self && self.Object === Object && self,
            i = n || r || Function("return this")();
        t.exports = i;
    },
    function (t, e, o) {
        var n = o(2).Symbol;
        t.exports = n;
    },
    function (t, e, o) {
        !(function () {
            "use strict";
            t.exports = {
                polyfill: function () {
                    var t = window,
                        e = document;
                    if (!("scrollBehavior" in e.documentElement.style) || !0 === t.__forceSmoothScrollPolyfill__) {
                        var o,
                            n = t.HTMLElement || t.Element,
                            r = { scroll: t.scroll || t.scrollTo, scrollBy: t.scrollBy, elementScroll: n.prototype.scroll || c, scrollIntoView: n.prototype.scrollIntoView },
                            i = t.performance && t.performance.now ? t.performance.now.bind(t.performance) : Date.now,
                            l = ((o = t.navigator.userAgent), new RegExp(["MSIE ", "Trident/", "Edge/"].join("|")).test(o) ? 1 : 0);
                        (t.scroll = t.scrollTo = function () {
                            void 0 !== arguments[0] &&
                                (!0 !== s(arguments[0])
                                    ? p.call(t, e.body, void 0 !== arguments[0].left ? ~~arguments[0].left : t.scrollX || t.pageXOffset, void 0 !== arguments[0].top ? ~~arguments[0].top : t.scrollY || t.pageYOffset)
                                    : r.scroll.call(
                                          t,
                                          void 0 !== arguments[0].left ? arguments[0].left : "object" != typeof arguments[0] ? arguments[0] : t.scrollX || t.pageXOffset,
                                          void 0 !== arguments[0].top ? arguments[0].top : void 0 !== arguments[1] ? arguments[1] : t.scrollY || t.pageYOffset
                                      ));
                        }),
                            (t.scrollBy = function () {
                                void 0 !== arguments[0] &&
                                    (s(arguments[0])
                                        ? r.scrollBy.call(
                                              t,
                                              void 0 !== arguments[0].left ? arguments[0].left : "object" != typeof arguments[0] ? arguments[0] : 0,
                                              void 0 !== arguments[0].top ? arguments[0].top : void 0 !== arguments[1] ? arguments[1] : 0
                                          )
                                        : p.call(t, e.body, ~~arguments[0].left + (t.scrollX || t.pageXOffset), ~~arguments[0].top + (t.scrollY || t.pageYOffset)));
                            }),
                            (n.prototype.scroll = n.prototype.scrollTo = function () {
                                if (void 0 !== arguments[0])
                                    if (!0 !== s(arguments[0])) {
                                        var t = arguments[0].left,
                                            e = arguments[0].top;
                                        p.call(this, this, void 0 === t ? this.scrollLeft : ~~t, void 0 === e ? this.scrollTop : ~~e);
                                    } else {
                                        if ("number" == typeof arguments[0] && void 0 === arguments[1]) throw new SyntaxError("Value could not be converted");
                                        r.elementScroll.call(
                                            this,
                                            void 0 !== arguments[0].left ? ~~arguments[0].left : "object" != typeof arguments[0] ? ~~arguments[0] : this.scrollLeft,
                                            void 0 !== arguments[0].top ? ~~arguments[0].top : void 0 !== arguments[1] ? ~~arguments[1] : this.scrollTop
                                        );
                                    }
                            }),
                            (n.prototype.scrollBy = function () {
                                void 0 !== arguments[0] &&
                                    (!0 !== s(arguments[0])
                                        ? this.scroll({ left: ~~arguments[0].left + this.scrollLeft, top: ~~arguments[0].top + this.scrollTop, behavior: arguments[0].behavior })
                                        : r.elementScroll.call(
                                              this,
                                              void 0 !== arguments[0].left ? ~~arguments[0].left + this.scrollLeft : ~~arguments[0] + this.scrollLeft,
                                              void 0 !== arguments[0].top ? ~~arguments[0].top + this.scrollTop : ~~arguments[1] + this.scrollTop
                                          ));
                            }),
                            (n.prototype.scrollIntoView = function () {
                                if (!0 !== s(arguments[0])) {
                                    var o = d(this),
                                        n = o.getBoundingClientRect(),
                                        i = this.getBoundingClientRect();
                                    o !== e.body
                                        ? (p.call(this, o, o.scrollLeft + i.left - n.left, o.scrollTop + i.top - n.top), "fixed" !== t.getComputedStyle(o).position && t.scrollBy({ left: n.left, top: n.top, behavior: "smooth" }))
                                        : t.scrollBy({ left: i.left, top: i.top, behavior: "smooth" });
                                } else r.scrollIntoView.call(this, void 0 === arguments[0] || arguments[0]);
                            });
                    }
                    function c(t, e) {
                        (this.scrollLeft = t), (this.scrollTop = e);
                    }
                    function s(t) {
                        if (null === t || "object" != typeof t || void 0 === t.behavior || "auto" === t.behavior || "instant" === t.behavior) return !0;
                        if ("object" == typeof t && "smooth" === t.behavior) return !1;
                        throw new TypeError("behavior member of ScrollOptions " + t.behavior + " is not a valid value for enumeration ScrollBehavior.");
                    }
                    function a(t, e) {
                        return "Y" === e ? t.clientHeight + l < t.scrollHeight : "X" === e ? t.clientWidth + l < t.scrollWidth : void 0;
                    }
                    function f(e, o) {
                        var n = t.getComputedStyle(e, null)["overflow" + o];
                        return "auto" === n || "scroll" === n;
                    }
                    function u(t) {
                        var e = a(t, "Y") && f(t, "Y"),
                            o = a(t, "X") && f(t, "X");
                        return e || o;
                    }
                    function d(t) {
                        for (; t !== e.body && !1 === u(t); ) t = t.parentNode || t.host;
                        return t;
                    }
                    function v(e) {
                        var o,
                            n,
                            r,
                            l,
                            c = (i() - e.startTime) / 468;
                        (l = c = c > 1 ? 1 : c),
                            (o = 0.5 * (1 - Math.cos(Math.PI * l))),
                            (n = e.startX + (e.x - e.startX) * o),
                            (r = e.startY + (e.y - e.startY) * o),
                            e.method.call(e.scrollable, n, r),
                            (n === e.x && r === e.y) || t.requestAnimationFrame(v.bind(t, e));
                    }
                    function p(o, n, l) {
                        var s,
                            a,
                            f,
                            u,
                            d = i();
                        o === e.body ? ((s = t), (a = t.scrollX || t.pageXOffset), (f = t.scrollY || t.pageYOffset), (u = r.scroll)) : ((s = o), (a = o.scrollLeft), (f = o.scrollTop), (u = c)),
                            v({ scrollable: s, method: u, startTime: d, startX: a, startY: f, x: n, y: l });
                    }
                },
            };
        })();
    },
    function (t, e, o) {
        var n = o(1),
            r = o(0);
        t.exports = function (t, e, o) {
            var i = !0,
                l = !0;
            if ("function" != typeof t) throw new TypeError("Expected a function");
            return r(o) && ((i = "leading" in o ? !!o.leading : i), (l = "trailing" in o ? !!o.trailing : l)), n(t, e, { leading: i, maxWait: e, trailing: l });
        };
    },
    function (t, e, o) {},
    function (t, e, o) {
        var n = o(2);
        t.exports = function () {
            return n.Date.now();
        };
    },
    function (t, e, o) {
        (function (e) {
            var o = "object" == typeof e && e && e.Object === Object && e;
            t.exports = o;
        }.call(this, o(9)));
    },
    function (t, e) {
        var o;
        o = (function () {
            return this;
        })();
        try {
            o = o || new Function("return this")();
        } catch (t) {
            "object" == typeof window && (o = window);
        }
        t.exports = o;
    },
    function (t, e, o) {
        var n = o(0),
            r = o(11),
            i = /^\s+|\s+$/g,
            l = /^[-+]0x[0-9a-f]+$/i,
            c = /^0b[01]+$/i,
            s = /^0o[0-7]+$/i,
            a = parseInt;
        t.exports = function (t) {
            if ("number" == typeof t) return t;
            if (r(t)) return NaN;
            if (n(t)) {
                var e = "function" == typeof t.valueOf ? t.valueOf() : t;
                t = n(e) ? e + "" : e;
            }
            if ("string" != typeof t) return 0 === t ? t : +t;
            t = t.replace(i, "");
            var o = c.test(t);
            return o || s.test(t) ? a(t.slice(2), o ? 2 : 8) : l.test(t) ? NaN : +t;
        };
    },
    function (t, e, o) {
        var n = o(12),
            r = o(15);
        t.exports = function (t) {
            return "symbol" == typeof t || (r(t) && "[object Symbol]" == n(t));
        };
    },
    function (t, e, o) {
        var n = o(3),
            r = o(13),
            i = o(14),
            l = n ? n.toStringTag : void 0;
        t.exports = function (t) {
            return null == t ? (void 0 === t ? "[object Undefined]" : "[object Null]") : l && l in Object(t) ? r(t) : i(t);
        };
    },
    function (t, e, o) {
        var n = o(3),
            r = Object.prototype,
            i = r.hasOwnProperty,
            l = r.toString,
            c = n ? n.toStringTag : void 0;
        t.exports = function (t) {
            var e = i.call(t, c),
                o = t[c];
            try {
                t[c] = void 0;
                var n = !0;
            } catch (t) {}
            var r = l.call(t);
            return n && (e ? (t[c] = o) : delete t[c]), r;
        };
    },
    function (t, e) {
        var o = Object.prototype.toString;
        t.exports = function (t) {
            return o.call(t);
        };
    },
    function (t, e) {
        t.exports = function (t) {
            return null != t && "object" == typeof t;
        };
    },
    function (t, e, o) {
        "use strict";
        o.r(e);
        o(6);
        var n = o(4),
            r = o.n(n),
            i = o(5),
            l = o.n(i),
            c = o(1),
            s = o.n(c);
        function a(t, e) {
            for (var o = 0; o < e.length; o++) {
                var n = e[o];
                (n.enumerable = n.enumerable || !1), (n.configurable = !0), "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n);
            }
        }
        new ((function () {
            function t(e, o) {
                !(function (t, e) {
                    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function");
                })(this, t),
                    (this.thresholdPercent = o),
                    (this.itemsToReveal = e),
                    (this.browserHeight = window.innerHeight),
                    this.hideInitially(),
                    (this.scrollThrottle = l()(this.calcCaller, 200).bind(this)),
                    this.events();
            }
            var e, o, n;
            return (
                (e = t),
                (o = [
                    {
                        key: "events",
                        value: function () {
                            var t = this;
                            window.addEventListener("scroll", this.scrollThrottle),
                                window.addEventListener(
                                    "resize",
                                    s()(function () {
                                        console.log("Resize just ran"), (t.browserHeight = window.innerHeight);
                                    }, 333)
                                );
                        },
                    },
                    {
                        key: "calcCaller",
                        value: function () {
                            var t = this;
                            console.log("Scroll function ran"),
                                this.itemsToReveal.forEach(function (e) {
                                    0 == e.isRevealed && t.calculateIfScrolledTo(e);
                                });
                        },
                    },
                    {
                        key: "calculateIfScrolledTo",
                        value: function (t) {
                            window.scrollY + this.browserHeight > t.offsetTop &&
                                (console.log("Element was calculated"),
                                (t.getBoundingClientRect().top / this.browserHeight) * 100 < this.thresholdPercent &&
                                    (t.classList.add("reveal-item--is-visible"), (t.isRevealed = !0), t.isLastItem && window.removeEventListener("scroll", this.scrollThrottle)));
                        },
                    },
                    {
                        key: "hideInitially",
                        value: function () {
                            this.itemsToReveal.forEach(function (t) {
                                t.classList.add("reveal-item"), (t.isRevealed = !1);
                            }),
                                (this.itemsToReveal[this.itemsToReveal.length - 1].isLastItem = !0);
                        },
                    },
                ]) && a(e.prototype, o),
                n && a(e, n),
                t
            );
        })())(document.querySelectorAll(".content__container"), 75);
        var f = document.querySelectorAll('a[href^="#"]');
        function u() {
            document.querySelector(".fixed-nav").classList.toggle("open");
        }
        f &&
            f.forEach(function (t) {
                t.addEventListener("click", function (e) {
                    var o = t.href.slice(t.href.indexOf("#") + 1);
                    if (o.length > 1) {
                        var n = document.getElementById(o);
                        e.preventDefault(),
                            (function (t) {
                                r.a.polyfill(), t.scrollIntoView({ behavior: "smooth" });
                            })(n),
                            t.closest(".fixed-nav") && u();
                    }
                });
            }),
            document.querySelector(".nav-trigger").addEventListener("click", u),
            document.addEventListener("keydown", function (t) {
                if (document.querySelector(".fixed-nav.open")) {
                    var e = event.key || event.keyCode;
                    ("Escape" !== e && "Esc" !== e && 27 !== e) || u();
                }
            }),
            new Glider(document.querySelector(".glider"), {
                slidesToShow: 1,
                draggable: !0,
                arrows: { prev: ".glider-prev", next: ".glider-next" },
                responsive: [
                    { breakpoint: 775, settings: { slidesToShow: "auto", slidesToScroll: "auto", itemWidth: 150, duration: 0.25 } },
                    { breakpoint: 1024, settings: { slidesToShow: 1, slidesToScroll: 1, itemWidth: "auto", duration: 0.25 } },
                    { breakpoint: 1200, settings: { slidesToShow: 1, slidesToScroll: 1, itemWidth: "auto", duration: 0.25 } },
                ],
            });
    },
]);
