@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h1 class="section-header">{{ $category->name }}</h1>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card bg-dark text-white">
                <div class="card-header">Filter Books</div>
                <div class="card-body">
                    <form method="GET" action="">
                        <div class="mb-2">
                            <label class="form-label">Subcategory</label>
                            <select name="subcategory" class="form-select">
                                <option value="">All</option>
                                @foreach ($subcategories as $sub)
                                    <option value="{{ $sub->id }}" @if(request('subcategory') == $sub->id) selected @endif>{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-select">
                                <option value="">All</option>
                                <option value="4">4★ & above</option>
                                <option value="3">3★ & above</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Format</label>
                            <select name="format" class="form-select">
                                <option value="">All</option>
                                <option value="PDF">PDF</option>
                                <option value="EPUB">EPUB</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Price</label>
                            <select name="price" class="form-select">
                                <option value="">All</option>
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ request('author') }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="{{ request('year') }}">
                        </div>
                        <button type="submit" class="btn btn-gradient w-100">Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($books as $book)
                    <div class="col-md-4 mb-4">
                        @include('components.book-card', ['book' => $book])
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning">No books found for this filter.</div>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
