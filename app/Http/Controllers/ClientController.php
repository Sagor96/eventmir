<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
        $data['clients'] = \App\Models\Client::select(
        'id',
        'name',
        'username',
        'email',
        'phone',
        'address')->get();
        return view('clients.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = [];
      return view('clients.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate
$rules = [
  'name'          => 'required',
  'username'      => 'required|min:5',
  'email'         => 'required|email',
  'phone'         => 'required|numeric|regex:/(01)[0-9]{9}/',
  'address'       => 'required',
];

$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
  return redirect()->back()->withErrors($validator)->withInput();
}

// $request->merge([
//     'service_id' => implode(',', (array) $request->get('service_id'))
// ]);



//insert to database
//\App\Models\Lead::create($request->all());
\App\Models\Client::create([
  'name'          => $request->input('name'),
  'username'      => strtolower(trim($request->input('username'))),
  'email'         => $request->input('email'),
  'phone'         => $request->input('phone'),
  'address'       => $request->input('address'),
  ]);

//redirect
session()->flash('type', 'success');
session()->flash('message', 'Client added Successfully');

return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['clients'] = \App\Models\Client::select(
                          'id',
                          'name',
                          'username',
                          'email',
                          'phone',
                          'address')->find($id);
          return view('clients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //validate
$rules = [
  'name'          => 'required',
  'username'      => 'required|min:5',
  'email'         => 'required|email',
  'phone'         => 'required|numeric|regex:/(01)[0-9]{9}/',
  'address'       => 'required',
];

$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
  return redirect()->back()->withErrors($validator)->withInput();
}

//insert to database
$client = \App\Models\Client::find($id);
$client->update([
  'name'          => $request->input('name'),
  'username'      => strtolower(trim($request->input('username'))),
  'email'         => $request->input('email'),
  'phone'         => $request->input('phone'),
  'address'       => $request->input('address'),
]);

//redirect
session()->flash('type', 'success');
session()->flash('message', 'Client Updated Successfully.');

return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client = \App\Models\Client::find($id);
      $client->delete();

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Client Deleted Successfully.');
      return redirect()->back();
    }
}
