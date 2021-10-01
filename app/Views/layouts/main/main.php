<!DOCTYPE html>
<html lang="en-US">
    <head>
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
        <link href="<?= base_url("assets/lib/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet">
        <!-- Template specific stylesheets-->
        
        <!-- <link href="<?= base_url("assets/css/bs-stepper.min.css") ?>" rel="stylesheet"> -->
        <link href="<?= base_url("assets/lib/loaders.css/loaders.min.css") ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="<?= base_url("assets/lib/iconsmind/iconsmind.css") ?>" rel="stylesheet">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link href="<?= base_url("assets/lib/hamburgers/dist/hamburgers.min.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/owl.carousel/dist/assets/owl.carousel.min.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/remodal/dist/remodal.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/remodal/dist/remodal-default-theme.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/flexslider/flexslider.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/lib/lightbox2/dist/css/lightbox.css") ?>" rel="stylesheet">
        <!-- Main stylesheet and color file-->
        <link href="<?= base_url("assets/css/aos.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/css/style.css") ?>" rel="stylesheet">
        <?= $this->renderSection('cCss') ?>
        <link href="<?= base_url("assets/css/custom.css") ?>" rel="stylesheet">
    </head>
    <body data-spy="scroll" data-target=".inner-link" data-offset="60">

    <?= $this->renderSection('header') ?>
    
    <main style="clear: both;">
        <?= $this->renderSection('content') ?>
    
        
        
    </main>

    
    <?= $this->renderSection('footer') ?>

    <!--  -->
        <!--    JavaScripts-->
        <!--    =============================================-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="<?= base_url("assets/lib/jquery/dist/jquery.min.js") ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="<?= base_url("assets/lib/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
        <!-- <script src="<?= base_url("assets/js/bs-stepper.min.js") ?>"></script> -->
        <script src="<?= base_url("assets/lib/loaders.css/loaders.css.js") ?>"></script>
        <script src="<?= base_url("assets/lib/imagesloaded/imagesloaded.pkgd.min.js") ?>"></script>
        <script src="<?= base_url("assets/lib/gsap/src/minified/TweenMax.min.js") ?>"></script>
        <script src="<?= base_url("assets/lib/gsap/src/minified/plugins/ScrollToPlugin.min.js") ?>"></script>
        <script src="<?= base_url("assets/lib/CustomEase.min.js") ?>"></script>
        <script src="<?= base_url("assets/js/config.js") ?>"></script>
        <script src="<?= base_url("assets/js/zanimation.js") ?>"></script>
        <script src="<?= base_url("assets/lib/owl.carousel/dist/owl.carousel.min.js") ?>"></script>
        <script src="<?= base_url("assets/lib/remodal/dist/remodal.js") ?>"></script>
        <script src="<?= base_url("assets/lib/lightbox2/dist/js/lightbox.js") ?>"></script>
        <script src="<?= base_url("assets/lib/flexslider/jquery.flexslider-min.js") ?>"></script>
        <script src="<?= base_url("assets/js/core.js") ?>"></script>
        <script src="<?= base_url("assets/js/main.js") ?>"></script>
        <script src="<?= base_url("assets/js/aos.js") ?>"></script>
        <script src="<?= base_url("assets/js/jquery.maskedinput.js") ?>"></script>
        <script src="<?= base_url("assets/js/bootstrap-datepicker.min.js") ?>"></script>
        <?= $this->renderSection('cScripts') ?>
        
        <script>
            var base_url = '<?= base_url('/') ?>';
        </script>
    </body>
</html>