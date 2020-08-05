<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $request){
        if ($request->isMethod('post')) {
            # code...
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $category = new Category;
    		$category->name = $data['category_name'];
            // $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category added Successfully!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }


    public function viewCategories() {
        return view('admin.categories.view_categories');
    }
}
