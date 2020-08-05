<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $request){
        if ($request->isMethod('post')) {
            # code...
            $data = $request->all();
            echo "<pre>"; print_r($data); die;
        }
        return view('admin.categories.add_category');
    }
}
