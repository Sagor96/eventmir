<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:sprovider')->except('logout');
        $this->middleware('guest:clientlog')->except('logout');
        $this->middleware('guest:stafflog')->except('logout');
    }

    //Service Provider Action
    public function showSproviderLoginForm()
    {
        return view('auth.login', ['url' => 'sprovider']);
    }

    public function sproviderLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('sprovider')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/sprovider');
        }
        return back()->withInput($request->only('email', 'remember'));
      }

      //Client Action
      public function showClientlogLoginForm()
    {
        return view('auth.login', ['url' => 'clientlog']);
    }

    public function clientlogLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('clientlog')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/clientlog');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    //Staff Action
    public function showStafflogLoginForm()
    {
        return view('auth.login', ['url' => 'stafflog']);
    }

    public function stafflogLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('stafflog')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/stafflog');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
