@extends('layouts.frontend.main')
@section('content')
   <!-- Banner area -->
    
    <!-- End Banner area -->

    <!-- Our Services Area -->
    <section class="our_services_tow">
        <div class="container">
            <div class="architecture_area services_pages">
                <div class="portfolio_item portfolio_2">
                   <div class="grid-sizer-2"></div>
                    <div class="single_facilities col-sm-7 painting building painting adversting">
                        <div class="who_we_area">
                            <div class="subtittle">
                                <h2>{{$courses->name}}</h2>
                            </div>
                            <p>{!!$courses->description!!}</p>
                           
                            <a href="{{route('hightech.contactus')}}" class="button_all">Contact Now</a>
                        </div>
                    </div>
                    <div class="single_facilities col-sm-5 painting webdesign">
                        <img src="{{url('/public/images/'.$courses->image)}}" alt="{{$courses->image}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->

 <!-- Our Partners Area -->
    <section class="our_partners_area">
        <div class="book_now_aera">
            <div class="container">
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h2 style="color:white;">Book now if you want to be your own boss.</h2>
                        <p><h3 style="color:white;">We Provide You The Best Way To Build Your Own Career.</h3></p>
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