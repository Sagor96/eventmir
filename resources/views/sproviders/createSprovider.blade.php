@extends('layouts')

@section('title','ServiceAdd')

@section('content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Add Service Provider</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('services.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Package List</a>
        </div>
      </div>
    </div>
<hr/>
<!-- Main content -->
<hr/>
<div class="w-75 p-3" style="background-color: #90EE90;">
  <div class="row">
    <div class="col-xl-12">

        <div class="box box-primary">
                <!-- form start -->

<form method="POST" action="{{ route('sprovider.store') }}">
              @csrf

              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif
              <div class="box-body">
                <div class="form-group">
                    <label for="name" class="">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email" class="">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
              </div>

              <div class="box-footer">
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-success">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
              </div>
          </form>
        </div>

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</section>

@endsection
