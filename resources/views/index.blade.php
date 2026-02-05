@extends('layouts.frontLayout.front_design')
@section('content')
    <style>
        :root {
            --primary-black: #000000;
            --text-dark: #2d2d2d;
            --text-gray: #6b7280;
            --border-light: #e5e5e5;
            --bg-light: #f9fafb;
            --sale-red: #ff0000;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica', 'Arial', sans-serif;
            color: var(--text-dark);
            background: var(--white);
        }

        /* Enhanced Hero Slider Section */
        .hero-slider {
            position: relative;
            height: 700px;
            overflow: hidden;
            background: #fff;
            margin-bottom: 60px;
        }

        .slider-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
        }

        .slide.active {
            opacity: 1;
            visibility: visible;
        }

        .slide-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 60px;
            perspective: 1000px;
        }

        .slide-text {
            flex: 1;
            max-width: 600px;
            z-index: 2;
        }

        .slide-label {
            font-size: 14px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #ff0000;
            margin-bottom: 20px;
            font-weight: 700;
            transform: translateY(30px);
            opacity: 0;
            transition: all 0.6s ease 0.2s;
        }

        .slide.active .slide-label {
            transform: translateY(0);
            opacity: 1;
        }

        .slide-title {
            font-size: 5rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 35px;
            color: var(--primary-black);
            transform: translateY(40px);
            opacity: 0;
            transition: all 0.7s ease 0.4s;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.05);
        }

        .slide.active .slide-title {
            transform: translateY(0);
            opacity: 1;
        }

        .slide-btn {
            display: inline-flex;
            align-items: center;
            background: var(--primary-black);
            color: var(--white);
            padding: 18px 45px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid var(--primary-black);
            transform: translateY(50px);
            opacity: 0;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .slide.active .slide-btn {
            transform: translateY(0);
            opacity: 1;
            transition-delay: 0.6s;
        }

        .slide-btn:hover {
            background: transparent;
            color: var(--primary-black);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            text-decoration: none;
        }

        .slide-image {
            flex: 1;
            text-align: right;
            transform: scale(0.8) rotateY(-20deg);
            opacity: 0;
            transition: all 1s cubic-bezier(0.4, 0, 0.2, 1) 0.5s;
        }

        .slide.active .slide-image {
            transform: scale(1) rotateY(0);
            opacity: 1;
        }

        .slide-image img {
            max-width: 100%;
            height: auto;
            max-height: 550px;
            object-fit: contain;
            filter: drop-shadow(20px 20px 50px rgba(0,0,0,0.1));
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .slider-controls {
            position: absolute;
            bottom: 40px;
            left: 60px;
            display: flex;
            align-items: center;
            gap: 30px;
            z-index: 10;
        }

        .slider-dots {
            display: flex;
            gap: 12px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .dot.active {
            background: #ff0000;
            transform: scale(1.3);
            border-color: rgba(255, 0, 0, 0.2);
        }

        .slider-number {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #000;
        }

        .slider-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background: #ff0000;
            width: 0;
            z-index: 11;
        }

        /* Responsive Fixes */
        @media (max-width: 1200px) {
            .slide-title { font-size: 4rem; }
        }
        @media (max-width: 991px) {
            .hero-slider { height: 600px; }
            .slide-content { flex-direction: column; text-align: center; justify-content: center; padding: 0 30px; }
            .slide-image { text-align: center; margin-top: 40px; }
            .slide-image img { max-height: 350px; }
            .slide-title { font-size: 3rem; }
            .slider-controls { left: 50%; transform: translateX(-50%); }
        }

        /* Category Carousel Section */
        .category-carousel-section {
            margin-bottom: 60px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-black);
        }

        .category-carousel {
            position: relative;
            overflow: hidden;
            padding: 0 50px;
        }

        .category-track {
            display: flex;
            gap: 30px;
            transition: transform 0.3s ease;
        }

        .category-item {
            flex: 0 0 auto;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .category-item:hover {
            transform: translateY(-5px);
        }

        .category-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            overflow: hidden;
            border: 2px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .category-item:hover .category-circle {
            border-color: var(--primary-black);
        }

        .category-circle img {
            width: 80%;
            height: 80%;
            object-fit: contain;
        }

        .category-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: var(--white);
            border: 1px solid var(--border-light);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .carousel-arrow:hover {
            background: var(--primary-black);
            color: var(--white);
            border-color: var(--primary-black);
        }

        .carousel-arrow.left {
            left: 10px;
        }

        .carousel-arrow.right {
            right: 10px;
        }

        /* Hot Deals Section */
        .hot-deals-section {
            margin-bottom: 60px;
        }

        .hot-deals-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 30px;
        }

        .sale-banner {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px 30px;
            border-radius: 8px;
            text-align: center;
        }

        .sale-banner h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .sale-banner p {
            font-size: 2rem;
            font-weight: 700;
            color: var(--sale-red);
            margin-bottom: 20px;
        }

        .sale-banner a {
            display: inline-block;
            padding: 10px 25px;
            background: var(--primary-black);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .sale-banner a:hover {
            background: var(--text-dark);
            text-decoration: none;
        }

        .hot-deals-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        /* Product Card */
        .product-card {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .product-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--sale-red);
            color: var(--white);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            z-index: 5;
        }

        .product-badge.new {
            background: var(--primary-black);
        }

        .product-image-wrapper {
            position: relative;
            height: 300px;
            background: var(--bg-light);
            overflow: hidden;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image-wrapper img {
            transform: scale(1.05);
        }

        .product-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            display: flex;
            gap: 10px;
        }

        .product-card:hover .product-actions {
            transform: translateY(0);
        }

        .action-btn {
            flex: 1;
            padding: 10px;
            background: var(--primary-black);
            color: var(--white);
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        .action-btn:hover {
            background: var(--text-dark);
            color: var(--white);
            text-decoration: none;
        }

        .action-btn.secondary {
            background: var(--white);
            color: var(--primary-black);
            border: 1px solid var(--primary-black);
        }

        .action-btn.secondary:hover {
            background: var(--primary-black);
            color: var(--white);
        }

        .product-info {
            padding: 20px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-dark);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .stars {
            color: #fbbf24;
            font-size: 14px;
        }

        .rating-count {
            font-size: 12px;
            color: var(--text-gray);
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-black);
        }

        .product-price.sale {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .original-price {
            font-size: 1rem;
            color: var(--text-gray);
            text-decoration: line-through;
            font-weight: 400;
        }

        /* Promotional Banners */
        .promo-banners {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .promo-banner {
            position: relative;
            height: 400px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .promo-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .promo-banner:hover img {
            transform: scale(1.05);
        }

        .promo-content {
            position: absolute;
            bottom: 40px;
            left: 40px;
            right: 40px;
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 8px;
        }

        .promo-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-black);
        }

        .promo-price-badge {
            display: inline-block;
            background: var(--sale-red);
            color: var(--white);
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .promo-btn {
            display: inline-block;
            padding: 12px 30px;
            background: var(--primary-black);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .promo-btn:hover {
            background: var(--text-dark);
            text-decoration: none;
            color: var(--white);
        }

        /* Featured Products Section */
        .featured-section {
            margin-bottom: 60px;
        }

        .featured-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .load-more-btn {
            display: block;
            margin: 40px auto 0;
            padding: 15px 50px;
            background: var(--white);
            color: var(--primary-black);
            border: 2px solid var(--primary-black);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .load-more-btn:hover {
            background: var(--primary-black);
            color: var(--white);
        }

        /* Wishlist Icon */
        .wishlist-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 36px;
            height: 36px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 5;
            transition: all 0.3s ease;
        }

        .wishlist-icon:hover {
            background: var(--sale-red);
            color: var(--white);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hot-deals-container {
                grid-template-columns: 1fr;
            }

            .hot-deals-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .promo-banners {
                grid-template-columns: 1fr;
            }

            .slide-title {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .hot-deals-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .slide-content {
                flex-direction: column;
                text-align: center;
            }

            .slide-title {
                font-size: 2.5rem;
            }

            .hero-slider {
                height: auto;
                min-height: 500px;
            }
        }

        @media (max-width: 480px) {
            .hot-deals-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Hero Slider -->
    <section class="hero-slider">
        <div class="slider-container">
            <div class="slide active">
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="slide-label">NEW ARRIVALS</div>
                        <h1 class="slide-title">Next Gen Smartphones</h1>
                        <a href="#featured" class="slide-btn">Shop Now</a>
                    </div>
                    <div class="slide-image">
                        <img src="{{ asset('images/backend_images/products/large/iphone15promax.jpg') }}" alt="iPhone 15 Pro Max" 
                             onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="slide-label">WORK FROM ANYWHERE</div>
                        <h1 class="slide-title">Pro Performance Laptops</h1>
                        <a href="#featured" class="slide-btn">Shop Now</a>
                    </div>
                    <div class="slide-image">
                        <img src="{{ asset('images/backend_images/products/large/macbookpro16.jpg') }}" alt="MacBook Pro" 
                             onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="slide-label">PREMIUM AUDIO</div>
                        <h1 class="slide-title">Ultimate Sound Experience</h1>
                        <a href="#featured" class="slide-btn">Shop Now</a>
                    </div>
                    <div class="slide-image">
                        <img src="{{ asset('images/backend_images/products/large/airpods_max.png') }}" alt="Premium Headphones" 
                             onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-controls">
            <div class="slider-number"><span id="currentSliderNum">01</span> / 03</div>
            <div class="slider-dots">
                <div class="dot active" data-slide="0"></div>
                <div class="dot" data-slide="1"></div>
                <div class="dot" data-slide="2"></div>
            </div>
        </div>
        <div class="slider-progress" id="sliderProgress"></div>
    </section>

    <div class="container">
        <!-- Category Carousel -->
        <section class="category-carousel-section">
            <div class="section-header">
                <h2 class="section-title">You Might Like</h2>
            </div>
            <div class="category-carousel">
                <div class="carousel-arrow left">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div class="category-track" id="categoryTrack">
                    @foreach($categories as $category)
                        <div class="category-item">
                            <div class="category-circle">
                                @if($category->image)
                                    <img src="{{ asset('images/backend_images/categories/small/'.$category->image) }}" alt="{{ $category->name }}">
                                @elseif(strtolower($category->name) == 'electronics' || strtolower($category->name) == 'headphone')
                                    <img src="{{ asset('images/frontend_images/products/headphone3.png') }}" alt="{{ $category->name }}">
                                @elseif(strtolower($category->name) == 'fashion' || strtolower($category->name) == 'clothing')
                                    🎽
                                @elseif(strtolower($category->name) == 'shoes' || strtolower($category->name) == 'footwear')
                                    👟
                                @elseif(strtolower($category->name) == 'accessories')
                                    👜
                                @else
                                    📦
                                @endif
                            </div>
                            <div class="category-name">{{ $category->name }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="carousel-arrow right">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </section>

        <!-- Hot Deals Section -->
        <section class="hot-deals-section" id="hot-deals">
            <div class="section-header">
                <h2 class="section-title">Hot Deals</h2>
                <div class="category-tabs">
                    <button class="tab-btn active" data-category="all">All Deals</button>
                    @foreach($hotDealsCategories as $category)
                        <button class="tab-btn" data-category="cat-{{ $category->id }}">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
            
            <div class="hot-deals-container-modern">
                <div class="tab-content active" id="all">
                    <div class="hot-deals-grid">
                        @foreach($products->take(8) as $index => $product)
                            @include('layouts.frontLayout.product_card', ['product' => $product, 'index' => $index])
                        @endforeach
                    </div>
                </div>

                @foreach($hotDealsCategories as $category)
                    <div class="tab-content" id="cat-{{ $category->id }}">
                        <div class="hot-deals-grid">
                            @foreach($category->products as $index => $product)
                                @include('layouts.frontLayout.product_card', ['product' => $product, 'index' => $index])
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <style>
            .category-tabs {
                display: flex;
                justify-content: center;
                gap: 15px;
                margin-top: 20px;
                flex-wrap: wrap;
            }

            .tab-btn {
                background: transparent;
                border: 1px solid var(--border-light);
                padding: 8px 25px;
                border-radius: 25px;
                font-weight: 600;
                font-size: 14px;
                cursor: pointer;
                transition: all 0.3s ease;
                color: var(--text-gray);
            }

            .tab-btn.active, .tab-btn:hover {
                background: var(--primary-black);
                color: var(--white);
                border-color: var(--primary-black);
            }

            .tab-content {
                display: none;
                animation: fadeIn 0.5s ease;
            }

            .tab-content.active {
                display: block;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .hot-deals-container-modern {
                margin-top: 30px;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabBtns = document.querySelectorAll('.tab-btn');
                const tabContents = document.querySelectorAll('.tab-content');

                tabBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const category = btn.getAttribute('data-category');

                        // Update buttons
                        tabBtns.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');

                        // Update content
                        tabContents.forEach(content => {
                            content.classList.remove('active');
                            if (content.id === category || (category === 'all' && content.id === 'all')) {
                                content.classList.add('active');
                            }
                        });
                    });
                });
            });
        </script>
        
        <!-- Promotional Banners -->
        <section class="promo-banners">
            <div class="promo-banner">
                <img src="{{ asset('images/backend_images/products/medium/bose_headphones.png') }}" alt="Premium Audio"
                     onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                <div class="promo-content">
                    <h3 class="promo-title">Premium Audio</h3>
                    <div class="promo-price-badge">Starting at $99</div>
                    <a href="#featured" class="promo-btn">SHOP NOW</a>
                </div>
            </div>
            <div class="promo-banner">
                <img src="{{ asset('images/backend_images/products/medium/gaming_headset.png') }}" alt="Gaming Gear"
                     onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                <div class="promo-content">
                    <h3 class="promo-title">Gaming Gear</h3>
                    <div class="promo-price-badge">Starting at $79</div>
                    <a href="#featured" class="promo-btn">SHOP NOW</a>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="featured-section" id="featured">
            <div class="featured-header">
                <h2 class="section-title">Featured Products</h2>
            </div>
            <div class="hot-deals-grid" id="featuredGrid">
                @foreach($products as $index => $product)
                    @include('layouts.frontLayout.product_card', ['product' => $product, 'index' => $index])
                @endforeach
            </div>
            <button class="load-more-btn">Load More</button>
        </section>
    </div>

    <script>
        // Enhanced Hero Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const currentNum = document.getElementById('currentSliderNum');
        const progress = document.getElementById('sliderProgress');
        let slideInterval;
        const slideDuration = 6000;

        function updateProgress() {
            progress.style.transition = 'none';
            progress.style.width = '0';
            setTimeout(() => {
                progress.style.transition = `width ${slideDuration}ms linear`;
                progress.style.width = '100%';
            }, 10);
        }

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
            
            // Update number display
            currentNum.textContent = (currentSlide + 1).toString().padStart(2, '0');
            
            updateProgress();
            
            // Reset interval
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, slideDuration);
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        // Initialize Slider
        showSlide(0);

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });

        // Category Carousel
        const track = document.getElementById('categoryTrack');
        const leftArrow = document.querySelector('.carousel-arrow.left');
        const rightArrow = document.querySelector('.carousel-arrow.right');
        let scrollPosition = 0;

        if (track && rightArrow && leftArrow) {
            rightArrow.addEventListener('click', () => {
                scrollPosition += 300;
                if (scrollPosition > track.scrollWidth - track.parentElement.clientWidth) {
                    scrollPosition = track.scrollWidth - track.parentElement.clientWidth;
                }
                track.style.transform = `translateX(-${scrollPosition}px)`;
            });

            leftArrow.addEventListener('click', () => {
                scrollPosition = Math.max(0, scrollPosition - 300);
                track.style.transform = `translateX(-${scrollPosition}px)`;
            });
        }

        // Wishlist Toggle
        document.querySelectorAll('.wishlist-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.stopPropagation();
                const heart = this.querySelector('i');
                if (heart.classList.contains('fa-heart-o')) {
                    heart.classList.remove('fa-heart-o');
                    heart.classList.add('fa-heart');
                    this.style.background = '#ff0000';
                    this.style.color = '#ffffff';
                    this.style.borderColor = '#ff0000';
                } else {
                    heart.classList.remove('fa-heart');
                    heart.classList.add('fa-heart-o');
                    this.style.background = '#ffffff';
                    this.style.color = '#000000';
                    this.style.borderColor = 'var(--border-light)';
                }
            });
        });

        // Load More Button AJAX Placeholder
        const loadMoreBtn = document.querySelector('.load-more-btn');
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                this.textContent = 'Loading...';
                this.classList.add('loading');
                setTimeout(() => {
                    this.textContent = 'No More Products';
                    this.style.opacity = '0.5';
                    this.style.pointerEvents = 'none';
                }, 1500);
            });
        }
    </script>
@endsection
