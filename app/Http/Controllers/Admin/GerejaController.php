<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gereja;
use App\Models\Pendeta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GerejaController extends Controller
{
    // Index
    public function index()
    {
        $gerejas = Gereja::with('pendeta')->paginate(10);
        return view('gereja.index', compact('gerejas'));
    }

    public function create()
    {
        $pendetas = Pendeta::all();
        return view('gereja.createGereja', compact('pendetas'));
    }

    public function edit(Gereja $gereja)
    {
        $pendetas = Pendeta::all();
        return view('gereja.editGereja', compact('pendetas', 'gereja'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendeta_id' => 'required|exists:pendetas,id',
            'name_gereja' => 'required|string',
            'image_gereja' => 'nullable|image|max:2048',
            'address_gereja' => 'required|string',
            'numberphone_gereja' => 'required|string',
            'email_gereja' => 'required|string',
        ]);

        if ($request->hasFile('image_gereja')) {
            $imagePath = $request->file('image_gereja')->store('gerejas', 'public');
        } else {
            $imagePath = "Default";
        }

        Gereja::create([
            'pendeta_id' => $request->pendeta_id,
            'name_gereja' => $request->name_gereja,
            'slugs_gereja' => Str::slug($request->name_gereja),
            'image_gereja' => $imagePath,
            'address_gereja' => $request->address_gereja,
            'numberphone_gereja' => $request->numberphone_gereja,
            'email_gereja' => $request->email_gereja,
        ]);

        return redirect()->route('admin.gereja.index')->with('success', 'Data Gereja Baru Sudah Ditambahkan');
    }

    public function update(Request $request, Gereja $gereja)
    {
        $request->validate([
            'pendeta_id' => 'required|exists:pendetas,id',
            'name_gereja' => 'required|string',
            'image_gereja' => 'nullable|image|max:2048',
            'address_gereja' => 'required|string',
            'numberphone_gereja' => 'required|string',
            'email_gereja' => 'required|string',
        ]);

        $imagePath = $gereja->image_gereja;

        if ($request->hasFile('image_gereja')) {
            if ($gereja->image_gereja && str_starts_with($gereja->image_gereja, 'gerejas/')) {
                $imagePath = $request->file('image_gereja')->store('gerejas', 'public');
            }
        }

        $gereja->update([
            'pendeta_id' => $request->pendeta_id,
            'name_gereja' => $request->name_gereja,
            'slugs_gereja' => Str::slug($request->name_gereja),
            'image_gereja' => $imagePath,
            'address_gereja' => $request->address_gereja,
            'numberphone_gereja' => $request->numberphone_gereja,
            'email_gereja' => $request->email_gereja,
        ]);

        return redirect()->route('admin.gereja.index')->with('success', 'Data Gereja Baru Sudah Ditambahkan');
    }

    public function destroy(Gereja $gereja)
    {
        if ($gereja->image_gereja) {
            Storage::disk('public')->delete($gereja->image_gereja);
        }
        $gereja->delete();
        return redirect()->route('admin.gereja.index')->with('success', 'Data Gereja berhasil dihapuskan');
    }
}
