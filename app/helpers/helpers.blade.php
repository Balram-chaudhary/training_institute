<?php
use App\Course;
class Helpers {

     public static function Hardware(){
     		$hardware=Course::where('del_flag','=','0')
                                 ->where('type','=','h') 
                                 ->get();
     		return $hardware;
     		
     	}

           public static function Software(){
               $software=Course::where('del_flag','=','0')
                                 ->where('type','=','s')
                                  ->get();
               
               return $software;
          }

  }




