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
            <h1 class="m-0 text-dark">Department Wise Placement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Department Wise Placement</li>
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
			      <th>Department Name</th>
			      <th>Total Student</th>
            <th>Total Stu. Seat in Place.</th>
            <th>Student Placement Details</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $count=1; ?>
			  	@forelse($getDepartmentList as $value)
			    <tr>
			      <td>{{ $count++ }}</td>
			      <td>{{ $value['name'] }}</td>
            <td>{{ count($value['students']) }}</td>
            <td>{{ count($value['student_placements']) }}</td>
            <td>
              <a data-toggle="tooltip" data-placement="top" title="Placement Details" href="{{ url('depart-wise-all-placement/'.$value['id']) }}" class="text-warning"><i class="fa fa-info-circle"></i>
              </a>
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