@include('masters/basecommon')
<!DOCTYPE HTML>
<html>
    <?php
    $domain = ($_SERVER['SERVER_NAME'] == 'scaleerp.com') ? 'https://d7hp518nuw62l.cloudfront.net/' : ''; //
    $jqueryCdnPath = $domain . Config::get('constants.paths.scripts') . '/'; //get file from cdn
    $assetsCdnPath = $domain . 'assets/'; //get file from cdn
    $cssCdnPath = $domain . Config::get('constants.paths.css') . '/'; //get file from cdn
    $frontpagecssCdnPath = $domain . Config::get('constants.paths.frontpagecss') . '/'; //get file from cdn
    $frontpagejsCdnPath = $domain . Config::get('constants.paths.frontpagejs') . '/'; //get file from cdn
    ?>
    <head>
        <title>Scale ERP Software Solutions - ERP Software Development Company</title>
        {{HTML::script('//code.jquery.com/jquery-1.11.3.min.js')}}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- Core Meta Data -->
        <meta name="author" content="Scale | Shingora Technologies LLP-Cloud Based ERP">
        <meta name="description" content="Scale ERP provides customized and fully-integrated cloud ERP software for business management. It resolves financial puzzles and manages payroll more effectively.">
        <meta name="keywords" content="Business management software, cloud based online ERP software, ERP software development company, payroll management software, accounting ERP software, production planning software, material management software">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="frontpage/image/x-icon"/>
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}loader.css"/>
        <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}framework.css"/>
        <!-- <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}style.css"/> -->
        <link rel="stylesheet" type="text/css" href="assets/frontpage/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}icons.css"/>
        <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}animate.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}price.css"/>
        <link rel="stylesheet" type="text/css" href="{{$frontpagecssCdnPath}}YouTubePopUp.css">
        <!-- Javascript -->
        <script src="{{$frontpagejsCdnPath}}modernizr.js"></script>
        <script src="{{$frontpagejsCdnPath}}jquery.js"></script>
    </head>
    <body>
        <div class="top-bar">
            <div class="container">
                <div class="logo"><a href="/"><img src="{{$frontpageimgCdnPath}}logo.png"></a></div>
                <nav class="nav">
                    <ul>
                        <li><a href="signin">Login </a></li>
                        <li><a href="signup">Sign up</a></li>
                        <li><a href="/#contact">Contact</a></li>
                        <li><a href="blogs">Blog</a></li>
                        <li class="btn-demo"><a href="request">Request A Demo</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        @yield('content')
        @yield('foot')
        <!-- Begin Pageloader -->
        <div id="pageloader"> 
            <!-- Content -->
            <div class="pageloader-content">
                <h4>Loading...</h4>
                <span class="progress"></span> </div>
            <!-- END Content --> 
        </div>
        <!-- END Pageloader --> 

        <!-- Javascript --> 
        <script src="{{$frontpagejsCdnPath}}loader.js"></script> 
        <script src="{{$frontpagejsCdnPath}}parallax.js"></script> 
        <script src="{{$frontpagejsCdnPath}}plugins.js"></script> 
        <script src="{{$frontpagejsCdnPath}}main.js"></script> 
        <script src="{{$frontpagejsCdnPath}}typer.js"></script> 
        <script src="{{$frontpagejsCdnPath}}slick.js"></script> 
        <script src="{{$frontpagejsCdnPath}}slider.js"></script> 
        <script type="text/javascript" src="{{$frontpagejsCdnPath}}YouTubePopUp.jquery.js"></script>
                <script>

        $(document).ready(function () {
        $(document).on('cl ick', '.scl-v id-h', function(){
                $(this).css('displa y', 'none');
                $('#scl_vid_p').css('d isplay', 'block');
        $('#scl_vid_p' ).attr('src', 'https://www.youtube.com/embed/hfQGHh5NIXI?autoplay=1&rel=0');
                });
        < !-- jQuery("a.bla-2").YouTubePopUp({ autoplay: 1 }); // Disable autoplay -->

        });
                $(function() {
                $('a[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                $('html, body').animate({
                scrollTop: target.offset().top
                }, 1000);
                        return false;
                }
                }
                });
                        });
                $(document).ready(function() {
        var timeToDisplay = 5000;
                var opacityChangeDelay = 50;
                var opacityChangeAmount = 0.05;
                var slideshow = $('#slideshow');
                var fpimg = '{{$frontpageimgCdnPath}}';
                var urls = [
                        fpimg + 'facory-img.jpg',
                        fpimg + 'banner-2.jpg',
                        fpimg + 'erp-soft.jpg',
                        fpimg + 'erp-soft-2.jpg'
                ];
                var index = 0;
                var transition = function() {
                var url = urls[index];
                        slideshow.css('background-image', 'url(' + url + ')');
                        index = index + 1;
                        if (index > urls.length - 1) {
                index = 0;
                }
                };
                var fadeIn = function(opacity) {
                opacity = opacity + opacityChangeAmount;
                        slideshow.css('opacity', opacity);
                        if (opacity >= 1) {
                slideshow.trigger('fadeIn-complete');
                        return;
                }
                setTimeout(function() {
                fadeIn(opacity);
                }, opacityChangeDelay);
                };
                var fadeOut = function(opacity) {
                opacity = opacity - opacityChangeAmount;
                        slideshow.css('opacity', opacity);
                        if (opacity <= 0) {
                slideshow.trigger('fadeOut-complete');
                        return;
                }
                setTimeout(function() {
                fadeOut(opacity);
                }, opacityChangeDelay);
                };
                slideshow.on('fadeOut-complete', function(event) {
                transition();
                fadeIn(0);
            });

            slideshow.on('display-complete', function(event) {
                fadeOut(1);
            });

            slideshow.on('fadeIn-complete', function(event) {
                setTimeout(function() {
                    slideshow.trigger('display-complete');
                }, timeToDisplay);
            });

            transition();
            fadeIn(0);
	
        });
        </script>
</html>