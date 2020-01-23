<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class InstructorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:instructor')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.instructor-login');
    }
    public function login(Request $request)
    {
       //validate the form
        $this->validate($request,[
          'email'=>'required|email',
          'password'=>'required|min:5'
        ]);
       //attempt to log user in
        if(Auth::guard('instructor')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember));
        {
          //if successful, then redirect to their intended location
          return redirect()->intended(route('instructor.show')); 
        }
       
       //if unsuccessful, then redirect back to their login with form data
       return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('instructor')->logout();
        return redirect('/');
    }
}


