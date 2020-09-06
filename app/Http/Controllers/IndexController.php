<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        # code...
        /* In Ascending order (by defualt) */
        $productAll = Product::get();
        /* In Descending order (by defualt) */
        $productAll = Product::orderby('id', 'DESC')->get();

        /* In Random order */
        $productAll = Product::inRandomOrder()->get();

        /* GEt the all categories & sub Categories */
        $categories = Category::where(['parent_id' => 0])->get();
        $categories = json_decode(json_encode($categories));
        echo "<pre>"; print_r($categories); die;  

        return view('index')->with(compact('productAll'));
    }
}
