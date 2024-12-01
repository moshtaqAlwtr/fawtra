"use strict";

function _typeof(t) {
    return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
        return typeof t
    } : function(t) {
        return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
    })(t)
}

function initPageLoader() {
    $("body").append('<div class="page-loader" style="display:none"><div class="spinner-wrap"><div class="spinner-border loading-spinner-icon" role="status"></div></div></div>'), $("body").find(".page-loader").fadeIn("fast", function() {})
}

function removePageLoader() {
    $("body").find(".page-loader").fadeOut("fast", function() {
        $(this).remove()
    })
}

function initLoader(t) {
    $(t).addClass("is-loading")
}

function removeLoader(t) {
    $(t).removeClass("is-loading")
}
var initToast = function() {
    var e = null;
    return function(t, i) {
        void 0 === _typeof(i) && (i = "inactive"), e && e.dismiss();
        var n = document.createElement("div"),
            i = (n.className = "fixed-toast shadow shadow-lg-dark", n.classList.add("bg-" + (i = i || "dark")), n.innerHTML = "<p>" + t + '</p><div class="pl-1"><span class="fa-stack action pointer"><i class="fa fa-circle text-dark-lt fa-stack-2x"></i><i class="fa fa-times fa-stack-1x fa-inverse"></i></span></div>', n.dismiss = function() {
                this.style.opacity = 0
            }, n.dismiss.bind(n));
        n.querySelector(".action").addEventListener("click", i), setTimeout(function() {
            e === this && e.dismiss()
        }.bind(n), 5e3), n.addEventListener("transitionend", function(t, i) {
            "opacity" === t.propertyName && 0 == this.style.opacity && (this.parentElement.removeChild(this), e === this) && (e = null)
        }.bind(n)), e = n, document.body.appendChild(n), getComputedStyle(n).bottom, n.classList.add("active"), n.style.opacity = 1
    }
}();

function initTooltips() {
    var t = $(".tip");
    0 < t.length && (initTooltipNode(t), t.addClass("non observed"))
}

function initTooltipNode(t) {
    t.tooltipster({
        theme: "tooltipster-borderless",
        contentAsHTML: !0,
        debug: !1,
        delay: 100,
        functionInit: function(n, t) {
            var i = $(t.origin).attr("data-tooltipster");
            i && (i = JSON.parse(i), $.each(i, function(t, i) {
                n.option(t, i)
            })), t.origin.dataset.title = n.content()
        }
    })
}

function onReceiveBarCode(t) {
    "undefined" != typeof onScan ? onScan.simulate(document, t.toString()) : $(document).scannerDetection(t.toString())
}
//# sourceMappingURL=helpers.js.map