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
            <h1 class="m-0 text-dark">Add Student Placement</h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('student-placement') }}">Student</a></li>
              <li class="breadcrumb-item active">Add Student Placement</li>
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
          <form method="post" action="{{ url('save-student-placement-data') }}">
            {{ csrf_field() }}
            <input type="hidden" name="student_id" value="{{ $studentId ? $studentId : '' }}">
          <div class="row">
              <div class="col-md-6">
                  <label for="college_placement_id">Placement Date</label>
                  <select class="form-control change_placement_date" id="college_placement_idd" name="placement_date">
                    <option value="">Select Placement Date</option>
                    @forelse($collegePlacement as $value)
                    <option>{{ $value['placement_date']  }}</option>

                    @empty
                    <option value="">No Data Found</option>

                    @endforelse
                  </select>
                  @if($errors->has('placement_date'))
                  <p class="error">{{ $errors->first('placement_date') }}</p>
                  @endif
              </div>
              <div class="col-md-6">
                  <label for="college_placement_id">Company Name</label>
                  <select id="college_placement_id" name="college_placement_id" class="form-control college_placement_company">
                    
                  </select>
                  @if($errors->has('college_placement_id'))
                  <p class="error">{{ $errors->first('college_placement_id') }}</p>
                  @endif
              </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <label for="college_placement_id">Placement Selecton</label>
                  <select name="is_selected" id="is_selected" class="form-control">
                    <option value="">-----Select------</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  @if($errors->has('is_selected'))
                  <p class="error">{{ $errors->first('is_selected') }}</p>
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