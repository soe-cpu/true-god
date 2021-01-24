@extends('backendtemplate')

@section('content')


<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Blog</h1>
		<a href="{{route('blogs.create')}}" class="btn btn-sm btn-success shadow-sm"><i
			class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
		</div>

		<!-- Content Row -->
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Blog Table</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Title</th>
										<th>Action</th>							
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Title</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
									@php
									$i=1;
									@endphp
									@foreach($blog as $row)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$row->title}}</td>
										<td>
											<div class="row">
												{{-- <div class="col-md-12">
													<a href="{{route('blogs.show',$row->id)}}" class="btn btn-primary btn-sm">ကြည့်ရန်</a>
												</div> --}}
												<div class="col-md-12 py-3">
													<a href="{{route('blogs.show',$row->id)}}" class="btn btn-secondary btn-sm shadow-sm"><i class="far fa-eye"></i> View</a>
													<a href="{{route('blogs.edit',$row->id)}}" class="btn btn-warning btn-sm shadow-sm"><i class="far fa-edit"></i> Edit</a>
													<form method="post" action="{{route('blogs.destroy',$row->id)}}" onsubmit="return confirm('!Are you sure Delete..')" class="d-inline-block">
														@csrf
														@method('DELETE')
														<input type="submit" name="btnsubmit" class="btn btn-danger btn-sm shadow-sm" value="Delete">
													</form> 

												</div>
											</div>
											
											
											                 
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection