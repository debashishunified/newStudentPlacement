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
            <h1 class="m-0 text-dark">Add College Placement</h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('college-placement') }}">College</a></li>
              <li class="breadcrumb-item active">Add College Placement</li>
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
          <form method="post" action="{{ url('save-college-placement-data') }}">
            {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6">
                  <label for="placement_date">College Name</label>
                  <input type="date" class="form-control" name="placement_date" id="placement_date" placeholder="Select placement date">
                  @if($errors->has('placement_date'))
                  <p class="error">{{ $errors->first('placement_date') }}</p>
                  @endif
              </div>
              <div class="col-md-6">
                  <label for="company_id">Company Name</label>
                  <select id="company_id" name="company_id" class="form-control">
                    <option value="">-----Select Company------</option>
                    @forelse($companyList as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>

                    @empty
                    <option value="">No Data Found</option>

                    @endforelse
                  </select>
                  @if($errors->has('company_id'))
                  <p class="error">{{ $errors->first('company_id') }}</p>
                  @endif
              </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
                  <label for="company_id">Place</label>
                  <input type="text" class="form-control" name="place" id="place" placeholder="Enter place">
                  @if($errors->has('place'))
                  <p class="error">{{ $errors->first('place') }}</p>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
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