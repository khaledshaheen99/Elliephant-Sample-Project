@extends('layouts.app')

@section('content')
    <h2>Add Product</h2>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="price">Price:</label>
        <input type="number" name="price" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>


        <button type="submit">Add Product</button>
    </form>
@endsection
