<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\courses;
use App\departments;
use App\semesters;
use App\instructors;

class CourseController extends Controller
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
        $result=courses::join('semesters', 'semesters.id', '=', 'courses.semester_id')
       ->join('departments','departments.dept_id','=','courses.dept_id')
       ->join('instructors','instructors.id','=','courses.inst_id')
       ->select('courses.*','instructors.name','semesters.sname','departments.dname',
       'semesters.year')->orderBy('id','desc')->paginate(8);
        return view('Instructor.course.course',compact ('result'));
     //dd($result);
        
    }
    public function create()
    {
      return view('Instructor.course.course-create');
    }
    public function edit(Request $request,$id)
    {    
        $where = array('id' => $id);
        $result  = courses::where($where)->first();
 
        //dd($result);
        return view('Instructor.course.course-edit',compact('result'));
    }
    public function update(Request $request, $id)
    {
        $data= $this->validate($request,[
            'ccode'=>'required|max:8',
            'name'=>'required|max:255',
            'max'=>'required',
            'credit'=>'required|max:1',
            'image'=>['required','image']
        ]);
        if($file=request('image'))
        {
          
            $imag=uniqid().$file->getClientOriginalName();
            if($file->move('uploads',$imag))
            {
                $result=courses::find($id);
                $result->ccode=$data['ccode'];
                $result->cname=$data['name'];
                $result->credit=$data['credit'];
                $result->max_num=$data['max'];
                $result->image=$imag;
                $result->save();
            }
        }
         
        
        return redirect(route('course.show'))->with('status', 'Course Updated succesfully');
    
    }
    public function store(Request $request)
    {
        $data= $this->validate($request,[
            'ccode'=>'required|max:8',
            'name'=>'required|max:255',
            'inst_id'=>'required',
            'dept_id'=>'required',
            'sem_id'=>'required',
            'max'=>'required',
            'credit'=>'required|max:1',
            'image'=>['required','image'],
        ]);
        if($file=request('image'))
        {
          
            $imag=uniqid().$file->getClientOriginalName();
            if($file->move('uploads',$imag))
            {
                $result=new courses();
                $result->inst_id=$data['inst_id'];
                $result->ccode=$data['ccode'];
                $result->dept_id=$data['dept_id'];
                $result->semester_id=$data['sem_id'];
                $result->cname=$data['name'];
                $result->credit=$data['credit'];
                $result->max_num=$data['max'];
                $result->image=$imag;
                $result->save();
            }
        }
         
        
        return redirect(route('course.show'))->with('status', 'Course saved succesfully');
    
    }
    public function destroy($id)
    {
        $result=courses::find($id);
       
        $result->delete();
       
        return redirect(route('course.show'))->with('status', 'Course deleted succesfully');
    
    }
}
