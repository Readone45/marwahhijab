<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function index()
    {
        return view('admin.product.photo');
    }

    public function show($id)
    {
        $data = [
            'product' => Product::find($id),
        ];
        return view('admin.product.photo', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'image|mimes:png,jpg,svg,webp',
            'product_id' => 'required|numeric',
        ]);

        $product = Product::find($request->product_id);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = $imagePath->getClientOriginalName();
            $extension = $imagePath->extension();
            $path      = $imagePath->storeAs('images/product-images', $imageName, 'public');
            if ($path) {
                $extension = $imagePath->extension();
                $new_name = $product->slug . '-' . date('ymdhis') . '.' . $extension;
                Storage::disk('public')->move('images/product-images/' . $imageName, 'images/product-images/' . $new_name);
                $validated['photo'] = 'product-images/' . $new_name;
            }
        }

        $product = ProductImage::create($validated);

        return redirect(route('product-images.show', $product->product_id))->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $productImage = ProductImage::find($id);
        if ($productImage) {
            $this->destroyFile($productImage->photo);
            $productImage->delete();
            return redirect(route('product-images.show', $productImage->product_id))->with('success', 'Data telah dihapus');
        }
    }

    public function destroyFile($nameFile)
    {
        Storage::disk('public')->delete('images/' . $nameFile);
    }
}
