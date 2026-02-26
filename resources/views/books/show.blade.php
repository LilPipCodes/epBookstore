@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $book->cover_url ?? '/images/book-cover-placeholder.png' }}" class="img-fluid" alt="Book Cover">
        </div>
        <div class="col-md-8">
            <h2>{{ $book->title }}</h2>
            <h4>by {{ $book->author }}</h4>
            <div class="star-rating mb-2">
                @for ($i = 1; $i <= 5; $i++)
                    <span style="color:#FF9800">{!! $i <= ($book->rating ?? 4) ? '★' : '☆' !!}</span>
                @endfor
            </div>
            <p>{{ $book->description ?? 'No description.' }}</p>
            <div class="mb-3">
                <span class="badge bg-secondary">{{ $book->format }}</span>
                <span class="badge bg-info">{{ $book->category->name ?? '' }}</span>
                <span class="badge bg-info">{{ $book->subcategory->name ?? '' }}</span>
                <span class="badge bg-success">{{ $book->price == 0 ? 'Free' : ('$' . number_format($book->price,2)) }}</span>
            </div>
            <form method="POST" action="{{ route('cart.add', $book->id) }}">
                @csrf
                <button type="submit" class="btn btn-dark btn-gradient">
                    {{ $book->price == 0 ? 'Add to Library' : 'Add to Cart' }}
                </button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h4>Reviews</h4>
            @forelse ($reviews as $review)
                <div class="card mb-2 bg-dark text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $review->user->name ?? 'User' }}</strong>
                                <span class="ms-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span style="color:#FF9800">{!! $i <= $review->rating ? '★' : '☆' !!}</span>
                                    @endfor
                                </span>
                            </div>
                            <small>{{ $review->created_at->diffForHumans() }}</small>
                        </div>
                        <div>{{ $review->comment }}</div>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary">No reviews yet.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
