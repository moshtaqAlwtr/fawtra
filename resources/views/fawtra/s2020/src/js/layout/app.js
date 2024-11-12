"use strict";

function _typeof(obj) {
    "@babel/helpers - typeof";
    return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
        return typeof obj;
    } : function(obj) {
        return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    }, _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
    }
}

function _defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ("value" in descriptor) descriptor.writable = true;
        Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor);
    }
}

function _createClass(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties(Constructor, staticProps);
    Object.defineProperty(Constructor, "prototype", {
        writable: false
    });
    return Constructor;
}

function _toPropertyKey(arg) {
    var key = _toPrimitive(arg, "string");
    return _typeof(key) === "symbol" ? key : String(key);
}

function _toPrimitive(input, hint) {
    if (_typeof(input) !== "object" || input === null) return input;
    var prim = input[Symbol.toPrimitive];
    if (prim !== undefined) {
        var res = prim.call(input, hint || "default");
        if (_typeof(res) !== "object") return res;
        throw new TypeError("@@toPrimitive must return a primitive value.");
    }
    return (hint === "string" ? String : Number)(input);
}
/**
 * App Class: Whole app
 */
var App = /*#__PURE__*/ function() {
    function App() {
        _classCallCheck(this, App);
    }
    _createClass(App, null, [{
        key: "init",
        value: function init() {
            $(document).ready(function(e) {
                AppUI.adjustBodySpacing();
            });
            setTimeout(function() {
                AppUI.adjustBodySpacing();
            }, 300);
            setTimeout(function() {
                AppUI.adjustBodySpacing();
            }, 1500);
            setTimeout(function() {
                AppUI.adjustBodySpacing();
            }, 2000);
            AppUI.loadTooltips();
            AppUI.addTooltipsObserver();
            AppUI.addTooltipsChangeObserver();
            AppUI.excludePrintableIframeFromDarkMode();
            AppUI.addEventListenerForTextSelection();
            AppUI.addEventListenerForRippleButtons();
            if (typeof IS_APP === 'undefined' || !IS_APP) {
                AppSideMenu.loadScrollbarToSideMenu();
            }
            AppSideMenu.addResizeEventListenerForSideMenu();
            AppSideMenu.addScrollEventListenerToSideMenu();
            AppSideMenu.loadLastActiveScrollPosition();
            AppForms.addClickEventListenerToFormsCancelBtn();
        }
    }]);
    return App;
}();
/**
 * App UI Class: Handle App Layout UI Tasks
 */
var AppUI = /*#__PURE__*/ function() {
    function AppUI() {
        _classCallCheck(this, AppUI);
    }
    _createClass(AppUI, null, [{
        key: "adjustBodySpacing",
        value: function adjustBodySpacing() {
            var $pageHead = $(".pages-head-s2020");
            $pageHead = $pageHead.length == 0 ? $(".pages-head") : $pageHead;
            if ($pageHead.length) {
                $pageHead.addClass('fixed-div');
                $pageHead[0].style.setProperty("position", "fixed", "important");;
                var $mainArea = $(".main-area");
                var topBarHeight = $(".header").outerHeight();
                var pageHeadHeight = $pageHead.length ? $pageHead.outerHeight() : 0;
                $pageHead.css("top", topBarHeight);
                $mainArea.css("padding-top", topBarHeight + 20);
                $mainArea.css("padding-top", topBarHeight + pageHeadHeight + 20);
                $mainArea.css("margin-top", 0);
            }
        }
    }, {
        key: "loadTooltips",
        value: function loadTooltips() {
            initTooltips();
        }
    }, {
        key: "loadLightgallery",
        value: function loadLightgallery() {
            initLightgallery();
        }
    }, {
        key: "addTooltipsObserver",
        value: function addTooltipsObserver() {
            if (document.body) {
                // create an observer instance
                var observer = new MutationObserver(function(mutations) {
                    //loop through the detected mutations(added controls)
                    mutations.forEach(function(mutation) {
                        //addedNodes contains all detected new controls
                        if (mutation && mutation.addedNodes) {
                            mutation.addedNodes.forEach(function(elm) {
                                // only apply to selected elements if it is already a parent
                                if (elm && elm.classList && elm.classList.contains('tip')) {
                                    if (!elm.classList.contains('observed')) {
                                        elm.classList.add('observed');
                                        initTooltipNode($(elm));
                                    }
                                }
                                // also apply to elements if its a child of parent
                                if (elm && elm.classList && elm.querySelectorAll('.tip').length) {
                                    for (var i = 0; i < elm.querySelectorAll('.tip').length; i++) {
                                        if (elm.querySelectorAll('.tip')[i] && elm.querySelectorAll('.tip')[i].classList && elm.querySelectorAll('.tip')[i].classList.contains('tip')) {
                                            if (!elm.querySelectorAll('.tip')[i].classList.contains('observed')) {
                                                elm.querySelectorAll('.tip')[i].classList.add('observed');
                                                initTooltipNode($(elm.querySelectorAll('.tip')[i]));
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    });
                });

                // pass in the target node, as well as the observer options
                observer.observe(document.body, {
                    attributes: true,
                    childList: true,
                    subtree: true,
                    characterData: true
                });
            }
        }
    }, {
        key: "addTooltipsChangeObserver",
        value: function addTooltipsChangeObserver() {
            if (document.body && $('.tip').length) {
                var observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.type === "attributes") {
                            if (mutation.attributeName === "data-title" && mutation.target.classList.contains('tip')) {
                                $(mutation.target).tooltipster('content', mutation.target.dataset.title);
                            }
                        }
                    });
                });
                observer.observe(document.querySelector('.tip'), {
                    attributes: true
                });
            }
        }
    }, {
        key: "excludePrintableIframeFromDarkMode",
        value: function excludePrintableIframeFromDarkMode() {
            $(document).ready(function() {
                if ($('html').hasClass('dark-active')) {
                    $('iframe').filter(function() {
                        return this.src.match(/preview/);
                    }).addClass('dark-exclude');
                    $('iframe').filter(function() {
                        return this.src.match(/view_template/);
                    }).addClass('dark-exclude');
                }
            });
        }
    }, {
        key: "addEventListenerForTextSelection",
        value: function addEventListenerForTextSelection() {
            $(document).on('click', '[data-select-text]', function() {
                var text = $(this)[0];
                var selection = window.getSelection();
                var range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
                document.execCommand('copy');
                initToast(__('Copied') + '!', 'success');
            });
            $(document).on('click', '[data-select-text-from-title]', function() {
                var textToCopy = $(this).attr("title");
                var tempTextarea = $('<textarea>');
                $('body').append(tempTextarea);
                tempTextarea.val(textToCopy).select();
                document.execCommand('copy');
                tempTextarea.remove();
                initToast(__('Copied') + '!', 'success');
            });
        }
    }, {
        key: "addEventListenerForRippleButtons",
        value: function addEventListenerForRippleButtons() {
            $(document).on('mouseenter', '.btn-hover-ripple', function(e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('.btn-ripple').css({
                    top: relY,
                    left: relX
                });
            }).on('mouseout', '.btn-hover-ripple', function(e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('.btn-ripple').css({
                    top: relY,
                    left: relX
                });
            });
        }
    }]);
    return AppUI;
}();
/**
 * App Side Menu Class: Handle Side Menu UI Tasks
 */
var AppSideMenu = /*#__PURE__*/ function() {
    function AppSideMenu() {
        _classCallCheck(this, AppSideMenu);
    }
    _createClass(AppSideMenu, null, [{
        key: "adjustSideMenuHeight",
        value: function adjustSideMenuHeight() {
            $(document).ready(function() {
                var totalheight = $(window).height();
                var header = $(".header").outerHeight();
                var logoh = $(".logo").outerHeight();
                var stickyMessage = $('.sticky-message').length ? $('.sticky-message').outerHeight() : 0;
                var navh = $(".main-nav").outerHeight();
                var primnav = $(".prim-nav").outerHeight();
                var triggernav = header + logoh + primnav;
                $(".prim-nav").height(navh - logoh - stickyMessage);
            });
        }
    }, {
        key: "loadScrollbarToSideMenu",
        value: function loadScrollbarToSideMenu() {
            var $navScroll = $(".nav-scroll");
            if ($navScroll.length) {
                if (IS_RTL) {
                    $navScroll.css("direction", "rtl");
                }
                new SimpleBar($navScroll[0], {
                    direction: IS_RTL ? "rtl" : "ltr"
                });
            }
        }
    }, {
        key: "addResizeEventListenerForSideMenu",
        value: function addResizeEventListenerForSideMenu() {
            $(window).resize(function() {
                AppSideMenu.adjustSideMenuHeight();
            });
        }
    }, {
        key: "addScrollEventListenerToSideMenu",
        value: function addScrollEventListenerToSideMenu() {
            var navScrollNode = $('.nav-scroll');
            if (navScrollNode && navScrollNode.length && navScrollNode[0].SimpleBar) {
                $(navScrollNode[0].SimpleBar.getScrollElement()).scroll(function() {
                    localStorage.setItem("lastMenuPosition", $($(".nav-scroll")[0].SimpleBar.getScrollElement()).scrollTop());
                });
            }
        }
    }, {
        key: "loadLastActiveScrollPosition",
        value: function loadLastActiveScrollPosition() {
            if (isLocalStorageSupported()) {
                $(window).on("load", function() {
                    if ($(".nav-scroll").length) {
                        setTimeout(function() {
                            if (localStorage.getItem("lastMenuPosition") !== "undefined" && $('.nav-scroll')[0].SimpleBar) {
                                $($(".nav-scroll")[0].SimpleBar.getScrollElement()).scrollTop(localStorage.getItem("lastMenuPosition"));
                            }
                        }, 0);
                    }
                });
            }
        }
    }]);
    return AppSideMenu;
}();
/**
 * App Forms Class: Handle App Forms and Form controls UI Tasks
 */
var AppForms = /*#__PURE__*/ function() {
    function AppForms() {
        _classCallCheck(this, AppForms);
    }
    _createClass(AppForms, null, [{
        key: "addClickEventListenerToFormsCancelBtn",
        value: function addClickEventListenerToFormsCancelBtn() {
            $("body").find(".cancel-btn").click(function() {
                var pageBreadcrumbs = $(".breadcrumb-item.active");
                var breadCrumbsLink = pageBreadcrumbs.prev().find("a").attr("href");
                if (pageBreadcrumbs.length) {
                    var attr = $(this).attr("href");
                    if (_typeof(attr) !== (typeof undefined === "undefined" ? "undefined" : _typeof(undefined)) && attr !== false) {} else {
                        window.location.href = breadCrumbsLink;
                    }
                } else {
                    window.history.back();
                }
            });
        }
    }]);
    return AppForms;
}();
App.init();