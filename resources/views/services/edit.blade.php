@extends('layouts')

@section('title','ServiceUpdate')

@section('content')

<section class="content-header">
  <div class="row">
      <div class="col-md-6">
        <h1 style="display: inline-block;">Edit Service</h1>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a href="{{ route('services.index')}}" class="btn btn-success"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;Service List</a>
        </div>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">

        <div class="box box-primary">
                <!-- form start -->
            <form role="form" action="{{ route('services.update', $services->id) }}" method="post">
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
					  <label for="s_name">Service Name</label>
					  <input type="text" class="form-control" id="s_name" placeholder="Service Name" name="s_name" value="{{ $services->s_name }}">
					</div>
					<div class="form-group">
					  <label for="s_amount">Amounts(Tk)</label>
					  <input type="text" class="form-control" id="s_amount" placeholder="Amounts" name="s_amount" value="{{ $services->s_amount }}">
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
