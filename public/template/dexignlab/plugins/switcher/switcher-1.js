function addSwitcher() {
    var currentURL = window.location.href;
    var urlLTR = "";
    var urlRTL = "";
    if (currentURL.indexOf("xhtml-rtl") > -1) {
        urlLTR = currentURL.replace("xhtml-rtl", "xhtml");
        urlRTL = currentURL;
    } else {
        urlRTL = currentURL.replace("xhtml", "xhtml-rtl");
        urlLTR = currentURL;
    }

    var dzSwitcher =
        '<div id="dzSwitcher" class="styleswitcher"><div class="styleswitcher-inner"> <div class="switcher-btn-bx"> <a class="switch-btn closed"> <span class="fa fa-cogs fa-lg"></span> </a></div><a href="javascript:void(0);" class="dez-page site-button button-sm" onclick="deleteAllCookie();">Delete All Cookie</a> <div class="theme-box"> <ul val="themeFullColor" class="color-skins-db theme-panel-save"> <li> <a class="theme-skin skin-1" href="#" dir="css/skin/skin-1" logo="images/logo.png"></a></li><li> <a class="theme-skin skin-2" href="#" dir="css/skin/skin-2" logo="images/logo-2.png"></a></li><li> <a class="theme-skin skin-3" href="#" dir="css/skin/skin-3" logo="images/logo-3.png"></a></li><li> <a class="theme-skin skin-4" href="#" dir="css/skin/skin-4" logo="images/logo-4.png"></a></li><li> <a class="theme-skin skin-5" href="#" dir="css/skin/skin-5" logo="images/logo-5.png"></a></li><li> <a class="theme-skin skin-6" href="#" dir="css/skin/skin-6" logo="images/logo-6.png"></a></li><li> <a class="theme-skin skin-7" href="#" dir="css/skin/skin-7" logo="images/logo-7.png"></a></li><li> <a class="theme-skin skin-8" href="#" dir="css/skin/skin-8" logo="images/logo-8.png"></a></li></ul> </div></div></div><div class="switcher-demo"><div class="switcher-btn-bx"><a class="switch-demo-btn closed"> Check Demo </a></div><div class="styleswitcher-inner"><div class="switch-demo-bx"><ul class="switch-demo"><li> <a href="01-index-photographer.html"> <img src="images/demo/01-index-photographer.jpg" alt=""> </a></li><li> <a href="02-index-business-man.html"> <img src="images/demo/02-index-business-man.jpg" alt=""> </a></li><li> <a href="03-index-modal.html"> <img src="images/demo/03-index-modal.jpg" alt=""> </a></li><li> <a href="04-index-doctor.html"> <img src="images/demo/04-index-doctor.jpg" alt=""> </a></li><li> <a href="05-index-security.html"> <img src="images/demo/05-index-security.jpg" alt=""> </a></li><li> <a href="06-index-health-coach.html"> <img src="images/demo/06-index-health-coach.jpg" alt=""> </a></li><li> <a href="07-index-electrician.html"> <img src="images/demo/07-index-electrician.jpg" alt=""> </a></li><li> <a href="08-index-blogger.html"> <img src="images/demo/08-index-blogger.jpg" alt=""> </a></li><li> <a href="09-index-web-developer.html"> <img src="images/demo/09-index-web-developer.jpg" alt=""> </a></li><li> <a href="10-index-swimmer.html"> <img src="images/demo/10-index-swimmer.jpg" alt=""> </a></li><li> <a href="11-index-dance-trainer.html"> <img src="images/demo/11-index-dance-trainer.jpg" alt=""> </a></li><li> <a href="12-index-news-anchor.html"> <img src="images/demo/12-index-news-anchor.jpg" alt=""> </a></li><li> <a href="13-index-youtube.html"> <img src="images/demo/13-index-youtube.jpg" alt=""> </a></li></ul></div></div></div>';

    if ($("#dzSwitcher").length == 0) {
        jQuery("body").append(dzSwitcher);
    }
}

jQuery(window).on("load", function () {
    //=== Switcher panal slide function	=====================//
    jQuery(".styleswitcher").animate({
        left: "-70px",
    });
    jQuery(".switcher-demo").animate({
        left: "-300px",
    });
    jQuery(".switch-btn").addClass("closed");
    jQuery(".switch-demo-btn").addClass("closed");
    //=== Switcher panal slide function END	=====================//
});

$(function () {
    "use strict";

    addSwitcher();
    //=== Switcher panal slide function	=====================//
    jQuery(".switch-btn").on("click", function () {
        if (jQuery(this).hasClass("open")) {
            jQuery(this).addClass("closed");
            jQuery(this).removeClass("open");
            jQuery(".styleswitcher").animate({
                left: "-70px",
            });
        } else {
            if (jQuery(this).hasClass("closed")) {
                jQuery(this).addClass("open");
                jQuery(this).removeClass("closed");
                jQuery(".styleswitcher").animate({
                    left: "15px",
                });
            }
        }
    });

    //=== Switcher panal slide function	=====================//
    jQuery(".switch-demo-btn").on("click", function () {
        if (jQuery(this).hasClass("open")) {
            jQuery(this).addClass("closed");
            jQuery(this).removeClass("open");
            jQuery(".switcher-demo").animate({
                left: "-300px",
            });
        } else {
            if (jQuery(this).hasClass("closed")) {
                jQuery(this).addClass("open");
                jQuery(this).removeClass("closed");
                jQuery(".switcher-demo").animate({
                    left: "0",
                });
            }
        }
    });
    //=== Switcher panal slide function END	=====================//

    //=== Color css change function	=====================//
    // Color changer
    jQuery(".skin-1").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-1.css");
        jQuery(".site-header .logo-header img").attr("src", "images/logo.png");
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black.png"
        );
        return false;
    });
    jQuery(".skin-2").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-2.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-2.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-2.png"
        );
        return false;
    });

    jQuery(".skin-3").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-3.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-3.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-3.png"
        );
        return false;
    });

    jQuery(".skin-4").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-4.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-4.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-4.png"
        );
        return false;
    });

    jQuery(".skin-5").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-5.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-5.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-5.png"
        );
        return false;
    });

    jQuery(".skin-6").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-6.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-6.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-6.png"
        );
        return false;
    });

    jQuery(".skin-7").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-7.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-7.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-7.png"
        );
        return false;
    });

    jQuery(".skin-8").on("click", function () {
        jQuery(".skin").attr("href", "css/skin/skin-8.css");
        jQuery(".site-header .logo-header img").attr(
            "src",
            "images/logo-8.png"
        );
        jQuery(".site-header .logo-dark img").attr(
            "src",
            "images/logo-black-8.png"
        );
        return false;
    });

    //=== Color css change function	=====================//

    //=== Background image change function	=====================//
    jQuery(".background-switcher li img").on("click", function () {
        var imgbg = jQuery(this).attr("dir");
        //console.<span id="IL_AD2" class="IL_AD">log</span>(imgbg);
        jQuery("#bg").css({ backgroundImage: "url(" + imgbg + ")" });
    });
    //=== Background image change function	End=====================//

    //=== Background pattern change function	=====================//
    jQuery(".pattern-switcher li img").on("click", function () {
        var imgbg = jQuery(this).attr("dir");
        //console.<span id="IL_AD2" class="IL_AD">log</span>(imgbg);
        jQuery("#bg").css({ backgroundImage: "url(" + imgbg + ")" });
        jQuery("#bg").css("background-size", "auto");
    });
    //=== Background pattern change function End=====================//

    //=== Background pattern change function	=====================//
    jQuery(".bg-color-switcher li a").on("click", function () {
        var bgcolor = jQuery(this).attr("dir");
        //alert(bgcolor);
        //console.<span id="IL_AD2" class="IL_AD">log</span>(bgcolor);
        jQuery("#bg").css("background-color", bgcolor);
        jQuery("#bg").css("background-image", "");
    });
    //=== Background pattern change function End=====================//

    //=== Layout boxed & fullscreen change function	=====================//
    jQuery(".layout-view li ").on("click", function () {
        jQuery(".layout-view li ").removeClass("active");
        jQuery(this).addClass("active");
    });
    jQuery(".skin-view li ").on("click", function () {
        jQuery(".skin-view li ").removeClass("active");
        jQuery(this).addClass("active");
    });

    jQuery(".wide-layout").on("click", function () {
        jQuery("body").addClass("wide-layout");
        jQuery("body").removeClass("boxed");
        jQuery("body").removeClass("frame").removeAttr("style");
        jQuery("#ThemeRangeSlider").hide("slow");
    });

    jQuery(".boxed").on("click", function () {
        jQuery("body").addClass("boxed");
        jQuery("body").removeClass("wide-layout");
        jQuery("body").removeClass("frame").removeAttr("style");
        jQuery("#ThemeRangeSlider").hide("slow");
    });
    jQuery(".frame").on("click", function () {
        jQuery("body").addClass("frame");
        jQuery("body").removeClass("wide-layout");
        jQuery("body").removeClass("boxed");
        jQuery("body").removeClass("boxed");
        jQuery("#ThemeRangeSlider").show("slow");
        //themeFramePadding();
        jQuery(".main-bar-wraper").addClass("sticky-no");
        jQuery(".main-bar-wraper").removeClass("sticky-header");
    });
    //themeFramePadding();
    //=== Layout boxed & fullscreen change function	END=====================//

    //=== Nav light & dark change function	END=====================//
    jQuery(".nav-view li ").on("click", function () {
        jQuery(".nav-view li ").removeClass("active");
        jQuery(this).addClass("active");
    });

    jQuery(".nav-light").on("click", function () {
        jQuery(".header-nav").addClass("nav-light");
        jQuery(".header-nav").removeClass("nav-dark");
    });

    jQuery(".nav-dark").on("click", function () {
        jQuery(".header-nav").addClass("nav-dark");
        jQuery(".header-nav").removeClass("nav-light");
    });
    //=== Nav light & dark change function	END=====================//

    /* Header View */
    jQuery(".header-view li ").on("click", function () {
        jQuery(".header-view li ").removeClass("active");
        jQuery(this).addClass("active");
    });

    jQuery(".header-fixed").on("click", function () {
        jQuery(".main-bar-wraper").addClass("sticky-header");
        jQuery(".main-bar-wraper").removeClass("sticky-no");
    });

    jQuery(".header-static").on("click", function () {
        jQuery(".main-bar-wraper").addClass("sticky-no");
        jQuery(".main-bar-wraper").removeClass("sticky-header");
    });
    /* Header View END */
});

/* Theme Panel Save */

var themeOption = [
    "themeStandardColor",
    "themeFullColor",
    "layout",
    "header",
    "bgColor",
    "bgImage",
    "bgPatten",
];
themeOption["layout"] = [
    "wide",
    "boxed",
    "frame",
    "frame_value",
    "layout_value",
];
themeOption["themeStandardColor"] = [
    "skin-1",
    "skin-2",
    "skin-3",
    "skin-4",
    "skin-5",
    "skin-6",
    "skin-7",
    "skin-8",
    "themeStandardColor_value",
    "themeStandardColor_logo",
];
themeOption["themeFullColor"] = [
    "css/skin/skin-1",
    "css/skin/skin-2",
    "css/skin/skin-3",
    "css/skin/skin-4",
    "css/skin/skin-5",
    "css/skin/skin-6",
    "css/skin/skin-7",
    "css/skin/skin-8",
    "themeFullColor_value",
    "themeFullColor_logo",
];
themeOption["header"] = ["fixed", "static", "header_value"];
themeOption["bgColor"] = [
    "#ef5525",
    "#009cff",
    "#d48d54",
    "#d2dd51",
    "#ffbf36",
    "#ff007c",
    "#6c2edb",
    "#00aab5",
    "bgColor_value",
];
themeOption["bgImage"] = [
    "bg1.jpg",
    "bg2.jpg",
    "bg3.jpg",
    "bg4.jpg",
    "bgImage_value",
];
themeOption["bgPatten"] = [
    "pt1.jpg",
    "pt2.jpg",
    "pt3.jpg",
    "pt4.jpg",
    "pt5.jpg",
    "pt6.jpg",
    "pt7.jpg",
    "pt8.jpg",
    "pt9.jpg",
    "pt10.jpg",
    "pt11.jpg",
    "pt12.jpg",
    "bgPatten_value",
];

jQuery(document).ready(function () {
    jQuery(".theme-panel-save li a, .theme-panel-save li img").on(
        "click",
        function () {
            //alert(1);
            var optionValue = jQuery(this).attr("dir");
            var optionData = jQuery(this).parent().parent().attr("val");
            //themeOption[optionData][optionData+'_value'] = data;
            //alert(data+' '+optionData);

            if (optionData == "bgColor") {
                deleteCookie("bgImage_value");
                deleteCookie("bgPatten_value");
            } else if (optionData == "bgImage") {
                deleteCookie("bgColor_value");
                deleteCookie("bgPatten_value");
            } else if (optionData == "bgPatten") {
                deleteCookie("bgColor_value");
                deleteCookie("bgImage_value");
            } else if (optionData == "themeStandardColor") {
                deleteCookie("themeFullColor_value");
            } else if (optionData == "themeFullColor") {
                var themeLogo = jQuery(this).attr("logo");
                setCookie("logo_value", themeLogo, 1);
                deleteCookie("themeStandardColor_value");
            } else if (
                optionData == "themeStandardColor" ||
                optionData == "themeFullColor"
            ) {
                var themeLogo = jQuery(this).attr("logo");
                setCookie(optionData + "_logo", themeLogo, 1);
            }

            setCookie(optionData + "_value", optionValue, 1);
        }
    );

    //setThemePanel();
    //deleteAllCookie();
    //alert(document.cookie);
});

//function themeFramePadding(){
//	var themeOptionFrameValue = getCookie('frame_value');
//	if(themeOptionFrameValue == ''){
//		themeOptionFrameValue = 20;
//	}
//
//	if($("#slider-range-3").length > 0 )
//	{
//
//		$("#slider-range-3").unbind().slider({
//				min: 20,
//				max: 80,
//				//value: 20,
//				value: themeOptionFrameValue,
//				animate:"slow",
//				orientation: "horizontal",
//				slide: function( event, ui ) {
//					frameSlider = ui.value;
//					$('#' + this.id).prev().val(frameSlider+"px");
//					$( "#bg" ).css('padding',frameSlider+"px");
//					setCookie('frame_value',frameSlider,1);
//			   }
//		});
//	}
//}

function setThemePanel() {
    jQuery.each(themeOption, function (index, themeOptionItem) {
        themeOptionItemValue = getCookie(themeOptionItem + "_value");
        //alert(themeOptionItem+' '+themeOptionItemValue);
        if (themeOptionItemValue != "") {
            if (themeOptionItem == "themeStandardColor") {
                jQuery(".skin").attr("href", themeOptionItemValue + ".css");
                setThemeLogo(themeOptionItem);
            } else if (themeOptionItem == "themeFullColor") {
                jQuery(".skin").attr("href", themeOptionItemValue + ".css");
                setThemeLogo(themeOptionItem);
            } else if (themeOptionItem == "layout") {
                jQuery("." + themeOptionItem + "-view li").removeClass(
                    "active"
                );
                jQuery("." + themeOptionItem + "-view")
                    .find("." + themeOptionItemValue)
                    .addClass("active");
                if (themeOptionItemValue == "frame") {
                    jQuery("#ThemeRangeSlider").show("slow");
                    jQuery("body").addClass(themeOptionItemValue);
                    themeOptionFrameValue = getCookie("frame_value");
                    if (themeOptionFrameValue == "") {
                        themeOptionFrameValue = 20;
                    }
                    jQuery("#FramePadding").val(themeOptionFrameValue + "px");
                    jQuery("#bg").css("padding", themeOptionFrameValue + "px");
                } else {
                    jQuery("body").addClass(themeOptionItemValue);
                }
            } else if (themeOptionItem == "header") {
                jQuery("." + themeOptionItem + "-view li").removeClass(
                    "active"
                );
                if (themeOptionItemValue == "sticky-header") {
                    jQuery("." + themeOptionItem + "-view")
                        .find(".header-fixed")
                        .addClass("active");
                } else if (themeOptionItemValue == "sticky-no") {
                    jQuery("." + themeOptionItem + "-view")
                        .find(".header-static")
                        .addClass("active");
                }
                jQuery(".main-bar-wraper").addClass(themeOptionItemValue);
            } else if (themeOptionItem == "bgColor") {
                jQuery("#bg").css("background-color", themeOptionItemValue);
                jQuery("#bg").css("background-image", "");
            } else if (themeOptionItem == "bgImage") {
                jQuery("#bg").css({
                    backgroundImage: "url(" + themeOptionItemValue + ")",
                });
            } else if (themeOptionItem == "bgPatten") {
                jQuery("#bg").css({
                    backgroundImage: "url(" + themeOptionItemValue + ")",
                });
                jQuery("#bg").css("background-size", "auto");
            }
        }
    });

    logoValue = getCookie("logo_value");
    if (logoValue != "") {
        var currentURL = window.location.href;
        if (
            currentURL.indexOf("header-style") > -1 ||
            currentURL.indexOf("footer-style") > -1
        ) {
            return false;
        }
        jQuery(".site-header.center .logo-header img").attr("src", logoValue);
    }
}

function setThemeLogo(themeOptionItemAttr) {
    var logo = getCookie(themeOptionItemAttr + "_logo");
    if (logo != "") {
        jQuery(".logo-header img").attr("src", logo);
    }
}

function setCookie(cname, cvalue, exhours) {
    var d = new Date();
    d.setTime(d.getTime() + 30 * 60 * 1000); /* 30 Minutes*/
    var expires = "expires=" + d.toString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(cname) {
    var d = new Date();
    d.setTime(d.getTime() + 1); /* 1/1000 second*/
    var expires = "expires=" + d.toString();
    document.cookie = cname + "=1;" + expires + ";path=/";
}

function deleteAllCookie() {
    jQuery.each(themeOption, function (index, themeOptionItem) {
        deleteCookie(themeOptionItem + "_value");
    });
    location.reload();
}
