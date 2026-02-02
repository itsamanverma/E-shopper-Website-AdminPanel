<x-admin.layout title="Dashboard">
    <style>
        /* Inline Tailwind-like styles for compatibility */
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
        }
        .admin-page-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 32px;
        }
        .admin-page-title {
            font-size: 32px;
            font-weight: bold;
            color: #1F2937;
            margin: 0;
        }
    </style>

    <div>
        <!-- Page Header -->
        <div class="admin-page-header">
            <div>
                <h1 class="admin-page-title">Dashboard</h1>
                <p style="color: #6B7280; margin: 8px 0 0 0;">Welcome to your admin panel</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="admin-stats">
            <!-- Total Products -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #DBEAFE; color: #3B82F6;">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                </div>
                <h3 style="font-size: 24px; font-weight: bold; margin: 0; color: #1F2937;">{{ \App\Product::count() }}</h3>
                <p style="color: #6B7280; margin: 4px 0 0 0;">Total Products</p>
                <a href="{{ url('/admin/view-products') }}" class="admin-btn admin-btn-primary" style="margin-top: 16px; font-size: 14px; padding: 8px 16px;">View All</a>
            </div>

            <!-- Total Categories -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #D1FAE5; color: #10B981;">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 style="font-size: 24px; font-weight: bold; margin: 0; color: #1F2937;">{{ \App\Category::count() }}</h3>
                <p style="color: #6B7280; margin: 4px 0 0 0;">Total Categories</p>
                <a href="{{ url('/admin/view-categories') }}" class="admin-btn admin-btn-primary" style="margin-top: 16px; font-size: 14px; padding: 8px 16px;">View All</a>
            </div>

            <!-- Active Products -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #FEF3C7; color: #F59E0B;">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 style="font-size: 24px; font-weight: bold; margin: 0; color: #1F2937;">{{ \App\Product::where('status', 1)->count() }}</h3>
                <p style="color: #6B7280; margin: 4px 0 0 0;">Active Products</p>
                <a href="{{ url('/admin/view-products?status=1') }}" class="admin-btn admin-btn-primary" style="margin-top: 16px; font-size: 14px; padding: 8px 16px;">View Active</a>
            </div>

            <!-- Product Images -->
            <div class="admin-stat-card">
                <div class="admin-stat-icon" style="background: #EDE9FE; color: #8B5CF6;">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 style="font-size: 24px; font-weight: bold; margin: 0; color: #1F2937;">{{ \App\ProductsImage::count() }}</h3>
                <p style="color: #6B7280; margin: 4px 0 0 0;">Product Images</p>
                <a href="{{ url('/admin/view-products') }}" class="admin-btn admin-btn-primary" style="margin-top: 16px; font-size: 14px; padding: 8px 16px;">Manage</a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="admin-card">
            <h2 style="font-size: 20px; font-weight: 600; margin: 0 0 24px 0; color: #1F2937;">Quick Actions</h2>
            <div class="admin-quick-actions">
                <a href="{{ url('/admin/add-product') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #D1FAE5; color: #10B981; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0; color: #1F2937;">Add Product</h3>
                        <p style="color: #6B7280; margin: 4px 0 0 0; font-size: 14px;">Create a new product</p>
                    </div>
                </a>

                <a href="{{ url('/admin/add-category') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #DBEAFE; color: #3B82F6; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0; color: #1F2937;">Add Category</h3>
                        <p style="color: #6B7280; margin: 4px 0 0 0; font-size: 14px;">Create a new category</p>
                    </div>
                </a>

                <a href="{{ url('/admin/view-products') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #EDE9FE; color: #8B5CF6; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2V6a1 1 0 112 0v1a1 1 0 11-2 0zm3 0V6a1 1 0 112 0v1a1 1 0 11-2 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0; color: #1F2937;">Manage Products</h3>
                        <p style="color: #6B7280; margin: 4px 0 0 0; font-size: 14px;">View and edit products</p>
                    </div>
                </a>

                <a href="{{ url('/admin/view-categories') }}" class="admin-action-card">
                    <div class="admin-stat-icon" style="background: #FEF3C7; color: #F59E0B; width: 48px; height: 48px; margin: 0;">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-weight: 600; margin: 0; color: #1F2937;">Manage Categories</h3>
                        <p style="color: #6B7280; margin: 4px 0 0 0; font-size: 14px;">View and edit categories</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="admin-card">
            <h2 style="font-size: 20px; font-weight: 600; margin: 0 0 24px 0; color: #1F2937;">Recent Activity</h2>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 8px; height: 8px; background: #10B981; border-radius: 50%;"></div>
                    <div>
                        <p style="margin: 0; font-weight: 500; color: #1F2937;">System updated successfully</p>
                        <p style="margin: 0; font-size: 14px; color: #6B7280;">Laravel framework upgraded to version 10</p>
                    </div>
                    <div style="margin-left: auto; font-size: 14px; color: #6B7280;">Just now</div>
                </div>
                
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 8px; height: 8px; background: #3B82F6; border-radius: 50%;"></div>
                    <div>
                        <p style="margin: 0; font-weight: 500; color: #1F2937;">Admin user created</p>
                        <p style="margin: 0; font-size: 14px; color: #6B7280;">New admin account setup completed</p>
                    </div>
                    <div style="margin-left: auto; font-size: 14px; color: #6B7280;">2 min ago</div>
                </div>
                
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 8px; height: 8px; background: #F59E0B; border-radius: 50%;"></div>
                    <div>
                        <p style="margin: 0; font-weight: 500; color: #1F2937;">Database migrated</p>
                        <p style="margin: 0; font-size: 14px; color: #6B7280;">All database tables updated successfully</p>
                    </div>
                    <div style="margin-left: auto; font-size: 14px; color: #6B7280;">5 min ago</div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>