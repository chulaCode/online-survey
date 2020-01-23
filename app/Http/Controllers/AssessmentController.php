<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ects;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:instructor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = ects::orderBy('id','desc')->paginate(8);
      
        return view('Instructor.assessment.assessment',compact ('result'));
       
    }
    public function create()
    {
        return view('Instructor.assessment.assessment-create');
    }
    public function store(Request $request)
    {
        $data= $this->validate($request,[
            'ccode'=>['required', 'string', 'max:255'],
            'number' => 'required',
            'duration' => 'required',
            'workload'=>'required',
            'activity' => ['required', 'string', 'max:255']
        ]);
         
        $result=new ects();
        $result->ccode=$data['ccode'];
        $result->number=$data['number'];
        $result->duration=$data['duration'];
        $result->workload=$data['workload'];
        $result->activities=$data['activity'];
        $result->save();
        return redirect(route('assessment.show'))->with('status', 'Workload schedule added Succesfully');
       
    }
    public function edit(Request $request,$id)
    {    
        $where = array('id' => $id);
        $result  = ects::where($where)->first();
 
        return view('Instructor.assessment.assessment-edit',compact('result'));
    }
    public function update(Request $request, $id)
    {
      //dd('update');
      $data= $this->validate($request,[
        'ccode'=>['required', 'string', 'max:255'],
        'number' => 'required',
        'duration' => 'required',
        'workload'=>'required',
        'activity' => ['required', 'string', 'max:255']
    ]);
      $result=ects::find($id);
      $result->ccode=$data['ccode'];
      $result->number=$data['number'];
      $result->duration=$data['duration'];
      $result->workload=$data['workload'];
      $result->activities=$data['activity'];
      $result->save();
      return redirect(route('assessment.show'))->with('status', 'Workload schedule updated Succesfully');
     
    }
    public function destroy($id)
    {
        $result=ects::find($id);
        $result->delete();
        return redirect(route('assessment.show'))->with('status', 'Workload schedule deleting Succesfully');
     
    }
}
