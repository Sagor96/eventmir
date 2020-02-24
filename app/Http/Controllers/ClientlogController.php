<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Clientlog;

class ClientlogController extends Controller
{
    public function login(){
        return view('clients.auth.login');
    }

    public function home(){
        return view('clients.home');
    }


    public function register(){
        return view('clients.auth.register');
    }

    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:clientlogs',
            'password'=>'required|min:6|confirmed'
        ]);
        $sprovider=new Clientlog();
        if($validators->fails()){
            return redirect()->route('clientlog.register')->withErrors($validators)->withInput();
        }else{
            $sprovider->name=$request->name;
            $sprovider->email=$request->email;
            $sprovider->password=Bcrypt($request->password);
            $sprovider->save();
            return redirect()->route('clientlog.login');
        }
    }

    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validators->fails()){
            return redirect()->route('clientlog.login')->withErrors($validators)->withInput();

        }else{
            $email=$request->email;
            $password=$request->password;
            if(Auth::guard('clientlog')->attempt(['email'=>$email,'password'=>$password])){

                return redirect()->route('cl_dashboard');
            }else{
                session()->flash('type', 'success');
                 session()->flash('message', 'Invalid Email or Password!!');
                return redirect()->route('clientlog.login');
            }
        }
    }

    public function logoutClientlog(){
        Auth::guard('clientlog')->logout();
        return redirect()->route('clientlog.login');
    }

    public function index(){
    $data = [];

    // client count
    $data['clients_count'] = \App\Models\Client::select('id','name', 'username', 'email', 'phone', 'address')->get();

    $data['total_clients'] = count($data['clients_count']);


    return view('clients.cl_dashboard', $data);
    }
}
