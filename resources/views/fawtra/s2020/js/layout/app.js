"use strict";

function _typeof(e) {
    return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
        return typeof e
    } : function(e) {
        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
    })(e)
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _defineProperties(e, t) {
    for (var n = 0; n < t.length; n++) {
        var o = t[n];
        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o)
    }
}

function _createClass(e, t, n) {
    return t && _defineProperties(e.prototype, t), n && _defineProperties(e, n), Object.defineProperty(e, "prototype", {
        writable: !1
    }), e
}

function _toPropertyKey(e) {
    e = _toPrimitive(e, "string");
    return "symbol" === _typeof(e) ? e : String(e)
}

function _toPrimitive(e, t) {
    if ("object" !== _typeof(e) || null === e) return e;
    var n = e[Symbol.toPrimitive];
    if (void 0 === n) return ("string" === t ? String : Number)(e);
    n = n.call(e, t || "default");
    if ("object" !== _typeof(n)) return n;
    throw new TypeError("@@toPrimitive must return a primitive value.")
}
var App = function() {
        function e() {
            _classCallCheck(this, e)
        }
        return _createClass(e, null, [{
            key: "init",
            value: function() {
                $(document).ready(function(e) {
                    AppUI.adjustBodySpacing()
                }), setTimeout(function() {
                    AppUI.adjustBodySpacing()
                }, 300), setTimeout(function() {
                    AppUI.adjustBodySpacing()
                }, 1500), setTimeout(function() {
                    AppUI.adjustBodySpacing()
                }, 2e3), AppUI.loadTooltips(), AppUI.addTooltipsObserver(), AppUI.addTooltipsChangeObserver(), AppUI.excludePrintableIframeFromDarkMode(), AppUI.addEventListenerForTextSelection(), AppUI.addEventListenerForRippleButtons(), "undefined" != typeof IS_APP && IS_APP || AppSideMenu.loadScrollbarToSideMenu(), AppSideMenu.addResizeEventListenerForSideMenu(), AppSideMenu.addScrollEventListenerToSideMenu(), AppSideMenu.loadLastActiveScrollPosition(), AppForms.addClickEventListenerToFormsCancelBtn()
            }
        }]), e
    }(),
    AppUI = function() {
        function e() {
            _classCallCheck(this, e)
        }
        return _createClass(e, null, [{
            key: "adjustBodySpacing",
            value: function() {
                var e, t, n, o = $(".pages-head-s2020");
                (o = 0 == o.length ? $(".pages-head") : o).length && (o.addClass("fixed-div"), o[0].style.setProperty("position", "fixed", "important"), e = $(".main-area"), t = $(".header").outerHeight(), n = o.length ? o.outerHeight() : 0, o.css("top", t), e.css("padding-top", t + 20), e.css("padding-top", t + n + 20), e.css("margin-top", 0))
            }
        }, {
            key: "loadTooltips",
            value: function() {
                initTooltips()
            }
        }, {
            key: "loadLightgallery",
            value: function() {
                initLightgallery()
            }
        }, {
            key: "addTooltipsObserver",
            value: function() {
                document.body && new MutationObserver(function(e) {
                    e.forEach(function(e) {
                        e && e.addedNodes && e.addedNodes.forEach(function(e) {
                            if (e && e.classList && e.classList.contains("tip") && (e.classList.contains("observed") || (e.classList.add("observed"), initTooltipNode($(e)))), e && e.classList && e.querySelectorAll(".tip").length)
                                for (var t = 0; t < e.querySelectorAll(".tip").length; t++) e.querySelectorAll(".tip")[t] && e.querySelectorAll(".tip")[t].classList && e.querySelectorAll(".tip")[t].classList.contains("tip") && (e.querySelectorAll(".tip")[t].classList.contains("observed") || (e.querySelectorAll(".tip")[t].classList.add("observed"), initTooltipNode($(e.querySelectorAll(".tip")[t]))))
                        })
                    })
                }).observe(document.body, {
                    attributes: !0,
                    childList: !0,
                    subtree: !0,
                    characterData: !0
                })
            }
        }, {
            key: "addTooltipsChangeObserver",
            value: function() {
                document.body && $(".tip").length && new MutationObserver(function(e) {
                    e.forEach(function(e) {
                        "attributes" === e.type && "data-title" === e.attributeName && e.target.classList.contains("tip") && $(e.target).tooltipster("content", e.target.dataset.title)
                    })
                }).observe(document.querySelector(".tip"), {
                    attributes: !0
                })
            }
        }, {
            key: "excludePrintableIframeFromDarkMode",
            value: function() {
                $(document).ready(function() {
                    $("html").hasClass("dark-active") && ($("iframe").filter(function() {
                        return this.src.match(/preview/)
                    }).addClass("dark-exclude"), $("iframe").filter(function() {
                        return this.src.match(/view_template/)
                    }).addClass("dark-exclude"))
                })
            }
        }, {
            key: "addEventListenerForTextSelection",
            value: function() {
                $(document).on("click", "[data-select-text]", function() {
                    var e = $(this)[0],
                        t = window.getSelection(),
                        n = document.createRange();
                    n.selectNodeContents(e), t.removeAllRanges(), t.addRange(n), document.execCommand("copy"), initToast(__("Copied") + "!", "success")
                }), $(document).on("click", "[data-select-text-from-title]", function() {
                    var e = $(this).attr("title"),
                        t = $("<textarea>");
                    $("body").append(t), t.val(e).select(), document.execCommand("copy"), t.remove(), initToast(__("Copied") + "!", "success")
                })
            }
        }, {
            key: "addEventListenerForRippleButtons",
            value: function() {
                $(document).on("mouseenter", ".btn-hover-ripple", function(e) {
                    var t = $(this).offset(),
                        n = e.pageX - t.left,
                        e = e.pageY - t.top;
                    $(this).find(".btn-ripple").css({
                        top: e,
                        left: n
                    })
                }).on("mouseout", ".btn-hover-ripple", function(e) {
                    var t = $(this).offset(),
                        n = e.pageX - t.left,
                        e = e.pageY - t.top;
                    $(this).find(".btn-ripple").css({
                        top: e,
                        left: n
                    })
                })
            }
        }]), e
    }(),
    AppSideMenu = function() {
        function e() {
            _classCallCheck(this, e)
        }
        return _createClass(e, null, [{
            key: "adjustSideMenuHeight",
            value: function() {
                $(document).ready(function() {
                    $(window).height();
                    var e = $(".header").outerHeight(),
                        t = $(".logo").outerHeight(),
                        n = $(".sticky-message").length ? $(".sticky-message").outerHeight() : 0,
                        o = $(".main-nav").outerHeight();
                    $(".prim-nav").outerHeight();
                    $(".prim-nav").height(o - t - n)
                })
            }
        }, {
            key: "loadScrollbarToSideMenu",
            value: function() {
                var e = $(".nav-scroll");
                e.length && (IS_RTL && e.css("direction", "rtl"), new SimpleBar(e[0], {
                    direction: IS_RTL ? "rtl" : "ltr"
                }))
            }
        }, {
            key: "addResizeEventListenerForSideMenu",
            value: function() {
                $(window).resize(function() {
                    e.adjustSideMenuHeight()
                })
            }
        }, {
            key: "addScrollEventListenerToSideMenu",
            value: function() {
                var e = $(".nav-scroll");
                e && e.length && e[0].SimpleBar && $(e[0].SimpleBar.getScrollElement()).scroll(function() {
                    localStorage.setItem("lastMenuPosition", $($(".nav-scroll")[0].SimpleBar.getScrollElement()).scrollTop())
                })
            }
        }, {
            key: "loadLastActiveScrollPosition",
            value: function() {
                isLocalStorageSupported() && $(window).on("load", function() {
                    $(".nav-scroll").length && setTimeout(function() {
                        "undefined" !== localStorage.getItem("lastMenuPosition") && $(".nav-scroll")[0].SimpleBar && $($(".nav-scroll")[0].SimpleBar.getScrollElement()).scrollTop(localStorage.getItem("lastMenuPosition"))
                    }, 0)
                })
            }
        }]), e
    }(),
    AppForms = function() {
        function e() {
            _classCallCheck(this, e)
        }
        return _createClass(e, null, [{
            key: "addClickEventListenerToFormsCancelBtn",
            value: function() {
                $("body").find(".cancel-btn").click(function() {
                    var e = $(".breadcrumb-item.active"),
                        t = e.prev().find("a").attr("href");
                    e.length ? "undefined" !== _typeof(e = $(this).attr("href")) && !1 !== e || (window.location.href = t) : window.history.back()
                })
            }
        }]), e
    }();
App.init();
//# sourceMappingURL=app.js.map