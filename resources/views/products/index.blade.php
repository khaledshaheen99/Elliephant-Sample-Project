@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Products</h2>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Price</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                    <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                        </form>
                        <a href="{{ route('products.pdf', $product->id) }}" class="text-green-500 hover:underline ml-2">Generate PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-full">Add Product</a>
@endsection
