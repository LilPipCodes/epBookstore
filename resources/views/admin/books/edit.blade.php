@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Edit Book</h2>
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.books.update', $book->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $book->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" value="{{ $book->author }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @if($book->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subcategory</label>
                    <select class="form-control" name="subcategory_id">
                        <option value="">None</option>
                        @foreach($subcategories as $sub)
                            <option value="{{ $sub->id }}" @if($book->subcategory_id == $sub->id) selected @endif>{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover URL</label>
                    <input type="url" class="form-control" name="cover_url" value="{{ $book->cover_url }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Format</label>
                    <select class="form-control" name="format" required>
                        <option value="PDF" @if($book->format == 'PDF') selected @endif>PDF</option>
                        <option value="EPUB" @if($book->format == 'EPUB') selected @endif>EPUB</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" min="0" step="0.01" value="{{ $book->price }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number" class="form-control" name="year" value="{{ $book->year }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" min="0" max="5" step="0.1" value="{{ $book->rating }}">
                </div>
                <button type="submit" class="btn btn-gradient">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
