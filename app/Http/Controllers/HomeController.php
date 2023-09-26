<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $j1=0;
        $j2=0;
        $j3=0;
        $j1_aft=0;
        $j2_aft=0;
        $j3_aft=0;

        $count_students = Student::count();
        $count_parents = Parents::count();
        $students_cat = Student::get();
        
        foreach ($students_cat as $s){
            if ($s -> j3_class!=""){
                $j3+=1;
            } else if ($s -> j2_class!=""){
                $j2+=1;
            }else{
                $j1+=1;
            }
            if ($s -> aft_j3_class!="" and $s->j3_class!=""){
                $j3_aft+=1;
            } else if ($s -> aft_j2_class!="" and $s->j2_class!=""){
                $j2_aft+=1;
            }else if ($s -> aft_j1_class!="" ){
                $j1_aft+=1;
            }
        }

        if(auth()->user()->getRoleNames()[0]=='SuperAdmin'){
   
          return view('home',compact('count_students','count_parents','j1','j2','j3','j1_aft','j2_aft','j3_aft'));  
        }elseif(auth()->user()->getRoleNames()[0]=='Admin'){
          return view('home',compact('count_students','count_parents','j1','j2','j3','j1_aft','j2_aft','j3_aft'));  
        }else{
  
          return view('userdashboard');  
        }
        
    }
}
