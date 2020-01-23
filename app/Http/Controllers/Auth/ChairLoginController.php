<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class ChairLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:chair')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.chair-login');
    }
    public function login(Request $request)
    {
       //validate the form
        $this->validate($request,[
          'email'=>'required|email',
          'password'=>'required|min:5'
        ]);
       //attempt to log user in
        if(Auth::guard('chair')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember));
        {
          //if successful, then redirect to their intended location
          return redirect()->intended(route('chair.show')); 
        }
       
       //if unsuccessful, then redirect back to their login with form data
       return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('chair')->logout();
        return redirect('/');
    }
}
