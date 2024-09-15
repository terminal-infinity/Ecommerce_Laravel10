@extends('admin.admin_dashboard')

@section('content')
<style>
    label{
        font-weight: bold;
        font-size: medium;
        margin: 1%;
    }
</style>
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Add Product</h4>
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
                <a style="color: aliceblue;" href="{{route('admin.view_product')}}">Back</a>
            </button>
        </div>
    </div>
    <div class="container-fluid">
        <form action="{{route('admin.upload_product')}}" method="post" enctype="multipart/form-data">
            @csrf 
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-3">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title <span style="color: red">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="slug">Slug <span style="color: red">*</span></label>
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" required>	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label> Short Description</label>
                                    <input type="text" name="short_desc" id="short_desc" class="form-control" placeholder="Short Description" required>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                </div>
                            </div>  
                        </div>
                    </div>                                                                 
                </div>

                <div class="card mb-3">
                    <div class="card-body">								
                        <div class="row">
                            <h2 class="h4  mb-3">Product Details</h2>
                            <div class="col-md-12 p-4 bg-gray-200">
                                <div class="mb-3">
                                    <label for="category">Category <span style="color: red">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option>Select Category</option>
                                        @foreach ($category as $categories)
                                        @if($categories != '')
                                        <option value="{{ $categories->name }}">{{ $categories->name }}</option>
                                     @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="subcategory">Sub category <span style="color: red">*</span></label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option>Select SubCategory</option>
                                        @foreach ($subcategory as $subcategories)
                                        @if($subcategories != '')
                                        <option value="{{ $subcategories->name }}">{{ $subcategories->name }}</option>
                                         @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label >Product status</label>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 p-4 bg-gray-100">
                                <div class="mb-3">
                                    <label for="image">Images <span style="color: red">*</span></label>
                                    <input type="file" class="form-control" name="image" required>	
                                </div>
                                <div class="mb-3">
                                    <label for="material">Material</label>
                                    <input type="text" class="form-control" name="material" >	
                                </div>
                                <label >Product Colours</label>
                                <div class="mb-3">
                                    @foreach ($colour as $colours)
                                    @if($colours != '')
                                    <label style="font-weight: normal;" for="colour">
                                        <input type="checkbox" name="color[]" value="{{ $colours->colour }}">{{ $colours->colour }}
                                    </label>
                                    @endif
                                    @endforeach
                                </div>
                                <label >Product Size</label>
                                <div class="mb-3">
                                    @foreach ($size as $sizes)
                                    @if($sizes != '')
                                    <label style="font-weight: normal;" for="colour">
                                        <input type="checkbox" name="size[]" value="{{ $sizes->size }}">{{ $sizes->size }}
                                    </label>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="col-md-12 p-4 bg-gray-200">
                                <label>Product brand <span style="color: red">*</span></label>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option>Select Brand</option>
                                        @foreach ($brand as $brands)
                                        @if($brands != '')
                                            <option value="{{ $brands->name }}">{{ $brands->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label>Featured product</label>
                                <div class="mb-3">
                                    <select name="featured_product" id="featured_product" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>                                                
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 p-4 bg-gray-100">
                                
                                <div class="mb-3">
                                    <label for="price">Price <span style="color: red">*</span></label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                </div>
                                <div class="mb-3">
                                    <label for="compare_price">Compare at Price</label>
                                    <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                    <p class="text-muted mt-3">
                                        To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-12 p-4 bg-gray-200">
                                <h2 class="h4 mb-3">Inventory</h2>								
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                    </div>
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                    </div>  
                                    <div class="mb-3">
                                        <label >Track Quantity</label>
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
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
            </div>
        </div>
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Upload Product</button>
        </div>
        </form>
    </div>
</div>
@endsection