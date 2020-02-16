@extends('layouts')

@section('title','ServiceAdd')

@section('content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Add Service</h1>
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
  <div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
                <!-- form start -->
            <form role="form" action="{{ route('services.store') }}" method="post">
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
					  <label for="s_name">Service Name</label>
					  <input type="text" class="form-control" id="s_name" placeholder="Service Name" name="s_name" value="{{ old('s_name') }}">
					</div>
					<div class="form-group">
					  <label for="s_amount">Amounts(Tk)</label>
					  <input type="text" class="form-control" id="s_amount" placeholder="Amounts" name="s_amount" value="{{ old('s_amount') }}">
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
</section>

@endsection
