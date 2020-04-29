@section('title')
{{ $title ? $title : '' }}
@endsection

@extends('layouts.admin')
@section('mainContent')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Placement Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6"> 
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('student') }}">Student List</a></li>
              <li class="breadcrumb-item active">Student Placement Details</li>
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
			      <th>Placement Date</th>
			      <th>Company Name</th>
            <th>Place</th>
            <th>Selected</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $count=1; ?>
			  	@forelse($studentList[0]['student_placements'] as $value)
			    <tr>
			      <td>{{ $count++ }}</td>
			      <td>{{ $value['college_placement']['placement_date'] }}</td>
            <td>{{ $value['college_placement']['companies']['name'] }}</td>
            <td>{{ $value['college_placement']['place'] }}</td>
            <th>
              {{ $value['is_selected'] == '0' ? 'No' : 'Yes' }}
            </th>
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