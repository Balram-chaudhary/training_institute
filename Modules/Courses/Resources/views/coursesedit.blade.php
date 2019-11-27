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
              <a href="{{route('courses.list')}}" class="btn btn-success addBtnRight">Courses List</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" id="slider" method="POST" enctype="multipart/form-data" file="true" name="slider">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <input type="hidden" name="courses_id" value="{{$courses->id}}">
                <input type="hidden" name="old_courses_image" value="{{$courses->image}}">
              <div class="box-body">
              <div class="form-group">
                   <label for="name" class="col-sm-2 control-label"> Courses Name</label>
                    <div class="col-sm-10">
                    <input type="text"  name="name" id="name" placeholder="Enter Courses Name" value="{{$courses->name}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('name')}}</span>
                 </div>
                </div>
                 <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Course Type</label>
                    <div class="col-sm-10">
                   <select name="type">
                    <option value="h" {{$courses->type == 'h' ? 'selected' : '' }}>Hardware</option>
                    <option value="s" {{$courses->type == 's' ? 'selected' : '' }}>Software</option>
                   </select>
                 </div>
                </div>
                
                <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">                
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('/public/images/'.$courses->image)}}"class="portfolio-box">
                  <img src="{{url('/public/images/'.$courses->image)}}"class="img-responsive" alt="images" width="400px" height="400px">
                  <div class="portfolio-box-caption">
                    <div class="portfolio-box-caption-content">
                    <span class="glyphicon glyphicon-zoom-in" style="font-size: 20px"></span>
                    </div>
                  </div>
                 </a>
               </div>
              </div> 
            </div>
                

                <div class="form-group">
                    <label for="slider" class="col-sm-2 control-label">Courses Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                    <textarea  name="description" id="description" placeholder="Enter Slider Description"  required="required" class="form-control">{!!$courses->description!!}</textarea>
                     <span class="help-block errortext">{{$errors->first('description')}}</span>
                 </div>
                </div>
                
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&update" class="btn btn-success" value="submit&update">Submit & Update</button>
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

