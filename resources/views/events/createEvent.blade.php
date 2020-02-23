@extends('layouts')

@section('title','NewEvent')

@section('content')

<div class="w-75 p-3" style="background-color: #8B4513;">
<div class="card">
  <div class="card-header">
    <h1 style="display: inline-block;">New Event</h1>
  </div>
  <div class="card-body">
    <form role="form" action="{{route('events.store')}}" method="post">
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
				<label for="e_name">Event Name</label>
				<input type="text" class="form-control" id="e_name" placeholder="" name="e_name" value="{{ old('e_name') }}">
			</div>

			<div class="form-group">
				<label for="t_name">Event Type</label>
				<select name="type_id" class="form-control">
						<!-- <option selected="selected" > -->
					    @foreach($types as $type)
					    <option value="{{ $type->id }}">{{ $type->t_name }}</option>
					    @endforeach
				</select>
				<!--  <input type="text" class="form-control" id="type_id" placeholder="Type name" name="t_name" value="{{ old('t_name') }}">-->
			</div>

			<div class="form-group">
				<label for="v_name">Event Venue</label>
				<select name="venue_id" class="form-control">
						<!-- <option selected="selected" > -->
					    @foreach($venues as $venue)
					    <option value="{{ $venue->id }}">{{ $venue->v_name }}</option>
					    @endforeach
				</select>
				<!--  <input type="text" class="form-control" id="type_id" placeholder="Type name" name="t_name" value="{{ old('t_name') }}">-->
			</div>

			<div class="form-group">
				<label for="e_date">Event Date</label>
				<input type="date" class="form-control" id="e_date" placeholder="Event Date" name="e_date" value="{{ old('e_date') }}">
			</div>
		</div>
        <!-- /.box-body -->

        <div class="box-footer">

          <button type="submit" class="btn btn-success" style="background-color: #8B4513;">Save</button>

        </div>
    </form>
  </div>
 </div>
</div>
@stop
