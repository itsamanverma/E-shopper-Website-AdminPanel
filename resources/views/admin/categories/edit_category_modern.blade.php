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

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 14px;
            color: #374151;
            cursor: pointer;
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

        .url-preview {
            margin-top: 8px;
            padding: 8px 12px;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 12px;
            color: #6b7280;
            font-family: monospace;
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
            <a href="{{ url('/admin/view-categories') }}" class="breadcrumb-link">Categories</a>
            <span class="breadcrumb-separator">→</span>
            <span class="breadcrumb-current">Edit Category</span>
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
            <h1 class="edit-title">Edit Category</h1>
            <p class="edit-subtitle">Update category information and settings</p>
        </div>

        <div class="edit-content">
            <form method="post" action="{{ url('/admin/edit-category/'.$categoryDetails->id) }}">
                {{ csrf_field() }}

                <!-- Basic Information -->
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">📂</div>
                        Category Information
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label required">Category Name</label>
                            <input type="text" name="category_name" class="form-input" value="{{ $categoryDetails->name }}" placeholder="Enter category name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Parent Category</label>
                            <select name="parent_id" class="form-select">
                                <option value="0">Main Category</option>
                                @foreach($levels ?? [] as $level)
                                    <option value="{{ $level->id }}" {{ $level->id == $categoryDetails->parent_id ? 'selected' : '' }}>
                                        {{ $level->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Category Description</label>
                            <textarea name="description" class="form-textarea" placeholder="Enter category description...">{{ $categoryDetails->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">URL Slug</label>
                            <input type="text" name="url" class="form-input" value="{{ $categoryDetails->url }}" placeholder="category-url-slug">
                            <div class="url-preview">
                                URL: /category/<span id="url-preview">{{ $categoryDetails->url }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="checkbox-group">
                                <input type="checkbox" name="status" value="1" class="checkbox" {{ $categoryDetails->status == 1 ? 'checked' : '' }}>
                                <label class="checkbox-label">Active (visible to customers)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">🔍</div>
                        SEO Settings
                    </div>

                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-input" value="{{ $categoryDetails->meta_title ?? '' }}" placeholder="Enter meta title for SEO">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-textarea" placeholder="Enter meta description for SEO" style="min-height: 80px;">{{ $categoryDetails->meta_description ?? '' }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-input" value="{{ $categoryDetails->meta_keywords ?? '' }}" placeholder="keyword1, keyword2, keyword3">
                        </div>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="{{ url('/admin/view-categories') }}" class="btn btn-secondary">
                        ← Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        💾 Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-generate URL slug from category name
        document.querySelector('input[name="category_name"]').addEventListener('input', function(e) {
            const name = e.target.value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            
            document.querySelector('input[name="url"]').value = slug;
            document.getElementById('url-preview').textContent = slug;
        });

        // Update URL preview when URL field changes
        document.querySelector('input[name="url"]').addEventListener('input', function(e) {
            document.getElementById('url-preview').textContent = e.target.value;
        });
    </script>
</x-admin.layout-simple>