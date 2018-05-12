<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Lang;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'nameRegister' => 'required|string|max:255',
                'emailRegister' => 'required|string|email|max:255|unique:users,email',
                'passRegister' => 'required|string|min:6|confirmed',
            ],
            [
                'nameRegister.required' => Lang::get('validation.required'),
                'nameRegister.string' => Lang::get('validation.string'),
                'nameRegister.max' => Lang::get('validation.string', ['max' => 255]),
                'emailRegister.required' => Lang::get('validation.required'),
                'emailRegister.string' => Lang::get('validation.string'),
                'emailRegister.max' => Lang::get('validation.string', ['max' => 255]),
                'emailRegister.unique' => Lang::get('validation.unique'),
                'passRegister.required' => Lang::get('validation.required'),
                'passRegister.string' => Lang::get('validation.string'),
                'passRegister.min' => Lang::get('validation.min.string', ['min' => 6]),
                'passRegister.confirmed' => Lang::get('validation.confirmed'),

            ]
        );
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = [];
        $user = $this->infoDefault();
        $user = array_push(
            $user,
            [
                'name' => $data['nameRegister'],
                'email' => $data['emailRegister'],
                'password' => Hash::make($data['passRegister'])
            ]
        );
        return User::create($user);
    }

    private function infoDefault()
    {
        return [
            'dob' => config('custom.user.dob'),
            'phone' => config('custom.user.phone'),
            'gender' => config('custom.user.gender'),
            'avatar' => config('custom.user.avatar'),
            'credit_card' => config('custom.user.credit_card'),
            'points' => config('custom.user.points'),
            'role_id' => config('custom.user.role_id')
        ];
    }
}
