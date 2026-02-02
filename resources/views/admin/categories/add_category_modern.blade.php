<x-admin.layout-simple title="Add Category">
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
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
        }
        .checkbox {
            width: 16px;
            height: 16px;
            border: 1px solid #D1D5DB;
            border-radius: 4px;
            cursor: pointer;
        }
        .checkbox:checked {
            background: #3B82F6;
            border-color: #3B82F6;
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
        <a href="{{ url('/admin/view-categories') }}" class="breadcrumb-item">Categories</a>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-item active">Add Category</span>
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
        <form method="post" action="{{ url('/admin/add-category') }}">
            @csrf
            
            <!-- Category Information Section -->
            <div class="form-section">
                <h2 class="section-title">Category Information</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Category Name *</label>
                        <input type="text" name="category_name" class="form-input" placeholder="Enter category name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Parent Category</label>
                        <select name="parent_id" class="form-select">
                            <option value="0">Main Category</option>
                            @foreach($levels ?? [] as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Category Description</label>
                    <textarea name="description" class="form-textarea" placeholder="Enter category description..."></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Category URL (Slug)</label>
                    <input type="text" name="url" class="form-input" placeholder="category-url-slug">
                    <p style="color: #6B7280; margin: 8px 0 0 0; font-size: 12px;">URL-friendly version of the category name. Leave empty to auto-generate.</p>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" name="status" value="1" class="checkbox" checked>
                    <label class="form-label" style="margin: 0;">Active Category</label>
                </div>
            </div>

            <!-- SEO Section -->
            <div class="form-section">
                <h2 class="section-title">SEO Settings (Optional)</h2>
                
                <div class="form-group">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-input" placeholder="Enter meta title for SEO">
                    <p style="color: #6B7280; margin: 8px 0 0 0; font-size: 12px;">Recommended length: 50-60 characters</p>
                </div>

                <div class="form-group">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-textarea" placeholder="Enter meta description for SEO" style="min-height: 80px;"></textarea>
                    <p style="color: #6B7280; margin: 8px 0 0 0; font-size: 12px;">Recommended length: 150-160 characters</p>
                </div>

                <div class="form-group">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-input" placeholder="keyword1, keyword2, keyword3">
                    <p style="color: #6B7280; margin: 8px 0 0 0; font-size: 12px;">Separate keywords with commas</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 16px; justify-content: flex-end; margin-top: 32px;">
                <a href="{{ url('/admin/view-categories') }}" class="btn btn-secondary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 8px;">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 8px;">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Add Category
                </button>
            </div>
        </form>
    </div>

    <script>
        // Auto-generate URL slug from category name
        document.querySelector('input[name="category_name"]').addEventListener('input', function(e) {
            const name = e.target.value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            
            document.querySelector('input[name="url"]').value = slug;
        });
    </script>
</x-admin.layout-simple>