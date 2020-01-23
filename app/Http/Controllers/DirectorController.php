<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response;
use App\departments;
use App\chairs;

class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:director');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$result = departments::orderBy('dept_id','desc')->paginate(8);
     
    $result=departments::join('chairs', 'chairs.id', '=', 'departments.chair_id')
       ->select('departments.*','chairs.name')
       ->get();
    return view('Director.dept.director',compact ('result'));
    
    }

    public function create()
    {
        $teachers=chairs::select('id', 'name')->get();
        return view('Director.dept.dept-create',compact('teachers'));
    }
    public function edit(Request $request,$id)
    {    
        $where = array('dept_id' => $id);
        $result  = departments::where($where)->first();
 
        return view('Director.dept.dept-edit',compact('result'));
    }
    public function update(Request $request, $dept_id)
    {
        
        
        $data= $this->validate($request,[
            'name'=>'required',
            'chair_id'=>'required'
        ]);
        $result =departments::find($dept_id);
        $result->dname=$data['name'];
        $result->chair_id=$data['chair_id'];
        $result->save();
        
        return redirect(route('dept.show'))->with('status', 'Department Updated succesfully');
    
    }
    public function store(Request $request)
    {
        
        $data= $this->validate($request,[
            'name'=>'required',
            'chair_id'=>'required',
        ]);
        
        $result=new departments();
        $result->dname=$data['name'];
        $result->chair_id=$data['chair_id'];
        $result->save();
        
         return redirect(route('dept.show'))->with('status', 'Department Updated succesfully');


    }
    public function show()
    {
        return view('Director.survey');
    }
    public function destroy($dept_id)
    {
       
        $result=departments::where('dept_id',$dept_id);
       // dd($result);
        $result->delete();
       
        return redirect(route('dept.show'))->with('status', 'Department deleted succesfully');
    
    }
}
