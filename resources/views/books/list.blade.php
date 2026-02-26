@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="section-header">All Books</h1>
    <!-- ...similar to index, with filters, sorting, grid, pagination... -->
    @include('books.partials.filters')
    @include('books.partials.grid')
    @include('books.partials.pagination')
</div>
@endsection
