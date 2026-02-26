@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h1 class="section-header">Browse Categories</h1>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3 mb-4">
                <a href="{{ route('categories.show', $category->slug) }}" class="text-decoration-none">
                    <div class="card text-center bg-dark text-white h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-2" style="font-size:2rem;">
                                <i class="bi bi-book"></i>
                            </div>
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
