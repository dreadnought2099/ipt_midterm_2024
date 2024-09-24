@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>
    
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="products" class="form-label">Select Products</label>
            <select name="product_ids[]" id="products" class="form-control" multiple required>
                @foreach($products as $product)
                <option value="{{ $product->id }}" {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $product->name }} ({{ $product->price }})
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Order</button>
    </form>
</div>
@endsection
