<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColour;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index method
    public function index(Request $request){
        $product = Product::where('status','1')->paginate(10);
        $category = Category::where('status','1')->get();
        if($request->sort == 'newest'){
            $product = Product::where('status', '1')
            ->orderBy('created_at','desc')
            ->paginate(20);
        }elseif($request->sort == 'popular'){
            $product = Product::where('status', '1')
            ->where('featured_product','1')
            ->paginate(20);
        }else{
            $product = Product::where('status', '1')->paginate(20);
        }
        return view('frontend.pages.index',compact('product','category'));
    }

    // About method
    public function about(){
        return view('frontend.pages.about');
    }

    // shop method
    public function shop(Request $request) {
        $product = Product::where('status', '1')->paginate(20);
        $category = Category::where('status', '1')->get();
        $brand = Brand::where('status', '1')->get();
        if($request->sort == 'price_asc'){
            $product = Product::where('status', '1')
            ->orderBy('price','asc')
            ->paginate(20);
        }elseif($request->sort == 'price_desc'){
            $product = Product::where('status', '1')
            ->orderBy('price','desc')
            ->paginate(20);
        }elseif($request->sort == 'newest'){
            $product = Product::where('status', '1')
            ->orderBy('created_at','desc')
            ->paginate(20);
        }elseif($request->sort == 'popular'){
            $product = Product::where('status', '1')
            ->where('featured_product','1')
            ->paginate(20);
        }elseif($request->category){
            $product = Product::where('category', $request->category)->paginate(15)->withQueryString();
        }elseif($request->brand){
            $product = Product::where('brand', $request->brand)->paginate(15)->withQueryString();
        }
        else{
            $product = Product::where('status', '1')->paginate(20);
        }
    
        return view('frontend.pages.shop', compact('product', 'category','brand'));
    }
    

    // product details method
    public function product_details( $id){
        $product = Product::findOrfail($id);
        $relatedproduct = Product::where('category', $product->category)
        ->where('id', '!=', $id)
        ->paginate(15)
        ->withQueryString();
        $images = ProductImage::where('product_id',$id)->get();
        $colour = ProductColour::where('status','1')->get();
        $size = ProductSize::all();
        $selectedColors = explode(', ', $product->color);
        $selectedSize = explode(', ', $product->size);
        return view('frontend.pages.product_details',compact('product','colour','size','selectedColors','selectedSize','images','relatedproduct'));
    }

}
