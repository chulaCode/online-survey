<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DirectorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:director')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.director-login');
    }
    public function login(Request $request)
    {
       //validate the form
        $this->validate($request,[
          'email'=>'required|email',
          'password'=>'required|min:5'
        ]);
       //attempt to log user in
        if(Auth::guard('director')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember));
        {
          //if successful, then redirect to their intended location
          return redirect('Director/director'); 
        }
       
       //if unsuccessful, then redirect back to their login with form data
       return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('director')->logout();
        return redirect('/');
    }

}
