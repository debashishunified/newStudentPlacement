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
            <h1 class="m-0 text-dark">Company Wise Placement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Company Wise Placement</li>
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
			      <th>Company Name</th>
            <th>Placement Details</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  $count=1; ?>
			  	@forelse($getcompanyList as $value)
			    <tr>
			      <td>{{ $count++ }}</td>
			      <td>{{ $value->name }}</td>
            <td>
              <a data-toggle="tooltip" data-placement="top" title="Placement Details" href="{{ url('company-wise-all-placement/'.$value['id']) }}" class="text-warning"><i class="fa fa-info-circle"></i>
              </a>
            </td>
			    </tr>
			    @empty
			    <tr>
            <td colspan="3">No Data Found</td>
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