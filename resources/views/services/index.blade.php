@extends('master')

@section('title','ServiceList')

@section('content')
<section class="content-header">
  <div class="row'">
    <div class="col-md-6">
      <h1 style="display: inline-block;">Services Lists</h1>
    </div>
    <div class="col-md-6">
      <div class="add-new">
        <a href="{{ route('services.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add New Service</a>
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
                        <th>Service Name</th>
                        <th>Amounts (Tk)</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $service->s_name }}</td>
                        <td class="text-right">{{$service->s_amount}}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('services.edit', $service->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('services.destroy', $service->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger float-left">Delete</button>
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
</section>
@endsection
