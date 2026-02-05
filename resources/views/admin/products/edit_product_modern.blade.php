<x-admin.layout-simple>
    <style>
        .edit-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .edit-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        .edit-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(50%, -50%);
        }

        .edit-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px 0;
            position: relative;
            z-index: 1;
        }

        .edit-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .edit-content {
            padding: 32px;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            border-left: 4px solid #667eea;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-icon {
            width: 20px;
            height: 20px;
            background: #667eea;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        .form-label.required::after {
            content: ' *';
            color: #ef4444;
        }

        .form-input, .form-select, .form-textarea {
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .image-upload {
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            padding: 32px;
            text-align: center;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .image-upload:hover {
            border-color: #667eea;
            background: #f8fafc;
        }

        .image-upload.has-image {
            border-color: #10b981;
            background: #f0fdf4;
        }

        .image-preview {
            max-width: 200px;
            max-height: 200px;
            margin: 16px auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .current-image {
            margin-bottom: 16px;
        }

        .image-preview-thumb {
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        .image-preview-thumb:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .preview-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            font-size: 14px;
        }

        .image-preview-thumb:hover .preview-overlay {
            opacity: 1;
        }

        /* Modern Current Image Card Styles */
        .current-image-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        }

        .image-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .image-card-title {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .image-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .image-card-title h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: white;
        }

        .image-card-title p {
            margin: 4px 0 0 0;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .image-card-badge {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
        }

        .file-badge, .id-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        .image-card-body {
            display: flex;
            gap: 24px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .image-preview-container {
            position: relative;
            cursor: pointer;
            border-radius: 16px;
            overflow: hidden;
            background: white;
            padding: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .image-preview-container:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2);
        }

        .current-product-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            display: block;
        }

        .image-preview-overlay {
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            background: linear-gradient(135deg, rgba(254, 152, 15, 0.95), rgba(255, 193, 7, 0.95));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 12px;
            backdrop-filter: blur(4px);
        }

        .image-preview-overlay:hover {
            opacity: 1;
        }

        .preview-content-overlay {
            text-align: center;
        }

        .preview-icon {
            font-size: 32px;
            margin-bottom: 8px;
            display: block;
        }

        .preview-content-overlay span {
            display: block;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .preview-content-overlay small {
            font-size: 12px;
            opacity: 0.9;
        }

        .image-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-width: 140px;
        }

        .action-btn {
            padding: 12px 16px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .preview-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .preview-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .download-btn {
            background: rgba(34, 197, 94, 0.2);
            color: white;
            border: 1px solid rgba(34, 197, 94, 0.4);
        }

        .download-btn:hover {
            background: rgba(34, 197, 94, 0.3);
            transform: translateY(-2px);
        }

        .change-btn {
            background: rgba(239, 68, 68, 0.2);
            color: white;
            border: 1px solid rgba(239, 68, 68, 0.4);
        }

        .change-btn:hover {
            background: rgba(239, 68, 68, 0.3);
            transform: translateY(-2px);
        }

        .preview-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .preview-modal.active {
            display: flex;
        }

        .preview-content {
            max-width: 90%;
            max-height: 90%;
            position: relative;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        .preview-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .preview-header {
            background: #667eea;
            color: white;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .preview-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .preview-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .preview-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .preview-actions {
            padding: 16px 20px;
            background: #f8fafc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .preview-info {
            color: #6b7280;
            font-size: 14px;
        }

        .preview-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-preview {
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-download {
            background: #10b981;
            color: white;
        }

        .btn-download:hover {
            background: #059669;
            color: white;
            text-decoration: none;
        }

        .btn-change {
            background: #f59e0b;
            color: white;
        }

        .btn-change:hover {
            background: #d97706;
            color: white;
            text-decoration: none;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            color: white;
            text-decoration: none;
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
            color: #374151;
            text-decoration: none;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
            color: white;
            text-decoration: none;
        }

        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            border: 1px solid;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #16a34a;
        }

        .alert-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
        }

        .alert-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .alert-success .alert-icon {
            background: #16a34a;
        }

        .alert-error .alert-icon {
            background: #dc2626;
        }

        @media (max-width: 768px) {
            .edit-content {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }
        }
    </style>

    <div class="breadcrumb-container">
        <nav class="breadcrumb">
            <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                <span class="breadcrumb-icon">🏠</span>
                Dashboard
            </a>
            <span class="breadcrumb-separator">→</span>
            <a href="{{ url('/admin/view-products') }}" class="breadcrumb-link">Products</a>
            <span class="breadcrumb-separator">→</span>
            <span class="breadcrumb-current">Edit Product</span>
        </nav>
    </div>

    @if(Session::has('flash_message_error'))
        <div class="alert alert-error">
            <div class="alert-icon">✕</div>
            <div>
                <strong>Error!</strong> {!! session('flash_message_error') !!}
            </div>
        </div>
    @endif   

    @if(Session::has('flash_message_success'))
        <div class="alert alert-success">
            <div class="alert-icon">✓</div>
            <div>
                <strong>Success!</strong> {!! session('flash_message_success') !!}
            </div>
        </div>
    @endif

    <div class="edit-container">
        <div class="edit-header">
            <h1 class="edit-title">Edit Product</h1>
            <p class="edit-subtitle">Update product information and details</p>
        </div>

        <div class="edit-content">
            <form enctype="multipart/form-data" method="post" action="{{ url('/admin/edit-product/'.$productDetails->id) }}">
                {{ csrf_field() }}

                <!-- Basic Information -->
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">📋</div>
                        Basic Information
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label required">Category</label>
                            <select name="category_id" class="form-select" required>
                                {!! $categories_dropdown !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Product Name</label>
                            <input type="text" name="product_name" class="form-input" value="{{ $productDetails->product_name }}" placeholder="Enter product name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Product Code</label>
                            <input type="text" name="product_code" class="form-input" value="{{ $productDetails->product_code }}" placeholder="e.g. PRD001" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Color</label>
                            <input type="text" name="product_color" class="form-input" value="{{ $productDetails->product_color }}" placeholder="Enter product color">
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-input" value="{{ $productDetails->price }}" placeholder="0.00" required>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">📝</div>
                        Product Details
                    </div>

                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label">Product Description</label>
                            <textarea name="description" class="form-textarea" placeholder="Enter detailed product description...">{{ $productDetails->description }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Care Instructions</label>
                            <textarea name="care" class="form-textarea" placeholder="Enter care instructions...">{{ $productDetails->care }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Product Image -->
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">🖼️</div>
                        Product Image
                    </div>

                    @if($productDetails->image)
                        <div class="current-image-card">
                            <div class="image-card-header">
                                <div class="image-card-title">
                                    <div class="image-icon">🖼️</div>
                                    <div>
                                        <h4>Current Product Image</h4>
                                        <p>{{ $productDetails->product_name }}</p>
                                        <small style="color: rgba(255,255,255,0.7);">Debug: {{ $productDetails->image }}</small><br>
                                        <small style="color: rgba(255,255,255,0.7);">Asset Path: {{ asset('images/backend_images/products/large/'.$productDetails->image) }}</small><br>
                                        <small style="color: rgba(255,255,255,0.7);">URL Path: {{ url('images/backend_images/products/large/'.$productDetails->image) }}</small>
                                    </div>
                                </div>
                                <div class="image-card-badge">
                                    <span class="file-badge">📁 {{ $productDetails->image }}</span>
                                    <span class="id-badge">🏷️ {{ $productDetails->product_code ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="image-card-body">
                                <div class="image-preview-container" onclick="openImagePreview()">
                                    <img src="{{ url('images/backend_images/products/large/'.$productDetails->image) }}" 
                                         alt="{{ $productDetails->product_name }}" 
                                         class="current-product-image" 
                                         id="current-image" 
                                         onload="console.log('Image loaded successfully')" 
                                         onerror="console.log('Image failed to load:', this.src); this.style.display='none'; this.nextElementSibling.style.display='flex';">>
                                    <div class="image-error" style="display: none; width: 200px; height: 200px; background: #f3f4f6; border-radius: 12px; flex-direction: column; align-items: center; justify-content: center; color: #9ca3af; font-size: 14px; text-align: center;">
                                        <div>📷</div>
                                        <div>Image not found</div>
                                        <small>{{ $productDetails->image }}</small>
                                    </div>
                                    <div class="image-preview-overlay">
                                        <div class="preview-content-overlay">
                                            <div class="preview-icon">🔍</div>
                                            <span>Click to Preview</span>
                                            <small>View • Download • Change</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-actions">
                                    <button type="button" onclick="openImagePreview()" class="action-btn preview-btn">
                                        👁️ Preview
                                    </button>
                                    <button type="button" onclick="downloadImage('{{ url('images/backend_images/products/large/'.$productDetails->image) }}', '{{ $productDetails->image }}')" class="action-btn download-btn">
                                        ⬇️ Download
                                    </button>
                                    <button type="button" onclick="document.getElementById('image-input').click()" class="action-btn change-btn">
                                        🔄 Change
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="image-upload" onclick="document.getElementById('image-input').click()" id="upload-area">
                        <div style="font-size: 48px; color: #9ca3af; margin-bottom: 16px;">📷</div>
                        <p style="font-weight: 500; color: #374151; margin-bottom: 8px;" id="upload-text">
                            {{ $productDetails->image ? 'Change Product Image' : 'Upload Product Image' }}
                        </p>
                        <p style="color: #6b7280; font-size: 14px;">Click to browse or drag and drop</p>
                        <p style="color: #6b7280; font-size: 12px; margin-top: 8px;">Supported formats: JPG, PNG, GIF (Max: 5MB)</p>
                        <input type="file" name="image" id="image-input" class="form-input" accept="image/*" style="display: none;" onchange="previewImage(this)">
                    </div>

                    <div id="new-preview" style="display: none; margin-top: 16px;">
                        <p style="margin-bottom: 12px; font-weight: 500; color: #374151;">New Image Preview:</p>
                        <img id="preview-img" class="image-preview" style="border: 2px solid #10b981;">
                        <button type="button" onclick="removePreview()" style="margin-top: 8px; background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 12px; cursor: pointer;">Remove</button>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="{{ url('/admin/view-products') }}" class="btn btn-secondary">
                        ← Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        💾 Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="preview-modal" id="imagePreviewModal">
        <div class="preview-content">
            <div class="preview-header">
                <h3 class="preview-title">{{ $productDetails->product_name }} - Product Image</h3>
                <button class="preview-close" onclick="closeImagePreview()">&times;</button>
            </div>
            <div style="max-height: 70vh; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
                <img id="modalImage" class="preview-image" src="{{ url('images/backend_images/products/large/'.$productDetails->image) }}" alt="{{ $productDetails->product_name }}" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+PHRleHQgeD0iNTAlIiB5PSI0NSUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSI0OCIgZmlsbD0iIzljYTNhZiIgdGV4dC1hbmNob3I9Im1pZGRsZSI+8J+TtjwvdGV4dD48dGV4dCB4PSI1MCUiIHk9IjYwJSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE2IiBmaWxsPSIjOWNhM2FmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5JbWFnZSBub3QgZm91bmQ8L3RleHQ+PC9zdmc+';"
            </div>
            <div class="preview-actions">
                <div class="preview-info">
                    <span>📁 {{ $productDetails->image }}</span>
                    <span style="margin-left: 16px;">🏷️ {{ $productDetails->product_code }}</span>
                </div>
                <div class="preview-buttons">
                    <button onclick="downloadImage('{{ url('images/backend_images/products/large/'.$productDetails->image) }}', '{{ $productDetails->image }}')" class="btn-preview btn-download">
                        ⬇️ Download
                    </button>
                    <button class="btn-preview btn-change" onclick="closeImagePreview(); document.getElementById('image-input').click();">
                        🔄 Change Image
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Image Download Function
        function downloadImage(imageUrl, filename) {
            fetch(imageUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Image not found');
                    }
                    return response.blob();
                })
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                })
                .catch(error => {
                    alert('Error downloading image: ' + error.message);
                    console.error('Download error:', error);
                });
        }

        // Image Preview Modal Functions
        function openImagePreview() {
            const modal = document.getElementById('imagePreviewModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeImagePreview() {
            const modal = document.getElementById('imagePreviewModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('imagePreviewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImagePreview();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImagePreview();
            }
        });

        function previewImage(input) {
            const uploadDiv = document.getElementById('upload-area');
            const newPreview = document.getElementById('new-preview');
            const previewImg = document.getElementById('preview-img');
            const uploadText = document.getElementById('upload-text');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate file size (5MB max)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB');
                    input.value = '';
                    return;
                }
                
                // Validate file type
                if (!file.type.match('image.*')) {
                    alert('Please select a valid image file');
                    input.value = '';
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    newPreview.style.display = 'block';
                    uploadDiv.classList.add('has-image');
                    uploadText.textContent = 'Change Selected Image';
                }
                
                reader.readAsDataURL(file);
            }
        }

        function removePreview() {
            const input = document.getElementById('image-input');
            const newPreview = document.getElementById('new-preview');
            const uploadDiv = document.getElementById('upload-area');
            const uploadText = document.getElementById('upload-text');
            
            input.value = '';
            newPreview.style.display = 'none';
            uploadDiv.classList.remove('has-image');
            uploadText.textContent = '{{ $productDetails->image ? 'Change Product Image' : 'Upload Product Image' }}';
        }

        // Set current category selection
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.querySelector('select[name="category_id"]');
            const currentCategoryId = "{{ $productDetails->category_id }}";
            
            if (categorySelect && currentCategoryId) {
                categorySelect.value = currentCategoryId;
            }

            // Drag and drop functionality
            const uploadArea = document.getElementById('upload-area');
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                uploadArea.style.borderColor = '#667eea';
                uploadArea.style.backgroundColor = '#f0f4ff';
            }

            function unhighlight() {
                uploadArea.style.borderColor = '#d1d5db';
                uploadArea.style.backgroundColor = '#fafafa';
            }

            uploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    document.getElementById('image-input').files = files;
                    previewImage(document.getElementById('image-input'));
                }
            }
        });
    </script>
</x-admin.layout-simple>