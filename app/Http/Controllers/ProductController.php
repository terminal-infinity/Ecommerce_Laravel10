<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColour;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    //Category
    public function view_category(){
        $category=Category::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.category.view_category',compact('category'));
    }

    public function add_category(){
        return view('admin.partials.product.category.add_category');
    }

    public function upload_category(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:categories',
            'image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data=new Category();
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;

        if($request->file('image')){
            $takeimage =$request->file('image');
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$takeimage->getClientOriginalExtension();
            $img = $manager->read($takeimage);
            $img->resize(620, 392);
            $img->toJpeg(80)->save(public_path('categoryimage/'.$name_gen));

            $data->image = $name_gen;
        }
        
        $data->save();

        return redirect()->route('admin.view_category')->with('message', 'Category Added Successfully');

    }

    public function edit_category($id){
        $category=Category::findOrfail($id);
        return view('admin.partials.product.category.edit_category',compact('category'));
    }

    public function update_category(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:categories',
            'image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data=Category::findOrfail($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;

        if($request->file('image')){
            $takeimage =$request->file('image');
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$takeimage->getClientOriginalExtension();
            $img = $manager->read($takeimage);
            $img->resize(620, 392);
            $img->toJpeg(80)->save(public_path('categoryimage/'.$name_gen));

            $data->image = $name_gen;
        }
        
        $data->save();

        return redirect()->route('admin.view_category')->with('message', 'Category Update Successfully');

    }

    public function delete_category($id){
        $data=Category::findOrFail($id);

        
        $image_path=public_path('categoryimage/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }



    //SubCategory
    public function view_subcategory(){
        $subcategory=SubCategory::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.subcategory.view_subcategory',compact('subcategory'));
    }

    public function add_subcategory(){
        $category = Category::all();
        return view('admin.partials.product.subcategory.add_subcategory',compact('category'));
    }

    public function upload_subcategory(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:categories',
        ]);

        $data=new SubCategory();
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->category_name = $request->category_name;
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;
        
        $data->save();

        return redirect()->route('admin.view_subcategory')->with('message', 'SubCategory Added Successfully');

    }

    public function edit_subcategory($id){
        $subcategory=SubCategory::findOrfail($id);
        $category = Category::all();
        return view('admin.partials.product.subcategory.edit_subcategory',compact('subcategory','category'));
    }

    public function update_subcategory(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:subcategories',
        ]);

        $data=SubCategory::findOrfail($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->category_name = $request->category_name;
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;
        
        $data->save();

        return redirect()->route('admin.view_subcategory')->with('message', 'SubCategory Update Successfully');

    }

    public function delete_subcategory($id){
        $data=SubCategory::findOrFail($id);

        $data->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }

    //Brand
    public function view_brand(){
        $brand=Brand::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.brand.view_brand',compact('brand'));
    }

    public function add_brand(){
        return view('admin.partials.product.brand.add_brand');
    }

    public function upload_brand(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:brand',
        ]);

        $data=new Brand;
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;
        
        $data->save();

        $notification = array(
            'message' => 'Brand Upload Successfully',
            'info' => 'success'
        );

        return redirect()->route('admin.view_brand')->with($notification);

    }

    public function edit_brand($id){
        $brand=Brand::findOrfail($id);
        return view('admin.partials.product.brand.edit_brand',compact('brand'));
    }

    public function update_brand(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required | unique:brand',
        ]);

        $data=Brand::findOrfail($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->slug);
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;
        
        $data->save();

        $notification = array(
            'message' => 'Brand Update Successfully',
            'info' => 'success'
        );

        return redirect()->route('admin.view_brand')->with($notification);

    }

    public function delete_brand($id){
        $data=Brand::findOrFail($id);

        $data->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }

    //Colour
    public function view_colour(){
        $colour=ProductColour::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.colour.view_colour',compact('colour'));
    }

    public function add_colour(){
        return view('admin.partials.product.colour.add_colour');
    }

    public function upload_colour(Request $request){
        $data=new ProductColour();
        $data->colour = $request->colour;
        $data->code = $request->code;
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;
        
        $data->save();

        $notification = array(
            'message' => 'Brand Upload Successfully',
            'info' => 'success'
        );

        return redirect()->route('admin.view_colour')->with($notification);

    }
    public function edit_colour($id){
        $colour=ProductColour::findOrfail($id);
        return view('admin.partials.product.colour.edit_colour',compact('colour'));
    }

    public function update_colour(Request $request,$id){
        $data=ProductColour::findOrfail($id);
        $data->colour = $request->colour;
        $data->code = $request->code;
        $data->status = $request->status;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;
        
        $data->save();

        $notification = array(
            'message' => 'Colour Update Successfully',
            'info' => 'success'
        );

        return redirect()->route('admin.view_colour')->with($notification);

    }

    public function delete_colour($id){
        $data=ProductColour::findOrFail($id);

        $data->delete();

        $notification = array(
            'message' => 'Colour Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }


    //Size
    public function view_size(){
        $size=ProductSize::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.size.view_size',compact('size'));
    }

    public function upload_size(Request $request){
        $data=new ProductSize;
        $data->size = $request->size;
        
        $data->save();

        $notification = array(
            'message' => 'Size Upload Successfully',
            'info' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function delete_size($id){
        $data=ProductSize::findOrFail($id);

        $data->delete();

        $notification = array(
            'message' => 'Size Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }
    

    //product
    public function view_product(){
        $product = Product::orderBy('created_at','DESC')->paginate(10);
        return view('admin.partials.product.view_product',compact('product'));
    }

    public function add_product(){
        $category = Category::where('status','1')->get();
        $subcategory = SubCategory::where('status','1')->get();
        $brand = Brand::where('status','1')->get();
        $colour = ProductColour::where('status','1')->get();
        $size = ProductSize::all();
        return view('admin.partials.product.add_product',compact('category','subcategory','brand','colour','size'));
    }

    public function upload_product(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'slug' => 'required | unique:product',
            'color' => 'required|array',
            'color.*' => 'string',
            'size' => 'required|array',
            'size.*' => 'string',
            'banner_image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data=new Product;
        $data->title = $request->title;
        $data->slug = Str::slug($request->slug);
        $data->short_desc = $request->short_desc;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->compare_price = $request->compare_price;
        $data->sku = $request->sku;
        $data->barcode = $request->barcode;
        $data->qty = $request->qty;
        $data->status = $request->status;
        $data->category = $request->category;
        $data->sub_category = $request->sub_category;
        $data->brand = $request->brand;
        $data->material = $request->material;
        $data->color = implode(', ', $request->color);
        $data->size = implode(', ', $request->size);
        $data->featured_product = $request->featured_product;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;

        if($request->file('image')){
            $takeimage =$request->file('image');
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$takeimage->getClientOriginalExtension();
            $img = $manager->read($takeimage);
            $img->resize(600, 750);
            $img->toJpeg(80)->save(public_path('productimage/'.$name_gen));

            $data->image = $name_gen;
        }

        $data->save();

        $notification = array(
            'message' => 'Product Upload Successfully',
            'info' => 'success'
        );

        return redirect()->route('admin.view_product')->with( $notification );

    }

    public function edit_product($id){
        $product=Product::findOrfail($id);
        $category = Category::where('status','1')->get();
        $subcategory = SubCategory::where('status','1')->get();
        $brand = Brand::where('status','1')->get();
        $colour = ProductColour::where('status','1')->get();
        $size = ProductSize::all();
        $selectedColors = explode(', ', $product->color);
        $selectedSize = explode(', ', $product->size);
        return view('admin.partials.product.edit_product',compact('product','category','subcategory','brand','colour','size','selectedColors','selectedSize'));
    }

    public function update_product(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'slug' => 'required | unique:product',
            'color' => 'required|array',
            'color.*' => 'string',
            'size' => 'required|array',
            'size.*' => 'string',
            'banner_image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data=Product::findOrfail($id);
        $data->title = $request->title;
        $data->slug = Str::slug($request->slug);
        $data->short_desc = $request->short_desc;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->compare_price = $request->compare_price;
        $data->sku = $request->sku;
        $data->barcode = $request->barcode;
        $data->qty = $request->qty;
        $data->status = $request->status;
        $data->category = $request->category;
        $data->sub_category = $request->sub_category;
        $data->brand = $request->brand;
        $data->material = $request->material;
        $data->color = implode(', ', $request->color);
        $data->size = implode(', ', $request->size);
        $data->featured_product = $request->featured_product;
        $data->meta_title = $request->meta_title;
        $data->meta_key = $request->meta_key;
        $data->meta_desc = $request->meta_desc;

        if($request->file('image')){
            $takeimage =$request->file('image');
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$takeimage->getClientOriginalExtension();
            $img = $manager->read($takeimage);
            $img->resize(600, 750);
            $img->toJpeg(80)->save(public_path('productimage/'.$name_gen));

            $data->image = $name_gen;
        }
        
        $data->save();

        return redirect()->route('admin.view_product')->with('message', 'Product Update Successfully');

    }

    public function delete_product($id){
        $data=Product::findOrFail($id);

        
        $image_path=public_path('productimage/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }

    public function productimages(int $productId){
        $product=Product::findOrfail($productId);
        $images = ProductImage::where('product_id',$productId)->get();
        return view('admin.partials.product.productimages',compact('product','images'));
    }

    public function upload_productimages(Request $request, $productId){
        $validator = Validator::make($request->all(),[
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);
        
        $product = Product::findOrfail($productId);
        $imageData = [];
        if($files = $request->file('image')){
            foreach($files as $file){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $img = $manager->read($file);
            $img->resize(600, 750);
            $img->toJpeg(80)->save(public_path('productimage/'.$name_gen));

            $save_url = $name_gen;
            $imageData[] = [
                'image' => $save_url,
                'product_id' => $product->id,
            ];
            }
        }
        ProductImage::insert($imageData);

        return redirect()->back()->with('message', 'Images Added Successfully');

    }

    public function delete_productimages($id){
        $data=ProductImage::findOrFail($id);

        
        $image_path=public_path('productimage/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()-> back()->with($notification);
    }
}
