<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\surveys;
use App\evaluations;
class ActionsController extends Controller
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
        
         $result =  surveys::selectraw('AVG(answer)*10 as average,ques_id')
         ->groupBy('ques_id')->paginate(8);
        
           
         //$result2 = surveys::select('ccode')->where('ccode',$ccode)->first();
       
 
        //$result2 = surveys::where('studentNo',1)->paginate(8);
      
        return view('Instructor.action.actions',compact('result'));
    }
    public function create(surveys $result)
    {
      // $result=surveys::find($id);
       //calc avg and  send
//dd($result);
      return view('Instructor.action.action-create',compact('result'));
    }
    public function edit(Request $request,$id)
    {    
        $where = array('id' => $id);
        $result  = evaluations::where($where)->first();
 
        return view('Instructor.action.action-edit',compact('result'));
    }
    public function update(Request $request, $id)
    {
        $data= $this->validate($request,[
            'action'=>['required', 'string', 'max:255'],
            'explain'=>['required', 'string', 'max:255']
        ]);
        $result=evaluations::find($id);
        $result->action=$data['action'];
        $result->explanation=$data['explain'];
        $result->save();
        
        return redirect(route('action.index'))->with('status', ' Update Successful');
    
    }
    public function store(Request $request)
    {
        $r=$request->input('questionId');
        $exist_result = evaluations::where('questionId',$r)->exists();
        if(!$exist_result){
        
                $data= $this->validate($request,[
                    'questionId'=>'required',
                    'avg'=>'required',
                    'ccode'=>'required',
                    'action'=>'',
                    'explain'=>''
                
                ]);
                
                $result=new evaluations();
                $result->questionId=$data['questionId'];
                $result->avg=$data['avg'];
                $result->ccode=$data['ccode'];
                $result->explanation=$data['explain'];
                $result->action=$data['action'];

                $result->save();
                
                return redirect(route('action.show'))->with('status', 'Saved succesfully Click on actions on survey link to view.');
           }
        else{
            return redirect(route('action.show'))->with('status', 'YOU HAVE ALREADY SAVED ACTION
             AND EXPLAINATION FOR THIS QUESTION');
          
        }
    }
   
    public function show()
    {
        $result=evaluations::paginate(8);
        return view('Instructor.action.actions-survey',compact('result'));
    }
}
