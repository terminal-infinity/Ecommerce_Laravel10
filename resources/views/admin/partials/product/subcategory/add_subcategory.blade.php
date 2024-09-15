@extends('admin.admin_dashboard')

@section('content')
<style>
    label{
        font-weight: bold
    }
</style>
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Product Sub Category</h4>
            </div>
         <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Download Report
            </button>
            <button button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <a style="color: aliceblue;" href="{{route('admin.view_subcategory')}}">Back</a>
            </button>
        </div>
    </div>
    <div class="container-fluid">
        <form action="{{route('admin.upload_subcategory')}}" method="post" id="categoryForm" name="categoryForm" enctype="multipart/form-data">
            @csrf
        <div class="card mb-4">
            <div class="card-body">	
                <div class="col-sm-6 mb-4">
                    <h4>Create Sub Category</h4>
                </div>							
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Name <span style="color: red">*</span> </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug">Slug <span style="color: red">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" required>	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
							<select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category">Category</label>
							<select name="category_name" id="category_name" class="form-control">
                                <option>Select Category</option>
                                @foreach ($category as $categories)
                                @if($categories != '')
                                    <option value="{{ $categories->name }}">{{ $categories->name }}</option>
                                @endif
                                @endforeach
                                
                            </select>
                        </div>
                    </div>									
                </div>
            </div>						
        </div>

        <div class="card">
            <div class="card-body">	
                <div class="col-sm-6 mb-4">
                    <h4>For SEO</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Meta Title <span style="color: red">*</span></label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Name" required>	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug">Meta Keyword</label>
                            <input type="text" name="meta_key" id="meta_key" class="form-control" placeholder="Slug" >	
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="slug">Meta Desccription</label>
                            <textarea name="meta_desc" id="meta_desc" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>	
                        </div>
                    </div>									
                </div>
            </div>						
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Upload Sub Category</button>
        </div>
        </form>
    </div>
</div>


@endsection