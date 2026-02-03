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

        /* Hero Slider Section */
        .hero-slider {
            position: relative;
            height: 600px;
            overflow: hidden;
            background: var(--bg-light);
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
            transition: opacity 0.6s ease-in-out;
            display: flex;
            align-items: center;
        }

        .slide.active {
            opacity: 1;
        }

        .slide-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .slide-text {
            flex: 1;
            max-width: 500px;
        }

        .slide-label {
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-gray);
            margin-bottom: 15px;
            font-weight: 500;
        }

        .slide-title {
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 30px;
            color: var(--primary-black);
        }

        .slide-btn {
            display: inline-block;
            background: var(--primary-black);
            color: var(--white);
            padding: 15px 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-black);
        }

        .slide-btn:hover {
            background: var(--white);
            color: var(--primary-black);
            text-decoration: none;
        }

        .slide-image {
            flex: 1;
            text-align: right;
        }

        .slide-image img {
            max-width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
        }

        .slider-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .dot {
            width: 40px;
            height: 3px;
            background: rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: var(--primary-black);
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
                        <h1 class="slide-title">Premium Headphones Collection</h1>
                        <a href="#featured" class="slide-btn">Shop Now</a>
                    </div>
                    <div class="slide-image">
                        <img src="{{ asset('images/frontend_images/home/hero_headphones.png') }}" alt="Headphones" 
                             onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="slide-label">HOT DEALS</div>
                        <h1 class="slide-title">Up to 60% Off</h1>
                        <a href="#hot-deals" class="slide-btn">Shop Now</a>
                    </div>
                    <div class="slide-image">
                        <img src="{{ asset('images/frontend_images/products/headphone2.png') }}" alt="Sale" 
                             onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide-content">
                    <div class="slide-text">
                        <div class="slide-label">BEST SELLERS</div>
                        <h1 class="slide-title">Wireless Freedom</h1>
                        <a href="#featured" class="slide-btn">Shop Now</a>
                    </div>
                    <div class="slide-image">
                        <img src="{{ asset('images/frontend_images/products/headphone1.png') }}" alt="Wireless" 
                             onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-dots">
            <div class="dot active" data-slide="0"></div>
            <div class="dot" data-slide="1"></div>
            <div class="dot" data-slide="2"></div>
        </div>
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
                                @if(strtolower($category->category_name) == 'electronics' || strtolower($category->category_name) == 'headphone')
                                    <img src="{{ asset('images/frontend_images/products/headphone3.png') }}" alt="{{ $category->category_name }}">
                                @elseif(strtolower($category->category_name) == 'fashion' || strtolower($category->category_name) == 'clothing')
                                    🎽
                                @elseif(strtolower($category->category_name) == 'shoes' || strtolower($category->category_name) == 'footwear')
                                    👟
                                @elseif(strtolower($category->category_name) == 'accessories')
                                    👜
                                @else
                                    📦
                                @endif
                            </div>
                            <div class="category-name">{{ $category->category_name }}</div>
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
            </div>
            <div class="hot-deals-container">
                <div class="sale-banner">
                    <h3>Summer Sale</h3>
                    <p>Up to 60% Off</p>
                    <a href="#featured">VIEW ALL</a>
                </div>
                <div class="hot-deals-grid">
                    @foreach($products->take(4) as $index => $product)
                        <div class="product-card">
                            @if($index % 2 == 0)
                                <div class="product-badge">-{{ rand(20, 60) }}%</div>
                            @else
                                <div class="product-badge new">NEW</div>
                            @endif
                            <div class="wishlist-icon">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <div class="product-image-wrapper">
                                @if($product->image)
                                    <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="{{ $product->product_name }}">
                                @else
                                    <img src="{{ asset('images/frontend_images/products/headphone'.($index + 1).'.png') }}" alt="{{ $product->product_name }}"
                                         onerror="this.style.background='#f3f4f6'">
                                @endif
                            </div>
                            <div class="product-actions">
                                <a href="{{ url('product/'.$product->id) }}" class="action-btn">Add to Cart</a>
                                <button class="action-btn secondary">Quick View</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name">{{ $product->product_name }}</h3>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <span class="rating-count">({{ rand(50, 500) }})</span>
                                </div>
                                <div class="product-price sale">
                                    <span>${{ number_format($product->price, 2) }}</span>
                                    @if($index % 2 == 0)
                                        <span class="original-price">${{ number_format($product->price * 1.5, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Promotional Banners -->
        <section class="promo-banners">
            <div class="promo-banner">
                <img src="{{ asset('images/frontend_images/products/headphone5.png') }}" alt="Premium Audio"
                     onerror="this.src='{{ asset('images/frontend_images/home/girl3.jpg') }}'">
                <div class="promo-content">
                    <h3 class="promo-title">Premium Audio</h3>
                    <div class="promo-price-badge">Starting at $99</div>
                    <a href="#featured" class="promo-btn">SHOP NOW</a>
                </div>
            </div>
            <div class="promo-banner">
                <img src="{{ asset('images/frontend_images/products/headphone7.png') }}" alt="Gaming Gear"
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
            <div class="hot-deals-grid">
                @foreach($products as $index => $product)
                    <div class="product-card">
                        @if($index % 3 == 0)
                            <div class="product-badge">-{{ rand(15, 50) }}%</div>
                        @elseif($index % 3 == 1)
                            <div class="product-badge new">NEW</div>
                        @endif
                        <div class="wishlist-icon">
                            <i class="fa fa-heart-o"></i>
                        </div>
                        <div class="product-image-wrapper">
                            @if($product->image)
                                <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="{{ $product->product_name }}">
                            @else
                                <img src="{{ asset('images/frontend_images/products/headphone'.(($index % 8) + 1).'.png') }}" alt="{{ $product->product_name }}"
                                     onerror="this.style.background='#f3f4f6'">
                            @endif
                        </div>
                        <div class="product-actions">
                            <a href="{{ url('product/'.$product->id) }}" class="action-btn">Add to Cart</a>
                            <button class="action-btn secondary">Quick View</button>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">{{ $product->product_name }}</h3>
                            <div class="product-rating">
                                <div class="stars">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < 4)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-half-o"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="rating-count">({{ rand(50, 500) }})</span>
                            </div>
                            <div class="product-price {{ $index % 3 == 0 ? 'sale' : '' }}">
                                <span>${{ number_format($product->price, 2) }}</span>
                                @if($index % 3 == 0)
                                    <span class="original-price">${{ number_format($product->price * 1.4, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="load-more-btn">Load More</button>
        </section>
    </div>

    <script>
        // Hero Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        // Auto-play slider
        setInterval(nextSlide, 5000);

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });

        // Category Carousel
        const track = document.getElementById('categoryTrack');
        const leftArrow = document.querySelector('.carousel-arrow.left');
        const rightArrow = document.querySelector('.carousel-arrow.right');
        let scrollPosition = 0;

        rightArrow.addEventListener('click', () => {
            scrollPosition += 300;
            track.style.transform = `translateX(-${scrollPosition}px)`;
        });

        leftArrow.addEventListener('click', () => {
            scrollPosition = Math.max(0, scrollPosition - 300);
            track.style.transform = `translateX(-${scrollPosition}px)`;
        });

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
                } else {
                    heart.classList.remove('fa-heart');
                    heart.classList.add('fa-heart-o');
                    this.style.background = '#ffffff';
                    this.style.color = '#000000';
                }
            });
        });

        // Load More Button
        document.querySelector('.load-more-btn').addEventListener('click', function() {
            alert('Load more functionality would fetch additional products via AJAX');
        });
    </script>
@endsection
