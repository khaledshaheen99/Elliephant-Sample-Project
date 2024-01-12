@extends('layouts.app')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('put')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>

        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ $product->price }}" required>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $product->description }}</textarea>

        <button type="submit">Update Product</button>
    </form>
@endsection
