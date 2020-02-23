<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ProviderController extends Controller
{
  public function index(){
  $data = [];

  // client count
  $data['clients_count'] = \App\Models\Client::select('id','name', 'username', 'email', 'phone', 'address')->get();

  $data['total_clients'] = count($data['clients_count']);


  return view('sproviders.sp_dashboard', $data);
  }

}
