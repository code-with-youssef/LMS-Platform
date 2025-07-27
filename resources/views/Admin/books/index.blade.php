@extends('Layouts.adminLayout')
@section('content')
    <div class="assignment-creator">
        <div class="books-header">
            <h2 class="section-title">📚 Library Collection</h2>
            @if ($role === 'admin')
                <a href="{{ route('adminBooks.create') }}" class="add-question-button">➕ Add New Book</a>
            @endif
        </div>

        @if ($books->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📖</div>
                <h3>No Books Available</h3>
                @if ($role === 'admin')
                    <p>Start building your library by adding your first book!</p>
                    <a href="{{ route('adminBooks.create') }}" class="save-assignment-button">
                        ➕ Add Your First Book
                    </a>
                @endif
            </div>
        @else
            <div class="books-stats">
                <div class="stat-item">
                    <span class="stat-number">{{ $books->count() }}</span>
                    <span class="stat-label">Total Books</span>
                </div>
            </div>

            <div class="books-grid">
                @foreach ($books as $book)
                    <div class="book-card">
                        <div class="book-cover">
                            <div class="book-icon">📕</div>
                        </div>

                        <div class="book-info">
                            <h4 class="book-title">{{ $book->name }}</h4>

                            <div class="book-meta">
                                <div class="meta-item">
                                    <span class="meta-icon">👤</span>
                                    <span class="meta-text">{{ $book->uploaded_by ?? 'Unknown' }}</span>
                                </div>

                                <div class="meta-item">
                                    <span class="meta-icon">📅</span>
                                    <span class="meta-text">{{ $book->created_at->format('M d, Y') }}</span>
                                </div>

                                <div class="meta-item">
                                    <span class="meta-icon">📄</span>
                                    <span class="meta-text">PDF Format</span>
                                </div>
                            </div>
                        </div>

                        <div class="book-actions">
                            <a href="{{ asset('storage/' . $book->path) }}" target="_blank"
                                class="action-button view-button">
                                <span class="button-icon">👁️</span>
                                View
                            </a>

                            <a href="{{ asset('storage/' . $book->path) }}" download class="action-button download-button">
                                <span class="button-icon">⬇️</span>
                                Download
                            </a>
                            @if ($role === 'admin')
                                <form method="POST" action="{{route('adminBooks.destroy',$book->id)}}" style="display: inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this book?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-button delete-button">
                                        <span class="button-icon">🗑️</span>
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: #f8f9fa;
            border-radius: 12px;
            margin: 2rem 0;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .books-stats {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .stat-item {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 120px;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .book-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .book-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .book-cover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            text-align: center;
        }

        .book-icon {
            font-size: 3rem;
            filter: brightness(1.2);
        }

        .book-info {
            padding: 1.5rem;
        }

        .book-title {
            margin: 0 0 1rem 0;
            color: #212529;
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .book-meta {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .meta-icon {
            width: 20px;
            text-align: center;
        }

        .meta-text {
            color: #6c757d;
        }

        .book-actions {
            padding: 1rem 1.5rem;
            background: #f8f9fa;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .view-button {
            background: #007bff;
            color: white;
        }

        .view-button:hover {
            background: #0056b3;
            color: white;
        }

        .download-button {
            background: #28a745;
            color: white;
        }

        .download-button:hover {
            background: #1e7e34;
            color: white;
        }

        .delete-button {
            background: #dc3545;
            color: white;
        }

        .delete-button:hover {
            background: #bd2130;
        }

        .button-icon {
            font-size: 0.8rem;
        }

        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .books-header {
                flex-direction: column;
                text-align: center;
            }

            .books-grid {
                grid-template-columns: 1fr;
            }

            .book-actions {
                flex-direction: column;
            }

            .action-button {
                justify-content: center;
            }
        }
    </style>
@endsection
