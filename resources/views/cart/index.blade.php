@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h1 class="section-header">My Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(count($cart) && count($books))
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($books as $book)
                    @php $subtotal = $book->price; $total += $subtotal; @endphp
                    <tr>
                        <td><img src="{{ $book->cover_url ?? '/images/book-cover-placeholder.png' }}" width="50"></td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->price == 0 ? 'Free' : '$' . number_format($book->price,2) }}</td>
                        <td>{{ $book->price == 0 ? 'Free' : '$' . number_format($subtotal,2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $book->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <h4>Total: {{ $total == 0 ? 'Free' : '$' . number_format($total,2) }}</h4>
            <form method="POST" action="{{ route('cart.clear') }}">
                @csrf
                <button type="submit" class="btn btn-warning">Clear Cart</button>
            </form>
        </div>
        <div class="mt-4">
            <a href="#" class="btn btn-gradient w-100">Proceed to Checkout</a>
        </div>
    @else
        <div class="alert alert-secondary">Your cart is empty.</div>
    @endif
</div>
@endsection
