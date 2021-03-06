@extends('master')

@section('title','EventList')
@section('sidebar')
      <div class="logo">
        <a href="/" class="simple-text logo-mini">
          EM
        </a>
        <a href="/" class="simple-text logo-normal">
          EventMir
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="#">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          </ul>
      </div>
@stop
@section('content')
<section class="content-header">
  <div class="row'">
    <div class="col-md-6">
      <h1 style="display: inline-block;">Event Lists</h1>
    </div>
    <div class="col-md-6">
      <div class="add-new">
        <a href="{{ route('events.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New Event</a>
      </div>
    </div>
  </div>
</section>
   <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xl-12">


    <div class="box">
            <!-- /.box-header -->
            <div class="delete-msg" style="width: 100%; display: block; overflow: hidden;">
              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">

            <div class="box-body">
              <div class="card" style="strong">
                <table id="example1" class="table table-dark table-striped">
                  <thead class="text-info">
                    <tr>
                        <th>SL</th>
                        <th>Event Name</th>
                        <th>Event Type</th>
                        <th>Event Venue</th>
                        <th>Event Date</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $event->e_name }}</td>
                        <td>{{ $event->type->t_name  }}</td>
                        <td>{{ $event->venue->v_name }}</td>
                        <td>{{ $event->e_date }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('events.edit', $event->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('events.destroy', $event->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" id="del" class="btn btn-danger">Delete</button>
                          </form>
                        </span>

                      </div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!---DELETE--->
  <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success alert-danger">
                {{ session()->get('success') }}
              </div>
            @endif
          </div>

</section>
@endsection
