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
              <a href="{{route('achivement.list')}}" class="btn btn-success addBtnRight">Achivement List</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" id="slider" method="POST" enctype="multipart/form-data" file="true" name="slider">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <input type="hidden" name="achivement_id" value="{{$achivement->id}}">
              <div class="box-body">
                <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Achivement Title</label>
                    <div class="col-sm-10">
                    <input type="text"  name="title" id="title" placeholder="Enter Achivement Title" value="{{$achivement->title}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('title')}}</span>
                 </div>
                </div>
                 <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Achivement Icon</label>
                    <div class="col-sm-10">
                    <input type="text"  name="icon" id="icon" placeholder="Enter Achivement icon Name" value="{{$achivement->icon}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('icon')}}</span>
                 </div>
                </div>

                  <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Number</label>
                    <div class="col-sm-10">
                    <input type="number"  name="number" id="number" placeholder="Enter Number" value="{{$achivement->number}}" required="required" class="form-control">
                     <span class="help-block errortext">{{$errors->first('number')}}</span>
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

