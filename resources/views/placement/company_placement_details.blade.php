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
            <h1 class="m-0 text-dark">Student Placement For {{ $companyName ? $companyName : '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('company-wise-placement') }}">Company Wise Placement</a></li>
              <li class="breadcrumb-item active">Company Wise Placement Details</li>
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
			      <th>Student Name</th>
            <th>College Name</th>
            <th>Department Name</th>
            <th>Selected</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $count=1; ?>
			  	@forelse($getCompanyDetailsList[0]['college_placements'] as $value)
			    <tr>
			      <td>{{ $count++ }}</td>
			      <td>{{ $value['student']['name'] }}</td>
            <td>{{ $value['student']['college']['name'] }}</td>
            <td>{{ $value['student']['department']['name'] }}</td>
            <td>{{ $value['is_selected'] == '0' ? 'No' : 'Yes' }}</td>
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