<?php

namespace CodeFlix\Http\Controllers\Auth;

use CodeFlix\Http\Controllers\Controller;
use CodeFlix\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        /*
        | Sobrescrita do metodo credentials para permitir login somente de usuarios do tipo ROLE_ADMIN;
        */
        $data = $request->only($this->username(), 'password');
        $data['role'] = User::ROLE_ADMIN;
        return $data;
    }
}
