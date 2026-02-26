@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Categories Management</h2>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient mb-3">Add Category</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Books</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->books()->count() }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-gradient">Edit</a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $cat->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No categories found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $categories->links() }}</div>
        </div>
    </div>
</div>
@endsection
