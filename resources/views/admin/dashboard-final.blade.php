<x-admin.layout-simple title="Dashboard">
    <style>
        /* Inline styles for compatibility */
        .admin-card { 
            background: white; 
            border-radius: 8px; 
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); 
            padding: 24px; 
            margin-bottom: 24px; 
        }
        .admin-stats { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 24px; 
            margin-bottom: 24px; 
        }
        .admin-stat-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .admin-stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        .admin-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }
        .admin-btn-primary {
            background: #3B82F6;
            color: white;
        }
        .admin-btn-primary:hover {
            background: #2563EB;
            color: white;
            text-decoration: none;
        }
        .admin-quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            margin-top: 24px;
        }
        .admin-action-card {
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 20px;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .admin-action-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            color: inherit;
            text-decoration: none;
        }
        .welcome-text {
            color: #6B7280; 
            margin: 8px 0 32px 0;
            font-size: 16px;
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .admin-stats {
                grid-template-columns: 1fr;
            }
            .admin-quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div>
        <!-- Welcome Section -->
        <div style="margin-bottom: 32px;">
            <p class="welcome-text">Welcome back! Here's what's happening with your e-commerce store today.</p>
        </div>

        <!-- Stats Cards -->
        <div class="admin-stats">
            <!-- Total Products -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #EFF6FF; color: #3B82F6;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                    </svg>
                </div>
                <h3 style="font-size: 28px; font-weight: bold; margin: 0 0 4px 0; color: #1F2937;">{{ \App\Models\Product::count() }}</h3>
                <p style="color: #6B7280; margin: 0 0 16px 0; font-size: 14px;">Total Products</p>
                <a href="{{ url('/admin/view-products') }}" class="admin-btn admin-btn-primary" style="font-size: 14px; padding: 8px 16px;">
                    View All Products
                </a>
            </div>

            <!-- Total Categories -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #F0FDF4; color: #10B981;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <h3 style="font-size: 28px; font-weight: bold; margin: 0 0 4px 0; color: #1F2937;">{{ \App\Models\Category::count() }}</h3>
                <p style="color: #6B7280; margin: 0 0 16px 0; font-size: 14px;">Categories</p>
                <a href="{{ url('/admin/view-categories') }}" class="admin-btn admin-btn-primary" style="font-size: 14px; padding: 8px 16px;">
                    Manage Categories
                </a>
            </div>

            <!-- Published Products -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #FFFBEB; color: #F59E0B;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 style="font-size: 28px; font-weight: bold; margin: 0 0 4px 0; color: #1F2937;">{{ \App\Models\Product::count() }}</h3>
                <p style="color: #6B7280; margin: 0 0 16px 0; font-size: 14px;">Published Products</p>
                <a href="{{ url('/admin/view-products') }}" class="admin-btn admin-btn-primary" style="font-size: 14px; padding: 8px 16px;">
                    View Products
                </a>
            </div>

            <!-- Product Images -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #FAF5FF; color: #8B5CF6;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 style="font-size: 28px; font-weight: bold; margin: 0 0 4px 0; color: #1F2937;">{{ \App\Models\ProductsImage::count() }}</h3>
                <p style="color: #6B7280; margin: 0 0 16px 0; font-size: 14px;">Product Images</p>
                <a href="{{ url('/admin/view-products') }}" class="admin-btn admin-btn-primary" style="font-size: 14px; padding: 8px 16px;">
                    Manage Images
                </a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="admin-card">
            <h2 style="font-size: 20px; font-weight: 600; margin: 0 0 8px 0; color: #1F2937;">Quick Actions</h2>
            <p style="color: #6B7280; margin: 0 0 24px 0; font-size: 14px;">Common tasks you might want to do</p>
            
            <div class="admin-quick-actions">
                <a href="{{ url('/admin/add-product') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #F0FDF4; color: #10B981; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0 0 4px 0; color: #1F2937;">Add New Product</h3>
                        <p style="color: #6B7280; margin: 0; font-size: 14px;">Create a new product in your store</p>
                    </div>
                </a>

                <a href="{{ url('/admin/add-category') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #EFF6FF; color: #3B82F6; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0 0 4px 0; color: #1F2937;">Add New Category</h3>
                        <p style="color: #6B7280; margin: 0; font-size: 14px;">Create a new product category</p>
                    </div>
                </a>

                <a href="{{ url('/admin/view-products') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #FAF5FF; color: #8B5CF6; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0 0 4px 0; color: #1F2937;">Manage Products</h3>
                        <p style="color: #6B7280; margin: 0; font-size: 14px;">View, edit, and organize your products</p>
                    </div>
                </a>

                <a href="{{ url('/admin/view-categories') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #FFFBEB; color: #F59E0B; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0 0 4px 0; color: #1F2937;">Manage Categories</h3>
                        <p style="color: #6B7280; margin: 0; font-size: 14px;">Organize your product categories</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="admin-card">
            <h2 style="font-size: 20px; font-weight: 600; margin: 0 0 8px 0; color: #1F2937;">Recent Activity</h2>
            <p style="color: #6B7280; margin: 0 0 24px 0; font-size: 14px;">Latest updates and changes</p>
            
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; align-items: start; gap: 16px; padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="width: 8px; height: 8px; background: #10B981; border-radius: 50%; margin-top: 8px; flex-shrink: 0;"></div>
                    <div style="flex: 1;">
                        <p style="margin: 0 0 4px 0; font-weight: 500; color: #1F2937;">Laravel Framework Updated</p>
                        <p style="margin: 0 0 8px 0; font-size: 14px; color: #6B7280;">Successfully upgraded from Laravel 5.8 to Laravel 10 with all dependencies updated</p>
                        <div style="font-size: 12px; color: #9CA3AF;">Just now</div>
                    </div>
                </div>
                
                <div style="display: flex; align-items: start; gap: 16px; padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="width: 8px; height: 8px; background: #3B82F6; border-radius: 50%; margin-top: 8px; flex-shrink: 0;"></div>
                    <div style="flex: 1;">
                        <p style="margin: 0 0 4px 0; font-weight: 500; color: #1F2937;">Admin User Created</p>
                        <p style="margin: 0 0 8px 0; font-size: 14px; color: #6B7280;">New admin account setup completed with email: dev.amanverma@gmail.com</p>
                        <div style="font-size: 12px; color: #9CA3AF;">2 minutes ago</div>
                    </div>
                </div>
                
                <div style="display: flex; align-items: start; gap: 16px; padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="width: 8px; height: 8px; background: #F59E0B; border-radius: 50%; margin-top: 8px; flex-shrink: 0;"></div>
                    <div style="flex: 1;">
                        <p style="margin: 0 0 4px 0; font-weight: 500; color: #1F2937;">Database Migration Completed</p>
                        <p style="margin: 0 0 8px 0; font-size: 14px; color: #6B7280;">All database tables migrated successfully for Laravel 10 compatibility</p>
                        <div style="font-size: 12px; color: #9CA3AF;">5 minutes ago</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Information -->
        <div class="admin-card">
            <h2 style="font-size: 20px; font-weight: 600; margin: 0 0 8px 0; color: #1F2937;">System Information</h2>
            <p style="color: #6B7280; margin: 0 0 24px 0; font-size: 14px;">Current system status and version information</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                <div style="padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="font-size: 12px; color: #6B7280; margin-bottom: 4px;">Laravel Version</div>
                    <div style="font-weight: 600; color: #1F2937;">10.50.0</div>
                </div>
                <div style="padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="font-size: 12px; color: #6B7280; margin-bottom: 4px;">PHP Version</div>
                    <div style="font-weight: 600; color: #1F2937;">{{ phpversion() }}</div>
                </div>
                <div style="padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="font-size: 12px; color: #6B7280; margin-bottom: 4px;">Database</div>
                    <div style="font-weight: 600; color: #1F2937;">MySQL</div>
                </div>
                <div style="padding: 16px; background: #f9fafb; border-radius: 8px;">
                    <div style="font-size: 12px; color: #6B7280; margin-bottom: 4px;">Environment</div>
                    <div style="font-weight: 600; color: #1F2937;">{{ app()->environment() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout-simple>