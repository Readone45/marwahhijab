<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => Setting::where('group', 'Site')->get(),
        ];

        return view('admin.setting.index', $data);
    }

    public function socmed()
    {
        $data = [
            'settings' => Setting::where('group', 'Socmed')->get(),
        ];

        return view('admin.setting.socmed', $data);
    }

    public function contact()
    {
        $data = [
            'settings' => Setting::where('group', 'Contact')->get(),
        ];

        return view('admin.setting.contact', $data);
    }

    public function store(Request $request)
    {
        foreach ($request->except('_token') as $key => $req) {
            if ($request->file($key)) {
                $setting = Setting::where('key', 'site.' . $key)->first();
                $imagePath = $request->file($key);
                $imageName = $imagePath->getClientOriginalName();
                $extension = $imagePath->extension();
                $path      = $imagePath->storeAs('images/site', $imageName, 'public');
                if ($path) {
                    $this->destroyFile($setting->value);
                    $extension = $imagePath->extension();
                    $new_name =  $key . '-' . date('dmyhis') . '.' . $extension;
                    Storage::disk('public')->move('images/site/' . $imageName, 'images/site/' . $new_name);
                    $setting->update(['value' => 'site/' . $new_name]);
                }
            } else {
                Setting::where('key', 'site.' . $key)->update(['value' => $req]);
            }
        }

        return redirect()->route('settings.index')->with('success', 'Data berhasil diupdate');
    }

    public function socmedStore(Request $request)
    {
        foreach ($request->except('_token') as $key => $req) {
            if ($request->file($key)) {
                $setting = Setting::where('key', 'site.' . $key)->first();
                $imagePath = $request->file($key);
                $imageName = $imagePath->getClientOriginalName();
                $extension = $imagePath->extension();
                $path      = $imagePath->storeAs('images/site', $imageName, 'public');
                if ($path) {
                    $this->destroyFile($setting->value);
                    $extension = $imagePath->extension();
                    $new_name =  $key . '-' . date('dmyhis') . '.' . $extension;
                    Storage::disk('public')->move('images/site/' . $imageName, 'images/site/' . $new_name);
                    $setting->update(['value' => 'site/' . $new_name]);
                }
            } else {
                Setting::where('key', 'socmed.' . $key)->update(['value' => $req]);
            }
        }

        return redirect()->route('socmed')->with('success', 'Data berhasil diupdate');
    }

    public function contactStore(Request $request)
    {
        foreach ($request->except('_token') as $key => $req) {
            if ($request->file($key)) {
                $setting = Setting::where('key', 'site.' . $key)->first();
                $imagePath = $request->file($key);
                $imageName = $imagePath->getClientOriginalName();
                $extension = $imagePath->extension();
                $path      = $imagePath->storeAs('images/site', $imageName, 'public');
                if ($path) {
                    $this->destroyFile($setting->value);
                    $extension = $imagePath->extension();
                    $new_name =  $key . '-' . date('dmyhis') . '.' . $extension;
                    Storage::disk('public')->move('images/site/' . $imageName, 'images/site/' . $new_name);
                    $setting->update(['value' => 'site/' . $new_name]);
                }
            } else {
                Setting::where('key', 'contact.' . $key)->update(['value' => $req]);
            }
        }

        return redirect()->route('contact')->with('success', 'Data berhasil diupdate');
    }

    public function destroyFile($nameFile)
    {
        Storage::disk('public')->delete('images/' . $nameFile);
    }
}
