<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index method
    public function index(){
        $product = Product::where('status','1')->paginate(10);
        $category = Category::where('status','1')->get();
        return view('frontend.pages.index',compact('product','category'));
    }

    // About method
    public function about(){
        return view('frontend.pages.about');
    }

    // index method
    public function shop(){
        $product = Product::where('status','1')->paginate(10);
        $category = Category::where('status','1')->get();
        return view('frontend.pages.shop',compact('product','category'));
    }

}
