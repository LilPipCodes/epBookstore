@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Add Book</h2>
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
            <form method="POST" action="{{ route('admin.books.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subcategory</label>
                    <select class="form-control" name="subcategory_id">
                        <option value="">None</option>
                        @foreach($subcategories as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover URL</label>
                    <input type="url" class="form-control" name="cover_url">
                </div>
                <div class="mb-3">
                    <label class="form-label">Format</label>
                    <select class="form-control" name="format" required>
                        <option value="PDF">PDF</option>
                        <option value="EPUB">EPUB</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" min="0" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number" class="form-control" name="year">
                </div>
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" min="0" max="5" step="0.1">
                </div>
                <button type="submit" class="btn btn-gradient">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
