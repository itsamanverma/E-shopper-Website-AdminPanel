<x-admin.layout-simple title="Add Product">
    <style>
        .form-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 32px;
            margin-bottom: 24px;
        }
        .form-section {
            margin-bottom: 32px;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1F2937;
            margin: 0 0 16px 0;
            padding-bottom: 8px;
            border-bottom: 2px solid #E5E7EB;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
            font-size: 14px;
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
            background: white;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
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
        }
        .btn-secondary {
            background: #F3F4F6;
            color: #374151;
        }
        .btn-secondary:hover {
            background: #E5E7EB;
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
        .file-upload {
            border: 2px dashed #D1D5DB;
            border-radius: 8px;
            padding: 32px;
            text-align: center;
            transition: all 0.2s;
        }
        .file-upload:hover {
            border-color: #3B82F6;
            background: #F8FAFC;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-item">Dashboard</a>
        <span class="breadcrumb-separator">/</span>
        <a href="{{ url('/admin/view-products') }}" class="breadcrumb-item">Products</a>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-item active">Add Product</span>
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

    <!-- Form Container -->
    <div class="form-container">
        <form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-product') }}">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="form-section">
                <h2 class="section-title">Basic Information</h2>
                
                <div class="form-group">
                    <label class="form-label">Product Category *</label>
                    <select name="category_id" class="form-select" required>
                        {!! $categories_dropdown !!}
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Product Name *</label>
                        <input type="text" name="product_name" class="form-input" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Product Code *</label>
                        <input type="text" name="product_code" class="form-input" placeholder="e.g. PRD001" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Product Color</label>
                        <input type="text" name="product_color" class="form-input" placeholder="Enter product color">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Price *</label>
                        <input type="number" step="0.01" name="price" class="form-input" placeholder="0.00" required>
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="form-section">
                <h2 class="section-title">Product Details</h2>
                
                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <textarea name="description" class="form-textarea" placeholder="Enter detailed product description..."></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Care Instructions</label>
                    <textarea name="care" class="form-textarea" placeholder="Enter care instructions..."></textarea>
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="form-section">
                <h2 class="section-title">Product Image</h2>
                
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <div class="file-upload">
                        <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 16px; color: #9CA3AF;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <input type="file" name="image" class="form-input" accept="image/*" style="border: none; text-align: center;">
                        <p style="color: #6B7280; margin: 8px 0 0 0; font-size: 14px;">Upload product image (JPG, PNG, GIF)</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 16px; justify-content: flex-end; margin-top: 32px;">
                <a href="{{ url('/admin/view-products') }}" class="btn btn-secondary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 8px;">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 8px;">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Add Product
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const uploadArea = document.getElementById('upload-area');
            const previewContainer = document.getElementById('preview-container');
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
                    previewContainer.style.display = 'block';
                    uploadText.textContent = 'Click to change image';
                    uploadArea.style.borderColor = '#10b981';
                    uploadArea.style.backgroundColor = '#f0fdf4';
                }
                
                reader.readAsDataURL(file);
            }
        }

        function removePreview() {
            const input = document.getElementById('image-input');
            const previewContainer = document.getElementById('preview-container');
            const uploadArea = document.getElementById('upload-area');
            const uploadText = document.getElementById('upload-text');
            
            input.value = '';
            previewContainer.style.display = 'none';
            uploadText.textContent = 'Click to Upload Product Image';
            uploadArea.style.borderColor = '#E5E7EB';
            uploadArea.style.backgroundColor = 'transparent';
        }

        // Drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
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
                uploadArea.style.borderColor = '#E5E7EB';
                uploadArea.style.backgroundColor = 'transparent';
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