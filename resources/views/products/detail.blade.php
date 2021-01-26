@extends('layouts.frontLayout.front_design')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <?php //echo $categories_menu; ?>
                            <div class="panel panel-default">
                                @foreach ($categories as $cat)
                                    @if ($cat->status == "1")
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    {{$cat->name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="{{ $cat->id }}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    @foreach ($cat->categories as $subcat)
                                                        @if ($subcat->status == "1")
                                                            <li><a href="{{ asset('/products/'.$subcat->url)}}">{{$subcat->name }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--/brands_products-->

                        <div class="price-range">
                            <!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                    data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div>
                        <!--/price-range-->

                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="{{ asset('images/frontend_images/home/shipping.jpg') }}" alt="" />
                        </div>
                        <!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ asset('images/backend_images/products/medium/'.$productDetails->image) }}" alt="" />
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('images/frontend_images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>

                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="{{ asset('images/frontend_images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                <h2>{{ $productDetails->product_name }}</h2>
                                <p>Code ID: {{ $productDetails->product_code }}</p>
                                <p class="select">
                                    <select id="selSize" name="size" >
                                        <option value="">Select Size</option>
                                        @foreach ($productDetails->attributes as $sizes)
                                         <option value="{{$productDetails->id}}-{{$sizes->size}}">{{$sizes->size}}</option>   
                                        @endforeach
                                    </select>
                                </p>
                                <img src="{{ asset('images/frontend_images/product-details/rating.png')}}" alt="" />
                                <span>
                                    <span id="getPrice">₹{{$productDetails->price}}</span>
                                    <label>Quantity:</label>
                                    <input id='getQuantity' type="text" value="1" />
                                    <button type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                {{--  <p><b>Brand:</b> E-SHOPPER</p>  --}}
                                <a href=""><img src="{{asset('images/frontend_images/product-details/share.png')}}" class="share img-responsive"
                                        alt="" /></a>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                    <div class="category-tab shop-details-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                                <li><a href="#care" data-toggle="tab">Material & Care</a></li>
                                <li><a href="#delivery" data-toggle="tab">Delivery Options</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="description">
                                <div class="col-sm-12">
                                    <p>{{$productDetails->description}}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="care">
                                <div class="col-sm-12">
                                    <p>{{$productDetails->care}}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="delivery">
                                <div class="col-sm-12">
                                    <p>100% Original Products<br>
                                       Free Delivery on order above ₹{{$productDetails->price}}<br>
                                       Pay on delivery might be available<br>
                                       Easy 30 days returns and exchanges<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->

                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('images/frontend_images/home/recommend1.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('images/frontend_images/home/recommend2.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('images/frontend_images/home/recommend3.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('images/frontend_images/home/recommend1.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('images/frontend_images/home/recommend2.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('images/frontend_images/home/recommend3.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
