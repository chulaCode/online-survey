<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\semesters;

class SemesterController extends Controller
{
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
        $result = semesters::orderBy('id','desc')->paginate(8);
       
        return view('Chair.semester.semester',compact ('result'));
        
    }
    public function create()
    {
      return view('Chair.semester.semester-create');
    }
    public function edit(Request $request,$id)
    {    
        $where = array('id' => $id);
        $result  = semesters::where($where)->first();
 
        return view('Chair.semester.semester-edit',compact('result'));
    }
    public function update(Request $request, $id)
    {
        $data= $this->validate($request,[
            'name'=>'required',
            'year'=>'required',
        ]);
        $result=semesters::find($id);
        $result->sname=$data['name'];
        $result->year=$data['year'];
        $result->save();
        
        return redirect(route('semester.show'))->with('status', 'Semester Updated succesfully');
    
    }
    public function store(Request $request)
    {
        
        $data= $this->validate($request,[
            'name'=>'required',
            'year'=>'required',
           
        ]);
        
        $result=new semesters();
        $result->sname=$data['name'];
        $result->year=$data['year'];
        $result->save();
        
         return redirect(route('semester.show'))->with('status', 'Semester saved succesfully');
    
    
    }
    public function destroy($id)
    {
        $result=semesters::find($id);
       
        $result->delete();
       
        return redirect(route('semester.show'))->with('status', 'Course deleted succesfully');
    
    }
}
