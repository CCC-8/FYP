<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function displayProducts()
    {
        $loggedInUserId = session('loggedInUser')->id;

        $products = Product::where('user_id', $loggedInUserId)->get();

        return view('Dealer/DealerIndex', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string|in:Vehicle,Tyre,Others',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'condition' => 'required|string|in:Good,Defected',
            'status' => 'required|string|in:Available,Reserved,Received,Returned',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->user_id = session('loggedInUser')->id;
        $product->name = $validatedData['name'];
        $product->type = $validatedData['type'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->condition = $validatedData['condition'];
        $product->status = $validatedData['status'];

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect('/DealerIndex')->with('success', 'Product added successfully');
    }

    public function editProductDetails($id)
    {
        $product = Product::find($id);
        return view('Dealer/EditProductDetails', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string|in:Vehicle,Tyre,Others',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'condition' => 'required|string|in:Good,Defected',
            'status' => 'required|string|in:Available,Reserved,Received,Returned',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->name = $validatedData['name'];
        $product->type = $validatedData['type'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->condition = $validatedData['condition'];
        $product->status = $validatedData['status'];

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect('/DealerIndex')->with('success', 'Product updated successfully');
    }

    public function showProducts($dealerId)
    {
        $dealer = User::find($dealerId);

        if (!$dealer) {
            return redirect()->back()->with('error', 'Dealer not found.');
        }

        $products = Product::where('user_id', $dealer->id)->get();

        return view('Organizer/ProductManagement', compact('products', 'dealer'));
    }
}
