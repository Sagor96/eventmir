@extends('layouts')

@section('title','Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
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
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

@endsection
