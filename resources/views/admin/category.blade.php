	@extends('admin/master')

	@section('content')

 
@if(session()->has('message')) 
		<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
			<span class="badge badge-pill badge-success">Successfully</span>
				{{session('message')}} 
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">×</span>
				</button>
		 </div>
		 @endif
	<div class="row">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1">Category List</h2>
				<a href="{{url('admin/category/manage_category')}}">
					<button class="au-btn au-btn-icon au-btn--blue">
						<i class="zmdi zmdi-plus"></i>Add Category</button>
					</a>
				</div>
			</div>
		</div>
		<div class="row m-t-30">
			<div class="col-md-12">
				<!-- DATA TABLE-->
				<div class="table-responsive m-b-40">
					<table class="table table-borderless table-data3">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category Name</th>
								<th>Category Slug</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						  @foreach($cat_list as $key =>  $list)
								<tr>
									<td>{{++$key}}</td>
									<td>{{$list->category_name}}</td>
									<td>{{$list->category_slug}}</td>
									<td>
										<a 
										href="{{url('admin/category/manage_category/')}}/{{$list->id}}">
                                        <button type="button" class="btn btn-warning">Edit</button> 
										</a>

										<!-- @if($list->status==1)
										<a href="{{url('admin/category/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
										@elseif($list->status==0)
										<a href="{{url('admin/category/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
										@endif -->

										<a href="{{url('admin/category/delete/')}}/{{$list->id}}">
											<button type="button" class="btn btn-danger">Delete</button>
										</a>
									</td>
								</tr>
								@endforeach 
							</tbody>
						</table>
					</div>
					<!-- END DATA TABLE-->
				</div>
			</div>
			@endsection