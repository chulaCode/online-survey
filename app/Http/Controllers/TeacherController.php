<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\instructors;
use App\courses;

class TeacherController extends Controller
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
        $result = instructors::orderBy('id','desc')->paginate(8);
       /* $result=instructors::join('courses', 'courses.inst_id', '=', 'instructors.id')
        ->select('instructors.*','courses.cname')->orderBy('id','desc') ->paginate(8);
       */
        return view('Chair.teacher.teacher',compact ('result'));
    
       
    }
    public function create()
    {
      return view('Chair.teacher.teacher-create');
    }
    public function edit(Request $request,$id)
    {    
        $where = array('id' => $id);
        $result  = instructors::where($where)->first();
 
        return view('Chair.teacher.teacher-edit',compact('result'));
    }
    public function update(Request $request, $id)
    {
        $data= $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            
        ]);
        $result=instructors::find($id);
        $result->name=$data['name'];
        $result->email=$data['email'];
        $result->password=Hash::make($data['password']);
        $result->save();
        
        return redirect(route('teacher.show'))->with('status', 'Instructor Updated succesfully');
    
    }
    public function store(Request $request)
    {
        
        $data= $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            
           
        ]);
        
        $result=new instructors();
        $result->name=$data['name'];
        $result->email=$data['email'];
        $result->password=Hash::make($data['password']);
        $result->save();
        
         return redirect(route('teacher.show'))->with('status', 'Instructor Added succesfully');
    
    
    }
    public function destroy($id)
    {
        $result=instructors::find($id);
       
        $result->delete();
       
        return redirect(route('semester.show'))->with('status', 'Instructor deleted succesfully');
    
    }
}
