@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Products</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    @foreach($order->products as $product)
                        {{ $product->name }} ({{ $product->price }})<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
