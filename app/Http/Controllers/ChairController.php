<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\durations;

class ChairController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:chair');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //$result = durations::select('ccode')->distinct()->get();
      
        $result = durations::select('ccode')->distinct()->get();
      
        return view('Chair.chair',compact('result'));
    
    }
}
