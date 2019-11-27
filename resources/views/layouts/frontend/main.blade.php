<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Microinstitute</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('/public/frontend/images/favicon.png')}}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('/public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{asset('/public/frontend/vendors/animate/animate.css')}}" rel="stylesheet">
    <!-- Icon CSS-->
	<link rel="stylesheet" href="{{asset('/public/frontend/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="{{asset('/public/frontend/vendors/camera-slider/camera.css')}}">
    <!-- Owlcarousel CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/vendors/owl_carousel/owl.carousel.css')}}" media="all">

    <!--Theme Styles CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/css/style.css')}}" media="all" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Preloader -->
    <div class="preloader"></div>

	<!-- Top Header_Area -->
	<section class="top_header_area">
	    <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fas fa-phone"></i>021-460772,&nbsp;9819006498</a></li>
                <li><a href="#"><i class="far fa-envelope-open"></i>institutemicrotech@gmail.com</a></li>
                <li><a href="#"><i class="fas fa-clock-o"></i>Sun - Sat 6:00 am - 6:00 pm</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
              
            </ul>
	    </div>
	</section>
	<!-- End Top Header_Area -->

	<!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-1 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-11 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('hightech.aboutus')}}">About Us</a></li>
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hardware Training</a>
                            <ul class="dropdown-menu other_dropdwn">
                                @if(count(Helpers::Hardware())>0)
                                 @foreach(Helpers::Hardware() as $h)
                                <li><a href="{{url('/courses/'.$h->id)}}">{{$h->name}}</a></li>
                                @endforeach
                             @else
                                <h4 style="color:white">
                                  No Hardware Courses Here 
                                </h4>
                             @endif
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Software Training</a>
                            <ul class="dropdown-menu other_dropdwn">
                                  @if(count(Helpers::Software())>0)
                                   @foreach(Helpers::Software() as $s)
                                <li><a href="{{url('/courses/'.$s->id)}}">{{$s->name}}</a></li>
                                @endforeach
                               @else
                            <h4 style="color:white">
                              No Software Courses Here 
                            </h4>
                         @endif
                            
                    </ul>
                        </li>
                        <li><a href="{{route('hightech.gallery')}}">Gallery</a></li>
                        <li><a href="{{route('hightech.contactus')}}">Contact</a></li>
                        <li><a href="https://www.expertinstituteindia.in/">Login</a></li>
                        <li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
	<!-- End Header_Area -->



@yield('content')




 <!-- Footer Area -->
    <footer class="footer_area">
        <div class="container">
            <div class="footer_row row">
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>ABOUT US</h2>
                    <!--<img src="images/footer-logo.png" alt="">-->
                    <p>MicroTech Institute of Advance Technology would be one of the pioneer technical institutes with well experienced qualified team. We have collaborated with India’s leading technical institute which helps our students to get international standard training program. </p>
                    <ul class="socail_icon">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>                   
                            </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer_about quick">
                    <h2>Quick links</h2>
                    <ul class="quick_link">
                        <li><a href="{{route('home')}}"><i class="fa fa-chevron-right"></i>HOME</a></li>
                        <li><a href="{{route('hightech.aboutus')}}"><i class="fa fa-chevron-right"></i>ABOUT US</a></li>
                        <li><a href="{{route('hightech.gallery')}}"><i class="fa fa-chevron-right"></i>GALLERY</a></li>
                        <!--<li><a href="#"><i class="fa fa-chevron-right"></i>BLOG</a></li>-->
                        <li><a href="{{route('hightech.contactus')}}"><i class="fa fa-chevron-right"></i>CONTACT</a></li>
                        <li><a href="https://www.expertinstituteindia.in/"><i class="fa fa-chevron-right"></i>LOGIN</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>Hardware Training</h2>
                    <ul class="quick_link">
                        @if(count(Helpers::Hardware())>0)
                        @foreach(Helpers::Hardware() as $h)
                        <li><a href="{{url('/courses/'.$h->id)}}"><i class="fa fa-chevron-right"></i>{{$h->name}}</a></li>
                         @endforeach
                 @else
                    <h4 style="color:white">
                      No Hardware Courses Here 
                    </h4>
                 @endif
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>Software Training</h2>
                     <ul class="quick_link">
                          @if(count(Helpers::Software())>0)
                        @foreach(Helpers::Software() as $s)
                         <li><a href="{{url('/courses/'.$s->id)}}"><i class="fa fa-chevron-right"></i>{{$s->name}}</a></li>
                @endforeach
                 @else
                    <h4 style="color:white">
                      No Software Courses Here 
                    </h4>
                 @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            @Copyright 2019 All rights reserved. Designed And Devloped By <a href="https://www.himalayansofttech.com">Himalayan Softtech</a>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    <script src="{{asset('/public/frontend/js/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Animate JS -->
    <script src="{{asset('/public/frontend/vendors/animate/wow.min.js')}}"></script>
    <!-- Camera Slider -->
    <script src="{{asset('/public/frontend/vendors/camera-slider/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('/public/frontend/vendors/camera-slider/camera.min.js')}}"></script>
    <!-- Isotope JS -->
    <script src="{{asset('/public/frontend/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('/public/frontend/vendors/isotope/isotope.pkgd.min.js')}}"></script>
    <!-- Progress JS -->
    <script src="{{asset('/public/frontend/vendors/Counter-Up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/public/frontend/vendors/Counter-Up/waypoints.min.js')}}"></script>
    <!-- Owlcarousel JS -->
    <script src="{{asset('/public/frontend/vendors/owl_carousel/owl.carousel.min.js')}}"></script>
    <!-- Stellar JS -->
    <script src="{{asset('/public/frontend/vendors/stellar/jquery.stellar.js')}}"></script>
    <!-- Theme JS -->
    <script src="{{asset('/public/frontend/js/theme.js')}}"></script>
       <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
</body>
</html>
