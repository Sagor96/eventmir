<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Sprovider;

class SproviderAuthController extends Controller
{
    public function login(){
        return view('sproviders.auth.login');
    }

    public function home(){
        return view('sproviders.home');
    }


    public function register(){
        return view('sproviders.auth.register');
    }

    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:sproviders',
            'password'=>'required|min:6|confirmed'
        ]);
        $sprovider=new Sprovider();
        if($validators->fails()){
            return redirect()->route('sprovider.register')->withErrors($validators)->withInput();
        }else{
            $sprovider->name=$request->name;
            $sprovider->email=$request->email;
            $sprovider->password=Bcrypt($request->password);
            $sprovider->save();
            return redirect()->route('sprovider.login');
        }
    }

    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validators->fails()){
            return redirect()->route('sprovider.login')->withErrors($validators)->withInput();

        }else{
            $email=$request->email;
            $password=$request->password;
            if(Auth::guard('sprovider')->attempt(['email'=>$email,'password'=>$password])){

                return redirect()->route('sp_dashboard');
            }else{
                session()->flash('type', 'success');
                 session()->flash('message', 'Invalid Email or Password!!');
                return redirect()->route('sprovider.login');
            }
        }
    }

    public function logoutSprovider(){
        Auth::guard('sprovider')->logout();
        return redirect()->route('sprovider.login');
    }


//Service provider Action


    public function index(){
        $data = [];
        $data['sproviders'] = \App\Sprovider::select('id','name', 'email')->orderBy('id', 'DESC')->get();

        return view('sproviders.sprovider', $data);
    }

    public function create(){
        return view('sproviders.createSprovider');
    }

    public function storeSprovider(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6|confirmed'
        ]);
        $doctor=new Sprovider();
        if($validators->fails()){
            return redirect()->route('sprovider.create')->withErrors($validators)->withInput();
        }else{
            $doctor->name=$request->name;
            $doctor->email=$request->email;
            $doctor->password=Bcrypt($request->password);
            $doctor->save();
            session()->flash('type', 'success');
            session()->flash('message', 'New Amin added Successfully');
            return redirect()->back();
        }
    }

}
