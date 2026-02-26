@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Books Management</h2>
    <a href="{{ route('admin.books.create') }}" class="btn btn-gradient mb-3">Add Book</a>
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name ?? '' }}</td>
                            <td>{{ $book->price == 0 ? 'Free' : '$' . number_format($book->price,2) }}</td>
                            <td>
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-gradient">Edit</a>
                                <form method="POST" action="{{ route('admin.books.destroy', $book->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this book?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No books found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $books->links() }}</div>
        </div>
    </div>
</div>
@endsection
