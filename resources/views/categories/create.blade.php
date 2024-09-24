@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->
        
        <!-- Category Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Category Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Category</button>
    </form>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
