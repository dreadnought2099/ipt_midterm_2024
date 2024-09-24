@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Order</h1>
    
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="products" class="form-label">Select Products</label>
            <select name="product_ids[]" id="products" class="form-control" multiple required>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Order</button>
    </form>
</div>
@endsection
