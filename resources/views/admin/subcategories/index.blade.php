@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Subcategories Management</h2>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.subcategories.create') }}" class="btn btn-gradient mb-3">Add Subcategory</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcategories as $sub)
                        <tr>
                            <td>{{ $sub->name }}</td>
                            <td>{{ $sub->category->name ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.subcategories.edit', $sub->id) }}" class="btn btn-sm btn-gradient">Edit</a>
                                <form method="POST" action="{{ route('admin.subcategories.destroy', $sub->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subcategory?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No subcategories found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $subcategories->links() }}</div>
        </div>
    </div>
</div>
@endsection
