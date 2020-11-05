<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;

class KaryawanLoginController extends Controller
{
    
    // use AuthenticatesUsers;

    // protected $redirectTo = '/karyawan';
    use ThrottlesLogins;

    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;

    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;

    public function __construct()
    {
        $this->middleware('guest:karyawan')->except('logout');
    }

    public function showLoginForm()
    {
        return view('karyawan.auth.login');
    }

    public function username()
    {
            return 'name';
    }

    protected function guard()
    {
        return Auth::guard('karyawan');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)){
            //Fire the lockout event
            $this->fireLockoutEvent($request);

            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        //attempt login.
        if(Auth::guard('karyawan')->attempt($request->only('name','password'),$request->filled('remember'))){
            //Authenticated, redirect to the intended route
            //if available else karyawan dashboard.
            return redirect()
                ->intended(route('karyawan'))
                ->with('status','You are Logged in as karyawan!');
        }

        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);

        //Authentication failed, redirect back with input.
        return $this->loginFailed();
    }
    
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'name'    => 'required|min:3|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'ename.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    
    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('karyawan')->logout();
        return redirect()
            ->route('karyawan.login')
            ->with('status','karyawan has been logged out!');
    }
}
