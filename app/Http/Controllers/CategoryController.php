<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::paginate(15),
        ];
        return view('admin.category.index', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => 1,
        ];

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        Category::find($id)->update($data);

        return redirect()->route('category.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success', 'Data berhasil dihapus');
    }
}
