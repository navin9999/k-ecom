@extends('admin/master')

	@section('content')


<div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Manage Category</h2>
                <a href="{{url('admin/category_list')}}">
                    <button class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-arrow-back "></i>Back</button>
                    </a>
                </div>
            </div>
        </div>

    <div class="row m-t-30">
        <div class="col-md-12">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin/category/manage_category_process')}}" 
                            method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_name" class="control-label mb-1">Category Name</label>
                                            <input id="category_name" value="" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="category_name" class="control-label mb-1">Parent  Category</label>
                                            <select id="parent_category_id" name="parent_category_id" class="form-control" required>
                                            <option value="0">Select Categories</option>
                                           
                                        </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                            <input id="category_slug" value=" " name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('category_slug')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Image</label>
                                    <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                    @error('category_image')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror

                                   
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Show in Home Page</label>
                                    <input id="is_home" name="is_home" type="checkbox" >
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{}}"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>




	@endsection