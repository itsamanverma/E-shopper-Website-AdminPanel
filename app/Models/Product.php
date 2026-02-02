<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id','product_name','product_code','product_color', 'description','care', 'price', 'image' 
    ];

    public function attributes()
    {
        return $this->hasMany(ProductsAttribute::class, 'product_id');
    }
}
