@extends('layouts')

@section('title','New Client')

@section('content')

<section class="content">
    <div class="row'">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Add Client</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('clients.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Client List</a>
        </div>
      </div>
    </div>
<hr/>
<!-- Main content -->
<hr/>
<div class="w-75 p-3" style="background-color: #90EE90;">
  <div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
                <!-- form start -->
           <form role="form" action="{{ route('clients.store') }}" method="post">
              @csrf

              @if ($errors->any())
                  <div class="alert alert-danger">
                  @if($errors->count()==1)
                  {{ $errors->first() }}
                @else
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                      @endif
                  </div>
              @endif

              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif

               <div class="box-body">
                <div class="form-group">
                    <label for="Name"> Name </label>
                    <input type="text" class="form-control" id="Name" placeholder="Name" name="name" value="{{ old('name') }}">
                </div>
                 <div class="form-group">
                    <label for="UserName">User Name</label>
                    <input type="text" class="form-control" id="UserName" placeholder="User Name" name="username" value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label for="E-mail">E-mail</label>
                    <input type="text" class="form-control" id="E-mail" placeholder="E-mail" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" placeholder="Address" name="address" value="{{ old('address') }}">
                </div>
            </div>

              <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
        </div>

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</section>
@stop
