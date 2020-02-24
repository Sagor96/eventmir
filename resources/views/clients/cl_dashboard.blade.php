@extends('master')

@section('title','ClientArea')

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
            <a href="{{route('cl_dashboard')}}">
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
            <a href="{{route('cl_logout')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Logout</p>
            </a>
          </li>
          </ul>
      </div>
@stop
@section('content')

<section class="content-header">
  <h1 style="display: inline-block;">Dashboard</h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{  $total_clients }}</h3>

              <p>Total Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('clients.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->


        <!-- ./col -->
        <!-- ./col -->
        <!-- ./col -->


        <!-- ./col -->
        <!-- ./col -->


      </div>
<!-- /.row -->
</section>
@stop
