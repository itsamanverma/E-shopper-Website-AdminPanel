<x-admin.layout-simple title="Products">
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #1F2937;
            margin: 0;
        }
        .page-subtitle {
            color: #6B7280;
            margin: 4px 0 0 0;
            font-size: 16px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }
        .btn-primary {
            background: #3B82F6;
            color: white;
        }
        .btn-primary:hover {
            background: #2563EB;
            color: white;
            text-decoration: none;
        }
        .btn-sm {
            padding: 8px 12px;
            font-size: 13px;
        }
        .btn-edit {
            background: #F59E0B;
            color: white;
        }
        .btn-edit:hover {
            background: #D97706;
            color: white;
            text-decoration: none;
        }
        .btn-delete {
            background: #EF4444;
            color: white;
        }
        .btn-delete:hover {
            background: #DC2626;
            color: white;
            text-decoration: none;
        }
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table-header {
            background: #F9FAFB;
            padding: 20px;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1F2937;
            margin: 0;
        }
        .search-box {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .search-input {
            padding: 8px 16px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            font-size: 14px;
            width: 300px;
        }
        .search-input:focus {
            outline: none;
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th {
            background: #F9FAFB;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
            border-bottom: 1px solid #E5E7EB;
        }
        .data-table td {
            padding: 16px;
            border-bottom: 1px solid #F3F4F6;
            font-size: 14px;
            color: #1F2937;
        }
        .data-table tbody tr:hover {
            background: #F9FAFB;
        }
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #E5E7EB;
        }
        .product-name {
            font-weight: 500;
            color: #1F2937;
        }
        .product-code {
            font-family: monospace;
            background: #F3F4F6;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 12px;
        }
        .price {
            font-weight: 600;
            color: #059669;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-active {
            background: #D1FAE5;
            color: #065F46;
        }
        .status-inactive {
            background: #FEE2E2;
            color: #991B1B;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .alert {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .alert-success {
            background: #F0FDF4;
            color: #166534;
            border: 1px solid #BBF7D0;
        }
        .alert-error {
            background: #FEF2F2;
            color: #DC2626;
            border: 1px solid #FECACA;
        }
        .empty-state {
            text-align: center;
            padding: 64px 32px;
            color: #6B7280;
        }
        .empty-state svg {
            margin: 0 auto 16px;
            color: #9CA3AF;
        }
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            font-size: 14px;
        }
        .breadcrumb-item {
            color: #6B7280;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: #1F2937;
            font-weight: 500;
        }
        .breadcrumb-separator {
            color: #9CA3AF;
        }
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
            .search-input {
                width: 100%;
            }
            .table-header {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>

    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-item">Dashboard</a>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-item active">Products</span>
    </nav>

    <!-- Alerts -->
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('flash_message_error') }}</span>
        </div>
    @endif

    @if(Session::has('flash_message_success'))
        <div class="alert alert-success">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('flash_message_success') }}</span>
        </div>
    @endif

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Products</h1>
            <p class="page-subtitle">Manage your product catalog</p>
        </div>
        <a href="{{ url('/admin/add-product') }}" class="btn btn-primary">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 8px;">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
            Add New Product
        </a>
    </div>

    <!-- Products Table -->
    <div class="table-container">
        <div class="table-header">
            <h3>All Products ({{ count($products) }})</h3>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search products..." id="searchInput">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20" style="color: #9CA3AF;">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>

        @if(count($products) > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Details</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" 
                                 alt="{{ $product->product_name }}" 
                                 class="product-image">
                        @else
                            <div class="product-image" style="display: flex; align-items: center; justify-content: center; background: #F3F4F6;">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20" style="color: #9CA3AF;">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="product-name">{{ $product->product_name }}</div>
                        <div class="product-code">{{ $product->product_code }}</div>
                        @if($product->product_color)
                            <div style="font-size: 12px; color: #6B7280; margin-top: 2px;">{{ $product->product_color }}</div>
                        @endif
                    </td>
                    <td>
                        <span style="color: #6B7280;">{{ $product->category->name ?? 'Uncategorized' }}</span>
                    </td>
                    <td>
                        <span class="price">${{ number_format($product->price, 2) }}</span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-edit btn-sm">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 4px;">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                </svg>
                                Edit
                            </a>
                            <a href="{{ url('/admin/delete-product/'.$product->id) }}" 
                               class="btn btn-delete btn-sm"
                               onclick="return confirm('Are you sure you want to delete this product?')">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 4px;">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414L7.586 12l-3.293 3.293a1 1 0 101.414 1.414L9 13.414l3.293 3.293a1 1 0 001.414-1.414L10.414 12l3.293-3.293z" clip-rule="evenodd"/>
                                </svg>
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state">
            <svg width="64" height="64" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
            </svg>
            <h3 style="color: #374151; margin: 0 0 8px 0;">No Products Found</h3>
            <p style="margin: 0 0 24px 0;">Start by adding your first product to the catalog.</p>
            <a href="{{ url('/admin/add-product') }}" class="btn btn-primary">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 8px;">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                </svg>
                Add Your First Product
            </a>
        </div>
        @endif
    </div>

    <script>
        // Simple search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('.data-table tbody tr');
            
            tableRows.forEach(row => {
                const productName = row.querySelector('.product-name').textContent.toLowerCase();
                const productCode = row.querySelector('.product-code').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productCode.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-admin.layout-simple>