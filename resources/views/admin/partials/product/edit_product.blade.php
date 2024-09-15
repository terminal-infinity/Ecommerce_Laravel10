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
        <form action="{{route('admin.update_product', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf 
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-3">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $product->title }}">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label> Short Description</label>
                                    <input type="text" name="short_desc" id="short_desc" class="form-control" placeholder="Short Description" value="{{ $product->short_desc }}">
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" value="{{ $product->description }}">{{ $product->description }}</textarea>
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
                                    <label for="category">Category </label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="{{ $product->category }}">{{ $product->category }}</option>
                                        @foreach ($category as $categories)
                                        @if($categories != '')
                                        <option value="{{ $categories->name }}">{{ $categories->name }}</option>
                                     @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="subcategory">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="{{ $product->sub_category }}">{{ $product->sub_category }}</option>
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
                                        <option value="{{$product->status}}">
                                            @if ( $product->status != '0' )
                                                <p>Active</p>
                                            @else
                                                <p>Inactive</p>
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 p-4 bg-gray-100">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="mb-3" for="image">Current Image</label> <br>
                                        <img src="/productimage/{{$product->image}}"  width="250" height="150" >	
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">New Image</label>
                                        <input type="file" name="image" id="image" class="form-control" >	
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="material">Material</label>
                                    <input type="text" class="form-control" name="material" value="{{ $product->material }}">	
                                </div>
                                <label >Product Colours</label>
                                <div class="mb-3">
                                    @foreach ($colour as $colours)
                                    @if($colours != '')
                                        <label style="font-weight: normal;" for="colour">
                                            <input type="checkbox" name="color[]" value="{{ $colours->colour }}" 
                                            @if(in_array($colours->colour, $selectedColors)) checked @endif>
                                            {{ $colours->colour }}
                                        </label>
                                    @endif
                                    @endforeach
                                </div>
                                <label >Product Size</label>
                                <div class="mb-3">
                                    @foreach ($size as $sizes)
                                    @if($sizes != '')
                                    <label style="font-weight: normal;" for="colour">
                                        <input type="checkbox" name="size[]" value="{{ $sizes->size }}">
                                        @if(in_array($sizes->size, $selectedSize)) checked @endif
                                        {{ $sizes->size }}
                                    </label>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="col-md-12 p-4 bg-gray-200">
                                <label>Product brand</label>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="{{ $product->brand }}">{{ $product->brand }}</option>
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
                                        <option value="{{ $product->featured_product }}">
                                            @if ( $product->featured_product != '0' )
                                               <p>Yes</p> 
                                            @else 
                                                <p>No</p>
                                            @endif
                                        </option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>                                                
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 p-4 bg-gray-100">
                                
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
                                </div>
                                <div class="mb-3">
                                    <label for="compare_price">Compare at Price</label>
                                    <input type="text" name="compare_price" id="compare_price" class="form-control" value="{{ $product->compare_price }}">
                                    <p class="text-muted mt-3">
                                        To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-12 p-4 bg-gray-200">
                                <h2 class="h4 mb-3">Inventory</h2>								
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" value="{{ $product->sku }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" value="{{ $product->barcode }}">	
                                    </div>  
                                    <div class="mb-3">
                                        <label >Track Quantity</label>
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" value="{{ $product->qty }}">
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
                                    <label for="name">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Name" value="{{ $product->meta_title }}">	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Meta Keyword</label>
                                    <input type="text" name="meta_key" id="meta_key" class="form-control" value="{{ $product->meta_key }}" >	
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="slug">Meta Desccription</label>
                                    <textarea name="meta_desc" id="meta_desc" cols="30" rows="10" class="summernote" value="{{ $product->meta_desc }}">{{ $product->meta_desc }}</textarea>	
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