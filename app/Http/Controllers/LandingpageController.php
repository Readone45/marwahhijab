<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            return redirect(route('shop') . '?search=' . $request->search);
        }
        $data = [
            'categories' => Category::limit(5)->get(),
            'products' => Product::limit(24)->get(),
            'sliders' => Slider::get(),
        ];

        return view('landing_page.home', $data);
    }

    public function product(Request $request)
    {
        $data = [
            'categories' => Category::limit(5)->get(),
            'products' => Product::where('name', 'like', '%' . $request->search . '%')->paginate(24),
        ];
        return view('landing_page.products', $data);
    }

    public function productDetail(Request $request)
    {
        if ($request->search) {
            return redirect(route('shop') . '?search=' . $request->search);
        }
        $data = [
            'categories' => Category::limit(5)->get(),
            'product' => Product::where('slug', $request->slug)->first(),
        ];
        return view('landing_page.product_detail', $data);
    }

    public function contact(Request $request)
    {
        if ($request->search) {
            return redirect(route('shop') . '?search=' . $request->search);
        }

        $data = [
            'categories' => Category::limit(5)->get(),
        ];

        return view('landing_page.contact', $data);
    }

    public function about(Request $request)
    {
        if ($request->search) {
            return redirect(route('shop') . '?search=' . $request->search);
        }

        $data = [
            'categories' => Category::limit(5)->get(),
        ];

        return view('landing_page.about', $data);
    }

    public function getProductCart(Request $request)
    {
        $ids = json_decode($request->ids);
        return Product::with('category')->select(['id', 'name', 'weight', 'photo', 'category_id'])->where('id', $ids)->first();
    }
}
