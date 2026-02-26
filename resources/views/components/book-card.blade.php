<div class="card book-card shadow-sm">
    <img src="{{ $book->cover_url ?? '/images/book-cover-placeholder.png' }}" class="card-img-top" alt="Book Cover">
    <div class="card-body">
        <h5 class="card-title">{{ $book->title ?? 'Book Title' }}</h5>
        <p class="card-author">by {{ $book->author ?? 'Author Name' }}</p>
        <div class="star-rating mb-2">
            @php $rating = $book->rating ?? 4; @endphp
            @for ($i = 1; $i <= 5; $i++)
                <span style="color:#FF9800">{!! $i <= $rating ? '★' : '☆' !!}</span>
            @endfor
        </div>
        <a href="{{ route('books.show', $book->id ?? 0) }}" class="btn btn-dark btn-gradient w-100">Download / Read</a>
    </div>
</div>
