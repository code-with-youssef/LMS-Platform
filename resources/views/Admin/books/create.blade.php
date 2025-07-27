@extends('Layouts.adminLayout')
@section('content')
    <div class="assignment-creator">
        <div class="books-header">
            <h2 class="section-title">📚 Add New Book</h2>
            <form method="GET" action="#" style="display: inline;">
                @csrf
                <button class="home-button" type="submit">
                    <span class="home-icon">🔙</span>
                    Back to Books
                </button>
            </form>
        </div>

        <form action="{{route('adminBooks.store')}}" method="POST" enctype="multipart/form-data" id="bookForm">
            @csrf

            <div class="form-section">
                <label for="title" class="form-label">📖 Book Title</label>
                <div class="assignment-inputs">
                    <input type="text" 
                           name="name" 
                           id="title" 
                           placeholder="Enter book title" 
                           value="{{ old('names') }}"
                           required>
                </div>
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-section">
                <label for="pdf_file" class="form-label">📄 PDF File</label>
                <div class="file-upload-area" id="fileUploadArea">
                    <div class="file-upload-content">
                        <div class="file-upload-icon">📎</div>
                        <div class="file-upload-text">
                            <strong>Click to upload</strong> or drag and drop your PDF file here
                        </div>
                        <div class="file-upload-info">Maximum file size: 50MB</div>
                    </div>
                    <input type="file" 
                           name="pdf_file" 
                           id="pdf_file" 
                           accept=".pdf"
                           required
                           style="display: none;">
                </div>
                <div id="fileInfo" class="file-info hidden"></div>
                @error('pdf_file')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div id="buttons-area">
                <button type="submit" class="save-assignment-button" id="submitBtn">
                    💾 Upload Book
                </button>
            </div>
        </form>
    </div>

    <style>
        .books-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #212529;
            font-size: 1.1rem;
        }

        .assignment-inputs textarea {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        .assignment-inputs select {
            background: white;
            cursor: pointer;
        }

        .file-upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-area:hover {
            border-color: #007bff;
            background: #e3f2fd;
        }

        .file-upload-area.dragover {
            border-color: #007bff;
            background: #e3f2fd;
            transform: scale(1.02);
        }

        .file-upload-content {
            pointer-events: none;
        }

        .file-upload-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .file-upload-text {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .file-upload-info {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .file-info {
            margin-top: 1rem;
            padding: 1rem;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            color: #155724;
        }

        .file-info.hidden {
            display: none;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            padding: 0.5rem;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }

        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading .save-assignment-button {
            background: #6c757d;
        }

        @media (max-width: 768px) {
            .books-header {
                flex-direction: column;
                text-align: center;
            }

            .file-upload-area {
                padding: 1.5rem 1rem;
            }

            .file-upload-icon {
                font-size: 2rem;
            }
        }
    </style>

    <script>
        // File upload handling
        const fileUploadArea = document.getElementById('fileUploadArea');
        const fileInput = document.getElementById('pdf_file');
        const fileInfo = document.getElementById('fileInfo');
        const form = document.getElementById('bookForm');
        const submitBtn = document.getElementById('submitBtn');

        // Click to upload
        fileUploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Drag and drop
        fileUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUploadArea.classList.add('dragover');
        });

        fileUploadArea.addEventListener('dragleave', () => {
            fileUploadArea.classList.remove('dragover');
        });

        fileUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUploadArea.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                handleFileSelect();
            }
        });

        // File selection
        fileInput.addEventListener('change', handleFileSelect);

        function handleFileSelect() {
            const file = fileInput.files[0];
            if (file) {
                if (file.type !== 'application/pdf') {
                    alert('Please select a PDF file.');
                    fileInput.value = '';
                    return;
                }

                if (file.size > 50 * 1024 * 1024) { // 50MB
                    alert('File size must be less than 50MB.');
                    fileInput.value = '';
                    return;
                }

                fileInfo.innerHTML = `
                    <strong>📄 ${file.name}</strong><br>
                    Size: ${(file.size / 1024 / 1024).toFixed(2)} MB<br>
                    Type: PDF Document
                `;
                fileInfo.classList.remove('hidden');
            }
        }

        // Form submission
        form.addEventListener('submit', function() {
            form.classList.add('loading');
            submitBtn.innerHTML = '⏳ Uploading...';
            submitBtn.disabled = true;
        });

        // Auto-generate title from filename if empty
        fileInput.addEventListener('change', function() {
            const titleInput = document.getElementById('title');
            if (!titleInput.value && fileInput.files[0]) {
                const filename = fileInput.files[0].name;
                const title = filename.replace('.pdf', '').replace(/[-_]/g, ' ');
                titleInput.value = title;
            }
        });
    </script>
@endsection