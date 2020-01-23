<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\instructors;
use App\students;
use App\courses;
use App\assigns;
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
        $stdnum=Auth::user()->number;
        $tutor;
        
        $result=assigns::join('courses', 'courses.ccode', '=', 'assigns.ccode')
       ->select('assigns.*','courses.image','courses.inst_id')->where('studentNo',$stdnum)->get();
      
       foreach($result as $results)
        {
            $tutor=$results->inst_id;
            $value=instructors::select('name')->where('id',$tutor)->get();
           return view('home',compact('result','value'));
        }
        //$value=instructors::select('name')->where('id',$tutor)->get();
     

        return view('home',compact('result'));
    }
}
