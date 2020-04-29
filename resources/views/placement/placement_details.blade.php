@section('title') {{ $title ? $title : '' }} @endsection

@extends('layouts.admin')
@section('mainContent')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Placement Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('student-placement') }}">Student Placement</a></li>
              <li class="breadcrumb-item active">Placement Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="container">
            <table class="table table-striped table-bordered text-center">
        <thead class="bg-dark">
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>College Name</th>
            <th>Department Name</th>
            <th>Selected</th>
          </tr>
        </thead>
        <tbody>
          <?php  $count=1; ?>
          @forelse($getStudentPlacementList as $value)
          <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $value['student']['name'] }}</td>
            <td>{{ $value['student']['college']['name'] }}</td>
            <td>{{ $value['student']['department']['name'] }}</td>
            <td>
              <select class="form-control change_placement_delected" data_id="{{ $value['id'] }}">
                <option value="1" <?php if($value['is_selected'] == '1'){ echo "selected"; }else{ echo ""; } ?> >Yes</option>
                <option value="0" <?php if($value['is_selected'] == '0'){ echo "selected"; }else{ echo ""; } ?> >No</option>
              </select>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5">No Data Found</td>
          </tr>

          
          @endforelse
        </tbody>
      </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection