<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GeminiImageService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key', env('GEMINI_API_KEY'));
        $this->apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';
    }

    /**
     * Generate image description using Gemini AI
     */
    public function generateImageDescription(string $productName, string $category, string $description): string
    {
        try {
            $prompt = "Create a detailed, professional product image description for an e-commerce website. 
                      Product: {$productName}
                      Category: {$category}
                      Description: {$description}
                      
                      Generate a brief, SEO-friendly image description that would be suitable for alt text and product photography.";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Product image';
            }

            return 'Product image for ' . $productName;
        } catch (\Exception $e) {
            Log::error('Gemini API Error: ' . $e->getMessage());
            return 'Product image for ' . $productName;
        }
    }

    /**
     * Generate placeholder image with product info
     */
    public function generatePlaceholderImage(string $productName, string $category): string
    {
        $width = 400;
        $height = 400;
        
        // Create a simple placeholder image
        $image = imagecreate($width, $height);
        
        // Define colors based on category
        $colorSchemes = [
            'Electronics' => ['bg' => [70, 130, 180], 'text' => [255, 255, 255]],
            'Fashion' => ['bg' => [255, 182, 193], 'text' => [139, 0, 139]],
            'Home & Garden' => ['bg' => [144, 238, 144], 'text' => [34, 139, 34]],
            'Sports & Outdoors' => ['bg' => [255, 140, 0], 'text' => [255, 255, 255]],
            'Books' => ['bg' => [245, 245, 220], 'text' => [139, 69, 19]],
            'default' => ['bg' => [230, 230, 250], 'text' => [75, 0, 130]]
        ];
        
        $scheme = $colorSchemes[$category] ?? $colorSchemes['default'];
        
        // Create colors
        $bgColor = imagecolorallocate($image, $scheme['bg'][0], $scheme['bg'][1], $scheme['bg'][2]);
        $textColor = imagecolorallocate($image, $scheme['text'][0], $scheme['text'][1], $scheme['text'][2]);
        
        // Fill background
        imagefill($image, 0, 0, $bgColor);
        
        // Add product name (simplified)
        $shortName = strlen($productName) > 20 ? substr($productName, 0, 17) . '...' : $productName;
        
        // Add text (if GD extension has font support)
        if (function_exists('imagestring')) {
            imagestring($image, 3, ($width - strlen($shortName) * 10) / 2, $height / 2 - 20, $shortName, $textColor);
            imagestring($image, 2, ($width - strlen($category) * 8) / 2, $height / 2 + 10, $category, $textColor);
        }
        
        // Generate filename
        $filename = 'placeholder_' . md5($productName . $category) . '.png';
        $path = storage_path('app/public/images/products/' . $filename);
        
        // Ensure directory exists
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        
        // Save image
        imagepng($image, $path);
        imagedestroy($image);
        
        return $filename;
    }

    /**
     * Get or generate product image
     */
    public function getProductImage(string $productName, string $category, ?string $existingImage = null): string
    {
        if ($existingImage && Storage::disk('public')->exists('images/products/' . $existingImage)) {
            return $existingImage;
        }

        return $this->generatePlaceholderImage($productName, $category);
    }
}