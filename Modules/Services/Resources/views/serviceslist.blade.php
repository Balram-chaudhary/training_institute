@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
        <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
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

      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
        <div class="box-body">
         
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
           <div class="row" style="width:500px;">
           <div class="col-lg-12 col-md-12 col-sm-12 text-right">
            <div class="dataTables_length" id="example1_length">
            
            </div>
           </div>   
         </div>
       </div>
         <br>
         <div style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                   <th>Services Title</th>
                   <th>Services Icon</th>
                  <th>Services Description</th>
                  <th>Operation</th>
                </tr>
               </thead>
               <tbody id="slider">
                <?php $i=1;?>
                 @if(sizeof($services)>0)
                    @foreach($services as $s)
                     @if($s->del_flag=='0')
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$s->title}}</td>
                        <td>{{$s->icon}}</td>
                        <td>{!!$s->description!!}</td>
                        <td>
                        	<a href="{{route('services.edit',[$s->id])}}" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>     
                       &nbsp; 
                    <a href="{{route('services.remove',[$s->id])}}" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" onclick="if (!confirm('Are you sure to delete?')){ return false; }" ><i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                        </td>
                      </tr>
                     @endif
                    @endforeach
                @else
                <tr>
                  <td colspan="6" align="center">-- No Record Found !! ---</td>
                </tr>
                 @endif
               </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix" id="paginated">
              {{ $services->links() }}
          </div>
        </div>
      </div>
  </div>
</div>
@stop
