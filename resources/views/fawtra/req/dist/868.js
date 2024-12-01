"use strict";
(self.webpackChunkizam_layout_2022 = self.webpackChunkizam_layout_2022 || []).push([
    [868], {
        56868: function(t, e, n) {
            n.r(e), n.d(e, {
                default: function() {
                    return c
                }
            });
            var i = n(4942),
                a = n(15671),
                o = n(43144),
                l = n(47575),
                r = n.n(l),
                s = (n(7490), n(6890), n(38860), n(38619), n(1236), n(72682), n(15209), n(17259), n(78843), n(72170), n(77339));

            function u() {
                for (var t = [], e = document.styleSheets, n = 0; n < e.length; n++) e[n].href && t.push(e[n].href);
                return t
            }
            var c = function() {
                    function t() {
                        (0, a.Z)(this, t)
                    }
                    return (0, o.Z)(t, [{
                        key: "initAll",
                        value: function() {
                            s("[data-app-form-editor]").each((function(t, e) {
                                new f(e).init()
                            }))
                        }
                    }, {
                        key: "initAllInNode",
                        value: function(t) {
                            t.find("[data-app-form-editor]").each((function(t, e) {
                                new f(e).init()
                            }))
                        }
                    }]), t
                }(),
                f = function() {
                    function t(e, n) {
                        (0, a.Z)(this, t), (0, i.Z)(this, "name", ""), (0, i.Z)(this, "element", []), (0, i.Z)(this, "editor", []), (0, i.Z)(this, "editorElement", []), this.element = s(e), n && (this.config = n)
                    }
                    return (0, o.Z)(t, [{
                        key: "init",
                        value: function() {
                            var t = this;
                            this.name = this.element.data("app-form-editor"), this.initEditor().then((function(e) {
                                t.editor = e
                            }))
                        }
                    }, {
                        key: "initEditor",
                        value: function() {
                            var t = this;
                            return new Promise((function(e, n) {
                                r().init({
                                    target: t.element.get(0),
                                    inline: !1,
                                    menubar: !1,
                                    plugins: "table link lists directionality pagebreak image",
                                    verify_html: !1,
                                    cleanup: !1,
                                    allow_conditional_comments: !0,
                                    extended_valid_elements: "span[*]",
                                    newline_behavior: "invert",
                                    contextmenu: !1,
                                    content_css: u(),
                                    body_class: "ui-printable-page",
                                    hidden_input: !1,
                                    editable_class: "mce-inline-editable-area",
                                    noneditable_class: "mce-inline-non-editable-area",
                                    toolbar_persist: !0,
                                    font_size_formats: "8px 10px 12px 14px 16px 18px 24px 36px 48px",
                                    toolbar: "restoredraft undo redo styles textstyle alignment indent outdent bullist numlist ltr rtl link pagebreak image table",
                                    setup: function(t) {
                                        t.ui.registry.addGroupToolbarButton("alignment", {
                                            icon: "align-left",
                                            tooltip: "Alignment",
                                            items: "alignleft aligncenter alignright | alignjustify"
                                        }), t.ui.registry.addGroupToolbarButton("textstyle", {
                                            icon: "change-case",
                                            tooltip: "Text Style",
                                            items: "fontsize | bold italic underline | forecolor backcolor | fontfamily"
                                        }), t.on("change", (function() {
                                            t.save()
                                        })), t.on("init", (function() {
                                            e(t)
                                        }))
                                    }
                                })
                            }))
                        }
                    }]), t
                }()
        }
    }
]);