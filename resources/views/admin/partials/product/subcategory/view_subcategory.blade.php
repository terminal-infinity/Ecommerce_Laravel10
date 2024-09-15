@extends('admin.admin_dashboard')

@section('content')
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
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                 <a style="color: aliceblue;" href="{{route('admin.add_subcategory')}}">Add Sub Category</a>
             </button>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">All Sub Categories</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="100" scope="col">Name</th>
                            <th width="100" scope="col">Slug</th>
                            <th width="100" scope="col">Category</th>
                            <th width="100" scope="col">Meta Title</th>
                            <th width="100" scope="col">Status</th>
                            <th width="100" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $subcategories)
                        @if ($subcategories != "")
                        <tr>
                            <td>{{ $subcategories->name }}</td>
                            <td>{{ $subcategories->slug }}</td>
                            <td>{{ $subcategories->category_name }}</td>
                            <td>{{ $subcategories->meta_title }}</td>
                            <td>
                                @if ( $subcategories->status != 0 )
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{route('admin.edit_subcategory',$subcategories->id)}}"><span class="badge bg-success">Edit</span></a>
                                <a href="{{route('admin.delete_subcategory',$subcategories->id)}}"><span class="badge bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="your-paginate mt-4">
        {{ $subcategory->links() }}
    </div>
</div>
@endsection