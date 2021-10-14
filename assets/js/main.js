


// Preloader
$.holdReady( true );

$('body').imagesLoaded({ background: ".background-holder" }, function(){
    $('#preloader').removeClass("loading");
    $.holdReady( false );
    setTimeout(function() {
        $('#preloader').remove();
    }, 800);
});


$(document).ready(function() {
    console.log("READY")
    $(".toggle-home-menu").on("click", function() {
        
        // $(".homebart").slideDown("show")
        var scrollTop     = $(window).scrollTop(),
            elementOffset = $('.main-ref-anchor').offset().top,
            distance      = (elementOffset - scrollTop);

            if($(".homebart").hasClass("show")) {
                $(".homebart").slideUp(300).removeClass("show")
                console.log("IF")
                if(distance > 750) {
                    console.log(">>>")
                    
                    $("#znav-container")
                        .removeClass("background-white")
                } else {
                    console.log("<<<")
                    $("#znav-container")
                        .addClass("background-white")
                }
                console.log(base_url)
                $(".navbar-brand").find("img").attr("src", base_url + "/assets/images/landing/bb_logo_branca.svg")
            } else {
                $(".navbar-brand").find("img").attr("src", base_url + "/assets/images/landing/bb_logo.svg")
                console.log("ELSE")
                $(".homebart").slideDown(300).addClass("show")
                $("#znav-container")
                        .addClass("background-white")
            }
            // console.log(distance)
            // if(distance > 750) {
            //     $("#znav-container")
            //     .addClass("background-primary")
            // } else {
            //     $("#znav-container")
            //         .removeClass("background-primary")
            // }
            
            // var l = new Promise((resolve, reject) => {
            //     var id = setInterval(
            //         function(){
            //             if ($(".homebart").hasClass("show")) {
            //                 clearInterval(id);
            //                 resolve("OK")
            //             } 
                    
            //     }, 10);
                
            // })
            // l.then(() => {
            //     if($(".homebart").hasClass("show")) {
            //         console.log("IF")
            //         $("#znav-container")
            //         .addClass("background-primary")
            //     } else {
            //         console.log("else2")
            //         $("#znav-container")
            //             .removeClass("sticky-top")
            //             .removeClass("background-primary")
                    
            //     }
            // }).then(() => {
            //     // $(".CustomLoader").remove()
            // })
            
    })
})
var onnn = false
$(document).on("scroll", function() {
    // var top_of_element = $(".main-ref-anchor ").offset().top;
    // var bottom_of_element = $(".main-ref-anchor ").offset().top + $(".main-ref-anchor ").outerHeight();
    // var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    // var top_of_screen = $(window).scrollTop();
    // console.log("top_of_element", top_of_element)
    // console.log($(".main-ref-anchor ").outerHeight())
    // console.log("bottom_of_element", bottom_of_element)
    // console.log("bottom_of_screen", bottom_of_screen)
    // console.log("top_of_screen", top_of_screen)
    // if (!onnn && (bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
    // }
    if($(".main-ref-anchor").length > 0) {
        var scrollTop     = $(window).scrollTop(),
            elementOffset = $('.main-ref-anchor').offset().top,
            distance      = (elementOffset - scrollTop);
        console.log(distance)
        if(distance < 40) {
            $("#znav-container")
            .addClass("sticky-top")
            .addClass("background-white")
            .addClass("color-primary")
        } else {
            if(distance > 40 && $(".homebart").hasClass("show")) {
                $("#znav-container")
                .addClass("sticky-top")
                .addClass("background-white")
                .addClass("color-primary")
            } else {
                $("#znav-container")
                .removeClass("sticky-top")
                .removeClass("background-white")
                .removeClass("color-primary")
            }
            
        }
    }
    if($(".nossos-numeros").length > 0) {
        var top_of_element = $(".nossos-numeros").offset().top;
        var bottom_of_element = $(".nossos-numeros").offset().top + $(".nossos-numeros").outerHeight();
        var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        var top_of_screen = $(window).scrollTop();
        
        if (!onnn && (bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
            onnn = true
            // console.warn("Sim")
            // Counter
            const counters = document.querySelectorAll('.value');
            const speed = 2500;

            counters.forEach( counter => {
            const animate = () => {
                const value = parseInt(counter.getAttribute('akhi'));
                const data = parseInt(formatarValor(counter.innerText, true));
                const time = value / speed;
                if(data < value) {
                    counter.innerText = formatarValor(Math.ceil(data + time));
                    setTimeout(animate, 1);
                    }else{
                    counter.innerText = formatarValor(value);
                    }
                
            }
            
            animate();
            });
        } else {
            onnn = false
            // console.warn("NAO")
        }
    }
})

function formatarValor(valor, undo = false) {
    var r
    if(undo) {
        r = valor.toString().replace(/[^\d]+/g,'')
    } else {
        r = valor.toLocaleString('pt-BR');
    } 
    return r
}



// Zanimation
$(window).on('load', function(){
    $('*[data-inertia]').each(function(){
        // $(this).inertia();
    });

});



// OS detector
var phone, touch, ltie9, dh, ar, fonts, ieMobile;

var ua = navigator.userAgent;
var winLoc = window.location.toString();

var is_webkit       = ua.match(/webkit/i);
var is_firefox      = ua.match(/gecko/i);
var is_newer_ie     = ua.match(/msie (9|([1-9][0-9]))/i);
var is_older_ie     = ua.match(/msie/i) && !is_newer_ie;
var is_ancient_ie   = ua.match(/msie 6/i);
var is_ie           = is_ancient_ie || is_older_ie || is_newer_ie;
var is_mobile_ie    = navigator.userAgent.indexOf('IEMobile') !== -1;
var is_mobile       = ua.match(/mobile/i);
var is_OSX          = ua.match(/(iPad|iPhone|iPod|Macintosh)/g) ? true : false;
var iOS             = getIOSVersion(ua);
var is_EDGE         = /Edge\/12./i.test(navigator.userAgent);

function getIOSVersion(ua) {
    ua = ua || navigator.userAgent;
    return parseFloat(
            ('' + (/CPU.*OS ([0-9_]{1,5})|(CPU like).*AppleWebKit.*Mobile/i.exec(ua) || [0,''])[1])
                .replace('undefined', '3_2').replace('_', '.').replace('_', '')
        ) || false;
}


// Browser Ditector
$(document).ready(function(){
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isEdge = !isIE && !!window.StyleMedia;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    var isBlink = (isChrome || isOpera) && !!window.CSS;

    if(isOpera) $('html').addClass("opera");
    if(isFirefox) $('html').addClass("firefox");
    if(isSafari) $('html').addClass("safari");
    if(isIE) $('html').addClass("ie");
    if(isEdge) $('html').addClass("edge");
    if(isChrome) $('html').addClass("chrome");
    if(isBlink) $('html').addClass("blink");
    
})

//  SmoothScroll
function smoothScroll(){

};

$(document).ready(function(){
    if(! is_EDGE && ! Modernizr.touchevents && ! is_mobile_ie && ! is_OSX){
        smoothScroll();
    }
});









