@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h1 class="section-header">My Library</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        @forelse($books as $book)
            <div class="col-md-3 mb-4">
                @include('components.book-card', ['book' => $book])
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary">No books in your library yet.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
