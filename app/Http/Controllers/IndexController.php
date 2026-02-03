<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    /**
     * create the index function 
     * 
     * @param void
     * @return \Illuminate\Http\JsonResponse;
     */
    public function index(){
        // Get featured products (limited to 8 for homepage)
        $products = Product::orderby('id', 'DESC')->limit(8)->get();
        
        // Get all categories & sub Categories with product counts
        $categories = Category::with('categories')
            ->withCount('products')
            ->where(['parent_id' => 0])
            ->get();
        
        return view('index')->with(compact('products', 'categories'));
    }
}
