@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Edit Category</h2>
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
            <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" required>
                </div>
                <button type="submit" class="btn btn-gradient">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
