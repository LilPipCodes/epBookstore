@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h1 class="section-header">Checkout</h1>
    @if(count($cart) && count($books))
        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($books as $book)
                        @php $total += $book->price; @endphp
                        <tr>
                            <td><img src="{{ $book->cover_url ?? '/images/book-cover-placeholder.png' }}" width="50"></td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->price == 0 ? 'Free' : '$' . number_format($book->price,2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total: {{ $total == 0 ? 'Free' : '$' . number_format($total,2) }}</h4>
            <div class="mb-3">
                <label class="form-label">Billing Name</label>
                <input type="text" class="form-control" name="billing_name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Billing Email</label>
                <input type="email" class="form-control" name="billing_email" value="{{ auth()->user()->email }}" required>
            </div>
            <!-- Payment method placeholder -->
            <div class="mb-3">
                <label class="form-label">Payment Method</label>
                <select class="form-select" name="payment_method" required>
                    <option value="card">Credit/Debit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="gcash">GCash</option>
                </select>
            </div>
            <button type="submit" class="btn btn-gradient w-100">Place Order</button>
        </form>
    @else
        <div class="alert alert-secondary">Your cart is empty.</div>
    @endif
</div>
@endsection
