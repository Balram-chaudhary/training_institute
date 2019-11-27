<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Slider;
use App\Service;
use App\Training;
use App\Achivement;
use App\Testimonial;
use App\Clients;
use App\Course;
use Helpers;
use App\Gallery;
use Mail;
use App\Jobs\ContactUs;
use App\Mail\ContactUsShipped;
use Validator;
// use Illuminate\Validation\Validator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
      
        $data['slider']=Slider::where('del_flag','=','0')->paginate(5);
        $data['services']=Service::where('del_flag','=','0')->get();
        $data['training']=Training::where('del_flag','=','0')->get();
        $data['achivement']=Achivement::where('del_flag','=','0')->get();
        $data['testimonial']=Testimonial::where('del_flag','=','0')->get();
        $data['clients']=Clients::where('del_flag','=','0')->get();
        $data['courses']=Course::where('del_flag','=','0')->get();
        return view('home::index',$data);
    }
    
    public function aboutus()
    {
        return view('home::aboutus');
    }
    public function contactus()
    {
     $data['courses']=Course::where('del_flag','=','0')->get();   
        return view('home::contactus',$data);
    }
    public function contactuspost(Request $request)
  {
      $rules=[
    'fullname'       =>'required',
    'email'        =>'required',
    'phone'     =>'required|digits:1',
    'message' =>'required',
      ];
        $messages =[
            'fullname.required'      =>'Fullname is required',
            'email.required'          =>'Email is required',
            'phone.required'       =>'Phone is required',
            'message.required'   =>'Subject is required',
            ];
           $data=$request->all();
          $validator=Validator::make($request->all(), [
           'fullname'       =>'required',
           'email'        =>'email',
           'phone'     =>'required|digits:10',
           'message' =>'required',

        ]);
          if ($validator->fails()){
                return redirect('/contact-us')
                        ->withErrors($validator)
                        ->withInput();               
        }
         
            
     $data['fullname']=$request->get('fullname');
     $data['email']    =$request->get('email');
     $data['courses']  =$request->get('courses');
     $data['phone']    =$request->get('phone');
     $data['subject']  =$request->get('message');
     if(ContactUs::dispatch($data)){
     return redirect('/contact-us')->with('success_msg','Your Information Send Successfully!! we will contact you soon.');
  }else{
      return redirect('/contact-us')->with('error_msg','Something is wrong!! ');
  }
  }


    public function gallery()
    {
        $data['gallery']=Gallery::where('del_flag','=','0')->paginate(12);
        return view('home::gallery',$data);
    }
     public function courses($id)
    {
        $data['courses']=Course::find($id);
        return view('home::courses',$data);
    }
    
}