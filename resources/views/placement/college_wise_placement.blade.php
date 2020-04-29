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
            <h1 class="m-0 text-dark">College Wise Placement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">College Wise Placement</li>
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
          	<table class="table table-striped table-bordered text-center dataTable">
			  <thead class="bg-dark">
			    <tr>
			      <th>#</th>
			      <th>College Name</th>
			      <th>Total Student</th>
            <th>Total Stu. Seat In Placement</th>
            <th>Student Details</th>
            <th>Student Placement Details</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $count=1; ?>
			  	@forelse($getCollegePlacementList as $value)
			    <tr>
			      <td>{{ $count++ }}</td>
			      <td>{{ $value['name'] }}</td>
            <td>{{ count($value['student']) }}</td>
            <td>{{ count($value['student_placements']) }}</td>
            <td>
              <a title="View Student Details" href="javascript::void()" id="selected_student_id" data_id="{{ $value['id'] }}" data-toggle="modal" data-target="#selectedStudent"><i class="fa fa-eye"></i></a>
            </td>
            <td>
              <a data-toggle="tooltip" data-placement="top" title="Placement Details" href="{{ url('student_all_placem_details/'.$value['id']) }}" class="text-warning" id="student_placeme_details">
                <i class="fa fa-info-circle"></i>
              </a>
            </td>
			    </tr>
			    @empty
			    <tr>
            <td colspan="6">No Data Found</td>
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

<!-- Modal -->
<div class="modal fade" id="selectedStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table text-center table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Student Name</th>
              <th>College Name</th>
              <th>Department Name</th>
            </tr>
          </thead>
          <tbody id="selected_student_name">

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>