<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questions;

class SurveyOutcomeController extends Controller
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
        $result = questions::orderBy('id','desc')->paginate(8);
       // $result2 = question2s::orderBy('id','desc')->paginate(8);
      
        return view('Instructor.instructor',compact ('result'));
        
    }
    public function create()
    {
        return view('Instructor.create');
    }
    public function store(Request $request)
    {/*
        $n= $res=$request->input('number');
        $h= $res=$request->input('title');
        $s= $res=$request->input('name');
        dd($n,$h,$s);
        */
       // dd($request->submit == "submit2");
       // if($request->submit == "submit1"){
            $data= $this->validate($request,[
                'number'=>'required',
                'title'=>'required|max:255',
                'name'=>'required|max:255',
                'ccode'=>'required|max:8'
            ]);
             questions::create([
                'number' => $data['number'],
                'title' => $data['title'],
                'question' => $data['name'],
                'ccode' => $data['ccode']
            ]);
            
            return redirect(route('survey.print'))->with('status', 'question for section1 saved succesfully');
        /*   
//}else if($request->submit == "submit2"){
            
            $data= $this->validate($request,[
                'number'=>'required',
                'title'=>'required|max:255',
                'question'=>'required|max:255',
                'ccode'=>'required|max:8'
            ]);
           
             question2s::create([
                'number' => $data['number'],
                'title' => $data['title'],
                'question' => $data['question'],
                'ccode' => $data['ccode']
            ]);
           
            return redirect(route('survey.print'))->with('status', 'question for section2 saved succesfully');
          */
        
        
    }
    public function show()
    {
        return view('Instructor.question-create');
    }
    public function edit(Request $request, $id)
    {
        $where = array('id' => $id);
        $question = questions::where($where)->first();
 
       return view('Instructor.edit',compact('question'));
    }
   
    public function update(Request $request,$id)
    {

        $data= $this->validate($request,[
            'number'=>'required',
            'title'=>'required|max:255',
            'name'=>'required|max:255',
            'ccode'=>'required|max:255'
        ]);

        $result=questions::find($id);
        $result->number=$request->input('number');
        $result->title=$request->input('title');
        $result->question=$request->input('name');
        $result->ccode=$request->input('ccode');
        $result->save();
        return redirect(route('survey.print'))->with('status', 'Question updated succesfully');
    
    }
    public function destroy($id)
    {
        $result=questions::find($id);
        $result->delete();
        return redirect(route('survey.print'))->with('status', 'Question deleted succesfully');
    
    }
}
