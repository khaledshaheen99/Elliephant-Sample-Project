<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'shipping_cost' => 'required|numeric',
            'product_status' => 'in:available,out_of_stock',
        ]);

        $featureImage = $request->file('feature_image');
        $galleryImage = $request->file('gallery_image');

        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'shipping_cost' => $request->input('shipping_cost'),
            'product_status' => $request->input('product_status'),
        ]);

        if ($featureImage) {
            $featureImageName = time() . '_' . $featureImage->getClientOriginalName();
            $featureImage->move(public_path('images'), $featureImageName);
            $product->feature_image = 'images/' . $featureImageName;
        }

        if ($galleryImage) {
            $galleryImageName = time() . '_' . $galleryImage->getClientOriginalName();
            $galleryImage->move(public_path('images'), $galleryImageName);
            $product->gallery_image = 'images/' . $galleryImageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'shipping_cost' => 'numeric',
            'product_status' => 'in:available,out_of_stock',
        ]);

        $product = Product::findOrFail($id);

        $featureImage = $request->file('feature_image');
        $galleryImage = $request->file('gallery_image');

        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'shipping_cost' => $request->input('shipping_cost'),
            'product_status' => $request->input('product_status'),
        ]);

        if ($featureImage) {
            $featureImageName = time() . '_' . $featureImage->getClientOriginalName();
            $featureImage->move(public_path('images'), $featureImageName);
            $product->feature_image = 'images/' . $featureImageName;
            $product->save();
        }

        if ($galleryImage) {
            $galleryImageName = time() . '_' . $galleryImage->getClientOriginalName();
            $galleryImage->move(public_path('images'), $galleryImageName);
            $product->gallery_image = 'images/' . $galleryImageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product removed successfully');
    }

    public function generatePdf($id)
    {
        $product = Product::findOrFail($id);
    
        $pdf = app('dompdf.wrapper');
        
        $view = View::make('products.pdf', compact('product'));
        $pdf->loadHtml($view->render());
    
        return $pdf->download('product_' . $product->id . '.pdf');
    }
}
