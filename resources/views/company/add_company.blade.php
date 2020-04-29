@section('title') {{ $title ? $title : '' }}  @endsection

@extends('layouts.admin')
@section('mainContent')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Company</h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('company') }}">Company</a></li>
              <li class="breadcrumb-item active">Add Company</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </p>
          
          @endif

        <div class="container jumbotron">
          <form method="post" action="{{ url('save-company-data') }}">
            {{ csrf_field() }}
          <div class="row">
              <div class="col-md-8">
                  <label for="name">Company Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter company name">
                  @if($errors->has('name'))
                  <p class="error">{{ $errors->first('name') }}</p>
                  @endif
              </div>
              <div class="col-md-4">
                  <button type="submit" class="btn btn-primary company_add_submit">Submit</button>
              </div>
          </div>
        </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection