<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use password;

class DirectorResetPasswordController extends Controller
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
    protected $redirectTo = '/director';

    public function __construct()
    {
        $this->middleware('guest:director');
    }
    //this defines guard to use to redirect
    protected function guard()
    {
        return Auth::guard('director');
    }
    //password broker
    protected function broker()
    {
        return Password::broker('directors');//director connects to director password broker in auth config

    }
}
