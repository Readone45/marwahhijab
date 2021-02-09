<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'pages' => Page::paginate(15),
        ];
        return view('admin.page.index', $data);
    }

    public function edit($id)
    {
        $data = [
            'action' => 'page.update',
            'method' => 'PUT',
            'page' => Page::find($id),
        ];
        return view('admin.page.form', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'string|required',
            'content' => 'string|required',
        ]);

        $page = Page::find($id);
        $page->update($validate);
        return redirect()->route('page.index')->with('success', 'Data berhasil diupdate');
    }
}
