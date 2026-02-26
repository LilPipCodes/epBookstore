@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="section-header">Popular Books</h1>
    <!-- Filter Chips -->
    <div class="filter-chips mb-3">
        <!-- Example chips -->
        <span class="chip">PDF</span>
        <span class="chip">ePub</span>
        <span class="chip">4★+</span>
        <span class="chip">Fiction</span>
    </div>
    <!-- Sorting Dropdown -->
    <div class="sort-dropdown mb-3">
        <select>
            <option>Popular</option>
            <option>Newest</option>
            <option>Rating</option>
            <option>A–Z</option>
        </select>
    </div>
    <!-- Book Grid -->
    <div class="row book-grid">
        @for ($i = 0; $i < 8; $i++)
            <div class="col-md-3 mb-4">
                @include('components.book-card')
            </div>
        @endfor
    </div>
    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
</div>
@endsection
