<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $data = [
            'sliders' => Slider::paginate(5),
        ];
        return view('admin.slider.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Slider',
            'action' => 'slider.store',
            'method' => 'POST',
        ];
        return view('admin.slider.form', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Slider',
            'action' => 'slider.update',
            'method' => 'PUT',
            'slider' => Slider::find($id),
        ];
        return view('admin.slider.form', $data);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'string',
            'subtitle' => 'string',
            'image' => 'image|mimes:png,jpg,svg,webp',
        ]);

        $imagePath = $request->file('image');
        if ($request->file('image')) {
            $imageName = $imagePath->getClientOriginalName();
            $extension = $imagePath->extension();
            $path      = $imagePath->storeAs('images/slider', $imageName, 'public');
            if ($path) {
                $extension = $imagePath->extension();
                $new_name = 'slider' . '-' . date('ymdhis') . '.' . $extension;
                Storage::disk('public')->move('images/slider/' . $imageName, 'images/slider/' . $new_name);
                $validated['image'] = 'slider/' . $new_name;
            }
        }

        Slider::create($validated);

        return redirect(route('slider.index'))->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'string',
            'subtitle' => 'string',
            'image' => 'image|mimes:png,jpg,svg,webp',
        ]);

        $slider = Slider::find($id);

        $imagePath = $request->file('image');
        if ($request->file('image')) {
            $imageName = $imagePath->getClientOriginalName();
            $extension = $imagePath->extension();
            $path      = $imagePath->storeAs('images/slider', $imageName, 'public');
            if ($path) {
                $this->destroyFile($slider->image);
                $extension = $imagePath->extension();
                $new_name = 'slider' . '-' . date('ymdhis') . '.' . $extension;
                Storage::disk('public')->move('images/slider/' . $imageName, 'images/slider/' . $new_name);
                $validated['image'] = 'slider/' . $new_name;
            }
        }

        $slider->update($validated);

        return redirect(route('slider.index'))->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if ($slider) {
            $this->destroyFile($slider->image);
            $slider->delete();
            return redirect(route('slider.index'))->with('success', 'Data telah dihapus');
        }
    }

    public function destroyFile($nameFile)
    {
        Storage::disk('public')->delete('images/' . $nameFile);
    }
}
