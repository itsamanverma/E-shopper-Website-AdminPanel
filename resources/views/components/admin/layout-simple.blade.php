<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Admin Dashboard' }} - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <style>
        * { box-sizing: border-box; }
        body { 
            margin: 0; 
            font-family: 'Figtree', sans-serif; 
            background: #f9fafb; 
            min-height: 100vh;
        }
        
        /* Layout */
        .admin-layout { display: flex; min-height: 100vh; }
        .admin-sidebar { 
            width: 260px; 
            background: #1f2937; 
            color: white; 
            flex-shrink: 0;
            overflow-y: auto;
        }
        .admin-main { 
            flex: 1; 
            display: flex; 
            flex-direction: column; 
            overflow: hidden;
        }
        .admin-navbar { 
            background: white; 
            height: 64px; 
            display: flex; 
            align-items: center; 
            padding: 0 24px; 
            border-bottom: 1px solid #e5e7eb;
            justify-content: space-between;
        }
        .admin-content { 
            flex: 1; 
            padding: 24px; 
            overflow-y: auto; 
        }
        
        /* Sidebar */
        .sidebar-header { 
            padding: 20px; 
            border-bottom: 1px solid #374151; 
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-logo { 
            width: 32px; 
            height: 32px; 
            background: #3b82f6; 
            border-radius: 6px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar-nav { 
            padding: 20px 16px; 
        }
        .nav-item { 
            display: block; 
            color: #d1d5db; 
            text-decoration: none; 
            padding: 12px 16px; 
            border-radius: 6px; 
            margin: 4px 0;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .nav-item:hover { 
            background: #374151; 
            color: white; 
        }
        .nav-item.active { 
            background: #3b82f6; 
            color: white; 
        }
        .nav-icon { 
            width: 20px; 
            height: 20px; 
        }
        
        /* User menu */
        .user-menu { 
            padding: 20px; 
            border-top: 1px solid #374151; 
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .user-avatar { 
            width: 32px; 
            height: 32px; 
            background: #3b82f6; 
            border-radius: 50%; 
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }
        .logout-btn {
            background: none;
            border: none;
            color: #9ca3af;
            font-size: 12px;
            cursor: pointer;
            padding: 0;
            margin-top: 4px;
        }
        .logout-btn:hover { color: white; }
        
        /* Mobile */
        @media (max-width: 768px) {
            .admin-sidebar { display: none; }
            .admin-navbar { padding: 0 16px; }
            .admin-content { padding: 16px; }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <div class="admin-sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm8 0a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1V8z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <div style="font-weight: 600; font-size: 18px;">E-Shopper</div>
                    <div style="font-size: 12px; color: #9ca3af;">Admin Panel</div>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ url('/admin/dashboard') }}" class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                
                <a href="{{ url('/admin/view-products') }}" class="nav-item {{ request()->is('admin/*product*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                    </svg>
                    Products
                </a>
                
                <a href="{{ url('/admin/add-product') }}" class="nav-item {{ request()->is('admin/add-product') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Product
                </a>
                
                <a href="{{ url('/admin/view-categories') }}" class="nav-item {{ request()->is('admin/*categor*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Categories
                </a>
                
                <a href="{{ url('/admin/add-category') }}" class="nav-item {{ request()->is('admin/add-category') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Add Category
                </a>
                
                <a href="{{ url('/admin/settings') }}" class="nav-item {{ request()->is('admin/settings') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Settings
                </a>
            </nav>
            
            <div class="user-menu">
                <div class="user-avatar">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
                <div style="flex: 1;">
                    <div style="font-weight: 500; font-size: 14px;">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="logout-btn">Sign out</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="admin-main">
            <!-- Navbar -->
            <div class="admin-navbar">
                <h1 style="margin: 0; font-size: 24px; font-weight: 600; color: #1f2937;">{{ $title ?? 'Dashboard' }}</h1>
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="font-size: 14px; color: #6b7280;">{{ now()->format('M j, Y') }}</div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="admin-content">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>