<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Lang;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $email = $this->username();
        $this->validate(
            $request,
            [
                $this->username() => 'required|string|email',
                'password' => 'required|string|min:6',
            ],
            [
                $email . '.required' => Lang::get('validation.required'),
                $email . '.string' => Lang::get('validation.string'),
                $email . '.email' => Lang::get('validation.email'),
                'password.required' => Lang::get('validation.required'),
                'password.string' => Lang::get('validation.string'),
                'password.min' => Lang::get('validation.min.string', ['min' => 6]),
            ]
        );
    }
}
