@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h2>Orders Management</h2>
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? '' }}</td>
                            <td>{{ $order->total == 0 ? 'Free' : '$' . number_format($order->total,2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-gradient">View</a>
                                <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this order?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No orders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $orders->links() }}</div>
        </div>
    </div>
</div>
@endsection
