<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(){
        return view('home.home');
    }


    public function shop(){
        $category = Category::where('parent_id' ,0)->get();
        $product = Product::latest()->simplePaginate(1);
        return view('home.shop', compact('category','product'));
    }

    public function viewCategory($slug){
        $categories = Category::where('parent_id' ,0)->get();
        $category = Category::where('slug' ,$slug)->first();
        $products = Product::where('category_id' , $category->id)->get();
        return view('home.productByCategory', compact('category','products','categories'));
    }

}
