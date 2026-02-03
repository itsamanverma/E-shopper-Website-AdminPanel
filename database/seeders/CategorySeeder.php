<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'parent_id' => 0,
                'description' => 'Latest electronic devices and gadgets',
                'url' => 'electronics',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphones',
                'parent_id' => 1,
                'description' => 'Latest smartphones and mobile devices',
                'url' => 'smartphones',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptops',
                'parent_id' => 1,
                'description' => 'High-performance laptops and computers',
                'url' => 'laptops',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion',
                'parent_id' => 0,
                'description' => 'Trendy clothing and accessories',
                'url' => 'fashion',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Men\'s Clothing',
                'parent_id' => 4,
                'description' => 'Stylish clothing for men',
                'url' => 'mens-clothing',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Clothing',
                'parent_id' => 4,
                'description' => 'Fashionable clothing for women',
                'url' => 'womens-clothing',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home & Garden',
                'parent_id' => 0,
                'description' => 'Home decor and garden essentials',
                'url' => 'home-garden',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Furniture',
                'parent_id' => 7,
                'description' => 'Modern furniture for your home',
                'url' => 'furniture',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports & Outdoors',
                'parent_id' => 0,
                'description' => 'Sports equipment and outdoor gear',
                'url' => 'sports-outdoors',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Books',
                'parent_id' => 0,
                'description' => 'Educational and entertaining books',
                'url' => 'books',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);
    }
}