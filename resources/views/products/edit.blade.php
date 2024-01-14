@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
        <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name', $product->name) }}" required>

        <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
        <input type="number" name="price" id="price" class="mt-1 p-2 border rounded-md w-full" value="{{ old('price', $product->price) }}" required>

        <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
        <textarea name="description" id="description" rows="3" class="mt-1 p-2 border rounded-md w-full" required>{{ old('description', $product->description) }}</textarea>

        <label for="feature_image" class="block text-sm font-medium text-gray-700">Feature Image:</label>
        <input type="file" name="feature_image" id="feature_image" class="mt-1 p-2 border rounded-md w-full">

        <label for="gallery_image" class="block text-sm font-medium text-gray-700">Gallery Image:</label>
        <input type="file" name="gallery_image" id="gallery_image" class="mt-1 p-2 border rounded-md w-full">

        <label for="shipping_cost" class="block text-sm font-medium text-gray-700">Shipping Cost:</label>
        <input type="number" name="shipping_cost" id="shipping_cost" class="mt-1 p-2 border rounded-md w-full" value="{{ old('shipping_cost', $product->shipping_cost) }}">

        <label for="product_status" class="block text-sm font-medium text-gray-700">Product Status:</label>
        <select name="product_status" id="product_status" class="mt-1 p-2 border rounded-md w-full">
            <option value="available" {{ old('product_status', $product->product_status) === 'available' ? 'selected' : '' }}>Available</option>
            <option value="out_of_stock" {{ old('product_status', $product->product_status) === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>

        <button type="submit" style="background-color: #FF0054; color: white;" class="mt-4 px-4 py-2 rounded-full hover:bg-#FF003D focus:outline-none focus:border-#FF0072 focus:ring focus:ring-#FF0072">Update Product</button>
    </form>
@endsection
