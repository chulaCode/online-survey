<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\students;
use Auth;

class StudentController extends Controller
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
        
        $result = students::orderBy('studentNo','desc')->paginate(8);
      
        return view('Instructor.student',compact ('result'));
        
        
    }
    public function store(Request $request)
    {
        
        $data= $this->validate($request,[
            'studentNo'=>['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'ccode'=>['required', 'string', 'max:8'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            

        ]);
         
        $result=new students();
        $result->number=$data['studentNo'];
        $result->name=$data['name'];
        $result->email=$data['email'];
        $result->password=Hash::make($data['password']);
        //$result->ccode=$data['ccode'];
        $result->save();
        return redirect(route('student.show'))->with('status', 'Student Added Succesfully');
       
      //dd($data['studentNo']);
    }
    public function create()
    {
        return view('Instructor.student-create');
    }
    public function update(Request $request,$id)
    {
        $data= $this->validate($request,[
            'number'=>['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //'ccode'=>['required', 'string', 'max:8'],
            'password' => ['required', 'string', 'min:5']
            

        ]);

        $result=students::find($id);
        $result->number=$data['number'];
        $result->name=$data['name'];
        $result->email=$data['email'];
        $result->password=Hash::make($data['password']);
        //$result->ccode=$request->input('ccode');
        $result->save();
        return redirect(route('student.show'))->with('status', 'Student  updated succesfully');
    
    }
    public function edit(students $student)
    {
        return view('Instructor.student-edit',compact('student'));
    
    }
    public function destroy($id)
    {
        $result=students::find($id);
        $result->delete();
        return redirect(route('student.show'))->with('status', 'Student deleted succesfully');
    
    }
    public function show()
    {

    }
}
