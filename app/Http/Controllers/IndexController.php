<?php

namespace App\Http\Controllers;

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
        $productAll = Product::orderby('id', 'DESC')->get();
        return view('index')->with(compact('productAll'));
    }
}
