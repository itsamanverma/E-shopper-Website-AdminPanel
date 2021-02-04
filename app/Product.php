<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','product_name','product_code','product_color', 'description','care', 'price', 'image' 
    ];

    public function attributes()
    {
        # code...
        return $this->hasMany('App\ProductsAttribute', 'product_id');
    }
}
