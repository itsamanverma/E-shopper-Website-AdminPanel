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
        // Get featured products (increased limit for homepage)
        $products = Product::orderby('id', 'DESC')->limit(12)->get();
        
        // Get categories with their products for Hot Deals
        $hotDealsCategories = Category::with(['products' => function($query) {
                $query->orderby('id', 'DESC')->limit(4);
            }])
            ->where(['parent_id' => 0])
            ->where('status', 1)
            ->get();
            
        // Get all categories for the slider/menu
        $categories = Category::with('categories')
            ->withCount('products')
            ->where(['parent_id' => 0])
            ->get();
        
        return view('index')->with(compact('products', 'categories', 'hotDealsCategories'));
    }
}
