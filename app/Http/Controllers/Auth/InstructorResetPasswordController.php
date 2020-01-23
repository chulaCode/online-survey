<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use password;
use Auth;


class InstructorResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/instructor';

    public function __construct()
    {
        $this->middleware('guest:instructor');
    }
    protected function guard()
    {
        return Auth::guard('instructor');
    }
     
    protected function broker()
    {
        return Password::broker('instructors');//director connects to director password broker in auth config

    }
}
