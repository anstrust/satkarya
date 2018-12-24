function ajax_form(r, e, t) {
    var r = r,
        o = $.post(ajax_url + e, $("#" + r).serialize(), function(e) {
            $("#loading").html("");
            var a = e.split("\n"),
                i = !1;
            for (var n in a) {
                if (parseInt(n) != n) break;
                var _ = a[n];
                _ = _.split("|"), "error" == $.trim(_[0]) ? ("error_msg" == $.trim(_[1]) && ($("div.workPopSelctOut").html(_[2]), showPopUp("success_popup")), i || $("#" + t).show(), i = !0, $("#err_" + _[1]).show(), add_remove_class("ok", "error", _[1]), $("#err_" + _[1]).length > 0 && $("#err_" + _[1]).html(_[2])) : "ok" == $.trim(_[0]) && (add_remove_class("error", "ok", _[1]), $("#err_" + _[1]).hide())
            }
            if (i) add_remove_class("success", "error", t);
            else {
                if ("signup" == r) {
                    var l = $(".new_error").attr("rel"),
                        s = $(".new_error1").attr("rel");
                    if (1 == l || 1 == s) return !1
                }
                if ("add_publication" == r) {
                    var l = $(".new_error").attr("rel"),
                        s = $(".new_error1").attr("rel");
                    if (1 == l || 1 == s) return !1
                }
                if ("edit_publication" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("post" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("news" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("event" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("edit_post_job" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("post_job" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("mooc" == r) {
                    var l = $(".new_error").attr("rel"),
                        l = $(".new_error1").attr("rel");
                    if (1 == l) return !1
                }
                if ("mcq_mooc" == r) {
                    var l = $(".new_error").attr("rel"),
                        l = $(".new_error1").attr("rel");
                    if (1 == l) return !1
                }
                if ("add_group" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("add_webinar" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("add_video_lecture" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
             if ("add_instructor" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("add_assignment" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                if ("add_blog" == r) {
                    var l = $(".new_error").attr("rel");
                    if (1 == l) return !1
                }
                $("#" + r).submit(), add_remove_class("error", "success", t), $("#" + t).show()
            }
            o = null
        });
    return !1
}

function add_remove_class(r, e, t) {
    $("#" + t).hasClass(r) && $("#" + t).removeClass(r), $("#" + t).addClass(e)
}
var host = window.location.host,
    proto = window.location.protocol,
    ajax_url = proto + "//" + host + "/tarpanam/";