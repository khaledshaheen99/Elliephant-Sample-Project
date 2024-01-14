<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} PDF</title>
</head>
<body>
    <h2>{{ $product->name }} PDF</h2>

    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>

    @if ($product->feature_image)
        <p><strong>Feature Image:</strong></p>
        <img src="{{ public_path($product->feature_image) }}" alt="{{ $product->name }} Feature Image" style="max-width: 100%;">
    @endif

    @if ($product->gallery_image)
        <p><strong>Gallery Image:</strong></p>
        <img src="{{ public_path($product->gallery_image) }}" alt="{{ $product->name }} Gallery Image" style="max-width: 100%;">
    @endif

    <p><strong>Shipping Cost:</strong> {{ $product->shipping_cost }}</p>
    <p><strong>Product Status:</strong> {{ $product->product_status }}</p>
</body>
</html>
