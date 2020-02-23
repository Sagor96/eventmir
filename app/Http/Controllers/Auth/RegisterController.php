<?php

namespace App\Http\Controllers\Auth;

use App\Sprovider;
use App\Clientlog;
use App\Stafflog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:sprovider');
        $this->middleware('guest:clientlog');
        $this->middleware('guest:stafflog');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sproviders'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    //Servier Provider Action
    public function showSproviderRegisterForm()
    {
        return view('auth.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


     //Client Action
     public function showClientlogRegisterForm()
     {
         return view('auth.register', ['url' => 'clientlog']);
     }

     //Staff Action
     public function showStafflogRegisterForm()
     {
         return view('auth.register', ['url' => 'stafflog']);
     }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //protected function create(array $data)
    //{
      //  return User::create([
        //    'name' => $data['name'],
          //  'email' => $data['email'],
            //'password' => Hash::make($data['password']),
        //]);
    //}
//Service Provider
    protected function createSprovider(Request $request)
    {
        $this->validator($request->all())->validate();
         return Sprovider::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/sprovider');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

//Client
    protected function createClientlog(Request $request)
    {
        $this->validator($request->all())->validate();
        return Clientlog::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/clientlog');
    }


    //Staff
        protected function createStafflog(Request $request)
        {
            $this->validator($request->all())->validate();
          return Stafflog::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->intended('login/stafflog');
        }
}
