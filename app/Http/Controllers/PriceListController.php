<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\Product;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function show($id)
    {
        $data = [
            'product' => Product::find($id),
        ];

        return view('admin.product.price', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'numeric|required',
            'product_id' => 'required|string',
        ]);

        $priceList = PriceList::create($validated);

        return redirect(route('product-prices.show', $priceList->product_id))->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'numeric|required',
        ]);

        $priceList = PriceList::find($request->id);
        $priceList->update($validated);

        return redirect(route('product-prices.show', $priceList->product_id))->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $priceList = PriceList::find($id);
        $priceList->delete();
        return redirect(route('product-prices.show', $priceList->product_id))->with('success', 'Data berhasil dihapus');
    }
}
