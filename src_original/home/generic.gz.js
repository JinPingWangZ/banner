
window.initNewHDPage = function() {
    var e;
    Object(i.a)('.home [data-gatrack="1"]').on("click", function(e) {
        window.ga("b.send", "event", "Homepage", "Click", Object(i.a)(e.currentTarget).data("gatrack-name"))
    }), e = Object(i.a)(".slider"), navigator.msMaxTouchPoints ? (e.addClass("ms-touch"), e.on("scroll", function() {
        Object(i.a)(".slide-image")[0].style.transform = "translate3d(-" + (100 - this.scrollLeft / 6) + "'px, 0, 0)"
    })) : (new o.a).bindUIEvents(), $('[data-toggle="tooltip"]').tooltip(), Object(i.a)(".home .discover").on("click", s), r(".everything-you-need", ".no-coding-skills", ".image-container"), r(".responsive-and-animated", ".get-more-clicks", ".image-container"), r(".social-media-visuals", ".social-media-strategy", ".image-container", ".background"), "complete" === document.readyState ? Object(a.a)() : document.onreadystatechange = function() {
        "complete" === document.readyState && Object(a.a)()
    }
}
window.initFooterSignup = function() {
    Object(s.e)(function() {
        b(), window.router && window.router.onChangeRoute(b, !0);
        var e = h(),
            t = e.find("input");
        t.on("blur", function(e) {
            O || ("e" === e.target.name && p(), C(e.target, !0))
        }), t.on("keyup", function(e) {
            "e" === e.target.name && 13 !== e.keyCode && (p(), m("e"))
        }), k(), e.on("submit", function(e) {
            e.preventDefault(), Object(s.g)("QuickRegister", "Click", "Sign up"),
                function() {
                    for (var e = h(), t = ["screenname", "e", "p"], n = 0; n < t.length; n++) {
                        var i = e.find("input[name=" + t[n] + "]");
                        if (!C(i[0])) return T(), !1
                    }
                    return !0
                }() && null !== l && (window.grecaptcha.execute(l), O = !0, setTimeout(function() {
                    O = !1
                }, 100))
        }), Object(a.a)(".quick-sign-up").find(".quickSignUpNote a").on("click", function() {
            Object(s.g)("QuickRegister", "Click", "Terms of Service")
        })
    })
}