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
            <a href="{{route('sp_dashboard')}}">
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
      <h1 style="display: inline-block;">Service Provider Lists</h1>
    </div>
    <div class="col-md-6">
      <div class="add-new">
        <a href="{{ route('sprovider.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New Service Provider</a>
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
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <!-- <th>User Name</th> -->
                        <th>E-Mail</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($sproviders as $sprovider)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $sprovider->name }}</td>
                        <td>{{ $sprovider->email }}</td>

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

</section>
@endsection
