<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Electronics - Smartphones
            [
                'category_id' => 2,
                'product_name' => 'iPhone 15 Pro Max',
                'product_code' => 'ELEC-001',
                'product_color' => 'Space Black',
                'description' => 'The most advanced iPhone ever with A17 Pro chip, titanium design, and Action Button. Features a 48MP main camera with 5x telephoto zoom.',
                'care' => 'Keep away from water. Use original charger. Avoid extreme temperatures.',
                'price' => 1199.99,
                'image' => 'iphone15promax.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Samsung Galaxy S24 Ultra',
                'product_code' => 'ELEC-002',
                'product_color' => 'Titanium Gray',
                'description' => 'Premium Android smartphone with S Pen, 200MP camera, and Galaxy AI features. Perfect for productivity and creativity.',
                'care' => 'Use screen protector. Charge with original adapter. Keep S Pen secured.',
                'price' => 1299.99,
                'image' => 'galaxys24ultra.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Google Pixel 8 Pro',
                'product_code' => 'ELEC-003',
                'product_color' => 'Obsidian',
                'description' => 'AI-powered smartphone with Magic Eraser, Best Take, and pure Android experience. Excellent camera performance.',
                'care' => 'Clean with soft cloth. Avoid dropping. Use genuine accessories.',
                'price' => 999.99,
                'image' => 'pixel8pro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Electronics - Laptops
            [
                'category_id' => 3,
                'product_name' => 'MacBook Pro 16-inch M3',
                'product_code' => 'ELEC-004',
                'product_color' => 'Space Gray',
                'description' => 'Professional laptop with M3 chip, Liquid Retina XDR display, and up to 22 hours of battery life. Perfect for creators.',
                'care' => 'Clean screen gently. Avoid food and drinks nearby. Use laptop sleeve.',
                'price' => 2499.99,
                'image' => 'macbookpro16.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'product_name' => 'Dell XPS 13 Plus',
                'product_code' => 'ELEC-005',
                'product_color' => 'Platinum Silver',
                'description' => 'Ultra-thin laptop with 13.4-inch OLED display, Intel Core i7, and premium build quality. Ideal for professionals.',
                'care' => 'Keep vents clear. Regular software updates. Handle with care.',
                'price' => 1799.99,
                'image' => 'dellxps13.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Fashion - Men's Clothing
            [
                'category_id' => 5,
                'product_name' => 'Classic Denim Jacket',
                'product_code' => 'FASH-001',
                'product_color' => 'Dark Blue',
                'description' => 'Timeless denim jacket made from premium cotton. Perfect for casual and semi-formal occasions.',
                'care' => 'Machine wash cold. Tumble dry low. Iron on medium heat.',
                'price' => 89.99,
                'image' => 'denim_jacket.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'product_name' => 'Wool Blend Sweater',
                'product_code' => 'FASH-002',
                'product_color' => 'Charcoal',
                'description' => 'Cozy wool blend sweater with modern fit. Soft, warm, and perfect for winter styling.',
                'care' => 'Hand wash or dry clean. Lay flat to dry. Store folded.',
                'price' => 129.99,
                'image' => 'wool_sweater.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Fashion - Women's Clothing
            [
                'category_id' => 6,
                'product_name' => 'Floral Summer Dress',
                'product_code' => 'FASH-003',
                'product_color' => 'Pink',
                'description' => 'Light and airy summer dress with beautiful floral pattern. Made from breathable cotton blend.',
                'care' => 'Machine wash gentle cycle. Hang to dry. Iron on low heat.',
                'price' => 79.99,
                'image' => 'floral_dress.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'product_name' => 'Elegant Blazer',
                'product_code' => 'FASH-004',
                'product_color' => 'Navy Blue',
                'description' => 'Professional blazer perfect for office wear. Tailored fit with premium fabric and classic styling.',
                'care' => 'Dry clean only. Hang immediately after wear. Professional pressing recommended.',
                'price' => 199.99,
                'image' => 'elegant_blazer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Home & Garden - Furniture
            [
                'category_id' => 8,
                'product_name' => 'Modern Dining Table',
                'product_code' => 'HOME-001',
                'product_color' => 'Walnut',
                'description' => 'Solid wood dining table with modern design. Seats 6 people comfortably. Perfect for family dining.',
                'care' => 'Dust regularly. Use coasters. Avoid direct sunlight. Polish monthly.',
                'price' => 899.99,
                'image' => 'dining_table.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'product_name' => 'Ergonomic Office Chair',
                'product_code' => 'HOME-002',
                'product_color' => 'Black',
                'description' => 'High-back office chair with lumbar support and adjustable height. Breathable mesh design.',
                'care' => 'Clean with mild soap. Adjust settings properly. Check wheels regularly.',
                'price' => 299.99,
                'image' => 'office_chair.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Sports & Outdoors
            [
                'category_id' => 9,
                'product_name' => 'Professional Tennis Racket',
                'product_code' => 'SPORT-001',
                'product_color' => 'Blue/White',
                'description' => 'High-performance tennis racket with carbon fiber frame. Perfect control and power for serious players.',
                'care' => 'Keep strings tight. Store in case. Avoid extreme temperatures.',
                'price' => 249.99,
                'image' => 'tennis_racket.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 9,
                'product_name' => 'Hiking Backpack 40L',
                'product_code' => 'SPORT-002',
                'product_color' => 'Forest Green',
                'description' => 'Durable hiking backpack with multiple compartments and hydration system compatibility. Perfect for day hikes.',
                'care' => 'Clean with mild detergent. Air dry completely. Check zippers regularly.',
                'price' => 159.99,
                'image' => 'hiking_backpack.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Books
            [
                'category_id' => 10,
                'product_name' => 'The Art of Programming',
                'product_code' => 'BOOK-001',
                'product_color' => 'Multi',
                'description' => 'Comprehensive guide to modern programming concepts and best practices. Essential for developers.',
                'care' => 'Keep dry. Avoid bending pages. Store upright. Handle with clean hands.',
                'price' => 49.99,
                'image' => 'programming_book.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 10,
                'product_name' => 'Digital Marketing Mastery',
                'product_code' => 'BOOK-002',
                'product_color' => 'Multi',
                'description' => 'Complete guide to digital marketing strategies, SEO, social media, and online advertising.',
                'care' => 'Keep away from moisture. Use bookmarks. Store properly.',
                'price' => 39.99,
                'image' => 'marketing_book.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($products);
    }
}