@extends('layouts.frontend.main')
@section('content')

 <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
             @if(sizeof($slider)>0)
             @foreach($slider as $s)
            <div data-thumb="{{asset('/public/images/'.$s->image)}}" data-src="{{asset('/public/images/'.$s->image)}}">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">{{$s->first_title}}</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">{{$s->second_title}}</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">{!!$s->description!!}</p>
                   </div>
                </div>
            </div>
             @endforeach
                 @else
                    <h3>
                      No Slider Here 
                    </h3>
                 @endif
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Professional Builde -->
    <section class="professional_builder row">
        <div class="container">
           <div class="row builder_all">
             @if(sizeof($services)>0)
                  @foreach($services as $s)
                <div class="col-md-3 col-sm-6 builder">
                    <i class="{{$s->icon}}" aria-hidden="true"></i>
                    <h4>{{$s->title}}</h4>
                    <p>{!!$s->description!!}</p>
                </div>
                @endforeach
                 @else
                    <h3>
                      No Services Here 
                    </h3>
                 @endif
                
           </div>
        </div>
    </section>
    <!-- End Professional Builde -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>ABOUT US</h2>
            </div>
            <div class="row about_row">
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h3>WHO WE ARE</h3>
                    </div>
                    <p>MicroTech Institute of Advance Technology would be one of the pioneer technical institutes with well experienced qualified team. We have collaborated with India’s leading technical institute which helps our students to get international standard training program. Our students also facilitates with well equipped laboratory. We want to be the premier institution to break traditional role of learning by introducing a new generation technology program for building technical man power for the nation development by converting unskilled manpower to skilled. We connect the gap between academics and industry through proper training program for web solutions, Laptop/Computer repair, mobile repair, LEC/LCD TV repair, projector repair, printer repair, CCCTV installation and repair & other software training. 
We believe in continuous support, service, and training with motto of “Build your own career”.
</p>
                    <a href="{{route('hightech.contactus')}}" class="button_all">Contact Now</a>
                </div>
                <div class="col-md-5 col-sm-6 about_client">
                    <img src="{{asset('/public/frontend/images/chip2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->

    <!-- What ew offer Area -->
    <section class="what_we_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>WHAT WE OFFER</h2>
            </div>
            <div class="row construction_iner">
                 @if(sizeof($training)>0)
                  @foreach($training as $t)
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{asset('/public/images/'.$t->image)}}" alt="{{$t->image}}">
                   </div>
                   <div class="cns-content">
                        <i class="{{$t->icon}}" aria-hidden="true"></i>
                        <a href="#">{{$t->title}}</a>
                        <p>{!!$t->description!!}</p>
                   </div>
                </div>
                 @endforeach
                 @else
                    <h3>
                      No Training Course  Here 
                    </h3>
                 @endif
               
            
            </div>
        </div>
    </section>
    <!-- End What ew offer Area -->

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
                            <p>We provide experienced teachers from India, who had worked more then 20+ years in the related field.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                               <i class="fas fa-user-graduate"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4>FRANCHISE</h4>
                            <p>We are collaborating with India's No.1 technical institute so our training would be under the technical guidance of our franchiser "Expert Institute of Advance Technology Pvt. Ltd, Delhi", which assure the quality education to our students.</p>
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
                            <p>We provide certificate from India's no.1 technical institute which is ISO 9001:2000 certified.Our certificate would be valid in global market.</p>
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
                            <p>We provide job placement to our best students. We collaborate with many national & local IT companies and foriegn IT companies.</p>
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
                            <p>We provide 100% practical training to our students.Our main focus is to train our students on real life situations.</p>
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
                        <h2 style="color:white">Book now to reserve your seat.</h2>
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

    <!-- Our Team Area -->
    <section class="our_team_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Core Features</h2>
            </div>
            <div class="row team_row">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                   <div class="team_membar">
                        <img src="{{asset('/public/frontend/images/technical1.png')}}" alt="">
                        <div class="team_content">
                            <ul>
                                <h3>TECHNICAL SUPPORT</h3>
                            </ul>
                            <p class="name">ISO-9001-2015 Certified Expert Institute of advance Technologies pvt.ltd is India's No.1 Chip Level Training institute We are a premier LED LCD / Smart Tv Laptop, Mobile, Tablet PC, Projector, CCTV Camera Repair Training institute And one of The best in Delhi, India with a well established training centre. We provide computerized Laptop / Tablet PC / Projector Repair Training starting from basics to Chip Level Course. We have Trained 1 Lac + Chip Level Expert of students who are working successfully in service centres or have set up their own businesses and shops. We have more than 15 years of experience in the technical education industry and are known for offering the best Laptop Repairing Course in Delhi.

                          </p>
                        </div>
                   </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                   <div class="team_membar">
                        <img src="{{asset('/public/frontend/images/girl2.jpg')}}" alt="">
                        <div class="team_content">
                            <ul>
                                <h3>ADVANCED REPAIRING TOOLS</h3>
                            </ul>
                        
                             <a>
                                 <ol style="list-style-type:disc">
                                <li class="toollist">Expert™ 100% Live Training on Projector</li>
                                <li class="toollist">Chip Reballing on Advance BGA Machine</li>
                                <li class="toollist">Motherboard Testing on Oscilloscope</li>
                                <li class="toollist">Motherboard fault finding by Debug Card</li>
                                <li class="toollist">Motherboard fault finding by CPU Tester</li>
                                <li class="toollist">Motherboard BIOS IC Chip Programmer</li>
                                <li class="toollist">EDGE full-automatic OCA Machine Training</li>
                                <li class="toollist">Laptop Battery Tester</li>
                                <li class="toollist">Laptop BGA Leger Machine</li>
                                <li class="toollist">20+ Year Experience Experts</li>
                                <li class="toollist">Live Training Laptop Circuit Diagr</li>
                                </ol>
                            </a>
                            <div>
                        </div>
                   </div>
                </div>
            </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                   <div class="team_membar">
                        <img src="{{asset('/public/frontend/images/girl6.jpg')}}" alt="">
                        <div class="team_content">
                            <ul><h3>ADVANCED EXTRA FEATURE</h3></ul>
                                
                            
                        
                             <a>
                                  <ol style="list-style-type:disc">
                                <li class="toollist">Expert™ 100% Live Training on Projector</li>
                                <li class="toollist">Chip Reballing on Advance BGA Machine</li>
                                <li class="toollist">Motherboard Testing on Oscilloscope (CRO)</li>
                                <li class="toollist">Motherboard fault finding by Debug Card</li>
                                <li class="toollist">Motherboard fault finding by CPU Tester</li>
                                <li class="toollist">Motherboard BIOS IC Chip Programmer</li>
                                <li class="toollist">EDGE full-automatic OCA Machine Training</li>
                                <li class="toollist">Laptop Battery Tester</li>
                                <li class="toollist">Laptop BGA Leger Machine</li>
                                <li class="toollist">20+ Year Experience Experts</li>
                               
                                </ol>
                            </a>
                            <div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Team Area -->

    <!-- Our Achievments Area -->
    <section class="our_achievments_area" data-stellar-background-ratio="0.3">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Achievments</h2>
            </div>
            <div class="achievments_row row">
                @if(sizeof($achivement)>0)
                  @foreach($achivement as $a)
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="{{$a->icon}}" aria-hidden="true"></i>
                    <span class="counter">{{$a->number}}</span>
                    <h6>{{$a->title}}</h6>
                </div>
                 @endforeach
                 @else
                    <h3>
                      No Achivement  Here 
                    </h3>
                 @endif
                
            </div>
        </div>
    </section>
    <!-- End Our Achievments Area -->

    <!-- Our Testimonial Area -->
    <!--<section class="testimonial_area row">-->
    <!--    <div class="container">-->
    <!--        <div class="tittle wow fadeInUp">-->
    <!--            <h2>Our Testimonials</h2>-->
                
    <!--        </div>-->
    <!--        <div class="testimonial_carosel">-->
    <!--            @if(sizeof($testimonial)>0)-->
    <!--              @foreach($testimonial as $t)-->
    <!--            <div class="item">-->
    <!--                <div class="media">-->
    <!--                    <div class="media-left">-->
    <!--                        <a href="#">-->
    <!--                            <img class="media-object" src="{{asset('/public/images/'.$t->image)}}" alt="{{$t->image}}">-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                    <div class="media-body">-->
    <!--                        <h4 class="media-heading">{{$t->name}}</h4>-->
    <!--                        <h6>{{$t->post}},{{$t->oname}}</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <p><i class="fa fa-quote-right" aria-hidden="true"></i>{!!$t->message!!}<i class="fa fa-quote-left" aria-hidden="true"></i></p>-->
    <!--            </div>-->
    <!--             @endforeach-->
    <!--             @else-->
    <!--                <h3>-->
    <!--                  No Testimonial  Here -->
    <!--                </h3>-->
    <!--             @endif-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End Our testimonial Area -->

  
    <!-- Our Partners Area -->
    <section class="our_partners_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>OUR PRECIOUS CLIENTS</h2>
            </div>
            <div class="partners">
                 @if(sizeof($clients)>0)
                  @foreach($clients as $c)
                <div class="item"><img src="{{asset('/public/images/'.$c->image)}}" alt="{{$c->image}}">
                </div>
                @endforeach
                 @else
                    <h3>
                      No Clients  Here 
                    </h3>
                 @endif
                
            </div>
        </div>
       
    </section>
    <!-- End Our Partners Area -->


@stop