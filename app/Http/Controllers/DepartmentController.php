<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\chairs;
   
class DepartmentController extends Controller
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
        $result = chairs::orderBy('id','desc')->paginate(8);

         return view('Director.deptChair.dept-chair',compact ('result'));
      
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Director.deptChair.deptChair-create');
    }
    public function store(Request $request)
    {
        $data= $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            
           
        ]);
        
        $result=new chairs();
        $result->name=$data['name'];
        $result->email=$data['email'];
        $result->password=Hash::make($data['password']);
        $result->save();
        
         return redirect(route('dept-chair.show'))->with('status', 'Instructor Added succesfully');
     
     }
     public function update(Request $request, $id)
     {
         $data= $this->validate($request,[
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
             'password' => ['required', 'string', 'min:5', 'confirmed'],
             
         ]);
         $result=chairs::find($id);
         $result->name=$data['name'];
         $result->email=$data['email'];
         $result->password=Hash::make($data['password']);
         $result->save();
         
         return redirect(route('dept-chair.show'))->with('status', 'Chair Updated succesfully');
     
     } 
        
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $result  = chairs::where($where)->first();
 
        return view('Director.deptChair.deptChair-edit',compact('result'));
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = chairs::where('id',$id)->delete();
   
        return redirect(route('dept-chair.show'))->with('status', 'Chair deleted succesfully');
    
        
    }
}

