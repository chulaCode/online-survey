<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assigns;
use App\courses;
use App\students;
use App\instructors;



class AssignController extends Controller
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
        
        $result = assigns::orderBy('id','desc')->paginate(8);
    
        return view('Instructor.assign.assign',compact ('result'));
        
    }
    public function create()
    {  
        //$teacher=instructors::select('id', 'name')->get();
        $courses=courses::select('ccode', 'cname')->get();
         $student=students::select('number', 'name')->get();//->pluck('studentNo','name');
        return view('Instructor.assign.assign-create',compact('courses','student'));
       // dd($courses,$student);
       

    }
    public function store(Request $request)
    {
    
            $data= $this->validate($request,[
                'course'=>'required',
                'student'=>'required',
                
            ]);
            $count=assigns::where('ccode',$data['course'])->count('studentNo');
            $max=courses::select('max_num')->where('ccode',$data['course'])->first();
            $max_num=$max->max_num;
            if($count==$max_num)
            {
                return redirect(route('assign.show'))->with('status', 'STUDENT QUOTA FOR THIS COURSE HAVE REACHED');
             
            }else{
            
                if ((assigns::where([['ccode', $data['course']],['studentNo', $data['student']]])->exists()))
                {
                    return redirect(route('assign.show'))->with('status', 'you are reassigning student to same course');
                
                }else{
                $result=new assigns();
                $result->ccode=$data['course'];
                $result->studentNo=$data['student'];
                $result->save();
                return redirect(route('assign.show'))->with('status', 'student assigned succesfully');
                }
            }
            
    }
    public function show()
    {
        //return view('Instructor.question-create');
    }
    public function edit(questions $question)
    {
       
        return view('Instructor.assign.assign-edit',compact('question'));
    }
    
    public function update(Request $request,$id)
    {

        $data= $this->validate($request,[
            'course'=>'required',
            'student'=>'required',
            
        ]);

        $result=assigns::find($id);
        $result->ccode=$data['course'];
        $result->studentNo=$data['student'];
        $result->save();
       return redirect(route('assign.show'))->with('status', 'student reassigned succesfully');
       
    }
    public function destroy($id)
    {
        $result=assigns::find($id);
        $result->delete();
        return redirect(route('assign.show'))->with('status', 'Student Unassigned for section 2 deleted succesfully');
    
    }
}
