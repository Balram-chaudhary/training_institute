@extends('layouts.frontend.main')
@section('content')
   

    <!-- Map -->
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.0702808482247!2d87.28275261435597!3d26.48568188472009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef740a4e4e885b%3A0xe1b55cf82fb28f76!2sThulo+Mill+Chowk!5e0!3m2!1sen!2snp!4v1553849682416!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!-- End Map -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>MicroTech Institute of Advance Technology would be one of the pioneer technical institutes with well experienced qualified team. We have collaborated with India’s leading technical institute which helps our students to get international standard training program.</p>
                    <p>If you want to build your career in technical field and want to be your own boss please feel free to contact us.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">location</a>
                            <a href="#">phone</a>
                            <a href="#">mobile</a>
                            <a href="#">email</a>
                        </div>
                        <div class="address">
                            <a href="#">Thulomill Chowk <br>Biratnagar </a>
                            <a href="#">021-460772</a>
                            <a href="#">+977 9819006498</a>
                            <a href="#">institutemicrotech@gmail.com</a>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-sm-6 contact_info send_message">
                        @if(Session::get('success_msg'))
                          <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            {{ Session::get('success_msg') }}
                         </div>
                          @endif
                          @if(Session::get('error_msg'))
                          <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                          {{ Session::get('error_msg') }}
                          </div>
                          @endif
                          
                    
                    <h2>Send Us a Message</h2>
                    <form class="form-inline contact_box" method="POST" action="{{route('contactus.post')}}">
                       {{csrf_field()}}
                        <input type="text" class="form-control input_box" placeholder="Full Name *" required="required" name="fullname">
                          @if ($errors->has('fullname'))
                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                      @endif
                        <input type="text" class="form-control input_box" placeholder="Your Email *" required="required" name="email">
                        @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                        <input type="number" class="form-control input_box" placeholder="phone *" required="required" name="phone">
                          @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                      @endif
                        <select class="form-control input_box" required="required" name="courses">
                            <option value="" disabled selected>choose course</option>
                            @if(sizeof($courses)>0)
                            @foreach($courses as $c)
                            <option>{{$c->name}}</option>
                            @endforeach
                            @else
                       <h3>
                        No Courses Here 
                      </h3>
                     @endif
                        </select>
                        <input type="text" class="form-control input_box" placeholder="Message" required="required" name="message">
                          @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                      @endif
                        <button type="submit" class="btn btn-default" name="submit" value="submit">Send Enquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
    @stop