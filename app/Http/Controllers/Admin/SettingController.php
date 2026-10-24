<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::current();
        return view('admin.settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::current();

        $validated = $request->validate([
            'kost_name' => 'required|string|max:150',
            'tagline' => 'required|string|max:255',
            'phone_wa' => 'required|string|max:25',
            'email' => 'nullable|email|max:100',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'rules' => 'nullable|string', // newline separated
        ]);

        if (!empty($validated['rules'])) {
            $validated['rules'] = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['rules'])))));
        }

        $setting->update($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan profil kost berhasil disimpan!');
    }
}
