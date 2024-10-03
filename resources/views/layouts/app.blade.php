<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand" href="{{ url('/') }}">My App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>

            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
