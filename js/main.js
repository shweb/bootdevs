function navbarVisibility() {
    var a = "#navbar-visibility-check"
      , b = "#navbar"
      , c = "navbar-scroll-active";
    $(a).is(":not(:in-viewport)") ? $(b).addClass(c) : $(b).removeClass(c)
}
function checkVisibility() {
    $("#feature-animation").is(":in-viewport") ? $("#feature-animation").addClass("feature-animation-active") : $("#feature-animation").removeClass("feature-animation-active"),
    $(".bootscale .blue-gradient").is(":in-viewport") ? $(".bootscale .blue-gradient").addClass("active") : $(".bootscale .blue-gradient").removeClass("active")
}
function offsetScroll() {
    var a, b;
    return a = window.pageYOffset,
    b = a / 2,
    $(".parallax").css({
        transform: "translate3d(0," + -1 * b + "px, 0)"
    })
}
function navbarSubblock() {
    $("#product-link").mouseenter(function() {
        $("#product-list").removeClass("hide"),
        setTimeout(function() {
            $("#product-list").removeClass("product-list-hide")
        }, 100)
    }),
    $("#navbar").mouseleave(function() {
        $("#product-list").addClass("product-list-hide"),
        setTimeout(function() {
            $("#product-list").addClass("hide")
        }, 200)
    })
}

// function countStats() {
//     var a = new CountUp("stopwatch1",0,10)
//       , b = new CountUp("stopwatch2",0,212
//     )
//       , c = new CountUp("stopwatch3",0,1213);
//     a.start(),
//     b.start(),
//     c.start()
// }

function bindSlick() {
    $("#carousel").slick({
        dots: !0,
        mobileFirst: !0,
        appendDots: $("#user-icon-dots"),
        dotsClass: "slick-user-icon",
        autoplay: !0
    }),
    $("#user-icon-dots li").eq(0).append("<div><h6>陈家帧</h6><p>网红／电商负责人</p></div>"),
    $("#user-icon-dots li").eq(1).append("<div><h6>鄭曦鹍 </h6><p>真功夫集团首席技术顾问</p></div>"),
    $("#user-icon-dots li").eq(2).append("<div><h6>Spencer Weed</h6><p>千万级PV网站CTO</p></div>")
}
function paintRing() {
    var a = document.getElementById("ring")
      , b = {
        width: a.offsetWidth,
        height: a.offsetHeight
    }
      , c = new Two(b).appendTo(a)
      , d = c.width / 2
      , e = c.height / 2
      , f = d > e ? e - 50 : d - 50
      , g = f + 30
      , h = [{
        r: g,
        color: "rgba(230, 242, 246, 0.89)"
    }, {
        r: g + 10,
        color: "rgba(230, 242, 246, 0.59)"
    }, {
        r: g + 20,
        color: "rgba(230, 242, 246, 0.39)"
    }];
    h.forEach(function(a) {
        var b = c.makeCircle(d, e, a.r);
        b.fill = a.color,
        b.stroke = "transparent"
    });
    for (var i = [], j = .02, k = [-Math.PI / 6, Math.PI / 2, 7 * Math.PI / 6], l = 0; l < k.length; l++) {
        var m, n;
        l === k.length - 1 ? (m = k[l] + j,
        n = 2 * Math.PI + (k[0] - j)) : (m = k[l] + j,
        n = k[l + 1] - j);
        var o = c.makeArc(d, e, f, m, n);
        o.fill = "transparent",
        o.linewidth = 20,
        o.stroke = "#aabfd0",
        i.push(o)
    }
    var p = c.makeGroup(i);
    p.center(),
    p.translation.set(d, e),
    c.bind("update", function(a) {
        p.rotation === 2 * Math.PI && (p.rotation = 0);
        var b = Math.PI / 130;
        p.rotation += b
    }).play(),
    $(window).on("resize", function() {
        if (a.offsetWidth !== c.width) {
            c.clear(),
            c.width = a.offsetWidth,
            c.height = a.offsetHeight,
            d = c.width / 2,
            e = c.height / 2,
            f = d > e ? e - 50 : d - 50,
            g = f + 30,
            h = [{
                r: g,
                color: "rgba(230, 242, 246, 0.89)"
            }, {
                r: g + 10,
                color: "rgba(230, 242, 246, 0.59)"
            }, {
                r: g + 20,
                color: "rgba(230, 242, 246, 0.39)"
            }],
            h.forEach(function(a) {
                var b = c.makeCircle(d, e, a.r);
                b.fill = a.color,
                b.stroke = "transparent"
            }),
            i = [];
            for (var b = 0; b < k.length; b++) {
                var l, m;
                b === k.length - 1 ? (l = k[b] + j,
                m = 2 * Math.PI + (k[0] - j)) : (l = k[b] + j,
                m = k[b + 1] - j);
                var n = c.makeArc(d, e, f, l, m);
                n.fill = "transparent",
                n.linewidth = 20,
                n.stroke = "#aabfd0",
                i.push(n)
            }
            p = c.makeGroup(i),
            p.center(),
            p.translation.set(d, e)
        }
    })
}
function videoInit() {
    var a = window.innerWidth > 1024 ? 1024 : window.innerWidth
      , b = a / 16 * 9
      , c = videojs("bootdev-video", {
        width: a,
        height: b
    });
    $("#video-start").on("click", function() {
        $(".video-modal").addClass("visible").animate({
            opacity: "1"
        }, 500),
        c.play()
    }),
    $(".video-modal").on("click", function() {
        $(".video-modal").animate({
            opacity: "0"
        }, 500, function() {
            $(".video-modal").removeClass("visible"),
            c.pause()
        })
    }),
    $('#bootdev-video_html5_api').click(function(event) {
        event.stopPropagation();
    })
}
function authLogin() {
    $("#githubAuth").click(function() {
        var a = "https://github.com/login/oauth/authorize?client_id=" + githubClientId + "&scope=user:email,repo&state="
          , b = api_url + "v1/github-redirect?redirect-url=" + account_url + "signup-with-github"
          , a = a + "&redirect_uri=" + b;
        window.location.href = a
    }),
    $("#wechatAuth").click(function() {
        window.location.href = account_url + "qrcode"
    })
}
function loginInit() {
    "undefined" != typeof $.cookie("token") ? ($("#sign-up-xs").addClass("hidden"),
    $("#sign-in-xs").addClass("hidden"),
    $("#sign-in").addClass("hidden"),
    $("#sign-up").addClass("hidden"),
    $(".crp-showcase form").addClass("hidden"),
    $.ajax({
        url: api_url + "get-token-info",
        data: {},
        type: "GET",
        beforeSend: function(a) {
            a.setRequestHeader("Authorization", $.cookie("token"))
        },
        success: function(a) {
            if (a.user.tenant) {
                $("#user-name").text(a.user.tenant.tenant_name),
                $("#user-name-xs").removeClass("hidden").children().text(a.user.tenant.tenant_name),
                $("#dashboard").removeClass("hidden");
                var b = new Date(a.user.created_at).getTime() / 1e3 - 28800
                  , c = a.user.tenant.tenant_name
                  , d = a.user.user_id;
                $.ajax({
                    url: api_url + "users/connections",
                    type: "GET",
                    beforeSend: function(a) {
                        a.setRequestHeader("Authorization", $.cookie("token"))
                    },
                    success: function(a) {
                        for (email = null ,
                        i = 0; i < a.user.connections.length; i++)
                            "email" == a.user.connections[i].connect_type && (email = a.user.connections[i].connect_value);
                        bootscale("init", {
                            app_id: "91af7bf3",
                            user_id: d,
                            email: email,
                            name: c,
                            signed_up: b
                        }),
                        bootscale("update")
                    },
                    error: function(a) {
                        bootscale("init", {
                            app_id: "91af7bf3"
                        }),
                        bootscale("update")
                    }
                })
            }
        },
        error: function(a, b, c) {
            var d = a.status;
            401 != d && 404 != d || ($.removeCookie("token", {
                path: "/"
            }),
            $("#sign-up-xs").removeClass("hidden"),
            $("#sign-in-xs").removeClass("hidden"),
            $("#sign-in").removeClass("hidden"),
            $("#sign-up").removeClass("hidden"),
            $(".crp-showcase form").removeClass("hidden")),
            bootscale("init", {
                app_id: "91af7bf3"
            }),
            bootscale("update")
        }
    })) : ($("#user-name").addClass("hidden"),
    $("#user-name-xs").addClass("hidden"),
    $("#dashboard").addClass("hidden"),
    bootscale("init", {
        app_id: "91af7bf3"
    }),
    bootscale("update"))
}
!function(a, b) {
    function c(b) {
        var c, d = a("<div></div>").css({
            width: "100%"
        });
        return b.append(d),
        c = b.width() - d.width(),
        d.remove(),
        c
    }
    function d(e, f) {
        var g = e.getBoundingClientRect()
          , h = g.top
          , i = g.bottom
          , j = g.left
          , k = g.right
          , l = a.extend({
            tolerance: 0,
            viewport: b
        }, f)
          , m = !1
          , n = l.viewport.jquery ? l.viewport : a(l.viewport);
        n.length || (console.warn("isInViewport: The viewport selector you have provided matches no element on page."),
        console.warn("isInViewport: Defaulting to viewport as window"),
        n = a(b));
        var o = n.height()
          , p = n.width()
          , q = n[0].toString();
        if (n[0] !== b && "[object Window]" !== q && "[object DOMWindow]" !== q) {
            var r = n[0].getBoundingClientRect();
            h -= r.top,
            i -= r.top,
            j -= r.left,
            k -= r.left,
            d.scrollBarWidth = d.scrollBarWidth || c(n),
            p -= d.scrollBarWidth
        }
        return l.tolerance = ~~Math.round(parseFloat(l.tolerance)),
        l.tolerance < 0 && (l.tolerance = o + l.tolerance),
        0 >= k || j >= p ? m : m = l.tolerance ? !!(h <= l.tolerance && i >= l.tolerance) : !!(i > 0 && o >= h)
    }
    String.prototype.hasOwnProperty("trim") || (String.prototype.trim = function() {
        return this.replace(/^\s*(.*?)\s*$/, "$1")
    }
    );
    var e = function(b) {
        if (1 === arguments.length && "function" == typeof b && (b = [b]),
        !(b instanceof Array))
            throw new SyntaxError("isInViewport: Argument(s) passed to .do/.run should be a function or an array of functions");
        for (var c = 0; c < b.length; c++)
            if ("function" == typeof b[c])
                for (var d = 0; d < this.length; d++)
                    b[c].call(a(this[d]));
            else
                console.warn("isInViewport: Argument(s) passed to .do/.run should be a function or an array of functions"),
                console.warn("isInViewport: Ignoring non-function values in array and moving on");
        return this
    }
    ;
    a.fn["do"] = function(a) {
        return console.warn("isInViewport: .do is deprecated as it causes issues in IE and some browsers since it's a reserved word. Use $.fn.run instead i.e., $(el).run(fn)."),
        e(a)
    }
    ,
    a.fn.run = e;
    var f = function(b) {
        if (b) {
            var c = b.split(",");
            return 1 === c.length && isNaN(c[0]) && (c[1] = c[0],
            c[0] = void 0),
            {
                tolerance: c[0] ? c[0].trim() : void 0,
                viewport: c[1] ? a(c[1].trim()) : void 0
            }
        }
        return {}
    }
    ;
    a.extend(a.expr[":"], {
        "in-viewport": a.expr.createPseudo ? a.expr.createPseudo(function(a) {
            return function(b) {
                return d(b, f(a))
            }
        }) : function(a, b, c) {
            return d(a, f(c[3]))
        }
    }),
    a.fn.isInViewport = function(a) {
        return this.filter(function(b, c) {
            return d(c, a)
        })
    }
}(jQuery, window),
function() {
    var a = this
      , b = a._
      , c = {}
      , d = Array.prototype
      , e = Object.prototype
      , f = d.push
      , g = d.slice
      , h = d.concat
      , i = e.toString
      , j = e.hasOwnProperty
      , k = d.forEach
      , l = d.map
      , m = d.reduce
      , n = d.reduceRight
      , o = d.filter
      , p = d.every
      , q = d.some
      , r = d.indexOf
      , s = d.lastIndexOf
      , e = Array.isArray
      , t = Object.keys
      , u = Function.prototype.bind
      , v = function(a) {
        return a instanceof v ? a : this instanceof v ? void (this._wrapped = a) : new v(a)
    }
    ;
    "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = v),
    exports._ = v) : a._ = v,
    v.VERSION = "1.5.1";
    var w = v.each = v.forEach = function(a, b, d) {
        if (null  != a)
            if (k && a.forEach === k)
                a.forEach(b, d);
            else if (a.length === +a.length)
                for (var e = 0, f = a.length; f > e && b.call(d, a[e], e, a) !== c; e++)
                    ;
            else
                for (e in a)
                    if (v.has(a, e) && b.call(d, a[e], e, a) === c)
                        break
    }
    ;
    v.map = v.collect = function(a, b, c) {
        var d = [];
        return null  == a ? d : l && a.map === l ? a.map(b, c) : (w(a, function(a, e, f) {
            d.push(b.call(c, a, e, f))
        }),
        d)
    }
    ,
    v.reduce = v.foldl = v.inject = function(a, b, c, d) {
        var e = 2 < arguments.length;
        if (null  == a && (a = []),
        m && a.reduce === m)
            return d && (b = v.bind(b, d)),
            e ? a.reduce(b, c) : a.reduce(b);
        if (w(a, function(a, f, g) {
            e ? c = b.call(d, c, a, f, g) : (c = a,
            e = !0)
        }),
        !e)
            throw new TypeError("Reduce of empty array with no initial value");
        return c
    }
    ,
    v.reduceRight = v.foldr = function(a, b, c, d) {
        var e = 2 < arguments.length;
        if (null  == a && (a = []),
        n && a.reduceRight === n)
            return d && (b = v.bind(b, d)),
            e ? a.reduceRight(b, c) : a.reduceRight(b);
        var f = a.length;
        if (f !== +f)
            var g = v.keys(a)
              , f = g.length;
        if (w(a, function(h, i, j) {
            i = g ? g[--f] : --f,
            e ? c = b.call(d, c, a[i], i, j) : (c = a[i],
            e = !0)
        }),
        !e)
            throw new TypeError("Reduce of empty array with no initial value");
        return c
    }
    ,
    v.find = v.detect = function(a, b, c) {
        var d;
        return x(a, function(a, e, f) {
            return b.call(c, a, e, f) ? (d = a,
            !0) : void 0
        }),
        d
    }
    ,
    v.filter = v.select = function(a, b, c) {
        var d = [];
        return null  == a ? d : o && a.filter === o ? a.filter(b, c) : (w(a, function(a, e, f) {
            b.call(c, a, e, f) && d.push(a)
        }),
        d)
    }
    ,
    v.reject = function(a, b, c) {
        return v.filter(a, function(a, d, e) {
            return !b.call(c, a, d, e)
        }, c)
    }
    ,
    v.every = v.all = function(a, b, d) {
        b || (b = v.identity);
        var e = !0;
        return null  == a ? e : p && a.every === p ? a.every(b, d) : (w(a, function(a, f, g) {
            return (e = e && b.call(d, a, f, g)) ? void 0 : c
        }),
        !!e)
    }
    ;
    var x = v.some = v.any = function(a, b, d) {
        b || (b = v.identity);
        var e = !1;
        return null  == a ? e : q && a.some === q ? a.some(b, d) : (w(a, function(a, f, g) {
            return e || (e = b.call(d, a, f, g)) ? c : void 0
        }),
        !!e)
    }
    ;
    v.contains = v.include = function(a, b) {
        return null  == a ? !1 : r && a.indexOf === r ? -1 != a.indexOf(b) : x(a, function(a) {
            return a === b
        })
    }
    ,
    v.invoke = function(a, b) {
        var c = g.call(arguments, 2)
          , d = v.isFunction(b);
        return v.map(a, function(a) {
            return (d ? b : a[b]).apply(a, c)
        })
    }
    ,
    v.pluck = function(a, b) {
        return v.map(a, function(a) {
            return a[b]
        })
    }
    ,
    v.where = function(a, b, c) {
        return v.isEmpty(b) ? c ? void 0 : [] : v[c ? "find" : "filter"](a, function(a) {
            for (var c in b)
                if (b[c] !== a[c])
                    return !1;
            return !0
        })
    }
    ,
    v.findWhere = function(a, b) {
        return v.where(a, b, !0)
    }
    ,
    v.max = function(a, b, c) {
        if (!b && v.isArray(a) && a[0] === +a[0] && 65535 > a.length)
            return Math.max.apply(Math, a);
        if (!b && v.isEmpty(a))
            return -(1 / 0);
        var d = {
            computed: -(1 / 0),
            value: -(1 / 0)
        };
        return w(a, function(a, e, f) {
            e = b ? b.call(c, a, e, f) : a,
            e > d.computed && (d = {
                value: a,
                computed: e
            })
        }),
        d.value
    }
    ,
    v.min = function(a, b, c) {
        if (!b && v.isArray(a) && a[0] === +a[0] && 65535 > a.length)
            return Math.min.apply(Math, a);
        if (!b && v.isEmpty(a))
            return 1 / 0;
        var d = {
            computed: 1 / 0,
            value: 1 / 0
        };
        return w(a, function(a, e, f) {
            e = b ? b.call(c, a, e, f) : a,
            e < d.computed && (d = {
                value: a,
                computed: e
            })
        }),
        d.value
    }
    ,
    v.shuffle = function(a) {
        var b, c = 0, d = [];
        return w(a, function(a) {
            b = v.random(c++),
            d[c - 1] = d[b],
            d[b] = a
        }),
        d
    }
    ;
    var y = function(a) {
        return v.isFunction(a) ? a : function(b) {
            return b[a]
        }
    }
    ;
    v.sortBy = function(a, b, c) {
        var d = y(b);
        return v.pluck(v.map(a, function(a, b, e) {
            return {
                value: a,
                index: b,
                criteria: d.call(c, a, b, e)
            }
        }).sort(function(a, b) {
            var c = a.criteria
              , d = b.criteria;
            if (c !== d) {
                if (c > d || void 0 === c)
                    return 1;
                if (d > c || void 0 === d)
                    return -1
            }
            return a.index < b.index ? -1 : 1
        }), "value")
    }
    ;
    var z = function(a, b, c, d) {
        var e = {}
          , f = y(null  == b ? v.identity : b);
        return w(a, function(b, g) {
            var h = f.call(c, b, g, a);
            d(e, h, b)
        }),
        e
    }
    ;
    v.groupBy = function(a, b, c) {
        return z(a, b, c, function(a, b, c) {
            (v.has(a, b) ? a[b] : a[b] = []).push(c)
        })
    }
    ,
    v.countBy = function(a, b, c) {
        return z(a, b, c, function(a, b) {
            v.has(a, b) || (a[b] = 0),
            a[b]++
        })
    }
    ,
    v.sortedIndex = function(a, b, c, d) {
        c = null  == c ? v.identity : y(c),
        b = c.call(d, b);
        for (var e = 0, f = a.length; f > e; ) {
            var g = e + f >>> 1;
            c.call(d, a[g]) < b ? e = g + 1 : f = g
        }
        return e
    }
    ,
    v.toArray = function(a) {
        return a ? v.isArray(a) ? g.call(a) : a.length === +a.length ? v.map(a, v.identity) : v.values(a) : []
    }
    ,
    v.size = function(a) {
        return null  == a ? 0 : a.length === +a.length ? a.length : v.keys(a).length
    }
    ,
    v.first = v.head = v.take = function(a, b, c) {
        return null  == a ? void 0 : null  == b || c ? a[0] : g.call(a, 0, b)
    }
    ,
    v.initial = function(a, b, c) {
        return g.call(a, 0, a.length - (null  == b || c ? 1 : b))
    }
    ,
    v.last = function(a, b, c) {
        return null  == a ? void 0 : null  == b || c ? a[a.length - 1] : g.call(a, Math.max(a.length - b, 0))
    }
    ,
    v.rest = v.tail = v.drop = function(a, b, c) {
        return g.call(a, null  == b || c ? 1 : b)
    }
    ,
    v.compact = function(a) {
        return v.filter(a, v.identity)
    }
    ;
    var A = function(a, b, c) {
        return b && v.every(a, v.isArray) ? h.apply(c, a) : (w(a, function(a) {
            v.isArray(a) || v.isArguments(a) ? b ? f.apply(c, a) : A(a, b, c) : c.push(a)
        }),
        c)
    }
    ;
    v.flatten = function(a, b) {
        return A(a, b, [])
    }
    ,
    v.without = function(a) {
        return v.difference(a, g.call(arguments, 1))
    }
    ,
    v.uniq = v.unique = function(a, b, c, d) {
        v.isFunction(b) && (d = c,
        c = b,
        b = !1),
        c = c ? v.map(a, c, d) : a;
        var e = []
          , f = [];
        return w(c, function(c, d) {
            (b ? d && f[f.length - 1] === c : v.contains(f, c)) || (f.push(c),
            e.push(a[d]))
        }),
        e
    }
    ,
    v.union = function() {
        return v.uniq(v.flatten(arguments, !0))
    }
    ,
    v.intersection = function(a) {
        var b = g.call(arguments, 1);
        return v.filter(v.uniq(a), function(a) {
            return v.every(b, function(b) {
                return 0 <= v.indexOf(b, a)
            })
        })
    }
    ,
    v.difference = function(a) {
        var b = h.apply(d, g.call(arguments, 1));
        return v.filter(a, function(a) {
            return !v.contains(b, a)
        })
    }
    ,
    v.zip = function() {
        for (var a = v.max(v.pluck(arguments, "length").concat(0)), b = Array(a), c = 0; a > c; c++)
            b[c] = v.pluck(arguments, "" + c);
        return b
    }
    ,
    v.object = function(a, b) {
        if (null  == a)
            return {};
        for (var c = {}, d = 0, e = a.length; e > d; d++)
            b ? c[a[d]] = b[d] : c[a[d][0]] = a[d][1];
        return c
    }
    ,
    v.indexOf = function(a, b, c) {
        if (null  == a)
            return -1;
        var d = 0
          , e = a.length;
        if (c) {
            if ("number" != typeof c)
                return d = v.sortedIndex(a, b),
                a[d] === b ? d : -1;
            d = 0 > c ? Math.max(0, e + c) : c
        }
        if (r && a.indexOf === r)
            return a.indexOf(b, c);
        for (; e > d; d++)
            if (a[d] === b)
                return d;
        return -1
    }
    ,
    v.lastIndexOf = function(a, b, c) {
        if (null  == a)
            return -1;
        var d = null  != c;
        if (s && a.lastIndexOf === s)
            return d ? a.lastIndexOf(b, c) : a.lastIndexOf(b);
        for (c = d ? c : a.length; c--; )
            if (a[c] === b)
                return c;
        return -1
    }
    ,
    v.range = function(a, b, c) {
        1 >= arguments.length && (b = a || 0,
        a = 0),
        c = arguments[2] || 1;
        for (var d = Math.max(Math.ceil((b - a) / c), 0), e = 0, f = Array(d); d > e; )
            f[e++] = a,
            a += c;
        return f
    }
    ;
    var B = function() {}
    ;
    v.bind = function(a, b) {
        var c, d;
        if (u && a.bind === u)
            return u.apply(a, g.call(arguments, 1));
        if (!v.isFunction(a))
            throw new TypeError;
        return c = g.call(arguments, 2),
        d = function() {
            if (!(this instanceof d))
                return a.apply(b, c.concat(g.call(arguments)));
            B.prototype = a.prototype;
            var e = new B;
            B.prototype = null ;
            var f = a.apply(e, c.concat(g.call(arguments)));
            return Object(f) === f ? f : e
        }
    }
    ,
    v.partial = function(a) {
        var b = g.call(arguments, 1);
        return function() {
            return a.apply(this, b.concat(g.call(arguments)))
        }
    }
    ,
    v.bindAll = function(a) {
        var b = g.call(arguments, 1);
        if (0 === b.length)
            throw Error("bindAll must be passed function names");
        return w(b, function(b) {
            a[b] = v.bind(a[b], a)
        }),
        a
    }
    ,
    v.memoize = function(a, b) {
        var c = {};
        return b || (b = v.identity),
        function() {
            var d = b.apply(this, arguments);
            return v.has(c, d) ? c[d] : c[d] = a.apply(this, arguments)
        }
    }
    ,
    v.delay = function(a, b) {
        var c = g.call(arguments, 2);
        return setTimeout(function() {
            return a.apply(null , c)
        }, b)
    }
    ,
    v.defer = function(a) {
        return v.delay.apply(v, [a, 1].concat(g.call(arguments, 1)))
    }
    ,
    v.throttle = function(a, b, c) {
        var d, e, f, g = null , h = 0;
        c || (c = {});
        var i = function() {
            h = !1 === c.leading ? 0 : new Date,
            g = null ,
            f = a.apply(d, e)
        }
        ;
        return function() {
            var j = new Date;
            !h && !1 === c.leading && (h = j);
            var k = b - (j - h);
            return d = this,
            e = arguments,
            0 >= k ? (clearTimeout(g),
            g = null ,
            h = j,
            f = a.apply(d, e)) : !g && !1 !== c.trailing && (g = setTimeout(i, k)),
            f
        }
    }
    ,
    v.debounce = function(a, b, c) {
        var d, e = null ;
        return function() {
            var f = this
              , g = arguments
              , h = c && !e;
            return clearTimeout(e),
            e = setTimeout(function() {
                e = null ,
                c || (d = a.apply(f, g))
            }, b),
            h && (d = a.apply(f, g)),
            d
        }
    }
    ,
    v.once = function(a) {
        var b, c = !1;
        return function() {
            return c ? b : (c = !0,
            b = a.apply(this, arguments),
            a = null ,
            b)
        }
    }
    ,
    v.wrap = function(a, b) {
        return function() {
            var c = [a];
            return f.apply(c, arguments),
            b.apply(this, c)
        }
    }
    ,
    v.compose = function() {
        var a = arguments;
        return function() {
            for (var b = arguments, c = a.length - 1; c >= 0; c--)
                b = [a[c].apply(this, b)];
            return b[0]
        }
    }
    ,
    v.after = function(a, b) {
        return function() {
            return 1 > --a ? b.apply(this, arguments) : void 0
        }
    }
    ,
    v.keys = t || function(a) {
        if (a !== Object(a))
            throw new TypeError("Invalid object");
        var b, c = [];
        for (b in a)
            v.has(a, b) && c.push(b);
        return c
    }
    ,
    v.values = function(a) {
        var b, c = [];
        for (b in a)
            v.has(a, b) && c.push(a[b]);
        return c
    }
    ,
    v.pairs = function(a) {
        var b, c = [];
        for (b in a)
            v.has(a, b) && c.push([b, a[b]]);
        return c
    }
    ,
    v.invert = function(a) {
        var b, c = {};
        for (b in a)
            v.has(a, b) && (c[a[b]] = b);
        return c
    }
    ,
    v.functions = v.methods = function(a) {
        var b, c = [];
        for (b in a)
            v.isFunction(a[b]) && c.push(b);
        return c.sort()
    }
    ,
    v.extend = function(a) {
        return w(g.call(arguments, 1), function(b) {
            if (b)
                for (var c in b)
                    a[c] = b[c]
        }),
        a
    }
    ,
    v.pick = function(a) {
        var b = {}
          , c = h.apply(d, g.call(arguments, 1));
        return w(c, function(c) {
            c in a && (b[c] = a[c])
        }),
        b
    }
    ,
    v.omit = function(a) {
        var b, c = {}, e = h.apply(d, g.call(arguments, 1));
        for (b in a)
            v.contains(e, b) || (c[b] = a[b]);
        return c
    }
    ,
    v.defaults = function(a) {
        return w(g.call(arguments, 1), function(b) {
            if (b)
                for (var c in b)
                    void 0 === a[c] && (a[c] = b[c])
        }),
        a
    }
    ,
    v.clone = function(a) {
        return v.isObject(a) ? v.isArray(a) ? a.slice() : v.extend({}, a) : a
    }
    ,
    v.tap = function(a, b) {
        return b(a),
        a
    }
    ;
    var C = function(a, b, c, d) {
        if (a === b)
            return 0 !== a || 1 / a == 1 / b;
        if (null  == a || null  == b)
            return a === b;
        a instanceof v && (a = a._wrapped),
        b instanceof v && (b = b._wrapped);
        var e = i.call(a);
        if (e != i.call(b))
            return !1;
        switch (e) {
        case "[object String]":
            return a == String(b);
        case "[object Number]":
            return a != +a ? b != +b : 0 == a ? 1 / a == 1 / b : a == +b;
        case "[object Date]":
        case "[object Boolean]":
            return +a == +b;
        case "[object RegExp]":
            return a.source == b.source && a.global == b.global && a.multiline == b.multiline && a.ignoreCase == b.ignoreCase
        }
        if ("object" != typeof a || "object" != typeof b)
            return !1;
        for (var f = c.length; f--; )
            if (c[f] == a)
                return d[f] == b;
        var f = a.constructor
          , g = b.constructor;
        if (!(f === g || v.isFunction(f) && f instanceof f && v.isFunction(g) && g instanceof g))
            return !1;
        if (c.push(a),
        d.push(b),
        f = 0,
        g = !0,
        "[object Array]" == e) {
            if (f = a.length,
            g = f == b.length)
                for (; f-- && (g = C(a[f], b[f], c, d)); )
                    ;
        } else {
            for (var h in a)
                if (v.has(a, h) && (f++,
                !(g = v.has(b, h) && C(a[h], b[h], c, d))))
                    break;
            if (g) {
                for (h in b)
                    if (v.has(b, h) && !f--)
                        break;
                g = !f
            }
        }
        return c.pop(),
        d.pop(),
        g
    }
    ;
    v.isEqual = function(a, b) {
        return C(a, b, [], [])
    }
    ,
    v.isEmpty = function(a) {
        if (null  == a)
            return !0;
        if (v.isArray(a) || v.isString(a))
            return 0 === a.length;
        for (var b in a)
            if (v.has(a, b))
                return !1;
        return !0
    }
    ,
    v.isElement = function(a) {
        return !(!a || 1 !== a.nodeType)
    }
    ,
    v.isArray = e || function(a) {
        return "[object Array]" == i.call(a)
    }
    ,
    v.isObject = function(a) {
        return a === Object(a)
    }
    ,
    w("Arguments Function String Number Date RegExp".split(" "), function(a) {
        v["is" + a] = function(b) {
            return i.call(b) == "[object " + a + "]"
        }
    }),
    v.isArguments(arguments) || (v.isArguments = function(a) {
        return !(!a || !v.has(a, "callee"))
    }
    ),
    "function" != typeof /./ && (v.isFunction = function(a) {
        return "function" == typeof a
    }
    ),
    v.isFinite = function(a) {
        return isFinite(a) && !isNaN(parseFloat(a))
    }
    ,
    v.isNaN = function(a) {
        return v.isNumber(a) && a != +a
    }
    ,
    v.isBoolean = function(a) {
        return !0 === a || !1 === a || "[object Boolean]" == i.call(a)
    }
    ,
    v.isNull = function(a) {
        return null  === a
    }
    ,
    v.isUndefined = function(a) {
        return void 0 === a
    }
    ,
    v.has = function(a, b) {
        return j.call(a, b)
    }
    ,
    v.noConflict = function() {
        return a._ = b,
        this
    }
    ,
    v.identity = function(a) {
        return a
    }
    ,
    v.times = function(a, b, c) {
        for (var d = Array(Math.max(0, a)), e = 0; a > e; e++)
            d[e] = b.call(c, e);
        return d
    }
    ,
    v.random = function(a, b) {
        return null  == b && (b = a,
        a = 0),
        a + Math.floor(Math.random() * (b - a + 1))
    }
    ;
    var D = {
        escape: {
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;",
            "'": "&#x27;",
            "/": "&#x2F;"
        }
    };
    D.unescape = v.invert(D.escape);
    var E = {
        escape: RegExp("[" + v.keys(D.escape).join("") + "]", "g"),
        unescape: RegExp("(" + v.keys(D.unescape).join("|") + ")", "g")
    };
    v.each(["escape", "unescape"], function(a) {
        v[a] = function(b) {
            return null  == b ? "" : ("" + b).replace(E[a], function(b) {
                return D[a][b]
            })
        }
    }),
    v.result = function(a, b) {
        if (null  != a) {
            var c = a[b];
            return v.isFunction(c) ? c.call(a) : c
        }
    }
    ,
    v.mixin = function(a) {
        w(v.functions(a), function(b) {
            var c = v[b] = a[b];
            v.prototype[b] = function() {
                var a = [this._wrapped];
                return f.apply(a, arguments),
                a = c.apply(v, a),
                this._chain ? v(a).chain() : a
            }
        })
    }
    ;
    var F = 0;
    v.uniqueId = function(a) {
        var b = ++F + "";
        return a ? a + b : b
    }
    ,
    v.templateSettings = {
        evaluate: /<%([\s\S]+?)%>/g,
        interpolate: /<%=([\s\S]+?)%>/g,
        escape: /<%-([\s\S]+?)%>/g
    };
    var G = /(.)^/
      , H = {
        "'": "'",
        "\\": "\\",
        "\r": "r",
        "\n": "n",
        "	": "t",
        "\u2028": "u2028",
        "\u2029": "u2029"
    }
      , I = /\\|'|\r|\n|\t|\u2028|\u2029/g;
    v.template = function(a, b, c) {
        var d;
        c = v.defaults({}, c, v.templateSettings);
        var e = RegExp([(c.escape || G).source, (c.interpolate || G).source, (c.evaluate || G).source].join("|") + "|$", "g")
          , f = 0
          , g = "__p+='";
        a.replace(e, function(b, c, d, e, h) {
            return g += a.slice(f, h).replace(I, function(a) {
                return "\\" + H[a]
            }),
            c && (g += "'+\n((__t=(" + c + "))==null?'':_.escape(__t))+\n'"),
            d && (g += "'+\n((__t=(" + d + "))==null?'':__t)+\n'"),
            e && (g += "';\n" + e + "\n__p+='"),
            f = h + b.length,
            b
        }),
        g += "';\n",
        c.variable || (g = "with(obj||{}){\n" + g + "}\n"),
        g = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + g + "return __p;\n";
        try {
            d = new Function(c.variable || "obj","_",g)
        } catch (h) {
            throw h.source = g,
            h
        }
        return b ? d(b, v) : (b = function(a) {
            return d.call(this, a, v)
        }
        ,
        b.source = "function(" + (c.variable || "obj") + "){\n" + g + "}",
        b)
    }
    ,
    v.chain = function(a) {
        return v(a).chain()
    }
    ,
    v.mixin(v),
    w("pop push reverse shift sort splice unshift".split(" "), function(a) {
        var b = d[a];
        v.prototype[a] = function() {
            var c = this._wrapped;
            return b.apply(c, arguments),
            ("shift" == a || "splice" == a) && 0 === c.length && delete c[0],
            this._chain ? v(c).chain() : c
        }
    }),
    w(["concat", "join", "slice"], function(a) {
        var b = d[a];
        v.prototype[a] = function() {
            var a = b.apply(this._wrapped, arguments);
            return this._chain ? v(a).chain() : a
        }
    }),
    v.extend(v.prototype, {
        chain: function() {
            return this._chain = !0,
            this
        },
        value: function() {
            return this._wrapped
        }
    })
}
.call(this);
var Backbone = Backbone || {};
!function() {
    var a = [].slice
      , b = function(a, b, c) {
        var d;
        a = -1;
        var e = b.length;
        switch (c.length) {
        case 0:
            for (; ++a < e; )
                (d = b[a]).callback.call(d.ctx);
            break;
        case 1:
            for (; ++a < e; )
                (d = b[a]).callback.call(d.ctx, c[0]);
            break;
        case 2:
            for (; ++a < e; )
                (d = b[a]).callback.call(d.ctx, c[0], c[1]);
            break;
        case 3:
            for (; ++a < e; )
                (d = b[a]).callback.call(d.ctx, c[0], c[1], c[2]);
            break;
        default:
            for (; ++a < e; )
                (d = b[a]).callback.apply(d.ctx, c)
        }
    }
      , c = Backbone.Events = {
        on: function(a, b, c) {
            return this._events || (this._events = {}),
            (this._events[a] || (this._events[a] = [])).push({
                callback: b,
                context: c,
                ctx: c || this
            }),
            this
        },
        once: function(a, b, c) {
            var d = this
              , e = _.once(function() {
                d.off(a, e),
                b.apply(this, arguments)
            });
            return e._callback = b,
            this.on(a, e, c),
            this
        },
        off: function(a, b, c) {
            var d, e, f, g, h, i, j, k;
            if (!this._events)
                return this;
            if (!a && !b && !c)
                return this._events = {},
                this;
            for (g = a ? [a] : _.keys(this._events),
            h = 0,
            i = g.length; i > h; h++)
                if (a = g[h],
                d = this._events[a]) {
                    if (f = [],
                    b || c)
                        for (j = 0,
                        k = d.length; k > j; j++)
                            e = d[j],
                            (b && b !== (e.callback._callback || e.callback) || c && c !== e.context) && f.push(e);
                    this._events[a] = f
                }
            return this
        },
        trigger: function(c) {
            if (!this._events)
                return this;
            var d = a.call(arguments, 1)
              , e = this._events[c]
              , f = this._events.all;
            return e && b(this, e, d),
            f && b(this, f, arguments),
            this
        },
        listenTo: function(a, b, c) {
            var d = this._listeners || (this._listeners = {})
              , e = a._listenerId || (a._listenerId = _.uniqueId("l"));
            return d[e] = a,
            a.on(b, c || this, this),
            this
        },
        stopListening: function(a, b, c) {
            var d = this._listeners;
            if (d) {
                if (a)
                    a.off(b, c, this),
                    !b && !c && delete d[a._listenerId];
                else {
                    for (var e in d)
                        d[e].off(null , null , this);
                    this._listeners = {}
                }
                return this
            }
        }
    };
    c.bind = c.on,
    c.unbind = c.off,
    "undefined" != typeof exports && ("undefined" != typeof module && module.exports && (exports = module.exports = c),
    exports.Backbone = exports.Backbone || Backbone)
}(),
function() {
    function a(a) {
        var d = (new Date).getTime()
          , e = Math.max(0, 16 - (d - c))
          , f = b.setTimeout(function() {
            a(d + e)
        }, e);
        return c = d + e,
        f
    }
    var b = this
      , c = 0
      , d = ["ms", "moz", "webkit", "o"];
    if ("undefined" != typeof exports)
        "undefined" != typeof module && module.exports && (exports = module.exports = a),
        exports.requestAnimationFrame = a;
    else {
        for (var e = 0; e < d.length && !b.requestAnimationFrame; ++e)
            b.requestAnimationFrame = b[d[e] + "RequestAnimationFrame"],
            b.cancelAnimationFrame = b[d[e] + "CancelAnimationFrame"] || b[d[e] + "CancelRequestAnimationFrame"];
        b.requestAnimationFrame || (b.requestAnimationFrame = a),
        b.cancelAnimationFrame || (b.cancelAnimationFrame = function(a) {
            clearTimeout(a)
        }
        )
    }
}(),
function() {
    function a() {
        var a = document.body.getBoundingClientRect()
          , b = this.width = a.width
          , a = this.height = a.height;
        this.renderer.setSize(b, a, this.ratio),
        this.trigger(p.Events.resize, b, a)
    }
    var b = this
      , c = b.Two || {}
      , d = Math.sin
      , e = Math.cos
      , f = Math.atan2
      , g = Math.sqrt
      , h = Math.PI
      , i = 2 * h
      , j = h / 2
      , k = Math.pow
      , l = Math.min
      , m = Math.max
      , n = 0
      , o = {
        hasEventListeners: _.isFunction(b.addEventListener),
        bind: function(a, b, c, d) {
            return this.hasEventListeners ? a.addEventListener(b, c, !!d) : a.attachEvent("on" + b, c),
            this
        },
        unbind: function(a, b, c, d) {
            return this.hasEventListeners ? a.removeEventListeners(b, c, !!d) : a.detachEvent("on" + b, c),
            this
        }
    }
      , p = b.Two = function(c) {
        c = _.defaults(c || {}, {
            fullscreen: !1,
            width: 640,
            height: 480,
            type: p.Types.svg,
            autostart: !1
        }),
        _.each(c, function(a, b) {
            "fullscreen" === b || "width" === b || "height" === b || "autostart" === b || (this[b] = a)
        }, this),
        _.isElement(c.domElement) && (this.type = p.Types[c.domElement.tagName.toLowerCase()]),
        this.renderer = new p[this.type](this),
        p.Utils.setPlaying.call(this, c.autostart),
        this.frameCount = 0,
        c.fullscreen ? (c = _.bind(a, this),
        _.extend(document.body.style, {
            overflow: "hidden",
            margin: 0,
            padding: 0,
            top: 0,
            left: 0,
            right: 0,
            bottom: 0,
            position: "fixed"
        }),
        _.extend(this.renderer.domElement.style, {
            display: "block",
            top: 0,
            left: 0,
            right: 0,
            bottom: 0,
            position: "fixed"
        }),
        o.bind(b, "resize", c),
        c()) : _.isElement(c.domElement) || (this.renderer.setSize(c.width, c.height, this.ratio),
        this.width = c.width,
        this.height = c.height),
        this.scene = this.renderer.scene,
        p.Instances.push(this)
    }
    ;
    _.extend(p, {
        Array: b.Float32Array || Array,
        Types: {
            webgl: "WebGLRenderer",
            svg: "SVGRenderer",
            canvas: "CanvasRenderer"
        },
        Version: "v0.4.0",
        Identifier: "two_",
        Properties: {
            hierarchy: "hierarchy",
            demotion: "demotion"
        },
        Events: {
            play: "play",
            pause: "pause",
            update: "update",
            render: "render",
            resize: "resize",
            change: "change",
            remove: "remove",
            insert: "insert"
        },
        Commands: {
            move: "M",
            line: "L",
            curve: "C",
            close: "Z"
        },
        Resolution: 8,
        Instances: [],
        noConflict: function() {
            return b.Two = c,
            this
        },
        uniqueId: function() {
            var a = n;
            return n++,
            a
        },
        Utils: {
            release: function(a) {
                _.isObject(a) && (_.isFunction(a.unbind) && a.unbind(),
                a.vertices && (_.isFunction(a.vertices.unbind) && a.vertices.unbind(),
                _.each(a.vertices, function(a) {
                    _.isFunction(a.unbind) && a.unbind()
                })),
                a.children && _.each(a.children, function(a) {
                    p.Utils.release(a)
                }))
            },
            Curve: {
                CollinearityEpsilon: k(10, -30),
                RecursionLimit: 16,
                CuspLimit: 0,
                Tolerance: {
                    distance: .25,
                    angle: 0,
                    epsilon: .01
                },
                abscissas: [[.5773502691896257], [0, .7745966692414834], [.33998104358485626, .8611363115940526], [0, .5384693101056831, .906179845938664], [.2386191860831969, .6612093864662645, .932469514203152], [0, .4058451513773972, .7415311855993945, .9491079123427585], [.1834346424956498, .525532409916329, .7966664774136267, .9602898564975363], [0, .3242534234038089, .6133714327005904, .8360311073266358, .9681602395076261], [.14887433898163122, .4333953941292472, .6794095682990244, .8650633666889845, .9739065285171717], [0, .26954315595234496, .5190961292068118, .7301520055740494, .8870625997680953, .978228658146057], [.1252334085114689, .3678314989981802, .5873179542866175, .7699026741943047, .9041172563704749, .9815606342467192], [0, .2304583159551348, .44849275103644687, .6423493394403402, .8015780907333099, .9175983992229779, .9841830547185881], [.10805494870734367, .31911236892788974, .5152486363581541, .6872929048116855, .827201315069765, .9284348836635735, .9862838086968123], [0, .20119409399743451, .3941513470775634, .5709721726085388, .7244177313601701, .8482065834104272, .937273392400706, .9879925180204854], [.09501250983763744, .2816035507792589, .45801677765722737, .6178762444026438, .755404408355003, .8656312023878318, .9445750230732326, .9894009349916499]],
                weights: [[1], [.8888888888888888, .5555555555555556], [.6521451548625461, .34785484513745385], [.5688888888888889, .47862867049936647, .23692688505618908], [.46791393457269104, .3607615730481386, .17132449237917036], [.4179591836734694, .3818300505051189, .27970539148927664, .1294849661688697], [.362683783378362, .31370664587788727, .22238103445337448, .10122853629037626], [.3302393550012598, .31234707704000286, .26061069640293544, .1806481606948574, .08127438836157441], [.29552422471475287, .26926671930999635, .21908636251598204, .1494513491505806, .06667134430868814], [.2729250867779006, .26280454451024665, .23319376459199048, .18629021092773426, .1255803694649046, .05566856711617366], [.24914704581340277, .2334925365383548, .20316742672306592, .16007832854334622, .10693932599531843, .04717533638651183], [.2325515532308739, .22628318026289723, .2078160475368885, .17814598076194574, .13887351021978725, .09212149983772845, .04048400476531588], [.2152638534631578, .2051984637212956, .18553839747793782, .15720316715819355, .12151857068790319, .08015808715976021, .03511946033175186], [.2025782419255613, .19843148532711158, .1861610000155622, .16626920581699392, .13957067792615432, .10715922046717194, .07036604748810812, .03075324199611727], [.1894506104550685, .18260341504492358, .16915651939500254, .14959598881657674, .12462897125553388, .09515851168249279, .062253523938647894, .027152459411754096]]
            },
            devicePixelRatio: b.devicePixelRatio || 1,
            getBackingStoreRatio: function(a) {
                return a.webkitBackingStorePixelRatio || a.mozBackingStorePixelRatio || a.msBackingStorePixelRatio || a.oBackingStorePixelRatio || a.backingStorePixelRatio || 1
            },
            getRatio: function(a) {
                return p.Utils.devicePixelRatio / v(a)
            },
            setPlaying: function(a) {
                return this.playing = !!a,
                this
            },
            getComputedMatrix: function(a, b) {
                b = b && b.identity() || new p.Matrix;
                for (var c = a, d = []; c && c._matrix; )
                    d.push(c._matrix),
                    c = c.parent;
                return d.reverse(),
                _.each(d, function(a) {
                    a = a.elements,
                    b.multiply(a[0], a[1], a[2], a[3], a[4], a[5], a[6], a[7], a[8], a[9])
                }),
                b
            },
            deltaTransformPoint: function(a, b, c) {
                return new p.Vector(b * a.a + c * a.c + 0,b * a.b + c * a.d + 0)
            },
            decomposeMatrix: function(a) {
                var b = p.Utils.deltaTransformPoint(a, 0, 1)
                  , c = p.Utils.deltaTransformPoint(a, 1, 0)
                  , b = 180 / Math.PI * Math.atan2(b.y, b.x) - 90
                  , c = 180 / Math.PI * Math.atan2(c.y, c.x);
                return {
                    translateX: a.e,
                    translateY: a.f,
                    scaleX: Math.sqrt(a.a * a.a + a.b * a.b),
                    scaleY: Math.sqrt(a.c * a.c + a.d * a.d),
                    skewX: b,
                    skewY: c,
                    rotation: b
                }
            },
            applySvgAttributes: function(a, b) {
                var c, d, e, f = {}, g = {};
                if (getComputedStyle) {
                    var h = getComputedStyle(a);
                    for (c = h.length; c--; )
                        d = h[c],
                        e = h[d],
                        void 0 !== e && (g[d] = e)
                }
                for (c = a.attributes.length; c--; )
                    e = a.attributes[c],
                    f[e.nodeName] = e.value;
                _.isUndefined(g.opacity) || (g["stroke-opacity"] = g.opacity,
                g["fill-opacity"] = g.opacity),
                _.extend(g, f),
                g.visible = !(_.isUndefined(g.display) && "none" === g.display) || _.isUndefined(g.visibility) && "hidden" === g.visibility;
                for (d in g)
                    switch (e = g[d],
                    d) {
                    case "transform":
                        if ("none" === e)
                            break;
                        if (null  === a.getCTM())
                            break;
                        f = p.Utils.decomposeMatrix(a.getCTM()),
                        b.translation.set(f.translateX, f.translateY),
                        b.rotation = f.rotation,
                        b.scale = f.scaleX,
                        g.x && (b.translation.x = g.x),
                        g.y && (b.translation.y = g.y);
                        break;
                    case "visible":
                        b.visible = e;
                        break;
                    case "stroke-linecap":
                        b.cap = e;
                        break;
                    case "stroke-linejoin":
                        b.join = e;
                        break;
                    case "stroke-miterlimit":
                        b.miter = e;
                        break;
                    case "stroke-width":
                        b.linewidth = parseFloat(e);
                        break;
                    case "stroke-opacity":
                    case "fill-opacity":
                    case "opacity":
                        b.opacity = parseFloat(e);
                        break;
                    case "fill":
                    case "stroke":
                        b[d] = "none" === e ? "transparent" : e;
                        break;
                    case "id":
                        b.id = e;
                        break;
                    case "class":
                        b.classList = e.split(" ")
                    }
                return b
            },
            read: {
                svg: function() {
                    return p.Utils.read.g.apply(this, arguments)
                },
                g: function(a) {
                    var b = new p.Group;
                    p.Utils.applySvgAttributes(a, b);
                    for (var c = 0, d = a.childNodes.length; d > c; c++) {
                        var e = a.childNodes[c]
                          , f = e.nodeName;
                        if (!f)
                            return;
                        f = f.replace(/svg\:/gi, "").toLowerCase(),
                        f in p.Utils.read && (e = p.Utils.read[f].call(this, e),
                        b.add(e))
                    }
                    return b
                },
                polygon: function(a, b) {
                    var c = [];
                    a.getAttribute("points").replace(/(-?[\d\.?]+),(-?[\d\.?]+)/g, function(a, b, d) {
                        c.push(new p.Anchor(parseFloat(b),parseFloat(d)))
                    });
                    var d = new p.Polygon(c,!b).noStroke();
                    return d.fill = "black",
                    p.Utils.applySvgAttributes(a, d)
                },
                polyline: function(a) {
                    return p.Utils.read.polygon(a, !0)
                },
                path: function(a) {
                    var b, c, d = a.getAttribute("d"), e = new p.Anchor, f = !1, g = !1, h = d.match(/[a-df-z][^a-df-z]*/gi), i = h.length - 1;
                    return _.each(h.slice(0), function(a, b) {
                        var c, d = a[0], e = d.toLowerCase(), f = a.slice(1).trim().split(/[\s,]+|(?=\s?[+\-])/), g = [];
                        switch (0 >= b && (h = []),
                        e) {
                        case "h":
                        case "v":
                            1 < f.length && (c = 1);
                            break;
                        case "m":
                        case "l":
                        case "t":
                            2 < f.length && (c = 2);
                            break;
                        case "s":
                        case "q":
                            4 < f.length && (c = 4);
                            break;
                        case "c":
                            6 < f.length && (c = 6)
                        }
                        if (c) {
                            for (var e = 0, i = f.length, j = 0; i > e; e += c) {
                                var k = d;
                                if (j > 0)
                                    switch (d) {
                                    case "m":
                                        k = "l";
                                        break;
                                    case "M":
                                        k = "L"
                                    }
                                g.push([k].concat(f.slice(e, e + c)).join(" ")),
                                j++
                            }
                            h = Array.prototype.concat.apply(h, g);
                        } else
                            h.push(a)
                    }),
                    d = _.flatten(_.map(h, function(a, d) {
                        var h, j, l = a[0], m = l.toLowerCase();
                        c = a.slice(1).trim(),
                        c = c.replace(/(-?\d+(?:\.\d*)?)[eE]([+\-]?\d+)/g, function(a, b, c) {
                            return parseFloat(b) * k(10, c)
                        }),
                        c = c.split(/[\s,]+|(?=\s?[+\-])/),
                        g = l === m;
                        var n, o, q, r;
                        switch (m) {
                        case "z":
                            d >= i ? f = !0 : (j = e.x,
                            h = e.y,
                            h = new p.Anchor(j,h,void 0,void 0,void 0,void 0,p.Commands.close));
                            break;
                        case "m":
                        case "l":
                            j = parseFloat(c[0]),
                            h = parseFloat(c[1]),
                            h = new p.Anchor(j,h,void 0,void 0,void 0,void 0,"m" === m ? p.Commands.move : p.Commands.line),
                            g && h.addSelf(e),
                            e = h;
                            break;
                        case "h":
                        case "v":
                            j = "h" === m ? "x" : "y",
                            l = "x" === j ? "y" : "x",
                            h = new p.Anchor(void 0,void 0,void 0,void 0,void 0,void 0,p.Commands.line),
                            h[j] = parseFloat(c[0]),
                            h[l] = e[l],
                            g && (h[j] += e[j]),
                            e = h;
                            break;
                        case "c":
                        case "s":
                            h = e.x,
                            l = e.y,
                            b || (b = new p.Vector),
                            "c" === m ? (n = parseFloat(c[0]),
                            j = parseFloat(c[1]),
                            m = parseFloat(c[2]),
                            o = parseFloat(c[3]),
                            q = parseFloat(c[4]),
                            r = parseFloat(c[5])) : (o = y(e, b, g),
                            n = o.x,
                            j = o.y,
                            m = parseFloat(c[0]),
                            o = parseFloat(c[1]),
                            q = parseFloat(c[2]),
                            r = parseFloat(c[3])),
                            g && (n += h,
                            j += l,
                            m += h,
                            o += l,
                            q += h,
                            r += l),
                            _.isObject(e.controls) || p.Anchor.AppendCurveProperties(e),
                            e.controls.right.set(n - e.x, j - e.y),
                            e = h = new p.Anchor(q,r,m - q,o - r,void 0,void 0,p.Commands.curve),
                            b = h.controls.left;
                            break;
                        case "t":
                        case "q":
                            h = e.x,
                            l = e.y,
                            b || (b = new p.Vector),
                            b.isZero() ? (n = h,
                            j = l) : (n = b.x,
                            l = b.y),
                            "q" === m ? (m = parseFloat(c[0]),
                            o = parseFloat(c[1]),
                            q = parseFloat(c[1]),
                            r = parseFloat(c[2])) : (o = y(e, b, g),
                            m = o.x,
                            o = o.y,
                            q = parseFloat(c[0]),
                            r = parseFloat(c[1])),
                            g && (n += h,
                            j += l,
                            m += h,
                            o += l,
                            q += h,
                            r += l),
                            _.isObject(e.controls) || p.Anchor.AppendCurveProperties(e),
                            e.controls.right.set(n - e.x, j - e.y),
                            e = h = new p.Anchor(q,r,m - q,o - r,void 0,void 0,p.Commands.curve),
                            b = h.controls.left;
                            break;
                        case "a":
                            throw new p.Utils.Error("not yet able to interpret Elliptical Arcs.")
                        }
                        return h
                    })),
                    1 >= d.length ? void 0 : (d = _.compact(d),
                    d = new p.Polygon(d,f,void 0,!0).noStroke(),
                    d.fill = "black",
                    p.Utils.applySvgAttributes(a, d))
                },
                circle: function(a) {
                    var b = parseFloat(a.getAttribute("cx"))
                      , c = parseFloat(a.getAttribute("cy"))
                      , f = parseFloat(a.getAttribute("r"))
                      , g = p.Resolution
                      , h = _.map(_.range(g), function(a) {
                        var b = a / g * i;
                        return a = f * e(b),
                        b = f * d(b),
                        new p.Anchor(a,b)
                    }, this)
                      , h = new p.Polygon(h,!0,!0).noStroke();
                    return h.translation.set(b, c),
                    h.fill = "black",
                    p.Utils.applySvgAttributes(a, h)
                },
                ellipse: function(a) {
                    var b = parseFloat(a.getAttribute("cx"))
                      , c = parseFloat(a.getAttribute("cy"))
                      , f = parseFloat(a.getAttribute("rx"))
                      , g = parseFloat(a.getAttribute("ry"))
                      , h = p.Resolution
                      , j = _.map(_.range(h), function(a) {
                        var b = a / h * i;
                        return a = f * e(b),
                        b = g * d(b),
                        new p.Anchor(a,b)
                    }, this)
                      , j = new p.Polygon(j,!0,!0).noStroke();
                    return j.translation.set(b, c),
                    j.fill = "black",
                    p.Utils.applySvgAttributes(a, j)
                },
                rect: function(a) {
                    var b = parseFloat(a.getAttribute("x"))
                      , c = parseFloat(a.getAttribute("y"))
                      , d = parseFloat(a.getAttribute("width"))
                      , e = parseFloat(a.getAttribute("height"))
                      , d = d / 2
                      , e = e / 2
                      , f = [new p.Anchor(d,e), new p.Anchor(-d,e), new p.Anchor(-d,-e), new p.Anchor(d,-e)]
                      , f = new p.Polygon(f,!0).noStroke();
                    return f.translation.set(b + d, c + e),
                    f.fill = "black",
                    p.Utils.applySvgAttributes(a, f)
                },
                line: function(a) {
                    var b = parseFloat(a.getAttribute("x1"))
                      , c = parseFloat(a.getAttribute("y1"))
                      , d = parseFloat(a.getAttribute("x2"))
                      , e = parseFloat(a.getAttribute("y2"))
                      , d = (d - b) / 2
                      , e = (e - c) / 2
                      , f = [new p.Anchor(-d,-e), new p.Anchor(d,e)]
                      , f = new p.Polygon(f).noFill();
                    return f.translation.set(b + d, c + e),
                    p.Utils.applySvgAttributes(a, f)
                }
            },
            subdivide: function(a, b, c, d, e, f, g, h, i) {
                i = i || p.Utils.Curve.RecursionLimit;
                var j = i + 1;
                return a === g && b === h ? [new p.Anchor(g,h)] : _.map(_.range(0, j), function(i) {
                    var k = i / j;
                    return i = w(k, a, c, e, g),
                    k = w(k, b, d, f, h),
                    new p.Anchor(i,k)
                })
            },
            getPointOnCubicBezier: function(a, b, c, d, e) {
                var f = 1 - a;
                return f * f * f * b + 3 * f * f * a * c + 3 * f * a * a * d + a * a * a * e
            },
            getCurveLength: function(a, b, c, d, e, f, h, i, j) {
                if (a === c && b === d && e === h && f === i)
                    return a = h - a,
                    b = i - b,
                    g(a * a + b * b);
                var k = 9 * (c - e) + 3 * (h - a)
                  , l = 6 * (a + e) - 12 * c
                  , m = 3 * (c - a)
                  , n = 9 * (d - f) + 3 * (i - b)
                  , o = 6 * (b + f) - 12 * d
                  , q = 3 * (d - b);
                return x(function(a) {
                    var b = (k * a + l) * a + m;
                    return a = (n * a + o) * a + q,
                    g(b * b + a * a)
                }, 0, 1, j || p.Utils.Curve.RecursionLimit)
            },
            integrate: function(a, b, c, d) {
                var e = p.Utils.Curve.abscissas[d - 2]
                  , f = p.Utils.Curve.weights[d - 2];
                c = .5 * (c - b),
                b = c + b;
                var g = 0
                  , h = d + 1 >> 1;
                for (d = 1 & d ? f[g++] * a(b) : 0; h > g; ) {
                    var i = c * e[g];
                    d += f[g++] * (a(b + i) + a(b - i))
                }
                return c * d
            },
            getCurveFromPoints: function(a, b) {
                for (var c = a.length, d = c - 1, e = 0; c > e; e++) {
                    var f = a[e];
                    _.isObject(f.controls) || p.Anchor.AppendCurveProperties(f);
                    var g = b ? u(e - 1, c) : m(e - 1, 0)
                      , h = b ? u(e + 1, c) : l(e + 1, d);
                    t(a[g], f, a[h]),
                    f._command = 0 === e ? p.Commands.move : p.Commands.curve,
                    f.controls.left.x = _.isNumber(f.controls.left.x) ? f.controls.left.x : f.x,
                    f.controls.left.y = _.isNumber(f.controls.left.y) ? f.controls.left.y : f.y,
                    f.controls.right.x = _.isNumber(f.controls.right.x) ? f.controls.right.x : f.x,
                    f.controls.right.y = _.isNumber(f.controls.right.y) ? f.controls.right.y : f.y
                }
            },
            getControlPoints: function(a, b, c) {
                var f = s(a, b)
                  , g = s(c, b);
                a = q(a, b),
                c = q(c, b);
                var i = (f + g) / 2;
                return b.u = _.isObject(b.controls.left) ? b.controls.left : new p.Vector(0,0),
                b.v = _.isObject(b.controls.right) ? b.controls.right : new p.Vector(0,0),
                1e-4 > a || 1e-4 > c ? (b._relative || (b.controls.left.copy(b),
                b.controls.right.copy(b)),
                b) : (a *= .33,
                c *= .33,
                i = f > g ? i + j : i - j,
                b.controls.left.x = e(i) * a,
                b.controls.left.y = d(i) * a,
                i -= h,
                b.controls.right.x = e(i) * c,
                b.controls.right.y = d(i) * c,
                b._relative || (b.controls.left.x += b.x,
                b.controls.left.y += b.y,
                b.controls.right.x += b.x,
                b.controls.right.y += b.y),
                b)
            },
            getReflection: function(a, b, c) {
                return new p.Vector(2 * a.x - (b.x + a.x) - (c ? a.x : 0),2 * a.y - (b.y + a.y) - (c ? a.y : 0))
            },
            angleBetween: function(a, b) {
                var c, d;
                return 4 <= arguments.length ? (c = arguments[0] - arguments[2],
                d = arguments[1] - arguments[3],
                f(d, c)) : (c = a.x - b.x,
                d = a.y - b.y,
                f(d, c))
            },
            distanceBetweenSquared: function(a, b) {
                var c = a.x - b.x
                  , d = a.y - b.y;
                return c * c + d * d
            },
            distanceBetween: function(a, b) {
                return g(r(a, b))
            },
            toFixed: function(a) {
                return Math.floor(1e3 * a) / 1e3
            },
            mod: function(a, b) {
                for (; 0 > a; )
                    a += b;
                return a % b
            },
            Collection: function() {
                Array.call(this),
                1 < arguments.length ? Array.prototype.push.apply(this, arguments) : arguments[0] && Array.isArray(arguments[0]) && Array.prototype.push.apply(this, arguments[0])
            },
            Error: function(a) {
                this.name = "two.js",
                this.message = a
            }
        }
    }),
    p.Utils.Error.prototype = Error(),
    p.Utils.Error.prototype.constructor = p.Utils.Error,
    p.Utils.Collection.prototype = [],
    p.Utils.Collection.constructor = p.Utils.Collection,
    _.extend(p.Utils.Collection.prototype, Backbone.Events, {
        pop: function() {
            var a = Array.prototype.pop.apply(this, arguments);
            return this.trigger(p.Events.remove, [a]),
            a
        },
        shift: function() {
            var a = Array.prototype.shift.apply(this, arguments);
            return this.trigger(p.Events.remove, [a]),
            a
        },
        push: function() {
            var a = Array.prototype.push.apply(this, arguments);
            return this.trigger(p.Events.insert, arguments),
            a
        },
        unshift: function() {
            var a = Array.prototype.unshift.apply(this, arguments);
            return this.trigger(p.Events.insert, arguments),
            a
        },
        splice: function() {
            var a, b = Array.prototype.splice.apply(this, arguments);
            return this.trigger(p.Events.remove, b),
            2 < arguments.length && (a = this.slice(arguments[0], arguments.length - 2),
            this.trigger(p.Events.insert, a)),
            b
        }
    });
    var q = p.Utils.distanceBetween
      , r = p.Utils.distanceBetweenSquared
      , s = p.Utils.angleBetween
      , t = p.Utils.getControlPoints
      , u = p.Utils.mod
      , v = p.Utils.getBackingStoreRatio
      , w = p.Utils.getPointOnCubicBezier
      , x = p.Utils.integrate
      , y = p.Utils.getReflection;
    _.extend(p.prototype, Backbone.Events, {
        appendTo: function(a) {
            return a.appendChild(this.renderer.domElement),
            this
        },
        play: function() {
            return p.Utils.setPlaying.call(this, !0),
            this.trigger(p.Events.play)
        },
        pause: function() {
            return this.playing = !1,
            this.trigger(p.Events.pause)
        },
        update: function() {
            var a = !!this._lastFrame
              , c = (b.performance && b.performance.now ? b.performance : Date).now();
            this.frameCount++,
            a && (this.timeDelta = parseFloat((c - this._lastFrame).toFixed(3))),
            this._lastFrame = c;
            var a = this.width
              , c = this.height
              , d = this.renderer;
            return (a !== d.width || c !== d.height) && d.setSize(a, c, this.ratio),
            this.trigger(p.Events.update, this.frameCount, this.timeDelta),
            this.render()
        },
        render: function() {
            return this.renderer.render(),
            this.trigger(p.Events.render, this.frameCount)
        },
        add: function(a) {
            var b = a;
            return _.isArray(a) || (b = _.toArray(arguments)),
            this.scene.add(b),
            this
        },
        remove: function(a) {
            var b = a;
            return _.isArray(a) || (b = _.toArray(arguments)),
            this.scene.remove(b),
            this
        },
        clear: function() {
            return this.scene.remove(_.toArray(this.scene.children)),
            this
        },
        makeLine: function(a, b, c, d) {
            c = (c - a) / 2,
            d = (d - b) / 2;
            var e = [new p.Anchor(-c,-d), new p.Anchor(c,d)]
              , e = new p.Polygon(e).noFill();
            return e.translation.set(a + c, b + d),
            this.scene.add(e),
            e
        },
        makeRectangle: function(a, b, c, d) {
            return c /= 2,
            d /= 2,
            d = [new p.Anchor(-c,-d), new p.Anchor(c,-d), new p.Anchor(c,d), new p.Anchor(-c,d)],
            d = new p.Polygon(d,!0),
            d.translation.set(a, b),
            this.scene.add(d),
            d
        },
        makeCircle: function(a, b, c) {
            return this.makeEllipse(a, b, c, c)
        },
        makeEllipse: function(a, b, c, f) {
            var g = p.Resolution
              , h = _.map(_.range(g), function(a) {
                var b = a / g * i;
                return a = c * e(b),
                b = f * d(b),
                new p.Anchor(a,b)
            }, this)
              , h = new p.Polygon(h,!0,!0);
            return h.translation.set(a, b),
            this.scene.add(h),
            h
        },
        makeCurve: function(a) {
            var b = arguments.length
              , c = a;
            if (!_.isArray(a))
                for (var c = [], d = 0; b > d; d += 2) {
                    var e = arguments[d];
                    if (!_.isNumber(e))
                        break;
                    c.push(new p.Anchor(e,arguments[d + 1]))
                }
            var b = arguments[b - 1]
              , c = new p.Polygon(c,!(_.isBoolean(b) && b),!0)
              , b = c.getBoundingClientRect()
              , f = b.left + b.width / 2
              , g = b.top + b.height / 2;
            return _.each(c.vertices, function(a) {
                a.x -= f,
                a.y -= g
            }),
            c.translation.set(f, g),
            this.scene.add(c),
            c
        },
        makePolygon: function(a) {
            var b = arguments.length
              , c = a;
            if (!_.isArray(a))
                for (var c = [], d = 0; b > d; d += 2) {
                    var e = arguments[d];
                    if (!_.isNumber(e))
                        break;
                    c.push(new p.Anchor(e,arguments[d + 1]))
                }
            return b = arguments[b - 1],
            c = new p.Polygon(c,!(_.isBoolean(b) && b)),
            b = c.getBoundingClientRect(),
            c.center().translation.set(b.left + b.width / 2, b.top + b.height / 2),
            this.scene.add(c),
            c
        },
        makeGroup: function(a) {
            var b = a;
            _.isArray(a) || (b = _.toArray(arguments));
            var c = new p.Group;
            return this.scene.add(c),
            c.add(b),
            c
        },
        interpret: function(a, b) {
            var c = a.tagName.toLowerCase();
            return c in p.Utils.read ? (c = p.Utils.read[c].call(this, a),
            b && c instanceof p.Group ? this.add(_.values(c.children)) : this.add(c),
            c) : null 
        }
    }),
    function() {
        requestAnimationFrame(arguments.callee),
        p.Instances.forEach(function(a) {
            a.playing && a.update()
        })
    }(),
    "function" == typeof define && define.amd ? define(function() {
        return p
    }) : "undefined" != typeof module && module.exports && (module.exports = p)
}(),
function(a) {
    var b = a.Vector = function(a, b) {
        this.x = a || 0,
        this.y = b || 0
    }
    ;
    _.extend(b, {
        zero: new a.Vector
    }),
    _.extend(b.prototype, Backbone.Events, {
        set: function(a, b) {
            return this.x = a,
            this.y = b,
            this
        },
        copy: function(a) {
            return this.x = a.x,
            this.y = a.y,
            this
        },
        clear: function() {
            return this.y = this.x = 0,
            this
        },
        clone: function() {
            return new b(this.x,this.y)
        },
        add: function(a, b) {
            return this.x = a.x + b.x,
            this.y = a.y + b.y,
            this
        },
        addSelf: function(a) {
            return this.x += a.x,
            this.y += a.y,
            this
        },
        sub: function(a, b) {
            return this.x = a.x - b.x,
            this.y = a.y - b.y,
            this
        },
        subSelf: function(a) {
            return this.x -= a.x,
            this.y -= a.y,
            this
        },
        multiplySelf: function(a) {
            return this.x *= a.x,
            this.y *= a.y,
            this
        },
        multiplyScalar: function(a) {
            return this.x *= a,
            this.y *= a,
            this
        },
        divideScalar: function(a) {
            return a ? (this.x /= a,
            this.y /= a) : this.set(0, 0),
            this
        },
        negate: function() {
            return this.multiplyScalar(-1)
        },
        dot: function(a) {
            return this.x * a.x + this.y * a.y
        },
        lengthSquared: function() {
            return this.x * this.x + this.y * this.y
        },
        length: function() {
            return Math.sqrt(this.lengthSquared())
        },
        normalize: function() {
            return this.divideScalar(this.length())
        },
        distanceTo: function(a) {
            return Math.sqrt(this.distanceToSquared(a))
        },
        distanceToSquared: function(a) {
            var b = this.x - a.x;
            return a = this.y - a.y,
            b * b + a * a
        },
        setLength: function(a) {
            return this.normalize().multiplyScalar(a)
        },
        equals: function(a) {
            return 1e-4 > this.distanceTo(a)
        },
        lerp: function(a, b) {
            return this.set((a.x - this.x) * b + this.x, (a.y - this.y) * b + this.y)
        },
        isZero: function() {
            return 1e-4 > this.length()
        },
        toString: function() {
            return this.x + "," + this.y
        },
        toObject: function() {
            return {
                x: this.x,
                y: this.y
            }
        }
    });
    var c = {
        set: function(b, c) {
            return this._x = b,
            this._y = c,
            this.trigger(a.Events.change)
        },
        copy: function(b) {
            return this._x = b.x,
            this._y = b.y,
            this.trigger(a.Events.change)
        },
        clear: function() {
            return this._y = this._x = 0,
            this.trigger(a.Events.change)
        },
        clone: function() {
            return new b(this._x,this._y)
        },
        add: function(b, c) {
            return this._x = b.x + c.x,
            this._y = b.y + c.y,
            this.trigger(a.Events.change)
        },
        addSelf: function(b) {
            return this._x += b.x,
            this._y += b.y,
            this.trigger(a.Events.change)
        },
        sub: function(b, c) {
            return this._x = b.x - c.x,
            this._y = b.y - c.y,
            this.trigger(a.Events.change)
        },
        subSelf: function(b) {
            return this._x -= b.x,
            this._y -= b.y,
            this.trigger(a.Events.change)
        },
        multiplySelf: function(b) {
            return this._x *= b.x,
            this._y *= b.y,
            this.trigger(a.Events.change)
        },
        multiplyScalar: function(b) {
            return this._x *= b,
            this._y *= b,
            this.trigger(a.Events.change)
        },
        divideScalar: function(b) {
            return b ? (this._x /= b,
            this._y /= b,
            this.trigger(a.Events.change)) : this.clear()
        },
        negate: function() {
            return this.multiplyScalar(-1)
        },
        dot: function(a) {
            return this._x * a.x + this._y * a.y
        },
        lengthSquared: function() {
            return this._x * this._x + this._y * this._y
        },
        length: function() {
            return Math.sqrt(this.lengthSquared())
        },
        normalize: function() {
            return this.divideScalar(this.length())
        },
        distanceTo: function(a) {
            return Math.sqrt(this.distanceToSquared(a))
        },
        distanceToSquared: function(a) {
            var b = this._x - a.x;
            return a = this._y - a.y,
            b * b + a * a
        },
        setLength: function(a) {
            return this.normalize().multiplyScalar(a)
        },
        equals: function(a) {
            return 1e-4 > this.distanceTo(a)
        },
        lerp: function(a, b) {
            return this.set((a.x - this._x) * b + this._x, (a.y - this._y) * b + this._y)
        },
        isZero: function() {
            return 1e-4 > this.length()
        },
        toString: function() {
            return this._x + "," + this._y
        },
        toObject: function() {
            return {
                x: this._x,
                y: this._y
            }
        }
    }
      , d = {
        get: function() {
            return this._x
        },
        set: function(b) {
            this._x = b,
            this.trigger(a.Events.change, "x")
        }
    }
      , e = {
        get: function() {
            return this._y
        },
        set: function(b) {
            this._y = b,
            this.trigger(a.Events.change, "y")
        }
    };
    a.Vector.prototype.bind = a.Vector.prototype.on = function() {
        return this._bound || (this._x = this.x,
        this._y = this.y,
        Object.defineProperty(this, "x", d),
        Object.defineProperty(this, "y", e),
        _.extend(this, c),
        this._bound = !0),
        Backbone.Events.bind.apply(this, arguments),
        this
    }
}(Two),
function(a) {
    var b = a.Commands
      , c = a.Anchor = function(d, e, f, g, h, i, j) {
        return a.Vector.call(this, d, e),
        this._broadcast = _.bind(function() {
            this.trigger(a.Events.change)
        }, this),
        this._command = j || b.move,
        this._relative = !0,
        j ? (c.AppendCurveProperties(this),
        _.isNumber(f) && (this.controls.left.x = f),
        _.isNumber(g) && (this.controls.left.y = g),
        _.isNumber(h) && (this.controls.right.x = h),
        void (_.isNumber(i) && (this.controls.right.y = i))) : this
    }
    ;
    _.extend(c, {
        AppendCurveProperties: function(b) {
            b.controls = {
                left: new a.Vector(0,0),
                right: new a.Vector(0,0)
            }
        }
    });
    var d = {
        listen: function() {
            return _.isObject(this.controls) || c.AppendCurveProperties(this),
            this.controls.left.bind(a.Events.change, this._broadcast),
            this.controls.right.bind(a.Events.change, this._broadcast),
            this
        },
        ignore: function() {
            return this.controls.left.unbind(a.Events.change, this._broadcast),
            this.controls.right.unbind(a.Events.change, this._broadcast),
            this
        },
        clone: function() {
            var b = this.controls
              , b = new a.Anchor(this.x,this.y,b && b.left.x,b && b.left.y,b && b.right.x,b && b.right.y,this.command);
            return b.relative = this._relative,
            b
        },
        toObject: function() {
            var a = {
                x: this.x,
                y: this.y
            };
            return this._command && (a.command = this._command),
            this._relative && (a.relative = this._relative),
            this.controls && (a.controls = {
                left: this.controls.left.toObject(),
                right: this.controls.right.toObject()
            }),
            a
        }
    };
    Object.defineProperty(c.prototype, "command", {
        get: function() {
            return this._command
        },
        set: function(d) {
            return this._command = d,
            this._command === b.curve && !_.isObject(this.controls) && c.AppendCurveProperties(this),
            this.trigger(a.Events.change)
        }
    }),
    Object.defineProperty(c.prototype, "relative", {
        get: function() {
            return this._relative
        },
        set: function(b) {
            return this._relative == b ? this : (this._relative = !!b,
            this.trigger(a.Events.change))
        }
    }),
    _.extend(c.prototype, a.Vector.prototype, d),
    a.Anchor.prototype.bind = a.Anchor.prototype.on = function() {
        a.Vector.prototype.bind.apply(this, arguments),
        _.extend(this, d)
    }
    ,
    a.Anchor.prototype.unbind = a.Anchor.prototype.off = function() {
        a.Vector.prototype.unbind.apply(this, arguments),
        _.extend(this, d)
    }
}(Two),
function(a) {
    var b = Math.cos
      , c = Math.sin
      , d = Math.tan
      , e = a.Matrix = function(b, c, d, e, f, g) {
        this.elements = new a.Array(9);
        var h = b;
        _.isArray(h) || (h = _.toArray(arguments)),
        this.identity().set(h)
    }
    ;
    _.extend(e, {
        Identity: [1, 0, 0, 0, 1, 0, 0, 0, 1],
        Multiply: function(b, c, d) {
            if (3 >= c.length) {
                d = c[0] || 0;
                var e = c[1] || 0;
                return c = c[2] || 0,
                {
                    x: b[0] * d + b[1] * e + b[2] * c,
                    y: b[3] * d + b[4] * e + b[5] * c,
                    z: b[6] * d + b[7] * e + b[8] * c
                }
            }
            var e = b[0]
              , f = b[1]
              , g = b[2]
              , h = b[3]
              , i = b[4]
              , j = b[5]
              , k = b[6]
              , l = b[7];
            b = b[8];
            var m = c[0]
              , n = c[1]
              , o = c[2]
              , p = c[3]
              , q = c[4]
              , r = c[5]
              , s = c[6]
              , t = c[7];
            return c = c[8],
            d = d || new a.Array(9),
            d[0] = e * m + f * p + g * s,
            d[1] = e * n + f * q + g * t,
            d[2] = e * o + f * r + g * c,
            d[3] = h * m + i * p + j * s,
            d[4] = h * n + i * q + j * t,
            d[5] = h * o + i * r + j * c,
            d[6] = k * m + l * p + b * s,
            d[7] = k * n + l * q + b * t,
            d[8] = k * o + l * r + b * c,
            d
        }
    }),
    _.extend(e.prototype, Backbone.Events, {
        set: function(b) {
            var c = b;
            return _.isArray(c) || (c = _.toArray(arguments)),
            _.extend(this.elements, c),
            this.trigger(a.Events.change)
        },
        identity: function() {
            return this.set(e.Identity),
            this
        },
        multiply: function(b, c, d, e, f, g, h, i, j) {
            var k = arguments
              , l = k.length;
            if (1 >= l)
                return _.each(this.elements, function(a, c) {
                    this.elements[c] = a * b
                }, this),
                this.trigger(a.Events.change);
            if (3 >= l)
                return b = b || 0,
                c = c || 0,
                d = d || 0,
                f = this.elements,
                {
                    x: f[0] * b + f[1] * c + f[2] * d,
                    y: f[3] * b + f[4] * c + f[5] * d,
                    z: f[6] * b + f[7] * c + f[8] * d
                };
            var m = this.elements
              , n = k
              , k = m[0]
              , l = m[1]
              , o = m[2]
              , p = m[3]
              , q = m[4]
              , r = m[5]
              , s = m[6]
              , t = m[7]
              , m = m[8]
              , u = n[0]
              , v = n[1]
              , w = n[2]
              , x = n[3]
              , y = n[4]
              , z = n[5]
              , A = n[6]
              , B = n[7]
              , n = n[8];
            return this.elements[0] = k * u + l * x + o * A,
            this.elements[1] = k * v + l * y + o * B,
            this.elements[2] = k * w + l * z + o * n,
            this.elements[3] = p * u + q * x + r * A,
            this.elements[4] = p * v + q * y + r * B,
            this.elements[5] = p * w + q * z + r * n,
            this.elements[6] = s * u + t * x + m * A,
            this.elements[7] = s * v + t * y + m * B,
            this.elements[8] = s * w + t * z + m * n,
            this.trigger(a.Events.change)
        },
        inverse: function(b) {
            var c = this.elements;
            b = b || new a.Matrix;
            var d = c[0]
              , e = c[1]
              , f = c[2]
              , g = c[3]
              , h = c[4]
              , i = c[5]
              , j = c[6]
              , k = c[7]
              , c = c[8]
              , l = c * h - i * k
              , m = -c * g + i * j
              , n = k * g - h * j
              , o = d * l + e * m + f * n;
            return o ? (o = 1 / o,
            b.elements[0] = l * o,
            b.elements[1] = (-c * e + f * k) * o,
            b.elements[2] = (i * e - f * h) * o,
            b.elements[3] = m * o,
            b.elements[4] = (c * d - f * j) * o,
            b.elements[5] = (-i * d + f * g) * o,
            b.elements[6] = n * o,
            b.elements[7] = (-k * d + e * j) * o,
            b.elements[8] = (h * d - e * g) * o,
            b) : null 
        },
        scale: function(a, b) {
            return 1 >= arguments.length && (b = a),
            this.multiply(a, 0, 0, 0, b, 0, 0, 0, 1)
        },
        rotate: function(a) {
            var d = b(a);
            return a = c(a),
            this.multiply(d, -a, 0, a, d, 0, 0, 0, 1)
        },
        translate: function(a, b) {
            return this.multiply(1, 0, a, 0, 1, b, 0, 0, 1)
        },
        skewX: function(a) {
            return a = d(a),
            this.multiply(1, a, 0, 0, 1, 0, 0, 0, 1)
        },
        skewY: function(a) {
            return a = d(a),
            this.multiply(1, 0, 0, a, 1, 0, 0, 0, 1)
        },
        toString: function(a) {
            var b = [];
            return this.toArray(a, b),
            b.join(" ")
        },
        toArray: function(a, b) {
            var c = this.elements
              , d = !!b
              , e = parseFloat(c[0].toFixed(3))
              , f = parseFloat(c[1].toFixed(3))
              , g = parseFloat(c[2].toFixed(3))
              , h = parseFloat(c[3].toFixed(3))
              , i = parseFloat(c[4].toFixed(3))
              , j = parseFloat(c[5].toFixed(3));
            if (a) {
                var k = parseFloat(c[6].toFixed(3))
                  , l = parseFloat(c[7].toFixed(3))
                  , c = parseFloat(c[8].toFixed(3));
                return d ? (b[0] = e,
                b[1] = h,
                b[2] = k,
                b[3] = f,
                b[4] = i,
                b[5] = l,
                b[6] = g,
                b[7] = j,
                void (b[8] = c)) : [e, h, k, f, i, l, g, j, c]
            }
            return d ? (b[0] = e,
            b[1] = h,
            b[2] = f,
            b[3] = i,
            b[4] = g,
            b[5] = j,
            void 0) : [e, h, f, i, g, j]
        },
        clone: function() {
            return new a.Matrix(this.elements[0],this.elements[1],this.elements[2],this.elements[3],this.elements[4],this.elements[5],this.elements[6],this.elements[7],this.elements[8])
        }
    })
}(Two),
function(a) {
    var b = a.Utils.mod
      , c = a.Utils.toFixed
      , d = {
        version: 1.1,
        ns: "http://www.w3.org/2000/svg",
        xlink: "http://www.w3.org/1999/xlink",
        createElement: function(a, b) {
            var c = document.createElementNS(this.ns, a);
            return "svg" === a && (b = _.defaults(b || {}, {
                version: this.version
            })),
            _.isObject(b) && d.setAttributes(c, b),
            c
        },
        setAttributes: function(a, b) {
            for (var c in b)
                a.setAttribute(c, b[c]);
            return this
        },
        removeAttributes: function(a, b) {
            for (var c in b)
                a.removeAttribute(c);
            return this
        },
        toString: function(d, e) {
            for (var f, g = d.length, h = g - 1, i = "", j = 0; g > j; j++) {
                var k, l = d[j], m = e ? b(j - 1, g) : Math.max(j - 1, 0), n = e ? b(j + 1, g) : Math.min(j + 1, h);
                k = d[m];
                var o, p, q, r = d[n], m = c(l._x), r = c(l._y);
                switch (l._command) {
                case a.Commands.close:
                    k = a.Commands.close;
                    break;
                case a.Commands.curve:
                    o = k.controls && k.controls.right || k,
                    q = l.controls && l.controls.left || l,
                    k._relative ? (n = c(o.x + k.x),
                    o = c(o.y + k.y)) : (n = c(o.x),
                    o = c(o.y)),
                    l._relative ? (p = c(q.x + l.x),
                    q = c(q.y + l.y)) : (p = c(q.x),
                    q = c(q.y)),
                    k = (0 === j ? a.Commands.move : a.Commands.curve) + " " + n + " " + o + " " + p + " " + q + " " + m + " " + r;
                    break;
                case a.Commands.move:
                    f = l,
                    k = a.Commands.move + " " + m + " " + r;
                    break;
                default:
                    k = l._command + " " + m + " " + r
                }
                j >= h && e && (l._command === a.Commands.curve && (r = f,
                o = l.controls && l.controls.right || l,
                m = r.controls && r.controls.left || r,
                l._relative ? (n = c(o.x + l.x),
                o = c(o.y + l.y)) : (n = c(o.x),
                o = c(o.y)),
                r._relative ? (p = c(m.x + r.x),
                q = c(m.y + r.y)) : (p = c(m.x),
                q = c(m.y)),
                m = c(r.x),
                r = c(r.y),
                k += " C " + n + " " + o + " " + p + " " + q + " " + m + " " + r),
                k += " Z"),
                i += k + " "
            }
            return i
        },
        getClip: function(a) {
            if (clip = a._renderer.clip,
            !clip) {
                for (root = a; root.parent; )
                    root = root.parent;
                clip = a._renderer.clip = d.createElement("clipPath"),
                root.defs.appendChild(clip)
            }
            return clip
        },
        group: {
            appendChild: function(a) {
                if (a = this.domElement.querySelector("#" + a)) {
                    var b = a.nodeName;
                    b && (b = b.replace(/svg\:/gi, "").toLowerCase(),
                    /clippath/.test(b) || this.elem.appendChild(a))
                }
            },
            removeChild: function(a) {
                if (a = this.domElement.querySelector("#" + a)) {
                    var b = a.nodeName;
                    b && (b = b.replace(/svg\:/gi, "").toLowerCase(),
                    /clippath/.test(b) || this.elem.removeChild(a))
                }
            },
            renderChild: function(a) {
                d[a._renderer.type].render.call(a, this)
            },
            render: function(a) {
                if (this._update(),
                0 === this._opacity && !this._flagOpacity)
                    return this;
                this._renderer.elem || (this._renderer.elem = d.createElement("g", {
                    id: this.id
                }),
                a.appendChild(this._renderer.elem));
                var b = {
                    domElement: a,
                    elem: this._renderer.elem
                };
                (this._matrix.manual || this._flagMatrix) && this._renderer.elem.setAttribute("transform", "matrix(" + this._matrix.toString() + ")");
                for (var c in this.children) {
                    var e = this.children[c];
                    d[e._renderer.type].render.call(e, a)
                }
                return this._flagOpacity && this._renderer.elem.setAttribute("opacity", this._opacity),
                this._flagAdditions && _.each(this.additions, d.group.appendChild, b),
                this._flagSubtractions && _.each(this.subtractions, d.group.removeChild, b),
                this._flagMask && (this._mask ? this._renderer.elem.setAttribute("clip-path", "url(#" + this._mask.id + ")") : this._renderer.elem.removeAttribute("clip-path")),
                this.flagReset()
            }
        },
        polygon: {
            render: function(a) {
                if (this._update(),
                0 === this._opacity && !this._flagOpacity)
                    return this;
                var b = {};
                if ((this._matrix.manual || this._flagMatrix) && (b.transform = "matrix(" + this._matrix.toString() + ")"),
                this._flagVertices) {
                    var c = d.toString(this._vertices, this._closed);
                    b.d = c
                }
                return this._flagFill && (b.fill = this._fill),
                this._flagStroke && (b.stroke = this._stroke),
                this._flagLinewidth && (b["stroke-width"] = this._linewidth),
                this._flagOpacity && (b["stroke-opacity"] = this._opacity,
                b["fill-opacity"] = this._opacity),
                this._flagVisible && (b.visibility = this._visible ? "visible" : "hidden"),
                this._flagCap && (b["stroke-linecap"] = this._cap),
                this._flagJoin && (b["stroke-linejoin"] = this._join),
                this._flagMiter && (b["stroke-miterlimit"] = this.miter),
                this._renderer.elem ? d.setAttributes(this._renderer.elem, b) : (b.id = this.id,
                this._renderer.elem = d.createElement("path", b),
                a.appendChild(this._renderer.elem)),
                this._flagClip && (clip = d.getClip(this),
                elem = this._renderer.elem,
                this._clip ? (elem.removeAttribute("id"),
                clip.setAttribute("id", this.id),
                clip.appendChild(elem)) : (clip.removeAttribute("id"),
                elem.setAttribute("id", this.id),
                this.parent._renderer.elem.appendChild(elem))),
                this.flagReset()
            }
        }
    }
      , e = a[a.Types.svg] = function(b) {
        this.domElement = b.domElement || d.createElement("svg"),
        this.scene = new a.Group,
        this.scene.parent = this,
        this.defs = d.createElement("defs"),
        this.domElement.appendChild(this.defs)
    }
    ;
    _.extend(e, {
        Utils: d
    }),
    _.extend(e.prototype, Backbone.Events, {
        setSize: function(a, b) {
            return this.width = a,
            this.height = b,
            d.setAttributes(this.domElement, {
                width: a,
                height: b
            }),
            this
        },
        render: function() {
            return d.group.render.call(this.scene, this.domElement),
            this
        }
    })
}(Two),
function(a) {
    var b = a.Utils.mod
      , c = a.Utils.toFixed
      , d = a.Utils.getRatio
      , e = {
        group: {
            renderChild: function(a) {
                e[a._renderer.type].render.call(a, this.ctx, !0, this.clip)
            },
            render: function(a) {
                this._update();
                var b = this._matrix.elements
                  , c = this.parent;
                return this._renderer.opacity = this._opacity * (c && c._renderer ? c._renderer.opacity : 1),
                c = this._mask,
                this._renderer.context || (this._renderer.context = {}),
                this._renderer.context.ctx = a,
                a.save(),
                a.transform(b[0], b[3], b[1], b[4], b[2], b[5]),
                c && e[c._renderer.type].render.call(c, a, !0),
                _.each(this.children, e.group.renderChild, this._renderer.context),
                a.restore(),
                this.flagReset()
            }
        },
        polygon: {
            render: function(d, e, f) {
                var g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I;
                return this._update(),
                g = this._matrix.elements,
                h = this._stroke,
                i = this._linewidth,
                j = this._fill,
                k = this._opacity * this.parent._renderer.opacity,
                l = this._visible,
                m = this._cap,
                n = this._join,
                o = this._miter,
                p = this._closed,
                q = this._vertices,
                r = q.length,
                s = r - 1,
                I = this._clip,
                e || l && !I ? (d.save(),
                g && d.transform(g[0], g[3], g[1], g[4], g[2], g[5]),
                j && (d.fillStyle = j),
                h && (d.strokeStyle = h),
                i && (d.lineWidth = i),
                o && (d.miterLimit = o),
                n && (d.lineJoin = n),
                m && (d.lineCap = m),
                _.isNumber(k) && (d.globalAlpha = k),
                d.beginPath(),
                q.forEach(function(e, f) {
                    switch (G = c(e.x),
                    H = c(e.y),
                    e._command) {
                    case a.Commands.close:
                        d.closePath();
                        break;
                    case a.Commands.curve:
                        u = p ? b(f - 1, r) : Math.max(f - 1, 0),
                        t = p ? b(f + 1, r) : Math.min(f + 1, s),
                        v = q[u],
                        w = q[t],
                        C = v.controls && v.controls.right || v,
                        D = e.controls && e.controls.left || e,
                        v._relative ? (A = C.x + c(v.x),
                        B = C.y + c(v.y)) : (A = c(C.x),
                        B = c(C.y)),
                        e._relative ? (y = D.x + c(e.x),
                        z = D.y + c(e.y)) : (y = c(D.x),
                        z = c(D.y)),
                        d.bezierCurveTo(A, B, y, z, G, H),
                        f >= s && p && (w = x,
                        E = e.controls && e.controls.right || e,
                        F = w.controls && w.controls.left || w,
                        e._relative ? (A = E.x + c(e.x),
                        B = E.y + c(e.y)) : (A = c(E.x),
                        B = c(E.y)),
                        w._relative ? (y = F.x + c(w.x),
                        z = F.y + c(w.y)) : (y = c(F.x),
                        z = c(F.y)),
                        G = c(w.x),
                        H = c(w.y),
                        d.bezierCurveTo(A, B, y, z, G, H));
                        break;
                    case a.Commands.line:
                        d.lineTo(G, H);
                        break;
                    case a.Commands.move:
                        x = e,
                        d.moveTo(G, H)
                    }
                }),
                p && d.closePath(),
                !I && !f && (d.fill(),
                d.stroke()),
                d.restore(),
                I && !f && d.clip(),
                this.flagReset()) : this
            }
        }
    }
      , f = a[a.Types.canvas] = function(b) {
        this.domElement = b.domElement || document.createElement("canvas"),
        this.ctx = this.domElement.getContext("2d"),
        this.overdraw = b.overdraw || !1,
        this.scene = new a.Group,
        this.scene.parent = this
    }
    ;
    _.extend(f, {
        Utils: e
    }),
    _.extend(f.prototype, Backbone.Events, {
        setSize: function(a, b, c) {
            return this.width = a,
            this.height = b,
            this.ratio = _.isUndefined(c) ? d(this.ctx) : c,
            this.domElement.width = a * this.ratio,
            this.domElement.height = b * this.ratio,
            _.extend(this.domElement.style, {
                width: a + "px",
                height: b + "px"
            }),
            this
        },
        render: function() {
            var a = 1 === this.ratio;
            return a || (this.ctx.save(),
            this.ctx.scale(this.ratio, this.ratio)),
            this.overdraw || this.ctx.clearRect(0, 0, this.width, this.height),
            e.group.render.call(this.scene, this.ctx),
            a || this.ctx.restore(),
            this
        }
    })
}(Two),
function(a) {
    var b = a.Matrix.Multiply
      , c = a.Utils.mod
      , d = [1, 0, 0, 0, 1, 0, 0, 0, 1]
      , e = new a.Array(9)
      , f = a.Utils.getRatio
      , g = a.Utils.toFixed
      , h = {
        canvas: document.createElement("canvas"),
        uv: new a.Array([0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1]),
        group: {
            renderChild: function(a) {
                h[a._renderer.type].render.call(a, this.gl, this.program)
            },
            render: function(c, d) {
                this._update();
                var f = this.parent
                  , g = f._matrix && f._matrix.manual || f._flagMatrix
                  , i = this._matrix.manual || this._flagMatrix;
                return (g || i) && (this._renderer.matrix || (this._renderer.matrix = new a.Array(9)),
                this._matrix.toArray(!0, e),
                b(e, f._renderer.matrix, this._renderer.matrix),
                this._renderer.scale = this._scale * f._renderer.scale,
                g && (this._flagMatrix = !0)),
                this._mask && (c.enable(c.STENCIL_TEST),
                c.stencilFunc(c.ALWAYS, 1, 1),
                c.colorMask(!1, !1, !1, !0),
                c.stencilOp(c.KEEP, c.KEEP, c.INCR),
                h[this._mask._renderer.type].render.call(this._mask, c, d, this),
                c.colorMask(!0, !0, !0, !0),
                c.stencilFunc(c.NOTEQUAL, 0, 1),
                c.stencilOp(c.KEEP, c.KEEP, c.KEEP)),
                this._flagOpacity = f._flagOpacity || this._flagOpacity,
                this._renderer.opacity = this._opacity * (f && f._renderer ? f._renderer.opacity : 1),
                _.each(this.children, h.group.renderChild, {
                    gl: c,
                    program: d
                }),
                this._mask && (c.colorMask(!1, !1, !1, !1),
                c.stencilOp(c.KEEP, c.KEEP, c.DECR),
                h[this._mask._renderer.type].render.call(this._mask, c, d, this),
                c.colorMask(!0, !0, !0, !0),
                c.stencilFunc(c.NOTEQUAL, 0, 1),
                c.stencilOp(c.KEEP, c.KEEP, c.KEEP),
                c.disable(c.STENCIL_TEST)),
                this.flagReset()
            }
        },
        polygon: {
            render: function(c, d, f) {
                if (!this._visible || !this._opacity)
                    return this;
                var g = this.parent
                  , i = g._matrix.manual || g._flagMatrix
                  , j = this._matrix.manual || this._flagMatrix
                  , k = this._flagVertices || this._flagFill || this._flagStroke || this._flagLinewidth || this._flagOpacity || g._flagOpacity || this._flagVisible || this._flagCap || this._flagJoin || this._flagMiter || this._flagScale;
                return this._update(),
                (i || j) && (this._renderer.matrix || (this._renderer.matrix = new a.Array(9)),
                this._matrix.toArray(!0, e),
                b(e, g._renderer.matrix, this._renderer.matrix),
                this._renderer.scale = this._scale * g._renderer.scale),
                k && (this._renderer.rect || (this._renderer.rect = {}),
                this._renderer.triangles || (this._renderer.triangles = new a.Array(12)),
                this._renderer.opacity = this._opacity * g._renderer.opacity,
                h.getBoundingClientRect(this._vertices, this._linewidth, this._renderer.rect),
                h.getTriangles(this._renderer.rect, this._renderer.triangles),
                h.updateBuffer(c, this, d),
                h.updateTexture(c, this)),
                !this._clip || f ? (c.bindBuffer(c.ARRAY_BUFFER, this._renderer.textureCoordsBuffer),
                c.vertexAttribPointer(d.textureCoords, 2, c.FLOAT, !1, 0, 0),
                c.bindTexture(c.TEXTURE_2D, this._renderer.texture),
                c.uniformMatrix3fv(d.matrix, !1, this._renderer.matrix),
                c.bindBuffer(c.ARRAY_BUFFER, this._renderer.buffer),
                c.vertexAttribPointer(d.position, 2, c.FLOAT, !1, 0, 0),
                c.drawArrays(c.TRIANGLES, 0, 6),
                this.flagReset()) : void 0
            }
        },
        getBoundingClientRect: function(a, b, c) {
            var d = 1 / 0
              , e = -(1 / 0)
              , f = 1 / 0
              , g = -(1 / 0);
            a.forEach(function(a) {
                var b, c, h = a.x, i = a.y, j = a.controls;
                f = Math.min(i, f),
                d = Math.min(h, d),
                e = Math.max(h, e),
                g = Math.max(i, g),
                a.controls && (b = j.left,
                c = j.right,
                b && c && (j = a._relative ? b.x + h : b.x,
                b = a._relative ? b.y + i : b.y,
                h = a._relative ? c.x + h : c.x,
                a = a._relative ? c.y + i : c.y,
                j && b && h && a && (f = Math.min(b, a, f),
                d = Math.min(j, h, d),
                e = Math.max(j, h, e),
                g = Math.max(b, a, g))))
            }),
            _.isNumber(b) && (f -= b,
            d -= b,
            e += b,
            g += b),
            c.top = f,
            c.left = d,
            c.right = e,
            c.bottom = g,
            c.width = e - d,
            c.height = g - f,
            c.centroid || (c.centroid = {}),
            c.centroid.x = -d,
            c.centroid.y = -f
        },
        getTriangles: function(a, b) {
            var c = a.top
              , d = a.left
              , e = a.right
              , f = a.bottom;
            b[0] = d,
            b[1] = c,
            b[2] = e,
            b[3] = c,
            b[4] = d,
            b[5] = f,
            b[6] = d,
            b[7] = f,
            b[8] = e,
            b[9] = c,
            b[10] = e,
            b[11] = f
        },
        updateCanvas: function(b) {
            var d = b._vertices
              , e = this.canvas
              , f = this.ctx
              , h = b._renderer.scale
              , i = b._stroke
              , j = b._linewidth * h
              , k = b._fill
              , l = b._renderer.opacity || b._opacity
              , m = b._cap
              , n = b._join
              , o = b._miter
              , p = b._closed
              , q = d.length
              , r = q - 1;
            e.width = Math.max(Math.ceil(b._renderer.rect.width * h), 1),
            e.height = Math.max(Math.ceil(b._renderer.rect.height * h), 1),
            b = b._renderer.rect.centroid;
            var s = b.x * h
              , t = b.y * h;
            f.clearRect(0, 0, e.width, e.height),
            k && (f.fillStyle = k),
            i && (f.strokeStyle = i),
            j && (f.lineWidth = j),
            o && (f.miterLimit = o),
            n && (f.lineJoin = n),
            m && (f.lineCap = m),
            _.isNumber(l) && (f.globalAlpha = l);
            var u;
            f.beginPath(),
            d.forEach(function(b, e) {
                var i, j, k, l, m, n;
                switch (n = g(b.x * h + s),
                k = g(b.y * h + t),
                b._command) {
                case a.Commands.close:
                    f.closePath();
                    break;
                case a.Commands.curve:
                    i = p ? c(e - 1, q) : Math.max(e - 1, 0),
                    p ? c(e + 1, q) : Math.min(e + 1, r),
                    j = d[i],
                    m = j.controls && j.controls.right || j,
                    l = b.controls && b.controls.left || b,
                    j._relative ? (i = g((m.x + j.x) * h + s),
                    m = g((m.y + j.y) * h + t)) : (i = g(m.x * h + s),
                    m = g(m.y * h + t)),
                    b._relative ? (j = g((l.x + b.x) * h + s),
                    l = g((l.y + b.y) * h + t)) : (j = g(l.x * h + s),
                    l = g(l.y * h + t)),
                    f.bezierCurveTo(i, m, j, l, n, k),
                    e >= r && p && (k = u,
                    j = b.controls && b.controls.right || b,
                    n = k.controls && k.controls.left || k,
                    b._relative ? (i = g((j.x + b.x) * h + s),
                    m = g((j.y + b.y) * h + t)) : (i = g(j.x * h + s),
                    m = g(j.y * h + t)),
                    k._relative ? (j = g((n.x + k.x) * h + s),
                    l = g((n.y + k.y) * h + t)) : (j = g(n.x * h + s),
                    l = g(n.y * h + t)),
                    n = g(k.x * h + s),
                    k = g(k.y * h + t),
                    f.bezierCurveTo(i, m, j, l, n, k));
                    break;
                case a.Commands.line:
                    f.lineTo(n, k);
                    break;
                case a.Commands.move:
                    u = b,
                    f.moveTo(n, k)
                }
            }),
            p && f.closePath(),
            f.fill(),
            f.stroke()
        },
        updateTexture: function(a, b) {
            this.updateCanvas(b),
            b._renderer.texture && a.deleteTexture(b._renderer.texture),
            a.bindBuffer(a.ARRAY_BUFFER, b._renderer.textureCoordsBuffer),
            b._renderer.texture = a.createTexture(),
            a.bindTexture(a.TEXTURE_2D, b._renderer.texture),
            a.texParameteri(a.TEXTURE_2D, a.TEXTURE_WRAP_S, a.CLAMP_TO_EDGE),
            a.texParameteri(a.TEXTURE_2D, a.TEXTURE_WRAP_T, a.CLAMP_TO_EDGE),
            a.texParameteri(a.TEXTURE_2D, a.TEXTURE_MIN_FILTER, a.LINEAR),
            0 >= this.canvas.width || 0 >= this.canvas.height || a.texImage2D(a.TEXTURE_2D, 0, a.RGBA, a.RGBA, a.UNSIGNED_BYTE, this.canvas)
        },
        updateBuffer: function(a, b, c) {
            _.isObject(b._renderer.buffer) && a.deleteBuffer(b._renderer.buffer),
            b._renderer.buffer = a.createBuffer(),
            a.bindBuffer(a.ARRAY_BUFFER, b._renderer.buffer),
            a.enableVertexAttribArray(c.position),
            a.bufferData(a.ARRAY_BUFFER, b._renderer.triangles, a.STATIC_DRAW),
            _.isObject(b._renderer.textureCoordsBuffer) && a.deleteBuffer(b._renderer.textureCoordsBuffer),
            b._renderer.textureCoordsBuffer = a.createBuffer(),
            a.bindBuffer(a.ARRAY_BUFFER, b._renderer.textureCoordsBuffer),
            a.enableVertexAttribArray(c.textureCoords),
            a.bufferData(a.ARRAY_BUFFER, this.uv, a.STATIC_DRAW)
        },
        program: {
            create: function(b, c) {
                var d, e;
                if (d = b.createProgram(),
                _.each(c, function(a) {
                    b.attachShader(d, a)
                }),
                b.linkProgram(d),
                !b.getProgramParameter(d, b.LINK_STATUS))
                    throw e = b.getProgramInfoLog(d),
                    b.deleteProgram(d),
                    new a.Utils.Error("unable to link program: " + e);
                return d
            }
        },
        shaders: {
            create: function(b, c, d) {
                if (d = b.createShader(b[d]),
                b.shaderSource(d, c),
                b.compileShader(d),
                !b.getShaderParameter(d, b.COMPILE_STATUS))
                    throw c = b.getShaderInfoLog(d),
                    b.deleteShader(d),
                    new a.Utils.Error("unable to compile shader " + d + ": " + c);
                return d
            },
            types: {
                vertex: "VERTEX_SHADER",
                fragment: "FRAGMENT_SHADER"
            },
            vertex: "attribute vec2 a_position;\nattribute vec2 a_textureCoords;\n\nuniform mat3 u_matrix;\nuniform vec2 u_resolution;\n\nvarying vec2 v_textureCoords;\n\nvoid main() {\n   vec2 projected = (u_matrix * vec3(a_position, 1.0)).xy;\n   vec2 normal = projected / u_resolution;\n   vec2 clipspace = (normal * 2.0) - 1.0;\n\n   gl_Position = vec4(clipspace * vec2(1.0, -1.0), 0.0, 1.0);\n   v_textureCoords = a_textureCoords;\n}",
            fragment: "precision mediump float;\n\nuniform sampler2D u_image;\nvarying vec2 v_textureCoords;\n\nvoid main() {\n  gl_FragColor = texture2D(u_image, v_textureCoords);\n}"
        }
    };
    h.ctx = h.canvas.getContext("2d");
    var i = a[a.Types.webgl] = function(b) {
        var c, e;
        if (this.domElement = b.domElement || document.createElement("canvas"),
        this.scene = new a.Group,
        this.scene.parent = this,
        this._renderer = {
            matrix: new a.Array(d),
            scale: 1,
            opacity: 1
        },
        this._flagMatrix = !0,
        b = _.defaults(b || {}, {
            antialias: !1,
            alpha: !0,
            premultipliedAlpha: !0,
            stencil: !0,
            preserveDrawingBuffer: !0,
            overdraw: !1
        }),
        this.overdraw = b.overdraw,
        b = this.ctx = this.domElement.getContext("webgl", b) || this.domElement.getContext("experimental-webgl", b),
        !this.ctx)
            throw new a.Utils.Error("unable to create a webgl context. Try using another renderer.");
        c = h.shaders.create(b, h.shaders.vertex, h.shaders.types.vertex),
        e = h.shaders.create(b, h.shaders.fragment, h.shaders.types.fragment),
        this.program = h.program.create(b, [c, e]),
        b.useProgram(this.program),
        this.program.position = b.getAttribLocation(this.program, "a_position"),
        this.program.matrix = b.getUniformLocation(this.program, "u_matrix"),
        this.program.textureCoords = b.getAttribLocation(this.program, "a_textureCoords"),
        b.disable(b.DEPTH_TEST),
        b.enable(b.BLEND),
        b.blendEquationSeparate(b.FUNC_ADD, b.FUNC_ADD),
        b.blendFuncSeparate(b.SRC_ALPHA, b.ONE_MINUS_SRC_ALPHA, b.ONE, b.ONE_MINUS_SRC_ALPHA)
    }
    ;
    _.extend(i.prototype, Backbone.Events, {
        setSize: function(a, b, c) {
            return this.width = a,
            this.height = b,
            this.ratio = _.isUndefined(c) ? f(this.ctx) : c,
            this.domElement.width = a * this.ratio,
            this.domElement.height = b * this.ratio,
            _.extend(this.domElement.style, {
                width: a + "px",
                height: b + "px"
            }),
            a *= this.ratio,
            b *= this.ratio,
            this._renderer.matrix[0] = this._renderer.matrix[4] = this._renderer.scale = this.ratio,
            this._flagMatrix = !0,
            this.ctx.viewport(0, 0, a, b),
            c = this.ctx.getUniformLocation(this.program, "u_resolution"),
            this.ctx.uniform2f(c, a, b),
            this
        },
        render: function() {
            var a = this.ctx;
            return this.overdraw || a.clear(a.COLOR_BUFFER_BIT | a.DEPTH_BUFFER_BIT),
            h.group.render.call(this.scene, a, this.program),
            this._flagMatrix = !1,
            this
        }
    })
}(Two),
function(a) {
    var b = a.Shape = function() {
        this._renderer = {},
        this.id = a.Identifier + a.uniqueId(),
        this.classList = [],
        this._matrix = new a.Matrix,
        this.translation = new a.Vector,
        this.translation.bind(a.Events.change, _.bind(b.FlagMatrix, this)),
        this.rotation = 0,
        this.scale = 1
    }
    ;
    _.extend(b, Backbone.Events, {
        FlagMatrix: function() {
            this._flagMatrix = !0
        },
        MakeObservable: function(a) {
            Object.defineProperty(a, "rotation", {
                get: function() {
                    return this._rotation
                },
                set: function(a) {
                    this._rotation = a,
                    this._flagMatrix = !0
                }
            }),
            Object.defineProperty(a, "scale", {
                get: function() {
                    return this._scale
                },
                set: function(a) {
                    this._scale = a,
                    this._flagScale = this._flagMatrix = !0
                }
            })
        }
    }),
    _.extend(b.prototype, {
        _flagMatrix: !0,
        _rotation: 0,
        _scale: 1,
        addTo: function(a) {
            return a.add(this),
            this
        },
        clone: function() {
            var a = new b;
            return a.translation.copy(this.translation),
            a.rotation = this.rotation,
            a.scale = this.scale,
            _.each(b.Properties, function(b) {
                a[b] = this[b]
            }, this),
            a._update()
        },
        replaceParent: function(a) {
            var b, c = this.id;
            return this.parent && (delete this.parent.children[c],
            b = _.indexOf(parent.additions, c),
            b >= 0 && this.parent.additions.splice(b, 1),
            this.parent.subtractions.push(c),
            this._flagSubtractions = !0),
            a ? (a.children[c] = this,
            this.parent = a,
            a.additions.push(c),
            a._flagAdditions = !0) : delete this.parent,
            this
        },
        _update: function(a) {
            return !this._matrix.manual && this._flagMatrix && this._matrix.identity().translate(this.translation.x, this.translation.y).scale(this.scale).rotate(this.rotation),
            a && this.parent && this.parent._update && this.parent._update(),
            this
        },
        flagReset: function() {
            return this._flagMatrix = this._flagScale = !1,
            this
        }
    }),
    b.MakeObservable(b.prototype)
}(Two),
function(a) {
    function b(b, c, d) {
        var e, f, g, h, i, j, k, l, m = c.controls && c.controls.right, n = b.controls && b.controls.left;
        return e = c.x,
        i = c.y,
        f = (m || c).x,
        j = (m || c).y,
        g = (n || b).x,
        k = (n || b).y,
        h = b.x,
        l = b.y,
        m && c._relative && (f += c.x,
        j += c.y),
        n && b._relative && (g += b.x,
        k += b.y),
        a.Utils.getCurveLength(e, i, f, j, g, k, h, l, d)
    }
    function c(b, c, d) {
        var e, f, g, h, i, j, k, l, m = c.controls && c.controls.right, n = b.controls && b.controls.left;
        return e = c.x,
        i = c.y,
        f = (m || c).x,
        j = (m || c).y,
        g = (n || b).x,
        k = (n || b).y,
        h = b.x,
        l = b.y,
        m && c._relative && (f += c.x,
        j += c.y),
        n && b._relative && (g += b.x,
        k += b.y),
        a.Utils.subdivide(e, i, f, j, g, k, h, l, d)
    }
    var d = Math.min
      , e = Math.max
      , f = Math.round
      , g = a.Utils.getComputedMatrix;
    _.each(a.Commands, function() {});
    var h = a.Polygon = function(b, c, d, e) {
        a.Shape.call(this),
        this._renderer.type = "polygon",
        this._closed = !!c,
        this._curved = !!d,
        this.beginning = 0,
        this.ending = 1,
        this.fill = "#fff",
        this.stroke = "#000",
        this.opacity = this.linewidth = 1,
        this.visible = !0,
        this.cap = "butt",
        this.join = "miter",
        this.miter = 4,
        this._vertices = [],
        this.vertices = b,
        this.automatic = !e
    }
    ;
    _.extend(h, {
        Properties: "fill stroke linewidth opacity visible cap join miter closed curved automatic beginning ending".split(" "),
        FlagVertices: function() {
            this._flagLength = this._flagVertices = !0
        },
        MakeObservable: function(b) {
            a.Shape.MakeObservable(b),
            _.each(h.Properties.slice(0, 8), function(a) {
                var c = "_" + a
                  , d = "_flag" + a.charAt(0).toUpperCase() + a.slice(1);
                Object.defineProperty(b, a, {
                    get: function() {
                        return this[c]
                    },
                    set: function(a) {
                        this[c] = a,
                        this[d] = !0
                    }
                })
            }),
            Object.defineProperty(b, "length", {
                get: function() {
                    return this._flagLength && this._updateLength(),
                    this._length
                }
            }),
            Object.defineProperty(b, "closed", {
                get: function() {
                    return this._closed
                },
                set: function(a) {
                    this._closed = !!a,
                    this._flagVertices = !0
                }
            }),
            Object.defineProperty(b, "curved", {
                get: function() {
                    return this._curved
                },
                set: function(a) {
                    this._curved = !!a,
                    this._flagVertices = !0
                }
            }),
            Object.defineProperty(b, "automatic", {
                get: function() {
                    return this._automatic
                },
                set: function(a) {
                    if (a !== this._automatic) {
                        var b = (this._automatic = !!a) ? "ignore" : "listen";
                        _.each(this.vertices, function(a) {
                            a[b]()
                        })
                    }
                }
            }),
            Object.defineProperty(b, "beginning", {
                get: function() {
                    return this._beginning
                },
                set: function(a) {
                    this._beginning = d(e(a, 0), this._ending),
                    this._flagVertices = !0
                }
            }),
            Object.defineProperty(b, "ending", {
                get: function() {
                    return this._ending
                },
                set: function(a) {
                    this._ending = d(e(a, this._beginning), 1),
                    this._flagVertices = !0
                }
            }),
            Object.defineProperty(b, "vertices", {
                get: function() {
                    return this._collection
                },
                set: function(b) {
                    var c = _.bind(h.FlagVertices, this)
                      , d = _.bind(function(b) {
                        for (var d = b.length; d--; )
                            b[d].bind(a.Events.change, c);
                        c()
                    }, this)
                      , e = _.bind(function(b) {
                        _.each(b, function(b) {
                            b.unbind(a.Events.change, c)
                        }, this),
                        c()
                    }, this);
                    this._collection && this._collection.unbind(),
                    this._collection = new a.Utils.Collection(b.slice(0)),
                    this._collection.bind(a.Events.insert, d),
                    this._collection.bind(a.Events.remove, e),
                    d(this._collection)
                }
            }),
            Object.defineProperty(b, "clip", {
                get: function() {
                    return this._clip
                },
                set: function(a) {
                    this._clip = a,
                    this._flagClip = !0
                }
            })
        }
    }),
    _.extend(h.prototype, a.Shape.prototype, {
        _flagVertices: !0,
        _flagLength: !0,
        _flagFill: !0,
        _flagStroke: !0,
        _flagLinewidth: !0,
        _flagOpacity: !0,
        _flagVisible: !0,
        _flagCap: !0,
        _flagJoin: !0,
        _flagMiter: !0,
        _flagClip: !1,
        _length: 0,
        _fill: "#fff",
        _stroke: "#000",
        _linewidth: 1,
        _opacity: 1,
        _visible: !0,
        _cap: "round",
        _join: "round",
        _miter: 4,
        _closed: !0,
        _curved: !1,
        _automatic: !0,
        _beginning: 0,
        _ending: 1,
        _clip: !1,
        clone: function(b) {
            b = b || this.parent;
            var c = _.map(this.vertices, function(a) {
                return a.clone()
            })
              , d = new h(c,this.closed,this.curved,!this.automatic);
            return _.each(a.Shape.Properties, function(a) {
                d[a] = this[a]
            }, this),
            d.translation.copy(this.translation),
            d.rotation = this.rotation,
            d.scale = this.scale,
            b.add(d),
            d
        },
        toObject: function() {
            var b = {
                vertices: _.map(this.vertices, function(a) {
                    return a.toObject()
                })
            };
            return _.each(a.Shape.Properties, function(a) {
                b[a] = this[a]
            }, this),
            b.translation = this.translation.toObject,
            b.rotation = this.rotation,
            b.scale = this.scale,
            b
        },
        noFill: function() {
            return this.fill = "transparent",
            this
        },
        noStroke: function() {
            return this.stroke = "transparent",
            this
        },
        corner: function() {
            var a = this.getBoundingClientRect(!0);
            return a.centroid = {
                x: a.left + a.width / 2,
                y: a.top + a.height / 2
            },
            _.each(this.vertices, function(b) {
                b.addSelf(a.centroid)
            }),
            this
        },
        center: function() {
            var a = this.getBoundingClientRect(!0);
            return a.centroid = {
                x: a.left + a.width / 2,
                y: a.top + a.height / 2
            },
            _.each(this.vertices, function(b) {
                b.subSelf(a.centroid)
            }),
            this
        },
        remove: function() {
            return this.parent ? (this.parent.remove(this),
            this) : this
        },
        getBoundingClientRect: function(a) {
            this._update(!0);
            var b, c, f = a ? this._matrix : g(this), h = this.linewidth / 2, i = 1 / 0, j = -(1 / 0), k = 1 / 0, l = -(1 / 0);
            return _.each(this._vertices, function(a) {
                b = a.x,
                c = a.y,
                a = f.multiply(b, c, 1),
                k = d(a.y - h, k),
                i = d(a.x - h, i),
                j = e(a.x + h, j),
                l = e(a.y + h, l)
            }),
            {
                top: k,
                left: i,
                right: j,
                bottom: l,
                width: j - i,
                height: l - k
            }
        },
        getPointAt: function(b, c) {
            var d, e, f, g, h, i, j, k, l, m, n, o;
            for (j = this.length * Math.min(Math.max(b, 0), 1),
            k = this.vertices.length,
            l = k - 1,
            i = d = null ,
            m = 0,
            e = this._lengths.length,
            f = 0; e > m; m++) {
                if (f + this._lengths[m] > j) {
                    d = this.vertices[this.closed ? a.Utils.mod(m, k) : m],
                    i = this.vertices[Math.min(Math.max(m - 1, 0), l)],
                    j -= f,
                    b = j / this._lengths[m];
                    break
                }
                f += this._lengths[m]
            }
            return _.isNull(d) || _.isNull(i) ? null  : (o = i.controls && i.controls.right,
            n = d.controls && d.controls.left,
            e = i.x,
            j = i.y,
            f = (o || i).x,
            k = (o || i).y,
            g = (n || d).x,
            l = (n || d).y,
            h = d.x,
            m = d.y,
            o && i._relative && (f += i.x,
            k += i.y),
            n && d._relative && (g += d.x,
            l += d.y),
            d = a.Utils.getPointOnCubicBezier(b, e, f, g, h),
            i = a.Utils.getPointOnCubicBezier(b, j, k, l, m),
            _.isObject(c) ? (c.x = d,
            c.y = i,
            c) : new a.Vector(d,i))
        },
        plot: function() {
            if (this.curved)
                return a.Utils.getCurveFromPoints(this._vertices, this.closed),
                this;
            for (var b = 0; b < this._vertices.length; b++)
                this._vertices[b]._command = 0 === b ? a.Commands.move : a.Commands.line;
            return this
        },
        subdivide: function(b) {
            this._update();
            var d = this.vertices.length - 1
              , e = this.vertices[d]
              , f = this._closed || this.vertices[d]._command === a.Commands.close
              , g = [];
            return _.each(this.vertices, function(h, i) {
                if (!(0 >= i) || f)
                    if (h.command === a.Commands.move)
                        g.push(new a.Anchor(e.x,e.y)),
                        i > 0 && (g[g.length - 1].command = a.Commands.line);
                    else {
                        var j = c(h, e, b);
                        g = g.concat(j),
                        _.each(j, function(b, c) {
                            b.command = 0 >= c && e.command === a.Commands.move ? a.Commands.move : a.Commands.line
                        }),
                        i >= d && (this._closed && this._automatic ? (e = h,
                        j = c(h, e, b),
                        g = g.concat(j),
                        _.each(j, function(b, c) {
                            b.command = 0 >= c && e.command === a.Commands.move ? a.Commands.move : a.Commands.line
                        })) : f && g.push(new a.Anchor(h.x,h.y)),
                        g[g.length - 1].command = f ? a.Commands.close : a.Commands.line)
                    }
                e = h
            }, this),
            this._curved = this._automatic = !1,
            this.vertices = g,
            this
        },
        _updateLength: function(c) {
            this._update();
            var d = this.vertices.length - 1
              , e = this.vertices[d]
              , f = this._closed || this.vertices[d]._command === a.Commands.close
              , g = 0;
            return _.isUndefined(this._lengths) && (this._lengths = []),
            _.each(this.vertices, function(h, i) {
                0 >= i && !f || h.command === a.Commands.move ? (e = h,
                this._lengths[i] = 0) : (this._lengths[i] = b(h, e, c),
                g += this._lengths[i],
                i >= d && f && (e = h,
                this._lengths[i + 1] = b(h, e, c),
                g += this._lengths[i + 1]),
                e = h)
            }, this),
            this._length = g,
            this
        },
        _update: function() {
            if (this._flagVertices) {
                var b, c = this.vertices.length - 1;
                b = f(this._beginning * c),
                c = f(this._ending * c),
                this._vertices.length = 0;
                for (var d = b; c + 1 > d; d++)
                    b = this.vertices[d],
                    this._vertices.push(b);
                this._automatic && this.plot()
            }
            return a.Shape.prototype._update.call(this),
            this
        },
        flagReset: function() {
            return this._flagVertices = this._flagFill = this._flagStroke = this._flagLinewidth = this._flagOpacity = this._flagVisible = this._flagCap = this._flagJoin = this._flagMiter = this._flagClip = !1,
            a.Shape.prototype.flagReset.call(this),
            this
        }
    }),
    h.MakeObservable(h.prototype)
}(Two),
function(a) {
    var b = Math.min
      , c = Math.max
      , d = a.Group = function() {
        a.Shape.call(this, !0),
        this._renderer.type = "group",
        this.additions = [],
        this.subtractions = [],
        this.children = {}
    }
    ;
    _.extend(d, {
        MakeObservable: function(b) {
            var c = a.Polygon.Properties.slice(0)
              , e = _.indexOf(c, "opacity");
            e >= 0 && (c.splice(e, 1),
            Object.defineProperty(b, "opacity", {
                get: function() {
                    return this._opacity
                },
                set: function(a) {
                    this._opacity = a,
                    this._flagOpacity = !0
                }
            })),
            a.Shape.MakeObservable(b),
            d.MakeGetterSetters(b, c),
            Object.defineProperty(b, "mask", {
                get: function() {
                    return this._mask
                },
                set: function(a) {
                    this._mask = a,
                    this._flagMask = !0,
                    a.clip || (a.clip = !0)
                }
            })
        },
        MakeGetterSetters: function(a, b) {
            _.isArray(b) || (b = [b]),
            _.each(b, function(b) {
                d.MakeGetterSetter(a, b)
            })
        },
        MakeGetterSetter: function(a, b) {
            var c = "_" + b;
            Object.defineProperty(a, b, {
                get: function() {
                    return this[c]
                },
                set: function(a) {
                    this[c] = a,
                    _.each(this.children, function(c) {
                        c[b] = a
                    })
                }
            })
        }
    }),
    _.extend(d.prototype, a.Shape.prototype, {
        _flagAdditions: !1,
        _flagSubtractions: !1,
        _flagOpacity: !0,
        _flagMask: !1,
        _fill: "#fff",
        _stroke: "#000",
        _linewidth: 1,
        _opacity: 1,
        _visible: !0,
        _cap: "round",
        _join: "round",
        _miter: 4,
        _closed: !0,
        _curved: !1,
        _automatic: !0,
        _beginning: 0,
        _ending: 1,
        _mask: null ,
        clone: function(a) {
            a = a || this.parent;
            var b = new d;
            return a.add(b),
            _.map(this.children, function(a) {
                return a.clone(b)
            }),
            b.translation.copy(this.translation),
            b.rotation = this.rotation,
            b.scale = this.scale,
            b
        },
        toObject: function() {
            var a = {
                children: {},
                translation: this.translation.toObject(),
                rotation: this.rotation,
                scale: this.scale
            };
            return _.each(this.children, function(b, c) {
                a.children[c] = b.toObject()
            }, this),
            a
        },
        corner: function() {
            var a = this.getBoundingClientRect(!0)
              , b = {
                x: a.left,
                y: a.top
            };
            return _.each(this.children, function(a) {
                a.translation.subSelf(b)
            }),
            this
        },
        center: function() {
            var a = this.getBoundingClientRect(!0);
            return a.centroid = {
                x: a.left + a.width / 2,
                y: a.top + a.height / 2
            },
            _.each(this.children, function(b) {
                b.translation.subSelf(a.centroid)
            }),
            this
        },
        getById: function(a) {
            var b = function(a, c) {
                if (a.id === c)
                    return a;
                for (var d in a.children) {
                    var e = b(a.children[d], c);
                    if (e)
                        return e
                }
            }
            ;
            return b(this, a) || null 
        },
        getByClassName: function(a) {
            var b = []
              , c = function(a, d) {
                -1 != a.classList.indexOf(d) && b.push(a);
                for (var e in a.children)
                    c(a.children[e], d);
                return b
            }
            ;
            return c(this, a)
        },
        getByType: function(b) {
            var c = []
              , d = function(b, e) {
                for (var f in b.children)
                    b.children[f] instanceof e ? c.push(b.children[f]) : b.children[f] instanceof a.Group && d(b.children[f], e);
                return c
            }
            ;
            return d(this, b)
        },
        add: function(a) {
            var b, c, d, e = this.children, f = this.additions;
            return _.isArray(a) || (a = _.toArray(arguments)),
            _.each(a, function(a) {
                a && (b = a.id,
                c = a.parent,
                _.isUndefined(e[b]) && (c && (delete c.children[b],
                d = _.indexOf(c.additions, b),
                d >= 0 && c.additions.splice(d, 1)),
                e[b] = a,
                a.parent = this,
                f.push(b),
                this._flagAdditions = !0))
            }, this),
            this
        },
        remove: function(a) {
            var b, c, d, e = this.children, f = this.parent, g = this.subtractions;
            return 0 >= arguments.length && f ? (f.remove(this),
            this) : (_.isArray(a) || (a = _.toArray(arguments)),
            _.each(a, function(a) {
                b = a.id,
                c = a.parent,
                b in e && (delete e[b],
                delete a.parent,
                d = _.indexOf(c.additions, b),
                d >= 0 && c.additions.splice(d, 1),
                g.push(b),
                this._flagSubtractions = !0)
            }, this),
            this)
        },
        getBoundingClientRect: function() {
            var a;
            this._update(!0);
            var d = 1 / 0
              , e = -(1 / 0)
              , f = 1 / 0
              , g = -(1 / 0);
            return _.each(this.children, function(h) {
                a = h.getBoundingClientRect(),
                _.isNumber(a.top) && _.isNumber(a.left) && _.isNumber(a.right) && _.isNumber(a.bottom) && (f = b(a.top, f),
                d = b(a.left, d),
                e = c(a.right, e),
                g = c(a.bottom, g))
            }, this),
            {
                top: f,
                left: d,
                right: e,
                bottom: g,
                width: e - d,
                height: g - f
            }
        },
        noFill: function() {
            return _.each(this.children, function(a) {
                a.noFill()
            }),
            this
        },
        noStroke: function() {
            return _.each(this.children, function(a) {
                a.noStroke()
            }),
            this
        },
        subdivide: function() {
            var a = arguments;
            return _.each(this.children, function(b) {
                b.subdivide.apply(b, a)
            }),
            this
        },
        flagReset: function() {
            return this._flagAdditions && (this.additions.length = 0,
            this._flagAdditions = !1),
            this._flagSubtractions && (this.subtractions.length = 0,
            this._flagSubtractions = !1),
            this._flagMask = this._flagOpacity = !1,
            a.Shape.prototype.flagReset.call(this),
            this
        }
    }),
    d.MakeObservable(d.prototype)
}(Two),
Two.prototype.makeArc = function(a, b, c, d, e) {
    for (var f = 100, g = [], h = 0; f > h; h++) {
        var i = h / (f - 1)
          , j = -(i * (e - d) + d)
          , k = c * Math.cos(j)
          , l = c * Math.sin(j);
        g.push(new Two.Anchor(k,l))
    }
    var m = new Two.Polygon(g,!1,!0);
    return m.translation.set(a, b),
    this.add(m),
    m
}
,
$(window).on("scroll", function() {
    navbarVisibility(),
    checkVisibility(),
    offsetScroll()
}),
$(".bootscale .blue-gradient").addClass("active"),
$(document).ready(function() {
    $("#menu-toggle").click(function() {
        $("#folded-menu").toggleClass("in")
    }),
    navbarSubblock(),
//     countStats(),
    bindSlick(),
    paintRing(),
    videoInit(),
    authLogin(),
    loginInit()
});
