<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function attemptLogin(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $remember = $request->filled('remember');

        // E-posta veya kullanıcı adı ile giriş
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        return Auth::attempt([
            $field => $login,
            'password' => $password
        ], $remember);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ], [
            'login.required' => 'E-posta veya kullanıcı adı gereklidir.',
            'password.required' => 'Şifre gereklidir.',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return back()->withErrors([
            'login' => 'Girdiğiniz bilgiler hatalı.',
        ])->withInput($request->only('login', 'remember'));
    }
}