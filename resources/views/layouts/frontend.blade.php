<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('website/img/fav-icon.png')}}" type="image/x-icon"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sierra</title>

    <!-- Icon css link -->
    <link href="{{asset('website/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{asset('website/vendors/revolution/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('website/vendors/revolution/css/layers.css')}}" rel="stylesheet">
{{--    <link href="{{asset('website/vendors/revolution/css/navigation.css')}}" rel="stylesheet">--}}

    <!-- Extra plugin css -->
    <link href="{{asset('website/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/vendors/magnify-popup/magnific-popup.css')}}" rel="stylesheet">


    <link href="{{asset('website/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{url('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{url('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    @stack('css')
</head>
<body>

@include('layouts.nav')
@yield('content')
<!--================Footer Area =================-->
<footer class="footr_area">
    <div class="footer_copyright">
        <div class="container">
            <div class="float-sm-left">
                <h5><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></h5>
            </div>
            <div class="float-sm-right">
                <ul>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('website/js/jquery-3.2.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('website/js/popper.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<!-- Rev slider js -->
<script src="{{asset('website/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('website/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<!-- Extra plugin css -->
<script src="{{asset('website/vendors/counterup/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('website/vendors/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('website/vendors/counterup/apear.js')}}"></script>
<script src="{{asset('website/vendors/counterup/countto.js')}}"></script>
<script src="{{asset('website/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('website/vendors/magnify-popup/jquery.magnific-popup.min.js')}}"></script>
{{--<script src="{{asset('website/js/smoothscroll.js')}}"></script>--}}
<script src="{{asset('website/vendors/circle-bar/circle-progress.min.js')}}"></script>
<script src="{{asset('website/vendors/circle-bar/plugins.js')}}"></script>
<script src="{{asset('website/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('website/vendors/isotope/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('website/js/circle-active.js')}}"></script>
<script src="{{asset('website/js/theme.js')}}"></script>

@stack('js')
</body>
</html>
