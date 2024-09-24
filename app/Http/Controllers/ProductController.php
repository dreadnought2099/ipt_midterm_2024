<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::with('category')->get(); // Fetch all products with their categories
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $categories = Category::all(); // Get all categories for the select dropdown
        return view('products.create', compact('categories'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Create the product
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Show the form for editing a product
    public function edit(Product $product)
    {
        $categories = Category::all(); // Get all categories
        return view('products.edit', compact('product', 'categories'));
    }

    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Update the product
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from the database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
