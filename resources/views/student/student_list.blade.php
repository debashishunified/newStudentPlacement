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
            <h1 class="m-0 text-dark">Student List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6"> 
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
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
          @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </p>
          @endif
          	<table class="table table-striped table-bordered text-center dataTable">
			  <thead class="bg-dark">
			    <tr>
			      <th>#</th>
			      <th>Student Name</th>
			      <th>Department Name</th>
            <th>College Name</th>
            <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $count=1; ?>
			  	@forelse($studentList as $value)
			    <tr>
			      <td>{{ $count++ }}</td>
			      <td>{{ $value['name'] }}</td>
            <td>{{ $value['department']['name'] }}</td>
            <td>{{ $value['college']['name'] }}</td>
            <th>
              <a class="text-primary" data-toggle="tooltip" data-placement="top" title="Add Student Placement" href="{{ url('add-student-placement/'.$value['id']) }}">
                <i class="fa fa-plus"></i>
              </a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a class="text-warning" href="{{ url('student-placement-details/'.$value['id']) }}">
                <i data-toggle="tooltip" data-placement="top" title="Student Placement Details" class="fa fa-info-circle"></i>
              </a>
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