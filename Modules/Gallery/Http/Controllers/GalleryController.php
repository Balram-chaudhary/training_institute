<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Gallery;
use File;
use Session;
use Auth;
use DB;
class GalleryController extends Controller
{
   public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('gallery.create').'">Gallery Create</a></li>';
           $data['menu_active']='gallery';
           $data['submenu_active']='add';
          return view('gallery::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'name'        =>'required',
    'images'      => 'required|mimes:jpeg,png,bmp,gif,jpg',
    
           ];
        $messages =[
            'name.required'   =>'Slider Name Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image Size Not Exceed To Be 6000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('gallery/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $gallery['name']    =$request->get('name');          
         $gallery['created_by'] =Auth::user()->id;
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $gallery['image']=$image_filename;
        if(Gallery::create($gallery)){
              if($request->input('submit&create')){
               return redirect('gallery/create')->with('success_msg','Gallery Created Successfully!!');
        }   
     }else{
        return redirect('gallery/create')->with('error_msg','Gallery Not Created');
     }
   }
 }else{
        return redirect('admin');
     }   
     
  }
  
   public function list(){
    if(Auth::user()){
          $data=[];
          $data['breadcrumbs'] ='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('gallery.list').'">Gallery List</a></li>';
          $data['gallery']=Gallery::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='gallery';
          $data['submenu_active']='list';
        return view('gallery::gallerylist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('gallery/edit/'.$id).'">Slider Edit</a></li>';
          $data['menu_active']='gallery';
          $data['submenu_active']='edit';
          $data['gallery'] =Gallery::find($id);
          return view('gallery::galleryedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'name'          =>'required',
            'images'      => 'mimes:jpeg,png,bmp,gif,jpg|max:10000',
            
             ];
        $messages =[
            'name.required'   =>'Gallery Name is required',
            'images.mimes'  => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 5000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('gallery/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->hasFile('images')){
              File::delete(public_path('/images/').$request->input('old_gallery_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $gallery['image']=$image_filename;  
            }else{
              $gallery['image']=$request->input('old_gallery_image');
            }
         $gallery['name']    =$request->get('name');  
         $gallery['updated_by'] =Auth::user()->id;
        if(Gallery::find($request->get('gallery_id'))->update($gallery)){
              if($request->input('submit&update')){
               return redirect('gallery/list')->with('success_msg','Gallery Updated Successfully!!');
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('admin');
     }  

  
}
  public function remove($id){
    if(Auth::user()){
       $data=[];
        $data['deleted_by']=Auth::user()->id;
        $data['deleted_at']=date('Y-m-d h:i:s');
        $data['del_flag']='1';
        if(Gallery::find($id)->update($data)){
            return redirect('gallery/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
  
}
