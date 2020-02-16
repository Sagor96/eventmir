@extends('layouts')

@section('title','Update Client')

@section('content')
<section class="content-header">
    <div class="row'">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Client</h1>
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
  <div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
                <!-- form start -->
           <form role="form" action="{{ route('clients.update', $clients->id) }}" method="post">
              @csrf
              @method('PUT')

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
                    <input type="text" class="form-control" id="Name" placeholder="Name" name="name" value="{{ $clients->name }}">
                </div>
                 <div class="form-group">
                    <label for="UserName">User Name</label>
                    <input type="text" class="form-control" id="UserName" placeholder="User Name" name="username" value="{{ $clients->username }}">
                </div>
                <div class="form-group">
                    <label for="E-mail">E-mail</label>
                    <input type="text" class="form-control" id="E-mail" placeholder="E-mail" name="email" value="{{ $clients->email }}">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone" value="{{ $clients->phone }}">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" placeholder="Address" name="address" value="{{ $clients->address }}">
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>

              </div>
            </form>
        </div>

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@stop
