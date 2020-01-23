<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\semester;
use App\departments;
use App\courses;
use App\questions;
use App\students;
use App\durations;
use App\surveys;
use App\first_surveys;
use Auth;

class SurveyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index($ccode)
    {
        $result=courses::join('departments', 'departments.dept_id', '=', 'courses.dept_id')
        ->join('semesters', 'semesters.id', '=', 'courses.semester_id')
        ->select('departments.dname','semesters.year','semesters.sname','courses.ccode',
        'courses.cname')->where('ccode',$ccode)->get();
      
        $question=questions::where([['title','head1'],['ccode',$ccode]])->get();
        $subquestion1=questions::where([['title','sub1'],['ccode',$ccode]])->get();
        $question1=questions::where([['title','head2'],['ccode',$ccode]])->get();
        $question2=questions::where([['title','head3'],['ccode',$ccode]])->get();
        $sub2=questions::where([['title','sub2'],['ccode',$ccode]])->get();
        $sub3=questions::where([['title','sub3'],['ccode',$ccode]])->get();


        return view('survey',compact('result','question','subquestion1','question1','sub2','question2','sub3'));
        //dd($result);
        
    }
    public function store(Request $request,$ccode)
    {
      
       /* $option3=[];
        $Qresult3=[];
        $course3=[];
        $studentResult3=[];*/

        $std=Auth::user()->studentNo;
       
        $sub1=questions::where([['title','sub1'],['ccode',$ccode]])->get();
        $sub2=questions::where([['title','sub2'],['ccode',$ccode]])->get();
        $sub3=questions::where([['title','sub3'],['ccode',$ccode]])->get();

        $exist_result = durations::where([ ['ccode',$ccode],['studentNo',$std]])->exists();
       if(!$exist_result)
        {
            foreach($sub1 as $value)
            {
                //$data=[
                    surveys::create([
                    'ques_id'=> $request->input('ques'.$value->id),
                    'answer'=>  $request->input('result'.$value->id),
                    'ccode'=>$request->input('course'),
                    'section'=>(int)$request->input('one'),
                    'studentNo'=> $std,
                    
    
                ]);
            
            }
            foreach($sub2 as $value)
            { 
                surveys::create([
                    'ques_id'=> $request->input('ques'.$value->id),
                    'answer'=>  $request->input('option'.$value->id),
                    'ccode'=>$request->input('course'),
                    'studentNo'=> $std,
                    'section'=>(int)$request->input('two'),
    
                ]);
                
            }
        
            
            foreach($sub3 as $value)
            {
                surveys::create([
                    'ques_id'=> $request->input('ques'.$value->id),
                    'answer'=>  $request->input('option'.$value->id),
                    'ccode'=>$request->input('course'),
                    'studentNo'=> $std,
                    'section'=>(int)$request->input('three'),
    
                ]);
                
            }
            
                $count=new durations();
                $count->ccode=$ccode;
                $count->studentNo=$std;
                $count->save();
                return redirect(route('survey.index',$ccode))->with('status', 'SURVEY SUBMITTED SUCCESSFULY');
            
            /*
            $option3[]=$request->input('option'.$value->id);
                $course3[]=$request->input('course');
                $Qresult3[]=$request->input('ques'.$value->id);
                $studentResult3[]=$std;
        */
    
        }else{
            return redirect(route('survey.index',$ccode))->with('status', 'YOU HAVE ALREADY SUBMITTED A SURVEY FOR THIS COURSE');
           
        }
    }

}
