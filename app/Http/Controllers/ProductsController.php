<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductsAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use PhpParser\JsonDecoder;

class ProductsController extends Controller
{

    /**
     * addProduct a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        //
        if ($request->isMethod('post')) {
            # code...
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(empty($data['category_id'])){
    			return redirect()->back()->with('flash_message_error','Under Category is missing!');	
    		}
            $product = new Product();
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if(!empty($data['description'])){
    			$product->description = $data['description'];
    		}else{
				$product->description = '';    			
            }            
            $product->price = $data['price'];

            /* Upload Image */
            if ($request->hasFile('image')) {
                # code...
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename  = rand(111,99999).'.'.$extension; 
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    # Resize image code...
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    
                    /* Store image name in Products table */
                    $product->image = $filename;

                }
            }
            $product->save();
            return redirect('/admin/view-products')->with('flash_message_success', 'Product has been added Successfully!');
        }
        // Category drop-down start 
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach( $sub_categories as $sub_cat) {
    			$categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";            }
        }
        // category drop-down end
        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    /**
     * editProduct functinality 
     * 
     * @param \Illuminate\Http\Request  $request, $id 
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Request $request, $id = null)
    {
        # code...
        if ($request->isMethod('post')) {
            # code...
            $data = $request->all();
            // echo '<pre>'; print_r($data); die;

            /* Upload Image */
            if ($request->hasFile('image')) {
                # code...
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename  = rand(111,99999).'.'.$extension; 
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    # Resize image code...
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }else{
                $filename = $data['current_image'];
            }

            if(empty($data['description'])){
                $data['description'] = '';
            }

            Product::where(['id' => $id])->update(
                [
                    'category_id' => $data['category_id'],
                    'product_name' => $data['product_name'],
                    'product_code' => $data['product_code'],
                    'product_color' => $data['product_color'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'image' => $filename ,
                ]
            );
            // return redirect()->back()->with('flash_message_success','Product has been updated Successfully!');
            return redirect('/admin/view-products')->with('flash_message_success','Product has been updated Successfully!');
        }
        $productDetails = Product::where(['id' => $id])->first();
        // category drop-down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if ($cat->id == $productDetails->category_id) {
                # code...
                $selected = "selected";
            }else{
                $selected= "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach( $sub_categories as $sub_cat) {
                if ($sub_cat->id == $productDetails->category_id) {
                    # code...
                    $selected = "selected";
                }else{
                    $selected= "";
                }
    			$categories_dropdown .= "<option value = '".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";            }
        }
        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }
    /**
     * viewProduct a newly created resource in storage.
     *
     * @param  \void
     * @return \Illuminate\Http\Response
     */
    public function viewProduct()
    {
        # code...
        $products = Product::get();
        $products = json_decode(json_encode($products));
        foreach($products as $key => $val){
            $category_name = Category::where(['id' => $val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        // echo "<pre>"; print_r($products); die;
        return view('admin.products.view_products')->with(compact('products'));
    }

    /**
     * delete function
     * 
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct( $id = null)
    {
        # code...
        Product::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }
    /**
     * deleteProduct Image 
     * 
     * @param $id 
     * @return \Illuminate\Http\JsonResponse 
     */
    public function deleteProductImage($id = null)
    {
        # code...
        Product::where(['id' => $id])->update(['image' => '']);
        return redirect()->back()->with('flash_message_success', 'Product Image has been deleted successfully!');
    }

    /**
     * create the add-attributes functionality
     * 
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttributes(Request $request,$id = null)
    {
        # code...
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();
        // $productDetails = json_decode(json_encode($productDetails));
        // echo '<pre>'; print_r($productDetails); die();
        if ($request->isMethod('post')) {
            # code...
            $data = $request->all();
            // echo '<pre>'; print_r($data); die();
            foreach ($data['sku'] as $key => $val) {
                # code...
                if (!empty($val)) {
                    # code...
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save(); 
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes had been added successfully!');
        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }
}
