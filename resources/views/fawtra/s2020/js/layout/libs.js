/**
 * Simplebar
 */

/**
 * SimpleBar.js - v4.1.0
 * Scrollbars, simpler.
 * https://grsmto.github.io/simplebar/
 *
 * Made by Adrien Denat from a fork by Jonathan Nicol
 * Under MIT License
 */

! function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = t || self).SimpleBar = e()
}(this, function() {
    "use strict";
    var t = function(t) {
            if ("function" != typeof t) throw TypeError(String(t) + " is not a function");
            return t
        },
        e = function(t) {
            try {
                return !!t()
            } catch (t) {
                return !0
            }
        },
        i = {}.toString,
        r = function(t) {
            return i.call(t).slice(8, -1)
        },
        n = "".split,
        s = e(function() {
            return !Object("z").propertyIsEnumerable(0)
        }) ? function(t) {
            return "String" == r(t) ? n.call(t, "") : Object(t)
        } : Object,
        o = function(t) {
            if (null == t) throw TypeError("Can't call method on " + t);
            return t
        },
        a = function(t) {
            return Object(o(t))
        },
        l = Math.ceil,
        c = Math.floor,
        u = function(t) {
            return isNaN(t = +t) ? 0 : (t > 0 ? c : l)(t)
        },
        h = Math.min,
        f = function(t) {
            return t > 0 ? h(u(t), 9007199254740991) : 0
        },
        d = function(t) {
            return "object" == typeof t ? null !== t : "function" == typeof t
        },
        p = Array.isArray || function(t) {
            return "Array" == r(t)
        },
        v = "undefined" != typeof globalThis ? globalThis : "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : {};

    function g(t, e) {
        return t(e = {
            exports: {}
        }, e.exports), e.exports
    }
    var b, m, y, x, E = "object" == typeof window && window && window.Math == Math ? window : "object" == typeof self && self && self.Math == Math ? self : Function("return this")(),
        w = !e(function() {
            return 7 != Object.defineProperty({}, "a", {
                get: function() {
                    return 7
                }
            }).a
        }),
        O = E.document,
        _ = d(O) && d(O.createElement),
        S = !w && !e(function() {
            return 7 != Object.defineProperty((t = "div", _ ? O.createElement(t) : {}), "a", {
                get: function() {
                    return 7
                }
            }).a;
            var t
        }),
        L = function(t) {
            if (!d(t)) throw TypeError(String(t) + " is not an object");
            return t
        },
        A = function(t, e) {
            if (!d(t)) return t;
            var i, r;
            if (e && "function" == typeof(i = t.toString) && !d(r = i.call(t))) return r;
            if ("function" == typeof(i = t.valueOf) && !d(r = i.call(t))) return r;
            if (!e && "function" == typeof(i = t.toString) && !d(r = i.call(t))) return r;
            throw TypeError("Can't convert object to primitive value")
        },
        k = Object.defineProperty,
        M = {
            f: w ? k : function(t, e, i) {
                if (L(t), e = A(e, !0), L(i), S) try {
                    return k(t, e, i)
                } catch (t) {}
                if ("get" in i || "set" in i) throw TypeError("Accessors not supported");
                return "value" in i && (t[e] = i.value), t
            }
        },
        W = function(t, e) {
            return {
                enumerable: !(1 & t),
                configurable: !(2 & t),
                writable: !(4 & t),
                value: e
            }
        },
        T = w ? function(t, e, i) {
            return M.f(t, e, W(1, i))
        } : function(t, e, i) {
            return t[e] = i, t
        },
        R = function(t, e) {
            try {
                T(E, t, e)
            } catch (i) {
                E[t] = e
            }
            return e
        },
        j = g(function(t) {
            var e = E["__core-js_shared__"] || R("__core-js_shared__", {});
            (t.exports = function(t, i) {
                return e[t] || (e[t] = void 0 !== i ? i : {})
            })("versions", []).push({
                version: "3.0.1",
                mode: "global",
                copyright: "© 2019 Denis Pushkarev (zloirock.ru)"
            })
        }),
        C = 0,
        N = Math.random(),
        z = function(t) {
            return "Symbol(".concat(void 0 === t ? "" : t, ")_", (++C + N).toString(36))
        },
        D = !e(function() {
            return !String(Symbol())
        }),
        V = j("wks"),
        B = E.Symbol,
        I = function(t) {
            return V[t] || (V[t] = D && B[t] || (D ? B : z)("Symbol." + t))
        },
        P = I("species"),
        H = function(t, e) {
            var i;
            return p(t) && ("function" != typeof(i = t.constructor) || i !== Array && !p(i.prototype) ? d(i) && null === (i = i[P]) && (i = void 0) : i = void 0), new(void 0 === i ? Array : i)(0 === e ? 0 : e)
        },
        q = function(e, i) {
            var r = 1 == e,
                n = 2 == e,
                o = 3 == e,
                l = 4 == e,
                c = 6 == e,
                u = 5 == e || c,
                h = i || H;
            return function(i, d, p) {
                for (var v, g, b = a(i), m = s(b), y = function(e, i, r) {
                        if (t(e), void 0 === i) return e;
                        switch (r) {
                            case 0:
                                return function() {
                                    return e.call(i)
                                };
                            case 1:
                                return function(t) {
                                    return e.call(i, t)
                                };
                            case 2:
                                return function(t, r) {
                                    return e.call(i, t, r)
                                };
                            case 3:
                                return function(t, r, n) {
                                    return e.call(i, t, r, n)
                                }
                        }
                        return function() {
                            return e.apply(i, arguments)
                        }
                    }(d, p, 3), x = f(m.length), E = 0, w = r ? h(i, x) : n ? h(i, 0) : void 0; x > E; E++)
                    if ((u || E in m) && (g = y(v = m[E], E, b), e))
                        if (r) w[E] = g;
                        else if (g) switch (e) {
                    case 3:
                        return !0;
                    case 5:
                        return v;
                    case 6:
                        return E;
                    case 2:
                        w.push(v)
                } else if (l) return !1;
                return c ? -1 : o || l ? l : w
            }
        },
        F = I("species"),
        $ = {}.propertyIsEnumerable,
        Y = Object.getOwnPropertyDescriptor,
        X = {
            f: Y && !$.call({
                1: 2
            }, 1) ? function(t) {
                var e = Y(this, t);
                return !!e && e.enumerable
            } : $
        },
        G = function(t) {
            return s(o(t))
        },
        K = {}.hasOwnProperty,
        U = function(t, e) {
            return K.call(t, e)
        },
        J = Object.getOwnPropertyDescriptor,
        Q = {
            f: w ? J : function(t, e) {
                if (t = G(t), e = A(e, !0), S) try {
                    return J(t, e)
                } catch (t) {}
                if (U(t, e)) return W(!X.f.call(t, e), t[e])
            }
        },
        Z = j("native-function-to-string", Function.toString),
        tt = E.WeakMap,
        et = "function" == typeof tt && /native code/.test(Z.call(tt)),
        it = j("keys"),
        rt = {},
        nt = E.WeakMap;
    if (et) {
        var st = new nt,
            ot = st.get,
            at = st.has,
            lt = st.set;
        b = function(t, e) {
            return lt.call(st, t, e), e
        }, m = function(t) {
            return ot.call(st, t) || {}
        }, y = function(t) {
            return at.call(st, t)
        }
    } else {
        var ct = it[x = "state"] || (it[x] = z(x));
        rt[ct] = !0, b = function(t, e) {
            return T(t, ct, e), e
        }, m = function(t) {
            return U(t, ct) ? t[ct] : {}
        }, y = function(t) {
            return U(t, ct)
        }
    }
    var ut, ht, ft = {
            set: b,
            get: m,
            has: y,
            enforce: function(t) {
                return y(t) ? m(t) : b(t, {})
            },
            getterFor: function(t) {
                return function(e) {
                    var i;
                    if (!d(e) || (i = m(e)).type !== t) throw TypeError("Incompatible receiver, " + t + " required");
                    return i
                }
            }
        },
        dt = g(function(t) {
            var e = ft.get,
                i = ft.enforce,
                r = String(Z).split("toString");
            j("inspectSource", function(t) {
                return Z.call(t)
            }), (t.exports = function(t, e, n, s) {
                var o = !!s && !!s.unsafe,
                    a = !!s && !!s.enumerable,
                    l = !!s && !!s.noTargetGet;
                "function" == typeof n && ("string" != typeof e || U(n, "name") || T(n, "name", e), i(n).source = r.join("string" == typeof e ? e : "")), t !== E ? (o ? !l && t[e] && (a = !0) : delete t[e], a ? t[e] = n : T(t, e, n)) : a ? t[e] = n : R(e, n)
            })(Function.prototype, "toString", function() {
                return "function" == typeof this && e(this).source || Z.call(this)
            })
        }),
        pt = Math.max,
        vt = Math.min,
        gt = (ut = !1, function(t, e, i) {
            var r, n = G(t),
                s = f(n.length),
                o = function(t, e) {
                    var i = u(t);
                    return i < 0 ? pt(i + e, 0) : vt(i, e)
                }(i, s);
            if (ut && e != e) {
                for (; s > o;)
                    if ((r = n[o++]) != r) return !0
            } else
                for (; s > o; o++)
                    if ((ut || o in n) && n[o] === e) return ut || o || 0;
            return !ut && -1
        }),
        bt = function(t, e) {
            var i, r = G(t),
                n = 0,
                s = [];
            for (i in r) !U(rt, i) && U(r, i) && s.push(i);
            for (; e.length > n;) U(r, i = e[n++]) && (~gt(s, i) || s.push(i));
            return s
        },
        mt = ["constructor", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "valueOf"],
        yt = mt.concat("length", "prototype"),
        xt = {
            f: Object.getOwnPropertyNames || function(t) {
                return bt(t, yt)
            }
        },
        Et = {
            f: Object.getOwnPropertySymbols
        },
        wt = E.Reflect,
        Ot = wt && wt.ownKeys || function(t) {
            var e = xt.f(L(t)),
                i = Et.f;
            return i ? e.concat(i(t)) : e
        },
        _t = function(t, e) {
            for (var i = Ot(e), r = M.f, n = Q.f, s = 0; s < i.length; s++) {
                var o = i[s];
                U(t, o) || r(t, o, n(e, o))
            }
        },
        St = /#|\.prototype\./,
        Lt = function(t, i) {
            var r = kt[At(t)];
            return r == Wt || r != Mt && ("function" == typeof i ? e(i) : !!i)
        },
        At = Lt.normalize = function(t) {
            return String(t).replace(St, ".").toLowerCase()
        },
        kt = Lt.data = {},
        Mt = Lt.NATIVE = "N",
        Wt = Lt.POLYFILL = "P",
        Tt = Lt,
        Rt = Q.f,
        jt = function(t, e) {
            var i, r, n, s, o, a = t.target,
                l = t.global,
                c = t.stat;
            if (i = l ? E : c ? E[a] || R(a, {}) : (E[a] || {}).prototype)
                for (r in e) {
                    if (s = e[r], n = t.noTargetGet ? (o = Rt(i, r)) && o.value : i[r], !Tt(l ? r : a + (c ? "." : "#") + r, t.forced) && void 0 !== n) {
                        if (typeof s == typeof n) continue;
                        _t(s, n)
                    }(t.sham || n && n.sham) && T(s, "sham", !0), dt(i, r, s, t)
                }
        },
        Ct = q(2);
    jt({
        target: "Array",
        proto: !0,
        forced: !(ht = "filter", !e(function() {
            var t = [];
            return (t.constructor = {})[F] = function() {
                return {
                    foo: 1
                }
            }, 1 !== t[ht](Boolean).foo
        }))
    }, {
        filter: function(t) {
            return Ct(this, t, arguments[1])
        }
    });
    var Nt = function(t, i) {
            var r = [][t];
            return !r || !e(function() {
                r.call(null, i || function() {
                    throw 1
                }, 1)
            })
        },
        zt = [].forEach,
        Dt = q(0),
        Vt = Nt("forEach") ? function(t) {
            return Dt(this, t, arguments[1])
        } : zt;
    jt({
        target: "Array",
        proto: !0,
        forced: [].forEach != Vt
    }, {
        forEach: Vt
    });
    jt({
        target: "Array",
        proto: !0,
        forced: Nt("reduce")
    }, {
        reduce: function(e) {
            return function(e, i, r, n, o) {
                t(i);
                var l = a(e),
                    c = s(l),
                    u = f(l.length),
                    h = o ? u - 1 : 0,
                    d = o ? -1 : 1;
                if (r < 2)
                    for (;;) {
                        if (h in c) {
                            n = c[h], h += d;
                            break
                        }
                        if (h += d, o ? h < 0 : u <= h) throw TypeError("Reduce of empty array with no initial value")
                    }
                for (; o ? h >= 0 : u > h; h += d) h in c && (n = i(n, c[h], h, l));
                return n
            }(this, e, arguments.length, arguments[1], !1)
        }
    });
    var Bt = M.f,
        It = Function.prototype,
        Pt = It.toString,
        Ht = /^\s*function ([^ (]*)/;
    !w || "name" in It || Bt(It, "name", {
        configurable: !0,
        get: function() {
            try {
                return Pt.call(this).match(Ht)[1]
            } catch (t) {
                return ""
            }
        }
    });
    var qt = Object.keys || function(t) {
            return bt(t, mt)
        },
        Ft = Object.assign,
        $t = !Ft || e(function() {
            var t = {},
                e = {},
                i = Symbol();
            return t[i] = 7, "abcdefghijklmnopqrst".split("").forEach(function(t) {
                e[t] = t
            }), 7 != Ft({}, t)[i] || "abcdefghijklmnopqrst" != qt(Ft({}, e)).join("")
        }) ? function(t, e) {
            for (var i = a(t), r = arguments.length, n = 1, o = Et.f, l = X.f; r > n;)
                for (var c, u = s(arguments[n++]), h = o ? qt(u).concat(o(u)) : qt(u), f = h.length, d = 0; f > d;) l.call(u, c = h[d++]) && (i[c] = u[c]);
            return i
        } : Ft;
    jt({
        target: "Object",
        stat: !0,
        forced: Object.assign !== $t
    }, {
        assign: $t
    });
    var Yt = "\t\n\v\f\r                　\u2028\u2029\ufeff",
        Xt = "[" + Yt + "]",
        Gt = RegExp("^" + Xt + Xt + "*"),
        Kt = RegExp(Xt + Xt + "*$"),
        Ut = E.parseInt,
        Jt = /^[-+]?0[xX]/,
        Qt = 8 !== Ut(Yt + "08") || 22 !== Ut(Yt + "0x16") ? function(t, e) {
            var i = function(t, e) {
                return t = String(o(t)), 1 & e && (t = t.replace(Gt, "")), 2 & e && (t = t.replace(Kt, "")), t
            }(String(t), 3);
            return Ut(i, e >>> 0 || (Jt.test(i) ? 16 : 10))
        } : Ut;
    jt({
        global: !0,
        forced: parseInt != Qt
    }, {
        parseInt: Qt
    });
    var Zt, te, ee = RegExp.prototype.exec,
        ie = String.prototype.replace,
        re = ee,
        ne = (Zt = /a/, te = /b*/g, ee.call(Zt, "a"), ee.call(te, "a"), 0 !== Zt.lastIndex || 0 !== te.lastIndex),
        se = void 0 !== /()??/.exec("")[1];
    (ne || se) && (re = function(t) {
        var e, i, r, n, s = this;
        return se && (i = new RegExp("^" + s.source + "$(?!\\s)", function() {
            var t = L(this),
                e = "";
            return t.global && (e += "g"), t.ignoreCase && (e += "i"), t.multiline && (e += "m"), t.unicode && (e += "u"), t.sticky && (e += "y"), e
        }.call(s))), ne && (e = s.lastIndex), r = ee.call(s, t), ne && r && (s.lastIndex = s.global ? r.index + r[0].length : e), se && r && r.length > 1 && ie.call(r[0], i, function() {
            for (n = 1; n < arguments.length - 2; n++) void 0 === arguments[n] && (r[n] = void 0)
        }), r
    });
    var oe = re;
    jt({
        target: "RegExp",
        proto: !0,
        forced: /./.exec !== oe
    }, {
        exec: oe
    });
    var ae = function(t, e, i) {
            return e + (i ? function(t, e, i) {
                var r, n, s = String(o(t)),
                    a = u(e),
                    l = s.length;
                return a < 0 || a >= l ? i ? "" : void 0 : (r = s.charCodeAt(a)) < 55296 || r > 56319 || a + 1 === l || (n = s.charCodeAt(a + 1)) < 56320 || n > 57343 ? i ? s.charAt(a) : r : i ? s.slice(a, a + 2) : n - 56320 + (r - 55296 << 10) + 65536
            }(t, e, !0).length : 1)
        },
        le = function(t, e) {
            var i = t.exec;
            if ("function" == typeof i) {
                var n = i.call(t, e);
                if ("object" != typeof n) throw TypeError("RegExp exec method returned something other than an Object or null");
                return n
            }
            if ("RegExp" !== r(t)) throw TypeError("RegExp#exec called on incompatible receiver");
            return oe.call(t, e)
        },
        ce = I("species"),
        ue = !e(function() {
            var t = /./;
            return t.exec = function() {
                var t = [];
                return t.groups = {
                    a: "7"
                }, t
            }, "7" !== "".replace(t, "$<a>")
        }),
        he = !e(function() {
            var t = /(?:)/,
                e = t.exec;
            t.exec = function() {
                return e.apply(this, arguments)
            };
            var i = "ab".split(t);
            return 2 !== i.length || "a" !== i[0] || "b" !== i[1]
        }),
        fe = function(t, i, r, n) {
            var s = I(t),
                o = !e(function() {
                    var e = {};
                    return e[s] = function() {
                        return 7
                    }, 7 != "" [t](e)
                }),
                a = o && !e(function() {
                    var e = !1,
                        i = /a/;
                    return i.exec = function() {
                        return e = !0, null
                    }, "split" === t && (i.constructor = {}, i.constructor[ce] = function() {
                        return i
                    }), i[s](""), !e
                });
            if (!o || !a || "replace" === t && !ue || "split" === t && !he) {
                var l = /./ [s],
                    c = r(s, "" [t], function(t, e, i, r, n) {
                        return e.exec === oe ? o && !n ? {
                            done: !0,
                            value: l.call(e, i, r)
                        } : {
                            done: !0,
                            value: t.call(i, e, r)
                        } : {
                            done: !1
                        }
                    }),
                    u = c[0],
                    h = c[1];
                dt(String.prototype, t, u), dt(RegExp.prototype, s, 2 == i ? function(t, e) {
                    return h.call(t, this, e)
                } : function(t) {
                    return h.call(t, this)
                }), n && T(RegExp.prototype[s], "sham", !0)
            }
        };
    fe("match", 1, function(t, e, i) {
        return [function(e) {
            var i = o(this),
                r = null == e ? void 0 : e[t];
            return void 0 !== r ? r.call(e, i) : new RegExp(e)[t](String(i))
        }, function(t) {
            var r = i(e, t, this);
            if (r.done) return r.value;
            var n = L(t),
                s = String(this);
            if (!n.global) return le(n, s);
            var o = n.unicode;
            n.lastIndex = 0;
            for (var a, l = [], c = 0; null !== (a = le(n, s));) {
                var u = String(a[0]);
                l[c] = u, "" === u && (n.lastIndex = ae(s, f(n.lastIndex), o)), c++
            }
            return 0 === c ? null : l
        }]
    });
    var de = Math.max,
        pe = Math.min,
        ve = Math.floor,
        ge = /\$([$&`']|\d\d?|<[^>]*>)/g,
        be = /\$([$&`']|\d\d?)/g;
    fe("replace", 2, function(t, e, i) {
        return [function(i, r) {
            var n = o(this),
                s = null == i ? void 0 : i[t];
            return void 0 !== s ? s.call(i, n, r) : e.call(String(n), i, r)
        }, function(t, n) {
            var s = i(e, t, this, n);
            if (s.done) return s.value;
            var o = L(t),
                a = String(this),
                l = "function" == typeof n;
            l || (n = String(n));
            var c = o.global;
            if (c) {
                var h = o.unicode;
                o.lastIndex = 0
            }
            for (var d = [];;) {
                var p = le(o, a);
                if (null === p) break;
                if (d.push(p), !c) break;
                "" === String(p[0]) && (o.lastIndex = ae(a, f(o.lastIndex), h))
            }
            for (var v, g = "", b = 0, m = 0; m < d.length; m++) {
                p = d[m];
                for (var y = String(p[0]), x = de(pe(u(p.index), a.length), 0), E = [], w = 1; w < p.length; w++) E.push(void 0 === (v = p[w]) ? v : String(v));
                var O = p.groups;
                if (l) {
                    var _ = [y].concat(E, x, a);
                    void 0 !== O && _.push(O);
                    var S = String(n.apply(void 0, _))
                } else S = r(y, a, x, E, O, n);
                x >= b && (g += a.slice(b, x) + S, b = x + y.length)
            }
            return g + a.slice(b)
        }];

        function r(t, i, r, n, s, o) {
            var l = r + t.length,
                c = n.length,
                u = be;
            return void 0 !== s && (s = a(s), u = ge), e.call(o, u, function(e, o) {
                var a;
                switch (o.charAt(0)) {
                    case "$":
                        return "$";
                    case "&":
                        return t;
                    case "`":
                        return i.slice(0, r);
                    case "'":
                        return i.slice(l);
                    case "<":
                        a = s[o.slice(1, -1)];
                        break;
                    default:
                        var u = +o;
                        if (0 === u) return e;
                        if (u > c) {
                            var h = ve(u / 10);
                            return 0 === h ? e : h <= c ? void 0 === n[h - 1] ? o.charAt(1) : n[h - 1] + o.charAt(1) : e
                        }
                        a = n[u - 1]
                }
                return void 0 === a ? "" : a
            })
        }
    });
    for (var me in {
            CSSRuleList: 0,
            CSSStyleDeclaration: 0,
            CSSValueList: 0,
            ClientRectList: 0,
            DOMRectList: 0,
            DOMStringList: 0,
            DOMTokenList: 1,
            DataTransferItemList: 0,
            FileList: 0,
            HTMLAllCollection: 0,
            HTMLCollection: 0,
            HTMLFormElement: 0,
            HTMLSelectElement: 0,
            MediaList: 0,
            MimeTypeArray: 0,
            NamedNodeMap: 0,
            NodeList: 1,
            PaintRequestList: 0,
            Plugin: 0,
            PluginArray: 0,
            SVGLengthList: 0,
            SVGNumberList: 0,
            SVGPathSegList: 0,
            SVGPointList: 0,
            SVGStringList: 0,
            SVGTransformList: 0,
            SourceBufferList: 0,
            StyleSheetList: 0,
            TextTrackCueList: 0,
            TextTrackList: 0,
            TouchList: 0
        }) {
        var ye = E[me],
            xe = ye && ye.prototype;
        if (xe && xe.forEach !== Vt) try {
            T(xe, "forEach", Vt)
        } catch (t) {
            xe.forEach = Vt
        }
    }
    var Ee = "Expected a function",
        we = NaN,
        Oe = "[object Symbol]",
        _e = /^\s+|\s+$/g,
        Se = /^[-+]0x[0-9a-f]+$/i,
        Le = /^0b[01]+$/i,
        Ae = /^0o[0-7]+$/i,
        ke = parseInt,
        Me = "object" == typeof v && v && v.Object === Object && v,
        We = "object" == typeof self && self && self.Object === Object && self,
        Te = Me || We || Function("return this")(),
        Re = Object.prototype.toString,
        je = Math.max,
        Ce = Math.min,
        Ne = function() {
            return Te.Date.now()
        };

    function ze(t, e, i) {
        var r, n, s, o, a, l, c = 0,
            u = !1,
            h = !1,
            f = !0;
        if ("function" != typeof t) throw new TypeError(Ee);

        function d(e) {
            var i = r,
                s = n;
            return r = n = void 0, c = e, o = t.apply(s, i)
        }

        function p(t) {
            var i = t - l;
            return void 0 === l || i >= e || i < 0 || h && t - c >= s
        }

        function v() {
            var t = Ne();
            if (p(t)) return g(t);
            a = setTimeout(v, function(t) {
                var i = e - (t - l);
                return h ? Ce(i, s - (t - c)) : i
            }(t))
        }

        function g(t) {
            return a = void 0, f && r ? d(t) : (r = n = void 0, o)
        }

        function b() {
            var t = Ne(),
                i = p(t);
            if (r = arguments, n = this, l = t, i) {
                if (void 0 === a) return function(t) {
                    return c = t, a = setTimeout(v, e), u ? d(t) : o
                }(l);
                if (h) return a = setTimeout(v, e), d(l)
            }
            return void 0 === a && (a = setTimeout(v, e)), o
        }
        return e = Ve(e) || 0, De(i) && (u = !!i.leading, s = (h = "maxWait" in i) ? je(Ve(i.maxWait) || 0, e) : s, f = "trailing" in i ? !!i.trailing : f), b.cancel = function() {
            void 0 !== a && clearTimeout(a), c = 0, r = l = n = a = void 0
        }, b.flush = function() {
            return void 0 === a ? o : g(Ne())
        }, b
    }

    function De(t) {
        var e = typeof t;
        return !!t && ("object" == e || "function" == e)
    }

    function Ve(t) {
        if ("number" == typeof t) return t;
        if (function(t) {
                return "symbol" == typeof t || function(t) {
                    return !!t && "object" == typeof t
                }(t) && Re.call(t) == Oe
            }(t)) return we;
        if (De(t)) {
            var e = "function" == typeof t.valueOf ? t.valueOf() : t;
            t = De(e) ? e + "" : e
        }
        if ("string" != typeof t) return 0 === t ? t : +t;
        t = t.replace(_e, "");
        var i = Le.test(t);
        return i || Ae.test(t) ? ke(t.slice(2), i ? 2 : 8) : Se.test(t) ? we : +t
    }
    var Be = function(t, e, i) {
            var r = !0,
                n = !0;
            if ("function" != typeof t) throw new TypeError(Ee);
            return De(i) && (r = "leading" in i ? !!i.leading : r, n = "trailing" in i ? !!i.trailing : n), ze(t, e, {
                leading: r,
                maxWait: e,
                trailing: n
            })
        },
        Ie = "Expected a function",
        Pe = NaN,
        He = "[object Symbol]",
        qe = /^\s+|\s+$/g,
        Fe = /^[-+]0x[0-9a-f]+$/i,
        $e = /^0b[01]+$/i,
        Ye = /^0o[0-7]+$/i,
        Xe = parseInt,
        Ge = "object" == typeof v && v && v.Object === Object && v,
        Ke = "object" == typeof self && self && self.Object === Object && self,
        Ue = Ge || Ke || Function("return this")(),
        Je = Object.prototype.toString,
        Qe = Math.max,
        Ze = Math.min,
        ti = function() {
            return Ue.Date.now()
        };

    function ei(t) {
        var e = typeof t;
        return !!t && ("object" == e || "function" == e)
    }

    function ii(t) {
        if ("number" == typeof t) return t;
        if (function(t) {
                return "symbol" == typeof t || function(t) {
                    return !!t && "object" == typeof t
                }(t) && Je.call(t) == He
            }(t)) return Pe;
        if (ei(t)) {
            var e = "function" == typeof t.valueOf ? t.valueOf() : t;
            t = ei(e) ? e + "" : e
        }
        if ("string" != typeof t) return 0 === t ? t : +t;
        t = t.replace(qe, "");
        var i = $e.test(t);
        return i || Ye.test(t) ? Xe(t.slice(2), i ? 2 : 8) : Fe.test(t) ? Pe : +t
    }
    var ri = function(t, e, i) {
            var r, n, s, o, a, l, c = 0,
                u = !1,
                h = !1,
                f = !0;
            if ("function" != typeof t) throw new TypeError(Ie);

            function d(e) {
                var i = r,
                    s = n;
                return r = n = void 0, c = e, o = t.apply(s, i)
            }

            function p(t) {
                var i = t - l;
                return void 0 === l || i >= e || i < 0 || h && t - c >= s
            }

            function v() {
                var t = ti();
                if (p(t)) return g(t);
                a = setTimeout(v, function(t) {
                    var i = e - (t - l);
                    return h ? Ze(i, s - (t - c)) : i
                }(t))
            }

            function g(t) {
                return a = void 0, f && r ? d(t) : (r = n = void 0, o)
            }

            function b() {
                var t = ti(),
                    i = p(t);
                if (r = arguments, n = this, l = t, i) {
                    if (void 0 === a) return function(t) {
                        return c = t, a = setTimeout(v, e), u ? d(t) : o
                    }(l);
                    if (h) return a = setTimeout(v, e), d(l)
                }
                return void 0 === a && (a = setTimeout(v, e)), o
            }
            return e = ii(e) || 0, ei(i) && (u = !!i.leading, s = (h = "maxWait" in i) ? Qe(ii(i.maxWait) || 0, e) : s, f = "trailing" in i ? !!i.trailing : f), b.cancel = function() {
                void 0 !== a && clearTimeout(a), c = 0, r = l = n = a = void 0
            }, b.flush = function() {
                return void 0 === a ? o : g(ti())
            }, b
        },
        ni = "Expected a function",
        si = "__lodash_hash_undefined__",
        oi = "[object Function]",
        ai = "[object GeneratorFunction]",
        li = /^\[object .+?Constructor\]$/,
        ci = "object" == typeof v && v && v.Object === Object && v,
        ui = "object" == typeof self && self && self.Object === Object && self,
        hi = ci || ui || Function("return this")();
    var fi = Array.prototype,
        di = Function.prototype,
        pi = Object.prototype,
        vi = hi["__core-js_shared__"],
        gi = function() {
            var t = /[^.]+$/.exec(vi && vi.keys && vi.keys.IE_PROTO || "");
            return t ? "Symbol(src)_1." + t : ""
        }(),
        bi = di.toString,
        mi = pi.hasOwnProperty,
        yi = pi.toString,
        xi = RegExp("^" + bi.call(mi).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$"),
        Ei = fi.splice,
        wi = Wi(hi, "Map"),
        Oi = Wi(Object, "create");

    function _i(t) {
        var e = -1,
            i = t ? t.length : 0;
        for (this.clear(); ++e < i;) {
            var r = t[e];
            this.set(r[0], r[1])
        }
    }

    function Si(t) {
        var e = -1,
            i = t ? t.length : 0;
        for (this.clear(); ++e < i;) {
            var r = t[e];
            this.set(r[0], r[1])
        }
    }

    function Li(t) {
        var e = -1,
            i = t ? t.length : 0;
        for (this.clear(); ++e < i;) {
            var r = t[e];
            this.set(r[0], r[1])
        }
    }

    function Ai(t, e) {
        for (var i, r, n = t.length; n--;)
            if ((i = t[n][0]) === (r = e) || i != i && r != r) return n;
        return -1
    }

    function ki(t) {
        return !(!Ri(t) || (e = t, gi && gi in e)) && (function(t) {
            var e = Ri(t) ? yi.call(t) : "";
            return e == oi || e == ai
        }(t) || function(t) {
            var e = !1;
            if (null != t && "function" != typeof t.toString) try {
                e = !!(t + "")
            } catch (t) {}
            return e
        }(t) ? xi : li).test(function(t) {
            if (null != t) {
                try {
                    return bi.call(t)
                } catch (t) {}
                try {
                    return t + ""
                } catch (t) {}
            }
            return ""
        }(t));
        var e
    }

    function Mi(t, e) {
        var i, r, n = t.__data__;
        return ("string" == (r = typeof(i = e)) || "number" == r || "symbol" == r || "boolean" == r ? "__proto__" !== i : null === i) ? n["string" == typeof e ? "string" : "hash"] : n.map
    }

    function Wi(t, e) {
        var i = function(t, e) {
            return null == t ? void 0 : t[e]
        }(t, e);
        return ki(i) ? i : void 0
    }

    function Ti(t, e) {
        if ("function" != typeof t || e && "function" != typeof e) throw new TypeError(ni);
        var i = function() {
            var r = arguments,
                n = e ? e.apply(this, r) : r[0],
                s = i.cache;
            if (s.has(n)) return s.get(n);
            var o = t.apply(this, r);
            return i.cache = s.set(n, o), o
        };
        return i.cache = new(Ti.Cache || Li), i
    }

    function Ri(t) {
        var e = typeof t;
        return !!t && ("object" == e || "function" == e)
    }
    _i.prototype.clear = function() {
        this.__data__ = Oi ? Oi(null) : {}
    }, _i.prototype.delete = function(t) {
        return this.has(t) && delete this.__data__[t]
    }, _i.prototype.get = function(t) {
        var e = this.__data__;
        if (Oi) {
            var i = e[t];
            return i === si ? void 0 : i
        }
        return mi.call(e, t) ? e[t] : void 0
    }, _i.prototype.has = function(t) {
        var e = this.__data__;
        return Oi ? void 0 !== e[t] : mi.call(e, t)
    }, _i.prototype.set = function(t, e) {
        return this.__data__[t] = Oi && void 0 === e ? si : e, this
    }, Si.prototype.clear = function() {
        this.__data__ = []
    }, Si.prototype.delete = function(t) {
        var e = this.__data__,
            i = Ai(e, t);
        return !(i < 0 || (i == e.length - 1 ? e.pop() : Ei.call(e, i, 1), 0))
    }, Si.prototype.get = function(t) {
        var e = this.__data__,
            i = Ai(e, t);
        return i < 0 ? void 0 : e[i][1]
    }, Si.prototype.has = function(t) {
        return Ai(this.__data__, t) > -1
    }, Si.prototype.set = function(t, e) {
        var i = this.__data__,
            r = Ai(i, t);
        return r < 0 ? i.push([t, e]) : i[r][1] = e, this
    }, Li.prototype.clear = function() {
        this.__data__ = {
            hash: new _i,
            map: new(wi || Si),
            string: new _i
        }
    }, Li.prototype.delete = function(t) {
        return Mi(this, t).delete(t)
    }, Li.prototype.get = function(t) {
        return Mi(this, t).get(t)
    }, Li.prototype.has = function(t) {
        return Mi(this, t).has(t)
    }, Li.prototype.set = function(t, e) {
        return Mi(this, t).set(t, e), this
    }, Ti.Cache = Li;
    var ji = Ti,
        Ci = function() {
            if ("undefined" != typeof Map) return Map;

            function t(t, e) {
                var i = -1;
                return t.some(function(t, r) {
                    return t[0] === e && (i = r, !0)
                }), i
            }
            return function() {
                function e() {
                    this.__entries__ = []
                }
                return Object.defineProperty(e.prototype, "size", {
                    get: function() {
                        return this.__entries__.length
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype.get = function(e) {
                    var i = t(this.__entries__, e),
                        r = this.__entries__[i];
                    return r && r[1]
                }, e.prototype.set = function(e, i) {
                    var r = t(this.__entries__, e);
                    ~r ? this.__entries__[r][1] = i : this.__entries__.push([e, i])
                }, e.prototype.delete = function(e) {
                    var i = this.__entries__,
                        r = t(i, e);
                    ~r && i.splice(r, 1)
                }, e.prototype.has = function(e) {
                    return !!~t(this.__entries__, e)
                }, e.prototype.clear = function() {
                    this.__entries__.splice(0)
                }, e.prototype.forEach = function(t, e) {
                    void 0 === e && (e = null);
                    for (var i = 0, r = this.__entries__; i < r.length; i++) {
                        var n = r[i];
                        t.call(e, n[1], n[0])
                    }
                }, e
            }()
        }(),
        Ni = "undefined" != typeof window && "undefined" != typeof document && window.document === document,
        zi = "undefined" != typeof global && global.Math === Math ? global : "undefined" != typeof self && self.Math === Math ? self : "undefined" != typeof window && window.Math === Math ? window : Function("return this")(),
        Di = "function" == typeof requestAnimationFrame ? requestAnimationFrame.bind(zi) : function(t) {
            return setTimeout(function() {
                return t(Date.now())
            }, 1e3 / 60)
        },
        Vi = 2;
    var Bi = 20,
        Ii = ["top", "right", "bottom", "left", "width", "height", "size", "weight"],
        Pi = "undefined" != typeof MutationObserver,
        Hi = function() {
            function t() {
                this.connected_ = !1, this.mutationEventsAdded_ = !1, this.mutationsObserver_ = null, this.observers_ = [], this.onTransitionEnd_ = this.onTransitionEnd_.bind(this), this.refresh = function(t, e) {
                    var i = !1,
                        r = !1,
                        n = 0;

                    function s() {
                        i && (i = !1, t()), r && a()
                    }

                    function o() {
                        Di(s)
                    }

                    function a() {
                        var t = Date.now();
                        if (i) {
                            if (t - n < Vi) return;
                            r = !0
                        } else i = !0, r = !1, setTimeout(o, e);
                        n = t
                    }
                    return a
                }(this.refresh.bind(this), Bi)
            }
            return t.prototype.addObserver = function(t) {
                ~this.observers_.indexOf(t) || this.observers_.push(t), this.connected_ || this.connect_()
            }, t.prototype.removeObserver = function(t) {
                var e = this.observers_,
                    i = e.indexOf(t);
                ~i && e.splice(i, 1), !e.length && this.connected_ && this.disconnect_()
            }, t.prototype.refresh = function() {
                this.updateObservers_() && this.refresh()
            }, t.prototype.updateObservers_ = function() {
                var t = this.observers_.filter(function(t) {
                    return t.gatherActive(), t.hasActive()
                });
                return t.forEach(function(t) {
                    return t.broadcastActive()
                }), t.length > 0
            }, t.prototype.connect_ = function() {
                Ni && !this.connected_ && (document.addEventListener("transitionend", this.onTransitionEnd_), window.addEventListener("resize", this.refresh), Pi ? (this.mutationsObserver_ = new MutationObserver(this.refresh), this.mutationsObserver_.observe(document, {
                    attributes: !0,
                    childList: !0,
                    characterData: !0,
                    subtree: !0
                })) : (document.addEventListener("DOMSubtreeModified", this.refresh), this.mutationEventsAdded_ = !0), this.connected_ = !0)
            }, t.prototype.disconnect_ = function() {
                Ni && this.connected_ && (document.removeEventListener("transitionend", this.onTransitionEnd_), window.removeEventListener("resize", this.refresh), this.mutationsObserver_ && this.mutationsObserver_.disconnect(), this.mutationEventsAdded_ && document.removeEventListener("DOMSubtreeModified", this.refresh), this.mutationsObserver_ = null, this.mutationEventsAdded_ = !1, this.connected_ = !1)
            }, t.prototype.onTransitionEnd_ = function(t) {
                var e = t.propertyName,
                    i = void 0 === e ? "" : e;
                Ii.some(function(t) {
                    return !!~i.indexOf(t)
                }) && this.refresh()
            }, t.getInstance = function() {
                return this.instance_ || (this.instance_ = new t), this.instance_
            }, t.instance_ = null, t
        }(),
        qi = function(t, e) {
            for (var i = 0, r = Object.keys(e); i < r.length; i++) {
                var n = r[i];
                Object.defineProperty(t, n, {
                    value: e[n],
                    enumerable: !1,
                    writable: !1,
                    configurable: !0
                })
            }
            return t
        },
        Fi = function(t) {
            return t && t.ownerDocument && t.ownerDocument.defaultView || zi
        },
        $i = Ji(0, 0, 0, 0);

    function Yi(t) {
        return parseFloat(t) || 0
    }

    function Xi(t) {
        for (var e = [], i = 1; i < arguments.length; i++) e[i - 1] = arguments[i];
        return e.reduce(function(e, i) {
            return e + Yi(t["border-" + i + "-width"])
        }, 0)
    }

    function Gi(t) {
        var e = t.clientWidth,
            i = t.clientHeight;
        if (!e && !i) return $i;
        var r = Fi(t).getComputedStyle(t),
            n = function(t) {
                for (var e = {}, i = 0, r = ["top", "right", "bottom", "left"]; i < r.length; i++) {
                    var n = r[i],
                        s = t["padding-" + n];
                    e[n] = Yi(s)
                }
                return e
            }(r),
            s = n.left + n.right,
            o = n.top + n.bottom,
            a = Yi(r.width),
            l = Yi(r.height);
        if ("border-box" === r.boxSizing && (Math.round(a + s) !== e && (a -= Xi(r, "left", "right") + s), Math.round(l + o) !== i && (l -= Xi(r, "top", "bottom") + o)), ! function(t) {
                return t === Fi(t).document.documentElement
            }(t)) {
            var c = Math.round(a + s) - e,
                u = Math.round(l + o) - i;
            1 !== Math.abs(c) && (a -= c), 1 !== Math.abs(u) && (l -= u)
        }
        return Ji(n.left, n.top, a, l)
    }
    var Ki = "undefined" != typeof SVGGraphicsElement ? function(t) {
        return t instanceof Fi(t).SVGGraphicsElement
    } : function(t) {
        return t instanceof Fi(t).SVGElement && "function" == typeof t.getBBox
    };

    function Ui(t) {
        return Ni ? Ki(t) ? function(t) {
            var e = t.getBBox();
            return Ji(0, 0, e.width, e.height)
        }(t) : Gi(t) : $i
    }

    function Ji(t, e, i, r) {
        return {
            x: t,
            y: e,
            width: i,
            height: r
        }
    }
    var Qi = function() {
            function t(t) {
                this.broadcastWidth = 0, this.broadcastHeight = 0, this.contentRect_ = Ji(0, 0, 0, 0), this.target = t
            }
            return t.prototype.isActive = function() {
                var t = Ui(this.target);
                return this.contentRect_ = t, t.width !== this.broadcastWidth || t.height !== this.broadcastHeight
            }, t.prototype.broadcastRect = function() {
                var t = this.contentRect_;
                return this.broadcastWidth = t.width, this.broadcastHeight = t.height, t
            }, t
        }(),
        Zi = function() {
            return function(t, e) {
                var i, r, n, s, o, a, l, c = (r = (i = e).x, n = i.y, s = i.width, o = i.height, a = "undefined" != typeof DOMRectReadOnly ? DOMRectReadOnly : Object, l = Object.create(a.prototype), qi(l, {
                    x: r,
                    y: n,
                    width: s,
                    height: o,
                    top: n,
                    right: r + s,
                    bottom: o + n,
                    left: r
                }), l);
                qi(this, {
                    target: t,
                    contentRect: c
                })
            }
        }(),
        tr = function() {
            function t(t, e, i) {
                if (this.activeObservations_ = [], this.observations_ = new Ci, "function" != typeof t) throw new TypeError("The callback provided as parameter 1 is not a function.");
                this.callback_ = t, this.controller_ = e, this.callbackCtx_ = i
            }
            return t.prototype.observe = function(t) {
                if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                if ("undefined" != typeof Element && Element instanceof Object) {
                    if (!(t instanceof Fi(t).Element)) throw new TypeError('parameter 1 is not of type "Element".');
                    var e = this.observations_;
                    e.has(t) || (e.set(t, new Qi(t)), this.controller_.addObserver(this), this.controller_.refresh())
                }
            }, t.prototype.unobserve = function(t) {
                if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                if ("undefined" != typeof Element && Element instanceof Object) {
                    if (!(t instanceof Fi(t).Element)) throw new TypeError('parameter 1 is not of type "Element".');
                    var e = this.observations_;
                    e.has(t) && (e.delete(t), e.size || this.controller_.removeObserver(this))
                }
            }, t.prototype.disconnect = function() {
                this.clearActive(), this.observations_.clear(), this.controller_.removeObserver(this)
            }, t.prototype.gatherActive = function() {
                var t = this;
                this.clearActive(), this.observations_.forEach(function(e) {
                    e.isActive() && t.activeObservations_.push(e)
                })
            }, t.prototype.broadcastActive = function() {
                if (this.hasActive()) {
                    var t = this.callbackCtx_,
                        e = this.activeObservations_.map(function(t) {
                            return new Zi(t.target, t.broadcastRect())
                        });
                    this.callback_.call(t, e, t), this.clearActive()
                }
            }, t.prototype.clearActive = function() {
                this.activeObservations_.splice(0)
            }, t.prototype.hasActive = function() {
                return this.activeObservations_.length > 0
            }, t
        }(),
        er = "undefined" != typeof WeakMap ? new WeakMap : new Ci,
        ir = function() {
            return function t(e) {
                if (!(this instanceof t)) throw new TypeError("Cannot call a class as a function.");
                if (!arguments.length) throw new TypeError("1 argument required, but only 0 present.");
                var i = Hi.getInstance(),
                    r = new tr(e, i, this);
                er.set(this, r)
            }
        }();
    ["observe", "unobserve", "disconnect"].forEach(function(t) {
        ir.prototype[t] = function() {
            var e;
            return (e = er.get(this))[t].apply(e, arguments)
        }
    });
    var rr = void 0 !== zi.ResizeObserver ? zi.ResizeObserver : ir,
        nr = !("undefined" == typeof window || !window.document || !window.document.createElement);

    function sr() {
        if ("undefined" == typeof document) return 0;
        var t = document.body,
            e = document.createElement("div"),
            i = e.style;
        i.position = "fixed", i.left = 0, i.visibility = "hidden", i.overflowY = "scroll", t.appendChild(e);
        var r = e.getBoundingClientRect().right;
        return t.removeChild(e), r
    }
    var or = function() {
        function t(e, i) {
            var r = this;
            this.onScroll = function() {
                r.scrollXTicking || (window.requestAnimationFrame(r.scrollX), r.scrollXTicking = !0), r.scrollYTicking || (window.requestAnimationFrame(r.scrollY), r.scrollYTicking = !0)
            }, this.scrollX = function() {
                r.axis.x.isOverflowing && (r.showScrollbar("x"), r.positionScrollbar("x")), r.scrollXTicking = !1
            }, this.scrollY = function() {
                r.axis.y.isOverflowing && (r.showScrollbar("y"), r.positionScrollbar("y")), r.scrollYTicking = !1
            }, this.onMouseEnter = function() {
                r.showScrollbar("x"), r.showScrollbar("y")
            }, this.onMouseMove = function(t) {
                r.mouseX = t.clientX, r.mouseY = t.clientY, (r.axis.x.isOverflowing || r.axis.x.forceVisible) && r.onMouseMoveForAxis("x"), (r.axis.y.isOverflowing || r.axis.y.forceVisible) && r.onMouseMoveForAxis("y")
            }, this.onMouseLeave = function() {
                r.onMouseMove.cancel(), (r.axis.x.isOverflowing || r.axis.x.forceVisible) && r.onMouseLeaveForAxis("x"), (r.axis.y.isOverflowing || r.axis.y.forceVisible) && r.onMouseLeaveForAxis("y"), r.mouseX = -1, r.mouseY = -1
            }, this.onWindowResize = function() {
                r.scrollbarWidth = sr(), r.hideNativeScrollbar()
            }, this.hideScrollbars = function() {
                r.axis.x.track.rect = r.axis.x.track.el.getBoundingClientRect(), r.axis.y.track.rect = r.axis.y.track.el.getBoundingClientRect(), r.isWithinBounds(r.axis.y.track.rect) || (r.axis.y.scrollbar.el.classList.remove(r.classNames.visible), r.axis.y.isVisible = !1), r.isWithinBounds(r.axis.x.track.rect) || (r.axis.x.scrollbar.el.classList.remove(r.classNames.visible), r.axis.x.isVisible = !1)
            }, this.onPointerEvent = function(t) {
                var e, i;
                r.axis.x.scrollbar.rect = r.axis.x.scrollbar.el.getBoundingClientRect(), r.axis.y.scrollbar.rect = r.axis.y.scrollbar.el.getBoundingClientRect(), (r.axis.x.isOverflowing || r.axis.x.forceVisible) && (i = r.isWithinBounds(r.axis.x.scrollbar.rect)), (r.axis.y.isOverflowing || r.axis.y.forceVisible) && (e = r.isWithinBounds(r.axis.y.scrollbar.rect)), (e || i) && (t.preventDefault(), t.stopPropagation(), "mousedown" === t.type && (e && r.onDragStart(t, "y"), i && r.onDragStart(t, "x")))
            }, this.drag = function(e) {
                var i = r.axis[r.draggedAxis].track,
                    n = i.rect[r.axis[r.draggedAxis].sizeAttr],
                    s = r.axis[r.draggedAxis].scrollbar;
                e.preventDefault(), e.stopPropagation();
                var o = (("y" === r.draggedAxis ? e.pageY : e.pageX) - i.rect[r.axis[r.draggedAxis].offsetAttr] - r.axis[r.draggedAxis].dragOffset) / i.rect[r.axis[r.draggedAxis].sizeAttr] * r.contentWrapperEl[r.axis[r.draggedAxis].scrollSizeAttr];
                "x" === r.draggedAxis && (o = r.isRtl && t.getRtlHelpers().isRtlScrollbarInverted ? o - (n + s.size) : o, o = r.isRtl && t.getRtlHelpers().isRtlScrollingInverted ? -o : o), r.contentWrapperEl[r.axis[r.draggedAxis].scrollOffsetAttr] = o
            }, this.onEndDrag = function(t) {
                t.preventDefault(), t.stopPropagation(), r.el.classList.remove(r.classNames.dragging), document.removeEventListener("mousemove", r.drag, !0), document.removeEventListener("mouseup", r.onEndDrag, !0), r.removePreventClickId = window.setTimeout(function() {
                    document.removeEventListener("click", r.preventClick, !0), document.removeEventListener("dblclick", r.preventClick, !0), r.removePreventClickId = null
                })
            }, this.preventClick = function(t) {
                t.preventDefault(), t.stopPropagation()
            }, this.el = e, this.flashTimeout, this.contentEl, this.contentWrapperEl, this.offsetEl, this.maskEl, this.globalObserver, this.mutationObserver, this.resizeObserver, this.scrollbarWidth, this.minScrollbarWidth = 20, this.options = Object.assign({}, t.defaultOptions, i), this.classNames = Object.assign({}, t.defaultOptions.classNames, this.options.classNames), this.isRtl, this.axis = {
                x: {
                    scrollOffsetAttr: "scrollLeft",
                    sizeAttr: "width",
                    scrollSizeAttr: "scrollWidth",
                    offsetAttr: "left",
                    overflowAttr: "overflowX",
                    dragOffset: 0,
                    isOverflowing: !0,
                    isVisible: !1,
                    forceVisible: !1,
                    track: {},
                    scrollbar: {}
                },
                y: {
                    scrollOffsetAttr: "scrollTop",
                    sizeAttr: "height",
                    scrollSizeAttr: "scrollHeight",
                    offsetAttr: "top",
                    overflowAttr: "overflowY",
                    dragOffset: 0,
                    isOverflowing: !0,
                    isVisible: !1,
                    forceVisible: !1,
                    track: {},
                    scrollbar: {}
                }
            }, this.removePreventClickId = null, this.el.SimpleBar || (this.recalculate = Be(this.recalculate.bind(this), 64), this.onMouseMove = Be(this.onMouseMove.bind(this), 64), this.hideScrollbars = ri(this.hideScrollbars.bind(this), this.options.timeout), this.onWindowResize = ri(this.onWindowResize.bind(this), 64, {
                leading: !0
            }), t.getRtlHelpers = ji(t.getRtlHelpers), this.init())
        }
        t.getRtlHelpers = function() {
            var e = document.createElement("div");
            e.innerHTML = '<div class="hs-dummy-scrollbar-size"><div style="height: 200%; width: 200%; margin: 10px 0;"></div></div>';
            var i = e.firstElementChild;
            document.body.appendChild(i);
            var r = i.firstElementChild;
            i.scrollLeft = 0;
            var n = t.getOffset(i),
                s = t.getOffset(r);
            i.scrollLeft = 999;
            var o = t.getOffset(r);
            return {
                isRtlScrollingInverted: n.left !== s.left && s.left - o.left != 0,
                isRtlScrollbarInverted: n.left !== s.left
            }
        }, t.initHtmlApi = function() {
            this.initDOMLoadedElements = this.initDOMLoadedElements.bind(this), "undefined" != typeof MutationObserver && (this.globalObserver = new MutationObserver(function(e) {
                e.forEach(function(e) {
                    Array.prototype.forEach.call(e.addedNodes, function(e) {
                        1 === e.nodeType && (e.hasAttribute("data-simplebar") ? !e.SimpleBar && new t(e, t.getElOptions(e)) : Array.prototype.forEach.call(e.querySelectorAll("[data-simplebar]"), function(e) {
                            !e.SimpleBar && new t(e, t.getElOptions(e))
                        }))
                    }), Array.prototype.forEach.call(e.removedNodes, function(t) {
                        1 === t.nodeType && (t.hasAttribute("data-simplebar") ? t.SimpleBar && t.SimpleBar.unMount() : Array.prototype.forEach.call(t.querySelectorAll("[data-simplebar]"), function(t) {
                            t.SimpleBar && t.SimpleBar.unMount()
                        }))
                    })
                })
            }), this.globalObserver.observe(document, {
                childList: !0,
                subtree: !0
            })), "complete" === document.readyState || "loading" !== document.readyState && !document.documentElement.doScroll ? window.setTimeout(this.initDOMLoadedElements) : (document.addEventListener("DOMContentLoaded", this.initDOMLoadedElements), window.addEventListener("load", this.initDOMLoadedElements))
        }, t.getElOptions = function(t) {
            return Array.prototype.reduce.call(t.attributes, function(t, e) {
                var i = e.name.match(/data-simplebar-(.+)/);
                if (i) {
                    var r = i[1].replace(/\W+(.)/g, function(t, e) {
                        return e.toUpperCase()
                    });
                    switch (e.value) {
                        case "true":
                            t[r] = !0;
                            break;
                        case "false":
                            t[r] = !1;
                            break;
                        case void 0:
                            t[r] = !0;
                            break;
                        default:
                            t[r] = e.value
                    }
                }
                return t
            }, {})
        }, t.removeObserver = function() {
            this.globalObserver.disconnect()
        }, t.initDOMLoadedElements = function() {
            document.removeEventListener("DOMContentLoaded", this.initDOMLoadedElements), window.removeEventListener("load", this.initDOMLoadedElements), Array.prototype.forEach.call(document.querySelectorAll("[data-simplebar]"), function(e) {
                e.SimpleBar || new t(e, t.getElOptions(e))
            })
        }, t.getOffset = function(t) {
            var e = t.getBoundingClientRect();
            return {
                top: e.top + (window.pageYOffset || document.documentElement.scrollTop),
                left: e.left + (window.pageXOffset || document.documentElement.scrollLeft)
            }
        };
        var e = t.prototype;
        return e.init = function() {
            this.el.SimpleBar = this, nr && (this.initDOM(), this.scrollbarWidth = sr(), this.recalculate(), this.initListeners())
        }, e.initDOM = function() {
            var t = this;
            if (Array.prototype.filter.call(this.el.children, function(e) {
                    return e.classList.contains(t.classNames.wrapper)
                }).length) this.wrapperEl = this.el.querySelector("." + this.classNames.wrapper), this.contentWrapperEl = this.el.querySelector("." + this.classNames.contentWrapper), this.offsetEl = this.el.querySelector("." + this.classNames.offset), this.maskEl = this.el.querySelector("." + this.classNames.mask), this.contentEl = this.el.querySelector("." + this.classNames.contentEl), this.placeholderEl = this.el.querySelector("." + this.classNames.placeholder), this.heightAutoObserverWrapperEl = this.el.querySelector("." + this.classNames.heightAutoObserverWrapperEl), this.heightAutoObserverEl = this.el.querySelector("." + this.classNames.heightAutoObserverEl), this.axis.x.track.el = this.el.querySelector("." + this.classNames.track + "." + this.classNames.horizontal), this.axis.y.track.el = this.el.querySelector("." + this.classNames.track + "." + this.classNames.vertical);
            else {
                for (this.wrapperEl = document.createElement("div"), this.contentWrapperEl = document.createElement("div"), this.offsetEl = document.createElement("div"), this.maskEl = document.createElement("div"), this.contentEl = document.createElement("div"), this.placeholderEl = document.createElement("div"), this.heightAutoObserverWrapperEl = document.createElement("div"), this.heightAutoObserverEl = document.createElement("div"), this.wrapperEl.classList.add(this.classNames.wrapper), this.contentWrapperEl.classList.add(this.classNames.contentWrapper), this.offsetEl.classList.add(this.classNames.offset), this.maskEl.classList.add(this.classNames.mask), this.contentEl.classList.add(this.classNames.contentEl), this.placeholderEl.classList.add(this.classNames.placeholder), this.heightAutoObserverWrapperEl.classList.add(this.classNames.heightAutoObserverWrapperEl), this.heightAutoObserverEl.classList.add(this.classNames.heightAutoObserverEl); this.el.firstChild;) this.contentEl.appendChild(this.el.firstChild);
                this.contentWrapperEl.appendChild(this.contentEl), this.offsetEl.appendChild(this.contentWrapperEl), this.maskEl.appendChild(this.offsetEl), this.heightAutoObserverWrapperEl.appendChild(this.heightAutoObserverEl), this.wrapperEl.appendChild(this.heightAutoObserverWrapperEl), this.wrapperEl.appendChild(this.maskEl), this.wrapperEl.appendChild(this.placeholderEl), this.el.appendChild(this.wrapperEl)
            }
            if (!this.axis.x.track.el || !this.axis.y.track.el) {
                var e = document.createElement("div"),
                    i = document.createElement("div");
                e.classList.add(this.classNames.track), i.classList.add(this.classNames.scrollbar), e.appendChild(i), this.axis.x.track.el = e.cloneNode(!0), this.axis.x.track.el.classList.add(this.classNames.horizontal), this.axis.y.track.el = e.cloneNode(!0), this.axis.y.track.el.classList.add(this.classNames.vertical), this.el.appendChild(this.axis.x.track.el), this.el.appendChild(this.axis.y.track.el)
            }
            this.axis.x.scrollbar.el = this.axis.x.track.el.querySelector("." + this.classNames.scrollbar), this.axis.y.scrollbar.el = this.axis.y.track.el.querySelector("." + this.classNames.scrollbar), this.options.autoHide || (this.axis.x.scrollbar.el.classList.add(this.classNames.visible), this.axis.y.scrollbar.el.classList.add(this.classNames.visible)), this.el.setAttribute("data-simplebar", "init")
        }, e.initListeners = function() {
            var t = this;
            this.options.autoHide && this.el.addEventListener("mouseenter", this.onMouseEnter), ["mousedown", "click", "dblclick", "touchstart", "touchend", "touchmove"].forEach(function(e) {
                t.el.addEventListener(e, t.onPointerEvent, !0)
            }), this.el.addEventListener("mousemove", this.onMouseMove), this.el.addEventListener("mouseleave", this.onMouseLeave), this.contentWrapperEl.addEventListener("scroll", this.onScroll), window.addEventListener("resize", this.onWindowResize), this.resizeObserver = new rr(this.recalculate), this.resizeObserver.observe(this.el), this.resizeObserver.observe(this.contentEl)
        }, e.recalculate = function() {
            var t = this.heightAutoObserverEl.offsetHeight <= 1,
                e = this.heightAutoObserverEl.offsetWidth <= 1;
            this.elStyles = window.getComputedStyle(this.el), this.isRtl = "rtl" === this.elStyles.direction, this.contentEl.style.padding = this.elStyles.paddingTop + " " + this.elStyles.paddingRight + " " + this.elStyles.paddingBottom + " " + this.elStyles.paddingLeft, this.wrapperEl.style.margin = "-" + this.elStyles.paddingTop + " -" + this.elStyles.paddingRight + " -" + this.elStyles.paddingBottom + " -" + this.elStyles.paddingLeft, this.contentWrapperEl.style.height = t ? "auto" : "100%", this.placeholderEl.style.width = e ? this.contentEl.offsetWidth + "px" : "auto", this.placeholderEl.style.height = this.contentEl.scrollHeight + "px", this.axis.x.isOverflowing = this.contentWrapperEl.scrollWidth > this.contentWrapperEl.offsetWidth, this.axis.y.isOverflowing = this.contentWrapperEl.scrollHeight > this.contentWrapperEl.offsetHeight, this.axis.x.isOverflowing = "hidden" !== this.elStyles.overflowX && this.axis.x.isOverflowing, this.axis.y.isOverflowing = "hidden" !== this.elStyles.overflowY && this.axis.y.isOverflowing, this.axis.x.forceVisible = "x" === this.options.forceVisible || !0 === this.options.forceVisible, this.axis.y.forceVisible = "y" === this.options.forceVisible || !0 === this.options.forceVisible, this.hideNativeScrollbar(), this.axis.x.track.rect = this.axis.x.track.el.getBoundingClientRect(), this.axis.y.track.rect = this.axis.y.track.el.getBoundingClientRect(), this.axis.x.scrollbar.size = this.getScrollbarSize("x"), this.axis.y.scrollbar.size = this.getScrollbarSize("y"), this.axis.x.scrollbar.el.style.width = this.axis.x.scrollbar.size + "px", this.axis.y.scrollbar.el.style.height = this.axis.y.scrollbar.size + "px", this.positionScrollbar("x"), this.positionScrollbar("y"), this.toggleTrackVisibility("x"), this.toggleTrackVisibility("y")
        }, e.getScrollbarSize = function(t) {
            void 0 === t && (t = "y");
            var e, i = this.scrollbarWidth ? this.contentWrapperEl[this.axis[t].scrollSizeAttr] : this.contentWrapperEl[this.axis[t].scrollSizeAttr] - this.minScrollbarWidth,
                r = this.axis[t].track.rect[this.axis[t].sizeAttr];
            if (this.axis[t].isOverflowing) {
                var n = r / i;
                return e = Math.max(~~(n * r), this.options.scrollbarMinSize), this.options.scrollbarMaxSize && (e = Math.min(e, this.options.scrollbarMaxSize)), e
            }
        }, e.positionScrollbar = function(e) {
            void 0 === e && (e = "y");
            var i = this.contentWrapperEl[this.axis[e].scrollSizeAttr],
                r = this.axis[e].track.rect[this.axis[e].sizeAttr],
                n = parseInt(this.elStyles[this.axis[e].sizeAttr], 10),
                s = this.axis[e].scrollbar,
                o = this.contentWrapperEl[this.axis[e].scrollOffsetAttr],
                a = (o = "x" === e && this.isRtl && t.getRtlHelpers().isRtlScrollingInverted ? -o : o) / (i - n),
                l = ~~((r - s.size) * a);
            l = "x" === e && this.isRtl && t.getRtlHelpers().isRtlScrollbarInverted ? l + (r - s.size) : l, s.el.style.transform = "x" === e ? "translate3d(" + l + "px, 0, 0)" : "translate3d(0, " + l + "px, 0)"
        }, e.toggleTrackVisibility = function(t) {
            void 0 === t && (t = "y");
            var e = this.axis[t].track.el,
                i = this.axis[t].scrollbar.el;
            this.axis[t].isOverflowing || this.axis[t].forceVisible ? (e.style.visibility = "visible", this.contentWrapperEl.style[this.axis[t].overflowAttr] = "scroll") : (e.style.visibility = "hidden", this.contentWrapperEl.style[this.axis[t].overflowAttr] = "hidden"), this.axis[t].isOverflowing ? i.style.display = "block" : i.style.display = "none"
        }, e.hideNativeScrollbar = function() {
            if (this.offsetEl.style[this.isRtl ? "left" : "right"] = this.axis.y.isOverflowing || this.axis.y.forceVisible ? "-" + (this.scrollbarWidth || this.minScrollbarWidth) + "px" : 0, this.offsetEl.style.bottom = this.axis.x.isOverflowing || this.axis.x.forceVisible ? "-" + (this.scrollbarWidth || this.minScrollbarWidth) + "px" : 0, !this.scrollbarWidth) {
                var t = [this.isRtl ? "paddingLeft" : "paddingRight"];
                this.contentWrapperEl.style[t] = this.axis.y.isOverflowing || this.axis.y.forceVisible ? this.minScrollbarWidth + "px" : 0, this.contentWrapperEl.style.paddingBottom = this.axis.x.isOverflowing || this.axis.x.forceVisible ? this.minScrollbarWidth + "px" : 0
            }
        }, e.onMouseMoveForAxis = function(t) {
            void 0 === t && (t = "y"), this.axis[t].track.rect = this.axis[t].track.el.getBoundingClientRect(), this.axis[t].scrollbar.rect = this.axis[t].scrollbar.el.getBoundingClientRect(), this.isWithinBounds(this.axis[t].scrollbar.rect) ? this.axis[t].scrollbar.el.classList.add(this.classNames.hover) : this.axis[t].scrollbar.el.classList.remove(this.classNames.hover), this.isWithinBounds(this.axis[t].track.rect) ? (this.showScrollbar(t), this.axis[t].track.el.classList.add(this.classNames.hover)) : this.axis[t].track.el.classList.remove(this.classNames.hover)
        }, e.onMouseLeaveForAxis = function(t) {
            void 0 === t && (t = "y"), this.axis[t].track.el.classList.remove(this.classNames.hover), this.axis[t].scrollbar.el.classList.remove(this.classNames.hover)
        }, e.showScrollbar = function(t) {
            void 0 === t && (t = "y");
            var e = this.axis[t].scrollbar.el;
            this.axis[t].isVisible || (e.classList.add(this.classNames.visible), this.axis[t].isVisible = !0), this.options.autoHide && this.hideScrollbars()
        }, e.onDragStart = function(t, e) {
            void 0 === e && (e = "y");
            var i = this.axis[e].scrollbar.el,
                r = "y" === e ? t.pageY : t.pageX;
            this.axis[e].dragOffset = r - i.getBoundingClientRect()[this.axis[e].offsetAttr], this.draggedAxis = e, this.el.classList.add(this.classNames.dragging), document.addEventListener("mousemove", this.drag, !0), document.addEventListener("mouseup", this.onEndDrag, !0), null === this.removePreventClickId ? (document.addEventListener("click", this.preventClick, !0), document.addEventListener("dblclick", this.preventClick, !0)) : (window.clearTimeout(this.removePreventClickId), this.removePreventClickId = null)
        }, e.getContentElement = function() {
            return this.contentEl
        }, e.getScrollElement = function() {
            return this.contentWrapperEl
        }, e.removeListeners = function() {
            var t = this;
            this.options.autoHide && this.el.removeEventListener("mouseenter", this.onMouseEnter), ["mousedown", "click", "dblclick", "touchstart", "touchend", "touchmove"].forEach(function(e) {
                t.el.removeEventListener(e, t.onPointerEvent)
            }), this.el.removeEventListener("mousemove", this.onMouseMove), this.el.removeEventListener("mouseleave", this.onMouseLeave), this.contentWrapperEl.removeEventListener("scroll", this.onScroll), window.removeEventListener("resize", this.onWindowResize), this.mutationObserver && this.mutationObserver.disconnect(), this.resizeObserver.disconnect(), this.recalculate.cancel(), this.onMouseMove.cancel(), this.hideScrollbars.cancel(), this.onWindowResize.cancel()
        }, e.unMount = function() {
            this.removeListeners(), this.el.SimpleBar = null
        }, e.isChildNode = function(t) {
            return null !== t && (t === this.el || this.isChildNode(t.parentNode))
        }, e.isWithinBounds = function(t) {
            return this.mouseX >= t.left && this.mouseX <= t.left + t.width && this.mouseY >= t.top && this.mouseY <= t.top + t.height
        }, t
    }();
    return or.defaultOptions = {
        autoHide: !0,
        forceVisible: !1,
        classNames: {
            contentEl: "simplebar-content",
            contentWrapper: "simplebar-content-wrapper",
            offset: "simplebar-offset",
            mask: "simplebar-mask",
            wrapper: "simplebar-wrapper",
            placeholder: "simplebar-placeholder",
            scrollbar: "simplebar-scrollbar",
            track: "simplebar-track",
            heightAutoObserverWrapperEl: "simplebar-height-auto-observer-wrapper",
            heightAutoObserverEl: "simplebar-height-auto-observer",
            visible: "simplebar-visible",
            horizontal: "simplebar-horizontal",
            vertical: "simplebar-vertical",
            hover: "simplebar-hover",
            dragging: "simplebar-dragging"
        },
        scrollbarMinSize: 25,
        scrollbarMaxSize: 0,
        timeout: 1e3
    }, nr && or.initHtmlApi(), or
});

/**
 * PrintThis
 */
! function(S) {
    function b(e, t) {
        t && e.append(t.jquery ? t.clone() : t)
    }

    function g(e, t, n) {
        var i, a, o, r = t.clone(n.formValues);
        n.formValues && (i = r, a = "select, textarea", o = t.find(a), i.find(a).each(function(e, t) {
            S(t).val(o.eq(e).val())
        })), n.removeScripts && r.find("script").remove(), n.printContainer ? r.appendTo(e) : r.each(function() {
            S(this).children().appendTo(e)
        })
    }
    var C;
    S.fn.printThis = function(e) {
        C = S.extend({}, S.fn.printThis.defaults, e);
        var v = this instanceof jQuery ? this : S(this),
            t = "printThis-" + (new Date).getTime();
        if (window.location.hostname !== document.domain && navigator.userAgent.match(/msie/i)) {
            var n = 'javascript:document.write("<head><script>document.domain=\\"' + document.domain + '\\";<\/script></head><body></body>")',
                i = document.createElement("iframe");
            i.name = "printIframe", i.id = t, i.className = "MSIE", document.body.appendChild(i), i.src = n
        } else {
            S("<iframe id='" + t + "' name='printIframe' />").appendTo("body")
        }
        var y = S("#" + t);
        C.debug || y.css({
            position: "absolute",
            width: "0px",
            height: "0px",
            left: "-600px",
            top: "-600px"
        }), "function" == typeof C.beforePrint && C.beforePrint(), setTimeout(function() {
            var e, t, n, i;
            C.doctypeString && (e = y, t = C.doctypeString, (i = (n = (n = e.get(0)).contentWindow || n.contentDocument || n).document || n.contentDocument || n).open(), i.write(t), i.close());
            var a, o = y.contents(),
                r = o.find("head"),
                s = o.find("body"),
                c = S("base");
            a = !0 === C.base && 0 < c.length ? c.attr("href") : "string" == typeof C.base ? C.base : document.location.protocol + "//" + document.location.host, r.append('<base href="' + a + '">'), C.importCSS && S("link[rel=stylesheet]").each(function() {
                var e = S(this).attr("href");
                if (e) {
                    var t = S(this).attr("media") || "all";
                    r.append("<link type='text/css' rel='stylesheet' href='" + e + "' media='" + t + "'>")
                }
            }), C.importStyle && S("style").each(function() {
                r.append(this.outerHTML)
            }), C.pageTitle && r.append("<title>" + C.pageTitle + "</title>"), C.loadCSS && (S.isArray(C.loadCSS) ? jQuery.each(C.loadCSS, function(e, t) {
                r.append("<link type='text/css' rel='stylesheet' href='" + this + "'>")
            }) : r.append("<link type='text/css' rel='stylesheet' href='" + C.loadCSS + "'>"));
            var d = S("html")[0];
            o.find("html").prop("style", d.style.cssText);
            var l, p, f, m = C.copyTagClasses;
            if (m && (-1 !== (m = !0 === m ? "bh" : m).indexOf("b") && s.addClass(S("body")[0].className), -1 !== m.indexOf("h") && o.find("html").addClass(d.className)), b(s, C.header), C.canvas) {
                var u = 0;
                v.find("canvas").addBack("canvas").each(function() {
                    S(this).attr("data-printthis", u++)
                })
            }
            if (g(s, v, C), C.canvas && s.find("canvas").each(function() {
                    var e = S(this).data("printthis"),
                        t = S('[data-printthis="' + e + '"]');
                    this.getContext("2d").drawImage(t[0], 0, 0), S.isFunction(S.fn.removeAttr) ? t.removeAttr("data-printthis") : S.each(t, function(e, t) {
                        t.removeAttribute("data-printthis")
                    })
                }), C.removeInline) {
                var h = C.removeInlineSelector || "*";
                S.isFunction(S.removeAttr) ? s.find(h).removeAttr("style") : s.find(h).attr("style", "")
            }
            b(s, C.footer), l = y, p = C.beforePrint, f = (f = l.get(0)).contentWindow || f.contentDocument || f, "function" == typeof p && ("matchMedia" in f ? f.matchMedia("print").addListener(function(e) {
                e.matches && p()
            }) : f.onbeforeprint = p), setTimeout(function() {
                y.hasClass("MSIE") ? (window.frames.printIframe.focus(), r.append("<script>  window.print(); <\/script>")) : document.queryCommandSupported("print") ? y[0].contentWindow.document.execCommand("print", !1, null) : (y[0].contentWindow.focus(), y[0].contentWindow.print()), C.debug || setTimeout(function() {
                    y.remove()
                }, 1e3), "function" == typeof C.afterPrint && C.afterPrint()
            }, C.printDelay)
        }, 333)
    }, S.fn.printThis.defaults = {
        debug: !1,
        importCSS: !0,
        importStyle: !1,
        printContainer: !0,
        loadCSS: "",
        pageTitle: "",
        removeInline: !1,
        removeInlineSelector: "*",
        printDelay: 333,
        header: null,
        footer: null,
        base: !1,
        formValues: !0,
        canvas: !1,
        doctypeString: "<!DOCTYPE html>",
        removeScripts: !1,
        copyTagClasses: !1,
        beforePrintEvent: null,
        beforePrint: null,
        afterPrint: null
    }
}(jQuery);


/**
 * Tooltipster
 */

/*! tooltipster v4.2.6 */
! function(a, b) {
    "function" == typeof define && define.amd ? define(["jquery"], function(a) {
        return b(a)
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery)
}(this, function(a) {
    function b(a) {
        this.$container, this.constraints = null, this.__$tooltip, this.__init(a)
    }

    function c(b, c) {
        var d = !0;
        return a.each(b, function(a, e) {
            return void 0 === c[a] || b[a] !== c[a] ? (d = !1, !1) : void 0
        }), d
    }

    function d(b) {
        var c = b.attr("id"),
            d = c ? h.window.document.getElementById(c) : null;
        return d ? d === b[0] : a.contains(h.window.document.body, b[0])
    }

    function e() {
        if (!g) return !1;
        var a = g.document.body || g.document.documentElement,
            b = a.style,
            c = "transition",
            d = ["Moz", "Webkit", "Khtml", "O", "ms"];
        if ("string" == typeof b[c]) return !0;
        c = c.charAt(0).toUpperCase() + c.substr(1);
        for (var e = 0; e < d.length; e++)
            if ("string" == typeof b[d[e] + c]) return !0;
        return !1
    }
    var f = {
            animation: "fade",
            animationDuration: 350,
            content: null,
            contentAsHTML: !1,
            contentCloning: !1,
            debug: !0,
            delay: 300,
            delayTouch: [300, 500],
            functionInit: null,
            functionBefore: null,
            functionReady: null,
            functionAfter: null,
            functionFormat: null,
            IEmin: 6,
            interactive: !1,
            multiple: !1,
            parent: null,
            plugins: ["sideTip"],
            repositionOnScroll: !1,
            restoration: "none",
            selfDestruction: !0,
            theme: [],
            timer: 0,
            trackerInterval: 500,
            trackOrigin: !1,
            trackTooltip: !1,
            trigger: "hover",
            triggerClose: {
                click: !1,
                mouseleave: !1,
                originClick: !1,
                scroll: !1,
                tap: !1,
                touchleave: !1
            },
            triggerOpen: {
                click: !1,
                mouseenter: !1,
                tap: !1,
                touchstart: !1
            },
            updateAnimation: "rotate",
            zIndex: 9999999
        },
        g = "undefined" != typeof window ? window : null,
        h = {
            hasTouchCapability: !(!g || !("ontouchstart" in g || g.DocumentTouch && g.document instanceof g.DocumentTouch || g.navigator.maxTouchPoints)),
            hasTransitions: e(),
            IE: !1,
            semVer: "4.2.6",
            window: g
        },
        i = function() {
            this.__$emitterPrivate = a({}), this.__$emitterPublic = a({}), this.__instancesLatestArr = [], this.__plugins = {}, this._env = h
        };
    i.prototype = {
        __bridge: function(b, c, d) {
            if (!c[d]) {
                var e = function() {};
                e.prototype = b;
                var g = new e;
                g.__init && g.__init(c), a.each(b, function(a, b) {
                    0 != a.indexOf("__") && (c[a] ? f.debug && console.log("The " + a + " method of the " + d + " plugin conflicts with another plugin or native methods") : (c[a] = function() {
                        return g[a].apply(g, Array.prototype.slice.apply(arguments))
                    }, c[a].bridged = g))
                }), c[d] = g
            }
            return this
        },
        __setWindow: function(a) {
            return h.window = a, this
        },
        _getRuler: function(a) {
            return new b(a)
        },
        _off: function() {
            return this.__$emitterPrivate.off.apply(this.__$emitterPrivate, Array.prototype.slice.apply(arguments)), this
        },
        _on: function() {
            return this.__$emitterPrivate.on.apply(this.__$emitterPrivate, Array.prototype.slice.apply(arguments)), this
        },
        _one: function() {
            return this.__$emitterPrivate.one.apply(this.__$emitterPrivate, Array.prototype.slice.apply(arguments)), this
        },
        _plugin: function(b) {
            var c = this;
            if ("string" == typeof b) {
                var d = b,
                    e = null;
                return d.indexOf(".") > 0 ? e = c.__plugins[d] : a.each(c.__plugins, function(a, b) {
                    return b.name.substring(b.name.length - d.length - 1) == "." + d ? (e = b, !1) : void 0
                }), e
            }
            if (b.name.indexOf(".") < 0) throw new Error("Plugins must be namespaced");
            return c.__plugins[b.name] = b, b.core && c.__bridge(b.core, c, b.name), this
        },
        _trigger: function() {
            var a = Array.prototype.slice.apply(arguments);
            return "string" == typeof a[0] && (a[0] = {
                type: a[0]
            }), this.__$emitterPrivate.trigger.apply(this.__$emitterPrivate, a), this.__$emitterPublic.trigger.apply(this.__$emitterPublic, a), this
        },
        instances: function(b) {
            var c = [],
                d = b || ".tooltipstered";
            return a(d).each(function() {
                var b = a(this),
                    d = b.data("tooltipster-ns");
                d && a.each(d, function(a, d) {
                    c.push(b.data(d))
                })
            }), c
        },
        instancesLatest: function() {
            return this.__instancesLatestArr
        },
        off: function() {
            return this.__$emitterPublic.off.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        },
        on: function() {
            return this.__$emitterPublic.on.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        },
        one: function() {
            return this.__$emitterPublic.one.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        },
        origins: function(b) {
            var c = b ? b + " " : "";
            return a(c + ".tooltipstered").toArray()
        },
        setDefaults: function(b) {
            return a.extend(f, b), this
        },
        triggerHandler: function() {
            return this.__$emitterPublic.triggerHandler.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        }
    }, a.tooltipster = new i, a.Tooltipster = function(b, c) {
        this.__callbacks = {
            close: [],
            open: []
        }, this.__closingTime, this.__Content, this.__contentBcr, this.__destroyed = !1, this.__$emitterPrivate = a({}), this.__$emitterPublic = a({}), this.__enabled = !0, this.__garbageCollector, this.__Geometry, this.__lastPosition, this.__namespace = "tooltipster-" + Math.round(1e6 * Math.random()), this.__options, this.__$originParents, this.__pointerIsOverOrigin = !1, this.__previousThemes = [], this.__state = "closed", this.__timeouts = {
            close: [],
            open: null
        }, this.__touchEvents = [], this.__tracker = null, this._$origin, this._$tooltip, this.__init(b, c)
    }, a.Tooltipster.prototype = {
        __init: function(b, c) {
            var d = this;
            if (d._$origin = a(b), d.__options = a.extend(!0, {}, f, c), d.__optionsFormat(), !h.IE || h.IE >= d.__options.IEmin) {
                var e = null;
                if (void 0 === d._$origin.data("tooltipster-initialTitle") && (e = d._$origin.attr("title"), void 0 === e && (e = null), d._$origin.data("tooltipster-initialTitle", e)), null !== d.__options.content) d.__contentSet(d.__options.content);
                else {
                    var g, i = d._$origin.attr("data-tooltip-content");
                    i && (g = a(i)), g && g[0] ? d.__contentSet(g.first()) : d.__contentSet(e)
                }
                d._$origin.removeAttr("title").addClass("tooltipstered"), d.__prepareOrigin(), d.__prepareGC(), a.each(d.__options.plugins, function(a, b) {
                    d._plug(b)
                }), h.hasTouchCapability && a(h.window.document.body).on("touchmove." + d.__namespace + "-triggerOpen", function(a) {
                    d._touchRecordEvent(a)
                }), d._on("created", function() {
                    d.__prepareTooltip()
                })._on("repositioned", function(a) {
                    d.__lastPosition = a.position
                })
            } else d.__options.disabled = !0
        },
        __contentInsert: function() {
            var a = this,
                b = a._$tooltip.find(".tooltipster-content"),
                c = a.__Content,
                d = function(a) {
                    c = a
                };
            return a._trigger({
                type: "format",
                content: a.__Content,
                format: d
            }), a.__options.functionFormat && (c = a.__options.functionFormat.call(a, a, {
                origin: a._$origin[0]
            }, a.__Content)), "string" != typeof c || a.__options.contentAsHTML ? b.empty().append(c) : b.text(c), a
        },
        __contentSet: function(b) {
            return b instanceof a && this.__options.contentCloning && (b = b.clone(!0)), this.__Content = b, this._trigger({
                type: "updated",
                content: b
            }), this
        },
        __destroyError: function() {
            throw new Error("This tooltip has been destroyed and cannot execute your method call.")
        },
        __geometry: function() {
            var b = this,
                c = b._$origin,
                d = b._$origin.is("area");
            if (d) {
                var e = b._$origin.parent().attr("name");
                c = a('img[usemap="#' + e + '"]')
            }
            var f = c[0].getBoundingClientRect(),
                g = a(h.window.document),
                i = a(h.window),
                j = c,
                k = {
                    available: {
                        document: null,
                        window: null
                    },
                    document: {
                        size: {
                            height: g.height(),
                            width: g.width()
                        }
                    },
                    window: {
                        scroll: {
                            left: h.window.scrollX || h.window.document.documentElement.scrollLeft,
                            top: h.window.scrollY || h.window.document.documentElement.scrollTop
                        },
                        size: {
                            height: i.height(),
                            width: i.width()
                        }
                    },
                    origin: {
                        fixedLineage: !1,
                        offset: {},
                        size: {
                            height: f.bottom - f.top,
                            width: f.right - f.left
                        },
                        usemapImage: d ? c[0] : null,
                        windowOffset: {
                            bottom: f.bottom,
                            left: f.left,
                            right: f.right,
                            top: f.top
                        }
                    }
                };
            if (d) {
                var l = b._$origin.attr("shape"),
                    m = b._$origin.attr("coords");
                if (m && (m = m.split(","), a.map(m, function(a, b) {
                        m[b] = parseInt(a)
                    })), "default" != l) switch (l) {
                    case "circle":
                        var n = m[0],
                            o = m[1],
                            p = m[2],
                            q = o - p,
                            r = n - p;
                        k.origin.size.height = 2 * p, k.origin.size.width = k.origin.size.height, k.origin.windowOffset.left += r, k.origin.windowOffset.top += q;
                        break;
                    case "rect":
                        var s = m[0],
                            t = m[1],
                            u = m[2],
                            v = m[3];
                        k.origin.size.height = v - t, k.origin.size.width = u - s, k.origin.windowOffset.left += s, k.origin.windowOffset.top += t;
                        break;
                    case "poly":
                        for (var w = 0, x = 0, y = 0, z = 0, A = "even", B = 0; B < m.length; B++) {
                            var C = m[B];
                            "even" == A ? (C > y && (y = C, 0 === B && (w = y)), w > C && (w = C), A = "odd") : (C > z && (z = C, 1 == B && (x = z)), x > C && (x = C), A = "even")
                        }
                        k.origin.size.height = z - x, k.origin.size.width = y - w, k.origin.windowOffset.left += w, k.origin.windowOffset.top += x
                }
            }
            var D = function(a) {
                k.origin.size.height = a.height, k.origin.windowOffset.left = a.left, k.origin.windowOffset.top = a.top, k.origin.size.width = a.width
            };
            for (b._trigger({
                    type: "geometry",
                    edit: D,
                    geometry: {
                        height: k.origin.size.height,
                        left: k.origin.windowOffset.left,
                        top: k.origin.windowOffset.top,
                        width: k.origin.size.width
                    }
                }), k.origin.windowOffset.right = k.origin.windowOffset.left + k.origin.size.width, k.origin.windowOffset.bottom = k.origin.windowOffset.top + k.origin.size.height, k.origin.offset.left = k.origin.windowOffset.left + k.window.scroll.left, k.origin.offset.top = k.origin.windowOffset.top + k.window.scroll.top, k.origin.offset.bottom = k.origin.offset.top + k.origin.size.height, k.origin.offset.right = k.origin.offset.left + k.origin.size.width, k.available.document = {
                    bottom: {
                        height: k.document.size.height - k.origin.offset.bottom,
                        width: k.document.size.width
                    },
                    left: {
                        height: k.document.size.height,
                        width: k.origin.offset.left
                    },
                    right: {
                        height: k.document.size.height,
                        width: k.document.size.width - k.origin.offset.right
                    },
                    top: {
                        height: k.origin.offset.top,
                        width: k.document.size.width
                    }
                }, k.available.window = {
                    bottom: {
                        height: Math.max(k.window.size.height - Math.max(k.origin.windowOffset.bottom, 0), 0),
                        width: k.window.size.width
                    },
                    left: {
                        height: k.window.size.height,
                        width: Math.max(k.origin.windowOffset.left, 0)
                    },
                    right: {
                        height: k.window.size.height,
                        width: Math.max(k.window.size.width - Math.max(k.origin.windowOffset.right, 0), 0)
                    },
                    top: {
                        height: Math.max(k.origin.windowOffset.top, 0),
                        width: k.window.size.width
                    }
                };
                "html" != j[0].tagName.toLowerCase();) {
                if ("fixed" == j.css("position")) {
                    k.origin.fixedLineage = !0;
                    break
                }
                j = j.parent()
            }
            return k
        },
        __optionsFormat: function() {
            return "number" == typeof this.__options.animationDuration && (this.__options.animationDuration = [this.__options.animationDuration, this.__options.animationDuration]), "number" == typeof this.__options.delay && (this.__options.delay = [this.__options.delay, this.__options.delay]), "number" == typeof this.__options.delayTouch && (this.__options.delayTouch = [this.__options.delayTouch, this.__options.delayTouch]), "string" == typeof this.__options.theme && (this.__options.theme = [this.__options.theme]), null === this.__options.parent ? this.__options.parent = a(h.window.document.body) : "string" == typeof this.__options.parent && (this.__options.parent = a(this.__options.parent)), "hover" == this.__options.trigger ? (this.__options.triggerOpen = {
                mouseenter: !0,
                touchstart: !0
            }, this.__options.triggerClose = {
                mouseleave: !0,
                originClick: !0,
                touchleave: !0
            }) : "click" == this.__options.trigger && (this.__options.triggerOpen = {
                click: !0,
                tap: !0
            }, this.__options.triggerClose = {
                click: !0,
                tap: !0
            }), this._trigger("options"), this
        },
        __prepareGC: function() {
            var b = this;
            return b.__options.selfDestruction ? b.__garbageCollector = setInterval(function() {
                var c = (new Date).getTime();
                b.__touchEvents = a.grep(b.__touchEvents, function(a, b) {
                    return c - a.time > 6e4
                }), d(b._$origin) || b.close(function() {
                    b.destroy()
                })
            }, 2e4) : clearInterval(b.__garbageCollector), b
        },
        __prepareOrigin: function() {
            var a = this;
            if (a._$origin.off("." + a.__namespace + "-triggerOpen"), h.hasTouchCapability && a._$origin.on("touchstart." + a.__namespace + "-triggerOpen touchend." + a.__namespace + "-triggerOpen touchcancel." + a.__namespace + "-triggerOpen", function(b) {
                    a._touchRecordEvent(b)
                }), a.__options.triggerOpen.click || a.__options.triggerOpen.tap && h.hasTouchCapability) {
                var b = "";
                a.__options.triggerOpen.click && (b += "click." + a.__namespace + "-triggerOpen "), a.__options.triggerOpen.tap && h.hasTouchCapability && (b += "touchend." + a.__namespace + "-triggerOpen"), a._$origin.on(b, function(b) {
                    a._touchIsMeaningfulEvent(b) && a._open(b)
                })
            }
            if (a.__options.triggerOpen.mouseenter || a.__options.triggerOpen.touchstart && h.hasTouchCapability) {
                var b = "";
                a.__options.triggerOpen.mouseenter && (b += "mouseenter." + a.__namespace + "-triggerOpen "), a.__options.triggerOpen.touchstart && h.hasTouchCapability && (b += "touchstart." + a.__namespace + "-triggerOpen"), a._$origin.on(b, function(b) {
                    !a._touchIsTouchEvent(b) && a._touchIsEmulatedEvent(b) || (a.__pointerIsOverOrigin = !0, a._openShortly(b))
                })
            }
            if (a.__options.triggerClose.mouseleave || a.__options.triggerClose.touchleave && h.hasTouchCapability) {
                var b = "";
                a.__options.triggerClose.mouseleave && (b += "mouseleave." + a.__namespace + "-triggerOpen "), a.__options.triggerClose.touchleave && h.hasTouchCapability && (b += "touchend." + a.__namespace + "-triggerOpen touchcancel." + a.__namespace + "-triggerOpen"), a._$origin.on(b, function(b) {
                    a._touchIsMeaningfulEvent(b) && (a.__pointerIsOverOrigin = !1)
                })
            }
            return a
        },
        __prepareTooltip: function() {
            var b = this,
                c = b.__options.interactive ? "auto" : "";
            return b._$tooltip.attr("id", b.__namespace).css({
                "pointer-events": c,
                zIndex: b.__options.zIndex
            }), a.each(b.__previousThemes, function(a, c) {
                b._$tooltip.removeClass(c)
            }), a.each(b.__options.theme, function(a, c) {
                b._$tooltip.addClass(c)
            }), b.__previousThemes = a.merge([], b.__options.theme), b
        },
        __scrollHandler: function(b) {
            var c = this;
            if (c.__options.triggerClose.scroll) c._close(b);
            else if (d(c._$origin) && d(c._$tooltip)) {
                var e = null;
                if (b.target === h.window.document) c.__Geometry.origin.fixedLineage || c.__options.repositionOnScroll && c.reposition(b);
                else {
                    e = c.__geometry();
                    var f = !1;
                    if ("fixed" != c._$origin.css("position") && c.__$originParents.each(function(b, c) {
                            var d = a(c),
                                g = d.css("overflow-x"),
                                h = d.css("overflow-y");
                            if ("visible" != g || "visible" != h) {
                                var i = c.getBoundingClientRect();
                                if ("visible" != g && (e.origin.windowOffset.left < i.left || e.origin.windowOffset.right > i.right)) return f = !0, !1;
                                if ("visible" != h && (e.origin.windowOffset.top < i.top || e.origin.windowOffset.bottom > i.bottom)) return f = !0, !1
                            }
                            return "fixed" == d.css("position") ? !1 : void 0
                        }), f) c._$tooltip.css("visibility", "hidden");
                    else if (c._$tooltip.css("visibility", "visible"), c.__options.repositionOnScroll) c.reposition(b);
                    else {
                        var g = e.origin.offset.left - c.__Geometry.origin.offset.left,
                            i = e.origin.offset.top - c.__Geometry.origin.offset.top;
                        c._$tooltip.css({
                            left: c.__lastPosition.coord.left + g,
                            top: c.__lastPosition.coord.top + i
                        })
                    }
                }
                c._trigger({
                    type: "scroll",
                    event: b,
                    geo: e
                })
            }
            return c
        },
        __stateSet: function(a) {
            return this.__state = a, this._trigger({
                type: "state",
                state: a
            }), this
        },
        __timeoutsClear: function() {
            return clearTimeout(this.__timeouts.open), this.__timeouts.open = null, a.each(this.__timeouts.close, function(a, b) {
                clearTimeout(b)
            }), this.__timeouts.close = [], this
        },
        __trackerStart: function() {
            var a = this,
                b = a._$tooltip.find(".tooltipster-content");
            return a.__options.trackTooltip && (a.__contentBcr = b[0].getBoundingClientRect()), a.__tracker = setInterval(function() {
                if (d(a._$origin) && d(a._$tooltip)) {
                    if (a.__options.trackOrigin) {
                        var e = a.__geometry(),
                            f = !1;
                        c(e.origin.size, a.__Geometry.origin.size) && (a.__Geometry.origin.fixedLineage ? c(e.origin.windowOffset, a.__Geometry.origin.windowOffset) && (f = !0) : c(e.origin.offset, a.__Geometry.origin.offset) && (f = !0)), f || (a.__options.triggerClose.mouseleave ? a._close() : a.reposition())
                    }
                    if (a.__options.trackTooltip) {
                        var g = b[0].getBoundingClientRect();
                        g.height === a.__contentBcr.height && g.width === a.__contentBcr.width || (a.reposition(), a.__contentBcr = g)
                    }
                } else a._close()
            }, a.__options.trackerInterval), a
        },
        _close: function(b, c, d) {
            var e = this,
                f = !0;
            if (e._trigger({
                    type: "close",
                    event: b,
                    stop: function() {
                        f = !1
                    }
                }), f || d) {
                c && e.__callbacks.close.push(c), e.__callbacks.open = [], e.__timeoutsClear();
                var g = function() {
                    a.each(e.__callbacks.close, function(a, c) {
                        c.call(e, e, {
                            event: b,
                            origin: e._$origin[0]
                        })
                    }), e.__callbacks.close = []
                };
                if ("closed" != e.__state) {
                    var i = !0,
                        j = new Date,
                        k = j.getTime(),
                        l = k + e.__options.animationDuration[1];
                    if ("disappearing" == e.__state && l > e.__closingTime && e.__options.animationDuration[1] > 0 && (i = !1), i) {
                        e.__closingTime = l, "disappearing" != e.__state && e.__stateSet("disappearing");
                        var m = function() {
                            clearInterval(e.__tracker), e._trigger({
                                type: "closing",
                                event: b
                            }), e._$tooltip.off("." + e.__namespace + "-triggerClose").removeClass("tooltipster-dying"), a(h.window).off("." + e.__namespace + "-triggerClose"), e.__$originParents.each(function(b, c) {
                                a(c).off("scroll." + e.__namespace + "-triggerClose")
                            }), e.__$originParents = null, a(h.window.document.body).off("." + e.__namespace + "-triggerClose"), e._$origin.off("." + e.__namespace + "-triggerClose"), e._off("dismissable"), e.__stateSet("closed"), e._trigger({
                                type: "after",
                                event: b
                            }), e.__options.functionAfter && e.__options.functionAfter.call(e, e, {
                                event: b,
                                origin: e._$origin[0]
                            }), g()
                        };
                        h.hasTransitions ? (e._$tooltip.css({
                            "-moz-animation-duration": e.__options.animationDuration[1] + "ms",
                            "-ms-animation-duration": e.__options.animationDuration[1] + "ms",
                            "-o-animation-duration": e.__options.animationDuration[1] + "ms",
                            "-webkit-animation-duration": e.__options.animationDuration[1] + "ms",
                            "animation-duration": e.__options.animationDuration[1] + "ms",
                            "transition-duration": e.__options.animationDuration[1] + "ms"
                        }), e._$tooltip.clearQueue().removeClass("tooltipster-show").addClass("tooltipster-dying"), e.__options.animationDuration[1] > 0 && e._$tooltip.delay(e.__options.animationDuration[1]), e._$tooltip.queue(m)) : e._$tooltip.stop().fadeOut(e.__options.animationDuration[1], m)
                    }
                } else g()
            }
            return e
        },
        _off: function() {
            return this.__$emitterPrivate.off.apply(this.__$emitterPrivate, Array.prototype.slice.apply(arguments)), this
        },
        _on: function() {
            return this.__$emitterPrivate.on.apply(this.__$emitterPrivate, Array.prototype.slice.apply(arguments)), this
        },
        _one: function() {
            return this.__$emitterPrivate.one.apply(this.__$emitterPrivate, Array.prototype.slice.apply(arguments)), this
        },
        _open: function(b, c) {
            var e = this;
            if (!e.__destroying && d(e._$origin) && e.__enabled) {
                var f = !0;
                if ("closed" == e.__state && (e._trigger({
                        type: "before",
                        event: b,
                        stop: function() {
                            f = !1
                        }
                    }), f && e.__options.functionBefore && (f = e.__options.functionBefore.call(e, e, {
                        event: b,
                        origin: e._$origin[0]
                    }))), f !== !1 && null !== e.__Content) {
                    c && e.__callbacks.open.push(c), e.__callbacks.close = [], e.__timeoutsClear();
                    var g, i = function() {
                        "stable" != e.__state && e.__stateSet("stable"), a.each(e.__callbacks.open, function(a, b) {
                            b.call(e, e, {
                                origin: e._$origin[0],
                                tooltip: e._$tooltip[0]
                            })
                        }), e.__callbacks.open = []
                    };
                    if ("closed" !== e.__state) g = 0, "disappearing" === e.__state ? (e.__stateSet("appearing"), h.hasTransitions ? (e._$tooltip.clearQueue().removeClass("tooltipster-dying").addClass("tooltipster-show"), e.__options.animationDuration[0] > 0 && e._$tooltip.delay(e.__options.animationDuration[0]), e._$tooltip.queue(i)) : e._$tooltip.stop().fadeIn(i)) : "stable" == e.__state && i();
                    else {
                        if (e.__stateSet("appearing"), g = e.__options.animationDuration[0], e.__contentInsert(), e.reposition(b, !0), h.hasTransitions ? (e._$tooltip.addClass("tooltipster-" + e.__options.animation).addClass("tooltipster-initial").css({
                                "-moz-animation-duration": e.__options.animationDuration[0] + "ms",
                                "-ms-animation-duration": e.__options.animationDuration[0] + "ms",
                                "-o-animation-duration": e.__options.animationDuration[0] + "ms",
                                "-webkit-animation-duration": e.__options.animationDuration[0] + "ms",
                                "animation-duration": e.__options.animationDuration[0] + "ms",
                                "transition-duration": e.__options.animationDuration[0] + "ms"
                            }), setTimeout(function() {
                                "closed" != e.__state && (e._$tooltip.addClass("tooltipster-show").removeClass("tooltipster-initial"), e.__options.animationDuration[0] > 0 && e._$tooltip.delay(e.__options.animationDuration[0]), e._$tooltip.queue(i))
                            }, 0)) : e._$tooltip.css("display", "none").fadeIn(e.__options.animationDuration[0], i), e.__trackerStart(), a(h.window).on("resize." + e.__namespace + "-triggerClose", function(b) {
                                var c = a(document.activeElement);
                                (c.is("input") || c.is("textarea")) && a.contains(e._$tooltip[0], c[0]) || e.reposition(b)
                            }).on("scroll." + e.__namespace + "-triggerClose", function(a) {
                                e.__scrollHandler(a)
                            }), e.__$originParents = e._$origin.parents(), e.__$originParents.each(function(b, c) {
                                a(c).on("scroll." + e.__namespace + "-triggerClose", function(a) {
                                    e.__scrollHandler(a)
                                })
                            }), e.__options.triggerClose.mouseleave || e.__options.triggerClose.touchleave && h.hasTouchCapability) {
                            e._on("dismissable", function(a) {
                                a.dismissable ? a.delay ? (m = setTimeout(function() {
                                    e._close(a.event)
                                }, a.delay), e.__timeouts.close.push(m)) : e._close(a) : clearTimeout(m)
                            });
                            var j = e._$origin,
                                k = "",
                                l = "",
                                m = null;
                            e.__options.interactive && (j = j.add(e._$tooltip)), e.__options.triggerClose.mouseleave && (k += "mouseenter." + e.__namespace + "-triggerClose ", l += "mouseleave." + e.__namespace + "-triggerClose "), e.__options.triggerClose.touchleave && h.hasTouchCapability && (k += "touchstart." + e.__namespace + "-triggerClose", l += "touchend." + e.__namespace + "-triggerClose touchcancel." + e.__namespace + "-triggerClose"), j.on(l, function(a) {
                                if (e._touchIsTouchEvent(a) || !e._touchIsEmulatedEvent(a)) {
                                    var b = "mouseleave" == a.type ? e.__options.delay : e.__options.delayTouch;
                                    e._trigger({
                                        delay: b[1],
                                        dismissable: !0,
                                        event: a,
                                        type: "dismissable"
                                    })
                                }
                            }).on(k, function(a) {
                                !e._touchIsTouchEvent(a) && e._touchIsEmulatedEvent(a) || e._trigger({
                                    dismissable: !1,
                                    event: a,
                                    type: "dismissable"
                                })
                            })
                        }
                        e.__options.triggerClose.originClick && e._$origin.on("click." + e.__namespace + "-triggerClose", function(a) {
                            e._touchIsTouchEvent(a) || e._touchIsEmulatedEvent(a) || e._close(a)
                        }), (e.__options.triggerClose.click || e.__options.triggerClose.tap && h.hasTouchCapability) && setTimeout(function() {
                            if ("closed" != e.__state) {
                                var b = "",
                                    c = a(h.window.document.body);
                                e.__options.triggerClose.click && (b += "click." + e.__namespace + "-triggerClose "), e.__options.triggerClose.tap && h.hasTouchCapability && (b += "touchend." + e.__namespace + "-triggerClose"), c.on(b, function(b) {
                                    e._touchIsMeaningfulEvent(b) && (e._touchRecordEvent(b), e.__options.interactive && a.contains(e._$tooltip[0], b.target) || e._close(b))
                                }), e.__options.triggerClose.tap && h.hasTouchCapability && c.on("touchstart." + e.__namespace + "-triggerClose", function(a) {
                                    e._touchRecordEvent(a)
                                })
                            }
                        }, 0), e._trigger("ready"), e.__options.functionReady && e.__options.functionReady.call(e, e, {
                            origin: e._$origin[0],
                            tooltip: e._$tooltip[0]
                        })
                    }
                    if (e.__options.timer > 0) {
                        var m = setTimeout(function() {
                            e._close()
                        }, e.__options.timer + g);
                        e.__timeouts.close.push(m)
                    }
                }
            }
            return e
        },
        _openShortly: function(a) {
            var b = this,
                c = !0;
            if ("stable" != b.__state && "appearing" != b.__state && !b.__timeouts.open && (b._trigger({
                    type: "start",
                    event: a,
                    stop: function() {
                        c = !1
                    }
                }), c)) {
                var d = 0 == a.type.indexOf("touch") ? b.__options.delayTouch : b.__options.delay;
                d[0] ? b.__timeouts.open = setTimeout(function() {
                    b.__timeouts.open = null, b.__pointerIsOverOrigin && b._touchIsMeaningfulEvent(a) ? (b._trigger("startend"), b._open(a)) : b._trigger("startcancel")
                }, d[0]) : (b._trigger("startend"), b._open(a))
            }
            return b
        },
        _optionsExtract: function(b, c) {
            var d = this,
                e = a.extend(!0, {}, c),
                f = d.__options[b];
            return f || (f = {}, a.each(c, function(a, b) {
                var c = d.__options[a];
                void 0 !== c && (f[a] = c)
            })), a.each(e, function(b, c) {
                void 0 !== f[b] && ("object" != typeof c || c instanceof Array || null == c || "object" != typeof f[b] || f[b] instanceof Array || null == f[b] ? e[b] = f[b] : a.extend(e[b], f[b]))
            }), e
        },
        _plug: function(b) {
            var c = a.tooltipster._plugin(b);
            if (!c) throw new Error('The "' + b + '" plugin is not defined');
            return c.instance && a.tooltipster.__bridge(c.instance, this, c.name), this
        },
        _touchIsEmulatedEvent: function(a) {
            for (var b = !1, c = (new Date).getTime(), d = this.__touchEvents.length - 1; d >= 0; d--) {
                var e = this.__touchEvents[d];
                if (!(c - e.time < 500)) break;
                e.target === a.target && (b = !0)
            }
            return b
        },
        _touchIsMeaningfulEvent: function(a) {
            return this._touchIsTouchEvent(a) && !this._touchSwiped(a.target) || !this._touchIsTouchEvent(a) && !this._touchIsEmulatedEvent(a)
        },
        _touchIsTouchEvent: function(a) {
            return 0 == a.type.indexOf("touch")
        },
        _touchRecordEvent: function(a) {
            return this._touchIsTouchEvent(a) && (a.time = (new Date).getTime(), this.__touchEvents.push(a)), this
        },
        _touchSwiped: function(a) {
            for (var b = !1, c = this.__touchEvents.length - 1; c >= 0; c--) {
                var d = this.__touchEvents[c];
                if ("touchmove" == d.type) {
                    b = !0;
                    break
                }
                if ("touchstart" == d.type && a === d.target) break
            }
            return b
        },
        _trigger: function() {
            var b = Array.prototype.slice.apply(arguments);
            return "string" == typeof b[0] && (b[0] = {
                type: b[0]
            }), b[0].instance = this, b[0].origin = this._$origin ? this._$origin[0] : null, b[0].tooltip = this._$tooltip ? this._$tooltip[0] : null, this.__$emitterPrivate.trigger.apply(this.__$emitterPrivate, b), a.tooltipster._trigger.apply(a.tooltipster, b), this.__$emitterPublic.trigger.apply(this.__$emitterPublic, b), this
        },
        _unplug: function(b) {
            var c = this;
            if (c[b]) {
                var d = a.tooltipster._plugin(b);
                d.instance && a.each(d.instance, function(a, d) {
                    c[a] && c[a].bridged === c[b] && delete c[a]
                }), c[b].__destroy && c[b].__destroy(), delete c[b]
            }
            return c
        },
        close: function(a) {
            return this.__destroyed ? this.__destroyError() : this._close(null, a), this
        },
        content: function(a) {
            var b = this;
            if (void 0 === a) return b.__Content;
            if (b.__destroyed) b.__destroyError();
            else if (b.__contentSet(a), null !== b.__Content) {
                if ("closed" !== b.__state && (b.__contentInsert(), b.reposition(), b.__options.updateAnimation))
                    if (h.hasTransitions) {
                        var c = b.__options.updateAnimation;
                        b._$tooltip.addClass("tooltipster-update-" + c), setTimeout(function() {
                            "closed" != b.__state && b._$tooltip.removeClass("tooltipster-update-" + c)
                        }, 1e3)
                    } else b._$tooltip.fadeTo(200, .5, function() {
                        "closed" != b.__state && b._$tooltip.fadeTo(200, 1)
                    })
            } else b._close();
            return b
        },
        destroy: function() {
            var b = this;
            if (b.__destroyed) b.__destroyError();
            else {
                "closed" != b.__state ? b.option("animationDuration", 0)._close(null, null, !0) : b.__timeoutsClear(), b._trigger("destroy"), b.__destroyed = !0, b._$origin.removeData(b.__namespace).off("." + b.__namespace + "-triggerOpen"), a(h.window.document.body).off("." + b.__namespace + "-triggerOpen");
                var c = b._$origin.data("tooltipster-ns");
                if (c)
                    if (1 === c.length) {
                        var d = null;
                        "previous" == b.__options.restoration ? d = b._$origin.data("tooltipster-initialTitle") : "current" == b.__options.restoration && (d = "string" == typeof b.__Content ? b.__Content : a("<div></div>").append(b.__Content).html()), d && b._$origin.attr("title", d), b._$origin.removeClass("tooltipstered"), b._$origin.removeData("tooltipster-ns").removeData("tooltipster-initialTitle")
                    } else c = a.grep(c, function(a, c) {
                        return a !== b.__namespace
                    }), b._$origin.data("tooltipster-ns", c);
                b._trigger("destroyed"), b._off(), b.off(), b.__Content = null, b.__$emitterPrivate = null, b.__$emitterPublic = null, b.__options.parent = null, b._$origin = null, b._$tooltip = null, a.tooltipster.__instancesLatestArr = a.grep(a.tooltipster.__instancesLatestArr, function(a, c) {
                    return b !== a
                }), clearInterval(b.__garbageCollector)
            }
            return b
        },
        disable: function() {
            return this.__destroyed ? (this.__destroyError(), this) : (this._close(), this.__enabled = !1, this)
        },
        elementOrigin: function() {
            return this.__destroyed ? void this.__destroyError() : this._$origin[0]
        },
        elementTooltip: function() {
            return this._$tooltip ? this._$tooltip[0] : null
        },
        enable: function() {
            return this.__enabled = !0, this
        },
        hide: function(a) {
            return this.close(a)
        },
        instance: function() {
            return this
        },
        off: function() {
            return this.__destroyed || this.__$emitterPublic.off.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        },
        on: function() {
            return this.__destroyed ? this.__destroyError() : this.__$emitterPublic.on.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        },
        one: function() {
            return this.__destroyed ? this.__destroyError() : this.__$emitterPublic.one.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        },
        open: function(a) {
            return this.__destroyed ? this.__destroyError() : this._open(null, a), this
        },
        option: function(b, c) {
            return void 0 === c ? this.__options[b] : (this.__destroyed ? this.__destroyError() : (this.__options[b] = c, this.__optionsFormat(), a.inArray(b, ["trigger", "triggerClose", "triggerOpen"]) >= 0 && this.__prepareOrigin(), "selfDestruction" === b && this.__prepareGC()), this)
        },
        reposition: function(a, b) {
            var c = this;
            return c.__destroyed ? c.__destroyError() : "closed" != c.__state && d(c._$origin) && (b || d(c._$tooltip)) && (b || c._$tooltip.detach(), c.__Geometry = c.__geometry(), c._trigger({
                type: "reposition",
                event: a,
                helper: {
                    geo: c.__Geometry
                }
            })), c
        },
        show: function(a) {
            return this.open(a)
        },
        status: function() {
            return {
                destroyed: this.__destroyed,
                enabled: this.__enabled,
                open: "closed" !== this.__state,
                state: this.__state
            }
        },
        triggerHandler: function() {
            return this.__destroyed ? this.__destroyError() : this.__$emitterPublic.triggerHandler.apply(this.__$emitterPublic, Array.prototype.slice.apply(arguments)), this
        }
    }, a.fn.tooltipster = function() {
        var b = Array.prototype.slice.apply(arguments),
            c = "You are using a single HTML element as content for several tooltips. You probably want to set the contentCloning option to TRUE.";
        if (0 === this.length) return this;
        if ("string" == typeof b[0]) {
            var d = "#*$~&";
            return this.each(function() {
                var e = a(this).data("tooltipster-ns"),
                    f = e ? a(this).data(e[0]) : null;
                if (!f) throw new Error("You called Tooltipster's \"" + b[0] + '" method on an uninitialized element');
                if ("function" != typeof f[b[0]]) throw new Error('Unknown method "' + b[0] + '"');
                this.length > 1 && "content" == b[0] && (b[1] instanceof a || "object" == typeof b[1] && null != b[1] && b[1].tagName) && !f.__options.contentCloning && f.__options.debug && console.log(c);
                var g = f[b[0]](b[1], b[2]);
                return g !== f || "instance" === b[0] ? (d = g, !1) : void 0
            }), "#*$~&" !== d ? d : this
        }
        a.tooltipster.__instancesLatestArr = [];
        var e = b[0] && void 0 !== b[0].multiple,
            g = e && b[0].multiple || !e && f.multiple,
            h = b[0] && void 0 !== b[0].content,
            i = h && b[0].content || !h && f.content,
            j = b[0] && void 0 !== b[0].contentCloning,
            k = j && b[0].contentCloning || !j && f.contentCloning,
            l = b[0] && void 0 !== b[0].debug,
            m = l && b[0].debug || !l && f.debug;
        return this.length > 1 && (i instanceof a || "object" == typeof i && null != i && i.tagName) && !k && m && console.log(c), this.each(function() {
            var c = !1,
                d = a(this),
                e = d.data("tooltipster-ns"),
                f = null;
            e ? g ? c = !0 : m && (console.log("Tooltipster: one or more tooltips are already attached to the element below. Ignoring."), console.log(this)) : c = !0, c && (f = new a.Tooltipster(this, b[0]), e || (e = []), e.push(f.__namespace), d.data("tooltipster-ns", e), d.data(f.__namespace, f), f.__options.functionInit && f.__options.functionInit.call(f, f, {
                origin: this
            }), f._trigger("init")), a.tooltipster.__instancesLatestArr.push(f)
        }), this
    }, b.prototype = {
        __init: function(b) {
            this.__$tooltip = b, this.__$tooltip.css({
                left: 0,
                overflow: "hidden",
                position: "absolute",
                top: 0
            }).find(".tooltipster-content").css("overflow", "auto"), this.$container = a('<div class="tooltipster-ruler"></div>').append(this.__$tooltip).appendTo(h.window.document.body)
        },
        __forceRedraw: function() {
            var a = this.__$tooltip.parent();
            this.__$tooltip.detach(), this.__$tooltip.appendTo(a)
        },
        constrain: function(a, b) {
            return this.constraints = {
                width: a,
                height: b
            }, this.__$tooltip.css({
                display: "block",
                height: "",
                overflow: "auto",
                width: a
            }), this
        },
        destroy: function() {
            this.__$tooltip.detach().find(".tooltipster-content").css({
                display: "",
                overflow: ""
            }), this.$container.remove()
        },
        free: function() {
            return this.constraints = null, this.__$tooltip.css({
                display: "",
                height: "",
                overflow: "visible",
                width: ""
            }), this
        },
        measure: function() {
            this.__forceRedraw();
            var a = this.__$tooltip[0].getBoundingClientRect(),
                b = {
                    size: {
                        height: a.height || a.bottom - a.top,
                        width: a.width || a.right - a.left
                    }
                };
            if (this.constraints) {
                var c = this.__$tooltip.find(".tooltipster-content"),
                    d = this.__$tooltip.outerHeight(),
                    e = c[0].getBoundingClientRect(),
                    f = {
                        height: d <= this.constraints.height,
                        width: a.width <= this.constraints.width && e.width >= c[0].scrollWidth - 1
                    };
                b.fits = f.height && f.width
            }
            return h.IE && h.IE <= 11 && b.size.width !== h.window.document.documentElement.clientWidth && (b.size.width = Math.ceil(b.size.width) + 1), b
        }
    };
    var j = navigator.userAgent.toLowerCase(); - 1 != j.indexOf("msie") ? h.IE = parseInt(j.split("msie")[1]) : -1 !== j.toLowerCase().indexOf("trident") && -1 !== j.indexOf(" rv:11") ? h.IE = 11 : -1 != j.toLowerCase().indexOf("edge/") && (h.IE = parseInt(j.toLowerCase().split("edge/")[1]));
    var k = "tooltipster.sideTip";
    return a.tooltipster._plugin({
        name: k,
        instance: {
            __defaults: function() {
                return {
                    arrow: !0,
                    distance: 6,
                    functionPosition: null,
                    maxWidth: null,
                    minIntersection: 16,
                    minWidth: 0,
                    position: null,
                    side: "top",
                    viewportAware: !0
                }
            },
            __init: function(a) {
                var b = this;
                b.__instance = a, b.__namespace = "tooltipster-sideTip-" + Math.round(1e6 * Math.random()), b.__previousState = "closed", b.__options, b.__optionsFormat(), b.__instance._on("state." + b.__namespace, function(a) {
                    "closed" == a.state ? b.__close() : "appearing" == a.state && "closed" == b.__previousState && b.__create(), b.__previousState = a.state
                }), b.__instance._on("options." + b.__namespace, function() {
                    b.__optionsFormat()
                }), b.__instance._on("reposition." + b.__namespace, function(a) {
                    b.__reposition(a.event, a.helper)
                })
            },
            __close: function() {
                this.__instance.content() instanceof a && this.__instance.content().detach(), this.__instance._$tooltip.remove(), this.__instance._$tooltip = null
            },
            __create: function() {
                var b = a('<div class="tooltipster-base tooltipster-sidetip"><div class="tooltipster-box"><div class="tooltipster-content"></div></div><div class="tooltipster-arrow"><div class="tooltipster-arrow-uncropped"><div class="tooltipster-arrow-border"></div><div class="tooltipster-arrow-background"></div></div></div></div>');
                this.__options.arrow || b.find(".tooltipster-box").css("margin", 0).end().find(".tooltipster-arrow").hide(), this.__options.minWidth && b.css("min-width", this.__options.minWidth + "px"), this.__options.maxWidth && b.css("max-width", this.__options.maxWidth + "px"), this.__instance._$tooltip = b, this.__instance._trigger("created")
            },
            __destroy: function() {
                this.__instance._off("." + self.__namespace)
            },
            __optionsFormat: function() {
                var b = this;
                if (b.__options = b.__instance._optionsExtract(k, b.__defaults()), b.__options.position && (b.__options.side = b.__options.position), "object" != typeof b.__options.distance && (b.__options.distance = [b.__options.distance]), b.__options.distance.length < 4 && (void 0 === b.__options.distance[1] && (b.__options.distance[1] = b.__options.distance[0]), void 0 === b.__options.distance[2] && (b.__options.distance[2] = b.__options.distance[0]), void 0 === b.__options.distance[3] && (b.__options.distance[3] = b.__options.distance[1]), b.__options.distance = {
                        top: b.__options.distance[0],
                        right: b.__options.distance[1],
                        bottom: b.__options.distance[2],
                        left: b.__options.distance[3]
                    }), "string" == typeof b.__options.side) {
                    var c = {
                        top: "bottom",
                        right: "left",
                        bottom: "top",
                        left: "right"
                    };
                    b.__options.side = [b.__options.side, c[b.__options.side]], "left" == b.__options.side[0] || "right" == b.__options.side[0] ? b.__options.side.push("top", "bottom") : b.__options.side.push("right", "left")
                }
                6 === a.tooltipster._env.IE && b.__options.arrow !== !0 && (b.__options.arrow = !1)
            },
            __reposition: function(b, c) {
                var d, e = this,
                    f = e.__targetFind(c),
                    g = [];
                e.__instance._$tooltip.detach();
                var h = e.__instance._$tooltip.clone(),
                    i = a.tooltipster._getRuler(h),
                    j = !1,
                    k = e.__instance.option("animation");
                switch (k && h.removeClass("tooltipster-" + k), a.each(["window", "document"], function(d, k) {
                    var l = null;
                    if (e.__instance._trigger({
                            container: k,
                            helper: c,
                            satisfied: j,
                            takeTest: function(a) {
                                l = a
                            },
                            results: g,
                            type: "positionTest"
                        }), 1 == l || 0 != l && 0 == j && ("window" != k || e.__options.viewportAware))
                        for (var d = 0; d < e.__options.side.length; d++) {
                            var m = {
                                    horizontal: 0,
                                    vertical: 0
                                },
                                n = e.__options.side[d];
                            "top" == n || "bottom" == n ? m.vertical = e.__options.distance[n] : m.horizontal = e.__options.distance[n], e.__sideChange(h, n), a.each(["natural", "constrained"], function(a, d) {
                                if (l = null, e.__instance._trigger({
                                        container: k,
                                        event: b,
                                        helper: c,
                                        mode: d,
                                        results: g,
                                        satisfied: j,
                                        side: n,
                                        takeTest: function(a) {
                                            l = a
                                        },
                                        type: "positionTest"
                                    }), 1 == l || 0 != l && 0 == j) {
                                    var h = {
                                            container: k,
                                            distance: m,
                                            fits: null,
                                            mode: d,
                                            outerSize: null,
                                            side: n,
                                            size: null,
                                            target: f[n],
                                            whole: null
                                        },
                                        o = "natural" == d ? i.free() : i.constrain(c.geo.available[k][n].width - m.horizontal, c.geo.available[k][n].height - m.vertical),
                                        p = o.measure();
                                    if (h.size = p.size, h.outerSize = {
                                            height: p.size.height + m.vertical,
                                            width: p.size.width + m.horizontal
                                        }, "natural" == d ? c.geo.available[k][n].width >= h.outerSize.width && c.geo.available[k][n].height >= h.outerSize.height ? h.fits = !0 : h.fits = !1 : h.fits = p.fits, "window" == k && (h.fits ? "top" == n || "bottom" == n ? h.whole = c.geo.origin.windowOffset.right >= e.__options.minIntersection && c.geo.window.size.width - c.geo.origin.windowOffset.left >= e.__options.minIntersection : h.whole = c.geo.origin.windowOffset.bottom >= e.__options.minIntersection && c.geo.window.size.height - c.geo.origin.windowOffset.top >= e.__options.minIntersection : h.whole = !1), g.push(h), h.whole) j = !0;
                                    else if ("natural" == h.mode && (h.fits || h.size.width <= c.geo.available[k][n].width)) return !1
                                }
                            })
                        }
                }), e.__instance._trigger({
                    edit: function(a) {
                        g = a
                    },
                    event: b,
                    helper: c,
                    results: g,
                    type: "positionTested"
                }), g.sort(function(a, b) {
                    if (a.whole && !b.whole) return -1;
                    if (!a.whole && b.whole) return 1;
                    if (a.whole && b.whole) {
                        var c = e.__options.side.indexOf(a.side),
                            d = e.__options.side.indexOf(b.side);
                        return d > c ? -1 : c > d ? 1 : "natural" == a.mode ? -1 : 1
                    }
                    if (a.fits && !b.fits) return -1;
                    if (!a.fits && b.fits) return 1;
                    if (a.fits && b.fits) {
                        var c = e.__options.side.indexOf(a.side),
                            d = e.__options.side.indexOf(b.side);
                        return d > c ? -1 : c > d ? 1 : "natural" == a.mode ? -1 : 1
                    }
                    return "document" == a.container && "bottom" == a.side && "natural" == a.mode ? -1 : 1
                }), d = g[0], d.coord = {}, d.side) {
                    case "left":
                    case "right":
                        d.coord.top = Math.floor(d.target - d.size.height / 2);
                        break;
                    case "bottom":
                    case "top":
                        d.coord.left = Math.floor(d.target - d.size.width / 2)
                }
                switch (d.side) {
                    case "left":
                        d.coord.left = c.geo.origin.windowOffset.left - d.outerSize.width;
                        break;
                    case "right":
                        d.coord.left = c.geo.origin.windowOffset.right + d.distance.horizontal;
                        break;
                    case "top":
                        d.coord.top = c.geo.origin.windowOffset.top - d.outerSize.height;
                        break;
                    case "bottom":
                        d.coord.top = c.geo.origin.windowOffset.bottom + d.distance.vertical
                }
                "window" == d.container ? "top" == d.side || "bottom" == d.side ? d.coord.left < 0 ? c.geo.origin.windowOffset.right - this.__options.minIntersection >= 0 ? d.coord.left = 0 : d.coord.left = c.geo.origin.windowOffset.right - this.__options.minIntersection - 1 : d.coord.left > c.geo.window.size.width - d.size.width && (c.geo.origin.windowOffset.left + this.__options.minIntersection <= c.geo.window.size.width ? d.coord.left = c.geo.window.size.width - d.size.width : d.coord.left = c.geo.origin.windowOffset.left + this.__options.minIntersection + 1 - d.size.width) : d.coord.top < 0 ? c.geo.origin.windowOffset.bottom - this.__options.minIntersection >= 0 ? d.coord.top = 0 : d.coord.top = c.geo.origin.windowOffset.bottom - this.__options.minIntersection - 1 : d.coord.top > c.geo.window.size.height - d.size.height && (c.geo.origin.windowOffset.top + this.__options.minIntersection <= c.geo.window.size.height ? d.coord.top = c.geo.window.size.height - d.size.height : d.coord.top = c.geo.origin.windowOffset.top + this.__options.minIntersection + 1 - d.size.height) : (d.coord.left > c.geo.window.size.width - d.size.width && (d.coord.left = c.geo.window.size.width - d.size.width), d.coord.left < 0 && (d.coord.left = 0)), e.__sideChange(h, d.side), c.tooltipClone = h[0], c.tooltipParent = e.__instance.option("parent").parent[0], c.mode = d.mode, c.whole = d.whole, c.origin = e.__instance._$origin[0], c.tooltip = e.__instance._$tooltip[0], delete d.container, delete d.fits, delete d.mode, delete d.outerSize, delete d.whole, d.distance = d.distance.horizontal || d.distance.vertical;
                var l = a.extend(!0, {}, d);
                if (e.__instance._trigger({
                        edit: function(a) {
                            d = a
                        },
                        event: b,
                        helper: c,
                        position: l,
                        type: "position"
                    }), e.__options.functionPosition) {
                    var m = e.__options.functionPosition.call(e, e.__instance, c, l);
                    m && (d = m)
                }
                i.destroy();
                var n, o;
                "top" == d.side || "bottom" == d.side ? (n = {
                    prop: "left",
                    val: d.target - d.coord.left
                }, o = d.size.width - this.__options.minIntersection) : (n = {
                    prop: "top",
                    val: d.target - d.coord.top
                }, o = d.size.height - this.__options.minIntersection), n.val < this.__options.minIntersection ? n.val = this.__options.minIntersection : n.val > o && (n.val = o);
                var p;
                p = c.geo.origin.fixedLineage ? c.geo.origin.windowOffset : {
                    left: c.geo.origin.windowOffset.left + c.geo.window.scroll.left,
                    top: c.geo.origin.windowOffset.top + c.geo.window.scroll.top
                }, d.coord = {
                    left: p.left + (d.coord.left - c.geo.origin.windowOffset.left),
                    top: p.top + (d.coord.top - c.geo.origin.windowOffset.top)
                }, e.__sideChange(e.__instance._$tooltip, d.side), c.geo.origin.fixedLineage ? e.__instance._$tooltip.css("position", "fixed") : e.__instance._$tooltip.css("position", ""), e.__instance._$tooltip.css({
                    left: d.coord.left,
                    top: d.coord.top,
                    height: d.size.height,
                    width: d.size.width
                }).find(".tooltipster-arrow").css({
                    left: "",
                    top: ""
                }).css(n.prop, n.val), e.__instance._$tooltip.appendTo(e.__instance.option("parent")), e.__instance._trigger({
                    type: "repositioned",
                    event: b,
                    position: d
                })
            },
            __sideChange: function(a, b) {
                a.removeClass("tooltipster-bottom").removeClass("tooltipster-left").removeClass("tooltipster-right").removeClass("tooltipster-top").addClass("tooltipster-" + b)
            },
            __targetFind: function(a) {
                var b = {},
                    c = this.__instance._$origin[0].getClientRects();
                if (c.length > 1) {
                    var d = this.__instance._$origin.css("opacity");
                    1 == d && (this.__instance._$origin.css("opacity", .99), c = this.__instance._$origin[0].getClientRects(), this.__instance._$origin.css("opacity", 1))
                }
                if (c.length < 2) b.top = Math.floor(a.geo.origin.windowOffset.left + a.geo.origin.size.width / 2), b.bottom = b.top, b.left = Math.floor(a.geo.origin.windowOffset.top + a.geo.origin.size.height / 2), b.right = b.left;
                else {
                    var e = c[0];
                    b.top = Math.floor(e.left + (e.right - e.left) / 2), e = c.length > 2 ? c[Math.ceil(c.length / 2) - 1] : c[0], b.right = Math.floor(e.top + (e.bottom - e.top) / 2), e = c[c.length - 1], b.bottom = Math.floor(e.left + (e.right - e.left) / 2), e = c.length > 2 ? c[Math.ceil((c.length + 1) / 2) - 1] : c[c.length - 1], b.left = Math.floor(e.top + (e.bottom - e.top) / 2)
                }
                return b
            }
        }
    }), a
});