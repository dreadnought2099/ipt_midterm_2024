<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of orders
    public function index()
    {
        $orders = Order::with('products')->get(); // Fetch all orders with their associated products
        return view('orders.index', compact('orders'));
    }

    // Show the form for creating a new order
    public function create()
    {
        $products = Product::all(); // Get all products for multi-select
        return view('orders.create', compact('products'));
    }

    // Store a newly created order in the database
    public function store(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id' // Each product must exist in the products table
        ]);

        // Create a new order
        $order = Order::create();

        // Attach the selected products to the order using the pivot table
        $order->products()->sync($request->product_ids);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show the form for editing an order
    public function edit(Order $order)
    {
        $products = Product::all(); // Get all products
        return view('orders.edit', compact('order', 'products'));
    }

    // Update the specified order in the database
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id'
        ]);

        // Update the order's products
        $order->products()->sync($request->product_ids);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Remove the specified order from the database
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
