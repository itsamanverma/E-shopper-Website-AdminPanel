<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class HeadphoneProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Wireless Earbuds
            [
                'category_id' => 2, // Electronics
                'product_name' => 'Premium Wireless Earbuds',
                'product_code' => 'HP-001',
                'product_color' => 'White',
                'description' => 'True wireless earbuds with active noise cancellation, premium sound quality, and up to 24 hours of battery life with charging case. Perfect for music lovers and commuters.',
                'care' => 'Keep away from water. Clean with soft dry cloth. Store in charging case when not in use.',
                'price' => 149.99,
                'image' => 'wireless_earbuds.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // AirPods Max Style
            [
                'category_id' => 2,
                'product_name' => 'Premium Over-Ear Headphones',
                'product_code' => 'HP-002',
                'product_color' => 'Rose Gold',
                'description' => 'Luxury over-ear headphones with spatial audio, adaptive EQ, and premium materials. Exceptional sound quality with active noise cancellation and transparency mode.',
                'care' => 'Store in protective case. Clean ear cushions regularly. Avoid extreme temperatures.',
                'price' => 549.99,
                'image' => 'airpods_max.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Black Professional Headphones
            [
                'category_id' => 2,
                'product_name' => 'Studio Monitor Headphones',
                'product_code' => 'HP-003',
                'product_color' => 'Black',
                'description' => 'Professional-grade studio headphones with accurate sound reproduction, comfortable design, and durable build. Perfect for music production and critical listening.',
                'care' => 'Handle cable with care. Clean with microfiber cloth. Store flat when not in use.',
                'price' => 299.99,
                'image' => 'black_headphones.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Red Headphones
            [
                'category_id' => 2,
                'product_name' => 'Wireless Bluetooth Headphones',
                'product_code' => 'HP-004',
                'product_color' => 'Red',
                'description' => 'Stylish wireless headphones with powerful bass, long battery life, and comfortable fit. Features Bluetooth 5.0 and built-in microphone for calls.',
                'care' => 'Charge regularly. Avoid moisture. Clean ear pads monthly.',
                'price' => 199.99,
                'image' => 'red_headphones.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Bose Style Headphones
            [
                'category_id' => 2,
                'product_name' => 'Noise Cancelling Headphones Pro',
                'product_code' => 'HP-005',
                'product_color' => 'Silver',
                'description' => 'Premium noise-cancelling headphones with world-class audio quality, 30-hour battery life, and comfortable over-ear design. Perfect for travel and work.',
                'care' => 'Store in carrying case. Keep charging port clean. Update firmware regularly.',
                'price' => 379.99,
                'image' => 'bose_headphones.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Kids Headphones
            [
                'category_id' => 2,
                'product_name' => 'Kids Safe Volume Headphones',
                'product_code' => 'HP-006',
                'product_color' => 'Blue',
                'description' => 'Child-safe headphones with volume limiting technology to protect young ears. Durable, comfortable, and designed specifically for kids aged 3-12.',
                'care' => 'Wipe clean with damp cloth. Check volume limit regularly. Supervise young children.',
                'price' => 49.99,
                'image' => 'blue_kids_headphones.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Gaming Headset
            [
                'category_id' => 2,
                'product_name' => 'RGB Gaming Headset Pro',
                'product_code' => 'HP-007',
                'product_color' => 'Black/Green',
                'description' => 'Professional gaming headset with 7.1 surround sound, RGB lighting, noise-cancelling microphone, and comfortable memory foam ear cushions. Perfect for competitive gaming.',
                'care' => 'Clean microphone regularly. Manage cables properly. Update drivers for best performance.',
                'price' => 129.99,
                'image' => 'gaming_headset.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Sport Earbuds
            [
                'category_id' => 2,
                'product_name' => 'Sport Wireless Earbuds',
                'product_code' => 'HP-008',
                'product_color' => 'Black',
                'description' => 'Waterproof sport earbuds with secure ear hooks, sweat resistance, and powerful bass. Perfect for workouts, running, and active lifestyles. IPX7 rated.',
                'care' => 'Rinse after sweaty workouts. Dry completely before charging. Store in protective case.',
                'price' => 89.99,
                'image' => 'sport_earbuds.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($products);
    }
}
