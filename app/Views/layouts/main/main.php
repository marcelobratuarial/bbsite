<!DOCTYPE html>
<html lang="en-US">

<head>
    <style>
        .CustomLoader.active{opacity:1;display:-webkit-box;display:-ms-flexbox;display:flex;z-index:10001!important}.CustomLoader{position:fixed;top:0;left:0;right:0;display:flex;bottom:0;z-index:0;background-color:#fff;opacity:0;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}#Loader{width:150px;height:auto}
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  -->
    <!--    Document Title-->
    <!-- =============================================-->
    <title>Brasil Benefícios</title>
    <!--  -->
    <!--    Favicons-->
    <!--    =============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets/images/favicons/apple-touch-icon.png") ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets/images/favicons/favicon-32x32.png") ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/images/favicons/favicon-16x16.png") ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/images/favicons/favicon.ico") ?>">
    <link rel="manifest" href="<?= base_url("assets/images/favicons/site.webmanifest") ?>">
    <link rel="mask-icon" href="<?= base_url("assets/images/favicons/safari-pinned-tab.svg") ?>" color="#5bbad5">
    <meta name="msapplication-TileImage" content="<?= base_url("assets/images/favicons/mstile-150x150.png") ?>">
    <meta name="theme-color" content="#ffffff">
    <!--  -->
    <!--    Stylesheets-->
    <!--    =============================================-->
    <!-- Default stylesheets-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://code.ionicframework.com">
    <link href="<?= base_url("assets/lib/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Template specific stylesheets-->

    <!-- <link href="<?= base_url("assets/css/bs-stepper.min.css") ?>" rel="stylesheet"> -->
    <?php /*<link async rel="preload" data-href="<?= base_url("assets/lib/loaders.css/loaders.min.css") ?>" rel="stylesheet"> */ ?>
    <link defer rel="preload" as="font" data-href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link defer rel="preload" as="font" data-href="<?= base_url("assets/lib/iconsmind/iconsmind.css") ?>" rel="stylesheet">
    <link defer rel="preload" as="font" data-href="<?= base_url("assets/lib/ionicons-2.0.1/css/ionicons.min.css") ?>" rel="stylesheet">
    <link async href="<?= base_url("assets/lib/hamburgers/dist/hamburgers.min.css") ?>" rel="stylesheet">
    <link async rel="preload" as="font" href="<?= base_url("assets/lib/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet">
    <link defer href="<?= base_url("assets/lib/owl.carousel/dist/assets/owl.carousel.min.css") ?>" rel="stylesheet">
    <link defer href="<?= base_url("assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css") ?>" rel="stylesheet">
    <link defer href="<?= base_url("assets/lib/remodal/dist/remodal.css") ?>" rel="stylesheet">
    <link defer href="<?= base_url("assets/lib/remodal/dist/remodal-default-theme.css") ?>" rel="stylesheet">
    <link defer href="<?= base_url("assets/lib/flexslider/flexslider.css") ?>" rel="stylesheet">
    <link defer href="<?= base_url("assets/lib/lightbox2/dist/css/lightbox.css") ?>" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link defer href="<?= base_url("assets/css/bootstrap-datepicker.3.2.css") ?>" rel="stylesheet">
    <?php /*<link defer href="<?= base_url("assets/css/aos.css") ?>" rel="stylesheet"> */ ?>
    <link defer href="<?= base_url("assets/css/style.css") ?>" rel="stylesheet">
    <?= $this->renderSection('cCss') ?>
    <link defer href="<?= base_url("assets/css/custom.css") ?>" rel="stylesheet">




    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="917706978842477" />

    <meta property="og:url" content="//brasilbeneficios.club" />
    <meta property="og:site_name" content="Clube Brasil Benefícios" />
    <meta property="og:title" content="Clube Brasil Benefícios" />
    <meta property="og:description" content="Clube de Benefícios" />

    <meta property="og:image" content="http://brasilbeneficios.club/assets/img/logo/og-bb.png" />
    <meta property="og:image:secure_url" content="https://brasilbeneficios.club/assets/img/logo/og-bb.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="257" />
    <meta property="og:image:height" content="257" />
    <meta property="og:image:alt" content="Brasil Benefícios Logo" />
    <style>
        video {
            -webkit-filter: brightness(132%);
            filter: brightness(132%);
        }
    </style>
</head>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
    <div class="CustomLoader active">
        <!-- <img src="<?= base_url('assets/images/loader/loading.png') ?>" alt=""> -->
        <video id="Loader" muted="true" autoplay playsinline>
            <source src="<?= base_url('assets/videos/logoanimada03.mp4') ?>" type="video/mp4" />
            <!-- <source src="movie.ogg" type="video/ogg" /> -->
            Your browser does not support the video tag.
        </video>
    </div>
    <?= $this->renderSection('header') ?>

    <main style="clear: both;">
        <?= $this->renderSection('content') ?>



    </main>


    <?= $this->renderSection('footer') ?>

    <!--  -->
    <!--    JavaScripts-->
    <!--    =============================================-->
    <script defer src="<?= base_url("assets/js/modernizr.min.js") ?>"></script>
    <script src="<?= base_url("assets/lib/jquery/dist/jquery.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/bootstrap/dist/js/popper.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
    <!-- <script src="<?= base_url("assets/js/bs-stepper.min.js") ?>"></script> -->
    <script defer src="<?= base_url("assets/lib/loaders.css/loaders.css.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/imagesloaded/imagesloaded.pkgd.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/gsap/src/minified/TweenMax.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/gsap/src/minified/plugins/ScrollToPlugin.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/CustomEase.min.js") ?>"></script>

    <script defer src="<?= base_url("assets/js/zanimation.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/owl.carousel/dist/owl.carousel.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/remodal/dist/remodal.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/lightbox2/dist/js/lightbox.js") ?>"></script>
    <script defer src="<?= base_url("assets/lib/flexslider/jquery.flexslider-min.js") ?>"></script>
    <script defer src="<?= base_url("assets/js/core.js") ?>"></script>
    <script defer src="<?= base_url("assets/js/main.js?" . time())  ?>"></script>
    <script defer src="<?= base_url("assets/js/aos.js") ?>"></script>
    <script defer src="<?= base_url("assets/js/jquery.maskedinput.js") ?>"></script>
    <script defer src="<?= base_url("assets/js/jquery.mask.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/js/bootstrap-datepicker.min.js") ?>"></script>
    <script defer src="<?= base_url("assets/js/config.js") ?>"></script>
    <?= $this->renderSection('cScripts') ?>

    <script>
        // $("#Loader").play();
        document.getElementsByTagName('video')[0].onended = function() {
            setTimeout(() => {
                this.load();
                this.play();
            }, 600);
            // console.log("teste")
        };
        // $("#Loader")[0].on('ended', function () {
        //     $(this).load();
        //     console.log($(this))
        //     console.log("end")
        //     $(this).play();
        // });
        // $("#Loader")(0).on('ended', function () {
        //     $(this).load();
        //     console.log($(this))
        //     console.log("end")
        //     $(this).play();
        // });
        var base_url = '<?= base_url('/') ?>';
        $(document).ready(function() {
            var l = new Promise((resolve, reject) => {
                setTimeout(() => {
                    // console.log("teste")
                    $(".CustomLoader").removeClass("active")
                    resolve("OK")
                }, 600);

            })
            l.then(() => {
                setTimeout(() => {
                    $(".CustomLoader").css("display", "none")
                }, 1600);
            }).then(() => {
                // $(".CustomLoader").remove()
            })

        })
    </script>
    <script>
        function lim () {
            var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
            console.log(lazyImages)
            if ("IntersectionObserver" in window) {
                console.warn("entra")
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    console.warn(entries)
                    entries.forEach(function(entry) {
                        console.log(entry)
                        if (entry.isIntersecting) {
                            
                            let lazyImage = entry.target;
                            console.warn(lazyImage)
                            lazyImage.src = lazyImage.dataset.src;
                            // lazyImage.srcset = lazyImage.dataset.srcset;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            } else {
                console.log("dddd")
                // Possibly fall back to event handlers here
            }
        }
        document.addEventListener("DOMContentLoaded", lim, {passive: true});
        $(document).ready(function() {
            
            setTimeout(() => {
                $.each($("script[rel=preload]"), function(a, b) {
                    // console.log(a)
                    // console.log(b)
                    var p = new Promise((resolve, reject) => {
                        // console.log("teste")
                        $(b)
                            .attr("src", $(b).data("src")).removeAttr("rel")
                        resolve("OK")
                        // .attr("rel", "stylesheet")
                    }).then(() => {
                        // console.log("resolvido")
                    })

                })
                // $("link[rel=preload]")
                // .attr("href", $("link[rel=preload]").data("href"))
                // .attr("rel", "stylesheet")

                $.each($("link[rel=preload]"), function(a, b) {
                    // console.log(a)
                    // console.log(b)
                    $(b)
                        .attr("href", $(b).data("href"))
                        .attr("rel", "stylesheet")
                })
            }, 240);
        })

            
    </script>
</body>

</html>