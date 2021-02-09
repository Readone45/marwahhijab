<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::paginate(15),
        ];

        return view('admin.product.index', $data);
    }

    public function create()
    {
        $data = [
            'action' => 'product.store',
            'method' => 'POST',
            'categories' => Category::get(),
        ];

        return view('admin.product.form', $data);
    }

    public function edit($id)
    {
        $data = [
            'action' => 'product.update',
            'method' => 'PUT',
            'categories' => Category::get(),
            'product' => Product::find($id),
        ];

        return view('admin.product.form', $data);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'slug' => 'string|required|max:255|unique:products,slug',
            'category_id' => 'numeric|required',
            'tags' => 'string|required|max:255',
            'color' => 'string|required|max:255',
            'size' => 'string|required|max:255',
            'weight' => 'numeric|required',
            'description' => 'string|required',
            'additional' => 'string|required',
            'meta_description' => 'string|required',
            'meta_keywords' => 'string|required',
        ]);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = $imagePath->getClientOriginalName();
            $extension = $imagePath->extension();
            $path      = $imagePath->storeAs('images/products', $imageName, 'public');
            if ($path) {
                $extension = $imagePath->extension();
                $new_name = $validated['slug'] . '-' . date('ymdhis') . '.' . $extension;
                Storage::disk('public')->move('images/products/' . $imageName, 'images/products/' . $new_name);
                $validated['photo'] = 'products/' . $new_name;
            } else {
                dd('gagal');
            }
        }

        $product = Product::create($validated);

        return redirect(route('product.index'))->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'slug' => 'string|required|max:255',
            'category_id' => 'numeric|required',
            'tags' => 'string|required|max:255',
            'color' => 'string|required|max:255',
            'size' => 'string|required|max:255',
            'weight' => 'numeric|required',
            'description' => 'string|required',
            'additional' => 'string|required',
            'meta_description' => 'string|required',
            'meta_keywords' => 'string|required',
        ]);

        $product = Product::find($request->id);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = $imagePath->getClientOriginalName();
            $extension = $imagePath->extension();
            $path      = $imagePath->storeAs('images/products', $imageName, 'public');
            if ($path) {
                $this->destroyFile($product->photo);
                $extension = $imagePath->extension();
                $new_name = $validated['slug'] . '-' . date('ymdhis') . '.' . $extension;
                Storage::disk('public')->move('images/products/' . $imageName, 'images/products/' . $new_name);
                $validated['photo'] = 'products/' . $new_name;
            }
        }

        $product->update($validated);

        return redirect(route('product.index'))->with('success', 'Data berhasil diupdate');
    }

    public function photo(Request $request, $id)
    {
        $data = [
            'products' => Product::paginate(15),
        ];

        return view('admin.product.photo', $data);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $this->destroyFile($product->photo);

            foreach ($product->productImages as $image) {
                $this->destroyFile($image->photo);
            }

            ProductImage::where('product_id', $product->id)->delete();

            $product->delete();
        }

        return redirect(route('product.index'))->with('success', 'Data telah dihapus');
    }

    public function destroyFile($nameFile)
    {
        Storage::disk('public')->delete('images/' . $nameFile);
    }
}
