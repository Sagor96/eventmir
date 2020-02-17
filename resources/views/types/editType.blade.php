@extends('layouts')

@section('title','EventTypeUpdate')

@section('content')

<section class="content">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Event Type</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('types.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Event Type List</a>
        </div>
      </div>
    </div>
<hr/>

<!-- Main content -->
<hr/>
<div class="w-75 p-3" style="background-color: #eee685;">
  <div class="row">
    <div class="col-xs-6">

        <div class="box box-primary">
                <!-- form start -->
            <form role="form" action="{{ route('types.update', $types->id) }}" method="post">
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
					  <label for="t_name">Event Type Name</label>
					  <input type="text" class="form-control" id="t_name" placeholder="Type Name" name="t_name" value="{{ $types->t_name }}">
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
</div>

  <!-- /.row -->
</section>

@stop
