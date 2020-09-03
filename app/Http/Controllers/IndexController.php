<?php

namespace App\Http\Controllers;

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
        return view('index');
    }
}
