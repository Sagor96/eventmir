<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
        $data['services'] = \App\Models\Service::select('id','s_name', 's_amount')->get();
        return view('services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $data = [];
      return view('services.create', $data);
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
          's_name'      => 'required',
          's_amount'    => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      //insert to database
      \App\Models\Service::create([
          's_name'   => $request->input('s_name'),
          's_amount'    => $request->input('s_amount'),
      ]);

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Service added Successfully');

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
      $data = [];

      $data['services'] = \App\Models\Service::select('id','s_name', 's_amount')->find($id);

      return view('services.edit', $data);

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
          's_name'      => 'required',
          's_amount'    => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      //insert to database
      $service = \App\Models\Service::find($id);
      $service->update([
          's_name'      => $request->input('s_name'),
          's_amount'    => $request->input('s_amount'),
      ]);

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Service Updated Successfully.');

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
      $service = \App\Models\Service::find($id);
      $service->delete();

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Service Deleted Successfully.');

      return redirect()->back();
    }
}
