@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Edit Subcategory</h2>
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
            <form method="POST" action="{{ route('admin.subcategories.update', $subcategory->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @if($subcategory->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-gradient">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
