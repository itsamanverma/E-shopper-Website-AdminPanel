<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();
?>
<header id="header" class="modern-header">
    <div class="header-top-bar">
        <div class="container container-wide">
            <div class="top-bar-inner">
                <div class="top-bar-left">
                    <span class="delivery-badge">Free Delivery On All Orders</span>
                </div>
                <div class="top-bar-right">
                    <a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a>
                    <a href="#"><i class="fa fa-envelope"></i> info@domain.com</a>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-main">
        <div class="container container-wide">
            <div class="header-main-inner">
                <div class="header-logo">
                    <a href="{{url('/')}}">
                        <span class="logo-text">E-<span>SHOPPER</span></span>
                    </a>
                </div>
                
                <nav class="header-nav">
                    <ul class="main-menu">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="has-dropdown">
                            <a href="#">Shop <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu-modern">
                                @foreach ($mainCategories as $cat)
                                    @if ($cat->status == "1")
                                        <li><a href="{{url('products/'.$cat->url)}}">{{$cat->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Hot Deals</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                
                <div class="header-actions">
                    <div class="search-trigger">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Search products..." class="header-search-input">
                    </div>
                    <a href="#" class="action-icon"><i class="fa fa-user-o"></i></a>
                    <a href="#" class="action-icon wishlist-trigger">
                        <i class="fa fa-heart-o"></i>
                        <span class="count">0</span>
                    </a>
                    <a href="#" class="action-icon cart-trigger">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .modern-header {
        background: #fff;
        width: 100%;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .header-top-bar {
        background: #000;
        color: #fff;
        padding: 8px 0;
        font-size: 13px;
    }

    .top-bar-inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .delivery-badge {
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .top-bar-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .top-bar-right a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: color 0.3s;
    }

    .top-bar-right a:hover {
        color: #fff;
    }

    .social-links {
        display: flex;
        gap: 15px;
        border-left: 1px solid rgba(255,255,255,0.2);
        padding-left: 15px;
    }

    .header-main {
        padding: 20px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .header-main-inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-text {
        font-size: 28px;
        font-weight: 800;
        color: #000;
        letter-spacing: -1px;
    }

    .logo-text span {
        color: #ff0000;
    }

    .main-menu {
        display: flex;
        gap: 30px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .main-menu > li > a {
        color: #000;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 10px 0;
        position: relative;
    }

    .main-menu > li > a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #ff0000;
        transition: width 0.3s ease;
    }

    .main-menu > li:hover > a::after {
        width: 100%;
    }

    .has-dropdown {
        position: relative;
    }

    .dropdown-menu-modern {
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        min-width: 200px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        padding: 15px 0;
        list-style: none;
    }

    .has-dropdown:hover .dropdown-menu-modern {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-menu-modern li a {
        display: block;
        padding: 10px 25px;
        color: #444;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .dropdown-menu-modern li a:hover {
        background: #f9f9f9;
        color: #ff0000;
        padding-left: 30px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .action-icon {
        color: #000;
        font-size: 20px;
        text-decoration: none;
        position: relative;
    }

    .action-icon .count {
        position: absolute;
        top: -8px;
        right: -10px;
        background: #ff0000;
        color: #fff;
        font-size: 10px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .search-trigger {
        position: relative;
        display: flex;
        align-items: center;
    }

    .header-search-input {
        border: 1px solid #e0e0e0;
        padding: 8px 15px 8px 35px;
        border-radius: 25px;
        width: 200px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s;
    }

    .header-search-input:focus {
        width: 250px;
        border-color: #000;
    }

    .search-trigger i {
        position: absolute;
        left: 12px;
        color: #888;
    }

    .container-wide {
        max-width: 1400px !important;
    }

    @media (max-width: 991px) {
        .header-nav { display: none; }
        .header-top-bar { display: none; }
    }
</style>