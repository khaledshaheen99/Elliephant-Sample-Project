@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Products</h2>
        <a href="{{ route('products.create') }}" style="background-color: #FF0054; color: white;" class="px-4 py-2 rounded-full hover:bg-#FF003D focus:outline-none focus:border-#FF0072 focus:ring focus:ring-#FF0072">Add Product</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Feature Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gallery Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping Cost</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap"><img src="{{ asset($product->feature_image) }}" alt="Feature Image" class="h-12"></td>
                    <td class="px-6 py-4 whitespace-nowrap"><img src="{{ asset($product->gallery_image) }}" alt="Gallery Image" class="h-12"></td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->shipping_cost }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post" class="inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                        <a href="{{ route('products.pdf', $product->id) }}" class="text-green-500 hover:underline">Generate PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
