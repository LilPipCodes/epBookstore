@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Order #{{ $order->id }}</h2>
    <div class="card mb-3">
        <div class="card-body">
            <strong>User:</strong> {{ $order->user->name ?? '' }}<br>
            <strong>Email:</strong> {{ $order->user->email ?? '' }}<br>
            <strong>Total:</strong> {{ $order->total == 0 ? 'Free' : '$' . number_format($order->total,2) }}<br>
            <strong>Status:</strong> {{ ucfirst($order->status) }}<br>
            <strong>Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}<br>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Order Items</h5>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->book->title ?? '' }}</td>
                            <td>{{ $item->price == 0 ? 'Free' : '$' . number_format($item->price,2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
