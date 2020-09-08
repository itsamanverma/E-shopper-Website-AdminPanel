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
        /* $categories = json_decode(json_encode($categories));
        echo "<pre>"; print_r($categories); die; */
        $categories_menu="";
        foreach ($categories as $cat) {
            # code...
            $categories_menu .= "<div class='panel-heading'>
                                    <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
                                            <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                                            ".$cat->name."
                                        </a>
                                    </h4>
                                </div>
                                <div id='".$cat->id."' class='panel-collapse collapse'>
                                    <div class='panel-body'>
                                        <ul>";
                                        $sub_categories = Category::where(['parent_id' => $cat->id])->get();
                                            foreach ($sub_categories as $subcat) {
                                                $categories_menu .= "<li><a href='".$subcat->url."'>".$subcat->name." </a></li>";
                                            }
                                            $categories_menu .= "</ul>
                                    </div>
                                </div>";
        }
        //die;
        return view('index')->with(compact('productAll', 'categories_menu'));
    }
}
