@extends('layouts.frontend.main')
@section('content')

<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>About Us</h2>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="#" class="active">About Us</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>ABOUT US</h2>
           </div>
            <div class="row about_row">
                <div class="col-md-5 col-sm-6 about_client about_pages_client">
                    <img src="{{asset('/public/frontend/images/girl2.jpg')}}" alt="">
                </div>
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h3>WHO WE ARE</h3>
                    </div>
                    <p>MicroTech Institute of Advance Technology would be one of the pioneer technical institutes with well experienced qualified team. We have collaborated with India’s leading technical institute which helps our students to get international standard training program. Our students also facilitates with well equipped laboratory. We want to be the premier institution to break traditional role of learning by introducing a new generation technology program for building technical man power for the nation development by converting unskilled manpower to skilled. We connect the gap between academics and industry through proper training program for web solutions, Laptop/Computer repair, mobile repair, LEC/LCD TV repair, projector repair, printer repair, CCCTV installation and repair & other software training. 
We believe in continuous support, service, and training with motto of “Build your own career”.</p>
                    <a href="{{route('hightech.contactus')}}" class="button_all">Contact Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->

    <!-- call Area -->
    <section class="call_min_area">
        <div class="container">
            <h2>021-460772 ,+977-9819006498</h2>
            <p>If you want to build your career in technical field and be your own boss, please feel free to contact us.We are right choice for you. </p>
            <div class="call_btn">
                <a href="{{route('hightech.contactus')}}" class="button_all">Contact Us </a>
            </div>
        </div>
    </section>
    <!-- End call Area -->

     <!-- Our Features Area -->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Features</h2>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="{{asset('/public/frontend/images/mobile.jpg')}}" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h3>WHY CHOOSE TO US?</h3>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                           <i class="fas fa-user-tie"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4>20+ YEARS OF EXPERIENCES TEACHERS</h4>
                            <p>We provide experienced teachers from india in our related fields.Our Teachers are very qualified,talented and experienced teachers from india.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fas fa-certificate"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4>CERTIFICATE</h4>
                            <p>We provide certificate from India's no.1 technical institute which is ISO 9001:2000 certified certificate.Our certificate valid in global market.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fas fa-business-time"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4>JOB PLACEMENT</h4>
                            <p>We provide job placement to our best students.We collaborate many national IT companies and foriegn IT companies.</p>
                        </div>
                    </div>
                    
                     <div class="media">
                        <div class="media-left">
                            <a href="#">
                               <i class="fas fa-user-graduate"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4>100% PRACTICAL TRAINING</h4>
                            <p>We provide 100% practical training to our students.Our motto is to train fully job oriented to our students.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Our Features Area -->
     <!-- Our Partners Area -->
    <section class="our_partners_area">
        <div class="book_now_aera">
            <div class="container">
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h2 style="color:white">Book now if you want to be your own boss.</h2>
                        <p><h3 style="color:white">We Provide you the best way to build your own career.</h3></p>
                    </div>
                    <div class="col-md-2 p0 book_bottun">
                        <a href="{{route('hightech.contactus')}}" class="button_all">book now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Partners Area -->
@stop