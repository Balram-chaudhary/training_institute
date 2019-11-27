@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
       <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
       {{-- <a href="javascript:history.back()" class="btn btn-primary breadCrumbRightBackBtn">Back</a> --}}
    </h4>
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

    </section>
    <!-- Main content -->
       <section class="content">
        <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <a href="{{route('testimonial.list')}}" class="btn btn-success addBtnRight">Testimonial List</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" id="slider" method="POST" enctype="multipart/form-data" file="true" name="testimonial">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
              <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text"  name="name" id="name" placeholder="Enter  Name" value="{{old('name')}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('name')}}</span>
                 </div>
                </div>
                <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Organization Name</label>
                    <div class="col-sm-10">
                    <input type="text"  name="oname" id="oname" placeholder="Enter Organization Name" value="{{old('oname')}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('oname')}}</span>
                 </div>
                </div>
                <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Post</label>
                    <div class="col-sm-10">
                    <input type="text"  name="post" id="post" placeholder="Enter Post Name" value="{{old('post')}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('post')}}</span>
                 </div>
                </div>

                <div class="form-group">
                    <label for="slider" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}"  required="required">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                   </div>
                <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                    <textarea  name="message" id="message" placeholder="Enter Message" value="{{old('message')}}" required="required" class="form-control"></textarea>
                     <span class="help-block errortext">{{$errors->first('message')}}</span>
                 </div>
                </div>
                  
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&create" class="btn btn-success" value="submit&create">Submit & Create</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
  </div>
@stop

