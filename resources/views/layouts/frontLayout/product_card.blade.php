<div class="product-card">
    @if(isset($index))
        @if($index % 3 == 0)
            <div class="product-badge">-{{ rand(15, 50) }}%</div>
        @elseif($index % 3 == 1)
            <div class="product-badge new">NEW</div>
        @endif
    @endif
    <div class="wishlist-icon">
        <i class="fa fa-heart-o"></i>
    </div>
    <div class="product-image-wrapper">
        @if($product->image)
            <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="{{ $product->product_name }}">
        @else
            <img src="{{ asset('images/frontend_images/products/headphone'.((($index ?? 0) % 8) + 1).'.png') }}" alt="{{ $product->product_name }}"
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
            @if(isset($index) && $index % 3 == 0)
                <span class="original-price">${{ number_format($product->price * 1.5, 2) }}</span>
            @endif
        </div>
    </div>
</div>
