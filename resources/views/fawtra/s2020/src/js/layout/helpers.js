"use strict";

function _typeof(obj) {
    "@babel/helpers - typeof";
    return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
        return typeof obj;
    } : function(obj) {
        return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    }, _typeof(obj);
}
/**
 * Global Variables
 */
// let body = $('document.body');

/**
 * Show Page Loading popup
 */
function initPageLoader() {
    $('body').append('<div class="page-loader" style="display:none"><div class="spinner-wrap"><div class="spinner-border loading-spinner-icon" role="status"></div></div></div>');
    $('body').find('.page-loader').fadeIn("fast", function() {});
}

/**
 * Hide Page Loading popup
 */
function removePageLoader() {
    $('body').find('.page-loader').fadeOut("fast", function() {
        $(this).remove();
    });
}

/**
 * Show Loading spinner in element
 */
function initLoader(element) {
    $(element).addClass('is-loading');
}

/**
 * Hide Loading spinner in element
 */
function removeLoader(element) {
    $(element).removeClass('is-loading');
}

/**
 * Init toast with text and status
 */
var initToast = function() {
    // Any snackbar that is already shown
    var previous = null;
    return function(message, type) {
        if (_typeof(type) === undefined) {
            type = "inactive";
        }
        if (previous) {
            previous.dismiss();
        }
        var snackbar = document.createElement("div");
        snackbar.className = "fixed-toast shadow shadow-lg-dark";
        type = type ? type : 'dark';
        snackbar.classList.add("bg-" + type);
        snackbar.innerHTML = "<p>" + message + '</p><div class="pl-1"><span class="fa-stack action pointer"><i class="fa fa-circle text-dark-lt fa-stack-2x"></i><i class="fa fa-times fa-stack-1x fa-inverse"></i></span></div>';
        snackbar.dismiss = function() {
            this.style.opacity = 0;
        };
        var action = snackbar.dismiss.bind(snackbar);
        snackbar.querySelector(".action").addEventListener("click", action);
        setTimeout(function() {
            if (previous === this) {
                previous.dismiss();
            }
        }.bind(snackbar), 5000);
        snackbar.addEventListener("transitionend", function(event, elapsed) {
            if (event.propertyName === "opacity" && this.style.opacity == 0) {
                this.parentElement.removeChild(this);
                if (previous === this) {
                    previous = null;
                }
            }
        }.bind(snackbar));
        previous = snackbar;
        document.body.appendChild(snackbar);
        // In order for the animations to trigger, I have to force the original style to be computed, and then change it.
        getComputedStyle(snackbar).bottom;
        snackbar.classList.add("active");
        snackbar.style.opacity = 1;
    };
}();

/**
 * Load tooltips in page
 */
function initTooltips() {
    var $tooltips = $('.tip');
    if ($tooltips.length > 0) {
        initTooltipNode($tooltips);
        $tooltips.addClass('non observed');
    }
}

/**
 * Load tooltip
 */
function initTooltipNode($tooltips) {
    $tooltips.tooltipster({
        theme: 'tooltipster-borderless',
        contentAsHTML: true,
        debug: false,
        delay: 100,
        functionInit: function functionInit(instance, helper) {
            var $origin = $(helper.origin),
                dataOptions = $origin.attr('data-tooltipster');
            if (dataOptions) {
                dataOptions = JSON.parse(dataOptions);
                $.each(dataOptions, function(name, option) {
                    instance.option(name, option);
                });
            }
            helper.origin.dataset.title = instance.content();
        }
    });
}

function onReceiveBarCode(barcode) {
    if (typeof onScan != 'undefined') {
        onScan.simulate(document, barcode.toString());
    } else {
        $(document).scannerDetection(barcode.toString());
    }
}